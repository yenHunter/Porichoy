# Porichoy Agent Instructions

Guidelines for AI coding agents working in this repository.

## Project Overview

**Porichoy** (Bengali: "identity/profile") is a multi-user, theme-based portfolio/resume CMS built on **Laravel 12** (PHP ≥ 8.2). Single-owner content model: a (typically single) Super Admin manages profile/portfolio content through an authenticated admin panel; anonymous visitors get public theme-rendered pages.

## Critical: Hardened Patterns (do not regress)

These rules exist because violations were actual security bugs fixed in this codebase. Never reintroduce them.

### 1. XSS — never raw-echo user content
All portfolio content (`details`, `skill_details`, `employment_details`, `testimonial_details`, `service_details`, blog content, etc.) is **user-entered and untrusted**, even though only the admin enters it (stored-XSS risk).
- Always escape: `{{ $item->details }}` — never `{!! ... !!}` for content fields.
- Raw echo `{!! !!}` is allowed only for content you fully control *in server-side code* (e.g. blade-compiled strings, or content passed through a sanitizer explicitly).
- When adding a rich-text/Markdown field, pair it with a server-side sanitizer (e.g. HTMLPurifier) BEFORE rendering `{!! !!}` — do not skip straight to raw output.

### 2. Never concatenate unvalidated input into view names, file paths, or SQL
- `RoutingController` renders dynamic admin views from URL segments via `renderAdminView()`: it (a) requires auth, (b) regex-validates each segment (`^[a-z0-9][a-z0-9-]{0,63}$`), (c) 404s if the composed view name doesn't exist. Any new dynamic-view dispatcher MUST reuse `renderAdminView()`, not re-implement unsafe concatenation.
- The log viewer (`SystemController::applicationLog`) previously allowed `?file=../../.env` path traversal → arbitrary file read. It now allowlists only filenames present in `storage/logs/*.log`. Any future "open a file by name" feature must use the same allowlist-against-directory-listing pattern; never trust `$_GET['file']`, `basename()` alone, or string concat.

### 3. Validation rules must actually fail
A custom `ValidationRule` that assigns to `$fail` (like `$fail = 'message'`) instead of calling `$fail('message')` is a silent no-op — the request passes validation. The `App\Rules\ReCaptcha` rule previously had this bug; it now calls `$fail()` correctly and returns on (a) missing token, (b) missing secret. When writing new rules: call `$fail(...)` as a function and `return` right after.

### 4. Read config via `config()`, not `env()`
`env()` returns null after `config:cache`. In runtime code (rules, controllers, notifications), use `config('services.recaptcha.secret_key')`, never `env('RECAPTCHA_SECRET_KEY')`. Reserve `env()` for `config/*.php` files.

### 5. No hard-coded credentials — ever
`UserSeeder` used to ship `Admin#123`. It now generates a random password and echoes it once via `$this->command->alert(...)`; re-seeding is idempotent (skips if admin exists, warns, generates nothing).
Rules for anything newly seeded or any new third-party integration:
- Generate secrets at runtime (e.g. `Str::random()`) or read from `.env` — never commit them.
- New `.env` values need matching `.env.example` entries (empty placeholder only).
- Registration (`AuthController::register`) sets `user_status = false` for admin approval — never change this to `true` silently; it's an open endpoint.

## Architecture

### Directory map
```
app/
  Http/Controllers/Admin/   Panel CRUD (module CRUD + config + system)
  Http/Controllers/Visitor/ Public page controllers
  Http/Controllers/RoutingController.php  Dynamic admin view dispatcher (auth + allowlist + exists())
  Http/Middleware/          LockScreenMiddleware (unregistered so far), SetVisitorTheme (alias 'visitor')
  Models/                   25 models, domain entities use *Info suffix
  Rules/ReCaptcha.php       reCAPTCHA v2/v3 verify rule
  Traits/UserLogTrait.php   Activity logging
resources/views/
  admin/                    Panel views (dashboard, module/*, element/*, management/*, layout/partials/*)
  visitor/{antux,dorbesh,flixta,reeni}/pages/  Theme-specific public pages
  pages/                    shared page partials (post, productivity, project, etc.)
routes/
  web.php                   Public 'visitor.*' routes (index, about, education, services, blogs, contact)
  admin.php                 Admin redirect routes + all module/element/management/settings/configuration routes
bootstrap/app.php           Middleware alias registration; TrackVisitor (analytics) appended to every 'web' request + session
```

### Eloquent conventions
- Models ending in `*Info` use **HasUuids** (`id` is string/UUID, `$incrementing = false`, `$keyType = 'string'`).
- `booted()` is used for auto-slug generation (`generateUniqueSlug()`), auto-sequence (`*::max(...)+1`), auto-default status when null, and default view_count=0.
- Viewable models expose `scopeActive()`, `scopeSorted()`, and `scopePublished()` (blogs). Use them; don't `where('blog_status', true)` inline.
- Relationships: prefer `first()` with `where('blog_slug', $x)` style slugging; always guard: theme views may receive `null` records → 404 or `abort_unless()` before render. See bug lessons below.
- `updated_by` is auto-stamped in `booted()` via `Auth::id()` for blog and similar models — don't set it manually.
- **Relationship caveat:** `BlogInfo` has a `category` relation but **no** `author` relation (removed a dead `with('author')` eager-load). Any new authorship feature needs a real migration column + belongsTo.

### RoutingController + route files
- The admin route group maps URL → composed view name (no DB write).
- `routes/admin.php` registers module/element/management/settings/configuration groups using explicit per-verb routes (store/edit/update/delete/sequence) — not `Route::resource`.
- Guest routes: login, register (open self-registration, sets inactive status), forgot/reset-password.
- Auth routes: home, logout, lock/unlock screen, and all module management.

## Bugs recently fixed (details for agents)

| Bug | Cause | Fix | Lesson |
|---|---|---|---|
| Contact form 500'd | `VisitorController::contactStore` missing (route only) | Implemented: validates `name/email/phone/comments` + `ReCaptcha`, logs to `contact` channel | A route referencing a method that doesn't exist ships silently; run `php artisan route:list` and smoke-test each route after adding one |
| Self-registration 500'd | Wrote to `$object->status` (no such column); real column is `user_status` | `$object->user_status = false` (matches migration + Eloquent cast) | Column name drift between controller and migration; grep migrations before writing |
| reCAPTCHA no-op | `$fail = '...'` (assignment, not call) | `$fail('...')` + null-safety + null-secret guard | Test validation rules with fuzzed input, don't trust syntax that parses |
| Log viewer path traversal | `?file=` concatenated into `file_get_contents` | Allowlist against `glob(storage/logs/*.log)` basenames | Any filename param must be cross-checked against a directory listing |
| Stored XSS in 11 blade sinks | `{!! !!}` on user content (`details`, `skill_details`, `employment_details`, `testimonial_details`, `service_details`) in antux + flixta themes | Replaced with `{{ }}` escaping | New theme = audit every `{!! !!}` against user-entered fields |
| RoutingController unguarded | Blind string concat into `view('admin.'.$segments)` | `renderAdminView()`: auth + regex segments + `view()->exists()` 404 | Never expose a dynamic renderer without auth + validation |
| Blog admin 500 (`with('author')`) | Relation `author` not defined on BlogInfo | Removed from eager-load | Grep model relations before adding `with()` |
| Theme default picture crash | Flixta read `$profile_info['profile_picture']` with no fallback on fresh DB | Added `!isset()` branch → default picture | New DB / fresh seed has no `ProfileInfo` rows — every `$profile_info[...]` access needs `isset`/`??` guard |
| Composer drifted 23 advisories | All transitive; local `bootstrap/cache/*` survived composer purge | Updated + cleared `bootstrap/cache/packages.php`, `services.php` before `dump-autoload` | Stale cached provider maps cause `Class not found` errors after dependency changes — delete both cache files, not just `vendor/` |

## Environment & Runtime

- **PHP**: ≥ 8.2 (Laravel 12), also uses `intervention/image`, `stevebauman/location` (geo via IP), `tightenco/ziggy` (routes → JS), `yenhunter/laravel-website-analytics` (its `TrackVisitor` middleware appends to every `web` request and requires its tables to exist — hence test setup below).
- **DB**: SQLite (default `.env.example`), MySQL in production (⚠ README still claims MySQL as *the* setup — the codebase actually supports either; use which is configured in `.env`).
- **Sessions/Cache/Queue**: database (default). Queue is localhost-only — it is NOT production-ready (`port` assumes default MySQL).
- **App key/session**: `APP_KEY` must exist; `SESSION_ENCRYPT=false` by default. `APP_ENV=local` in `.env.example` — production must set `production` + debug off (not enforced by app code yet).
- **Theme**: `SetVisitorTheme` middleware reads `config('themes.default_theme')` (`APP_THEME` env) and prepends its view path. Activating a different theme switches `resources/views/{theme}/pages/*` entirely. Session key: `visitor_theme` (not currently set anywhere except that default read, so themes effectively swap via config only).

## Conventions

### Blade
- `**Escape all user-entered values**`; raw triple-brace only for config/provider-trusted static HTML.
- Form views are heavy inline HTML (each theme repeats layouts) — prefer extending an existing component rather than duplicating layout markup into new pages when possible.
- Use `@if(isset($var))` before individual `$profile_info[...]` keys when it's a `pluck` result array.
- Partial include path for theme-shared bits: `@include('layout.partials.*')` under each `visitor/{theme}/layout/` folder, or `@include('include.*')` for shared header/footer fragments.

### Git & Code Style
- **Style tool**: Laravel Pint (run `vendor/bin/pint` to standardize before committing).
- Tests live under `tests/Unit` and `tests/Feature` using `Tests\TestCase`.

### Adding a new module (e.g. "certificates")
1. Migration: create `{module}_infos` table (include `id` UUID, `status`/`*_status` boolean, `*_sequence` int, `updated_by` FK).
2. Model: `app/Models/{Name}Info.php` (`HasUuids`, booted: auto-slug if slugged, auto-sequence, auto-status, `updated_by` stamp; add `scopeActive`, `scopeSorted`).
3. Controller: `app/Http/Controllers/Admin/{Name}Controller.php` following the `view/store/edit/update/delete/update_sequence` pattern (validate every input including all file uploads' mime + max size; store via `Image::read()` → WebP at documented scale in `uploads/{module}/` on the `public` disk; reuse `UserLogTrait::logUserActivity('Module', 'action')`).
4. Routes in `routes/admin.php` under the `module` or `element` prefix group, using the existing per-verb style. Run `php artisan route:list` to confirm no route collision, and smoke-test every route exists (see lesson above).
5. Admin views under `resources/views/admin/pages/{module}/index.blade.php`.
6. Visitor display: add to `VisitorController` + `routes/web.php` + each active theme's `pages/` folder, escaping the new fields.

### Testing
- Feature tests MUST `use Illuminate\Foundation\Testing\RefreshDatabase;` — the analytics middleware is appended to every web request and queries `website_analytics`, which won't exist otherwise. `phpunit.xml` runs SQLite `:memory:`.
- Run before delivery: `php artisan test`, `php artisan test --parallel` when the suite grows.
- A green exit code means nothing if the route silently 500s — assert specific status codes AND a rendered content marker, e.g. `$response->assertSee('expected text')`.

### Cache the right things after dependency changes
After `composer update`/`composer.json` edits: `rm -f bootstrap/cache/packages.php bootstrap/cache/services.php` THEN `composer dump-autoload` (stale cached provider maps caused a misleading `Spatie\Permission` class-not-found crash here). After `package.json` edits: `npm install` (`npm audit fix` for advisories). After route/view/model changes in production: `php artisan optimize:clear`.
