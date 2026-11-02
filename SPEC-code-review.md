# Spec: Porichoy Laravel Code Review

## Objective

Conduct a read-only code review of the Porichoy Laravel 12 portfolio/CMS application using three skill lenses:

- **@code-review-and-quality** — multi-axis review (functionality, security, performance, maintainability, test quality).
- **@laravel-expert** — Laravel idioms: thin controllers, service layer, FormRequest validation, API resources, policies/gates, Eloquent scopes/eager loading, route model binding, middleware, Sanctum-style auth, transactions.
- **@php-pro** — modern PHP 8.2+: strict typing, match expressions, enums, attributes, SPL, generators, built-in functions over custom code, PSR compliance.

**No features will be changed, added, or removed.** This is an audit only. Any bug found is reported, not fixed, unless you explicitly approve a fix.

## Assumptions I'm making

1. This is a web application (Laravel + Blade + Vite), not a mobile or CLI project.
2. Auth is session-based (Laravel native), not JWT/SPA-token — though Sanctum is a candidate for API routes.
3. Database is SQLite in dev/testing, likely MySQL/PostgreSQL in production (check `.env`).
4. Target Laravel version is 12.x (per `composer.json`).
5. PHP version is ^8.2.

→ Correct me now or I'll proceed with these.

## Tech Stack

- Laravel Framework ^12.0
- PHP ^8.2
- intervention/image-laravel ^1.5 (image manipulation)
- tightenco/ziggy ^2.6 (named routes in JS)
- yenhunter/laravel-website-analytics ^1.1
- Dev: laravel/pint, phpunit ^11.5.3, playwright (E2E)

## Commands

```
Review (read-only): none — static inspection only
Test: php artisan test
Lint: ./vendor/bin/pint --test
Type/stan: (none configured — PHPStan not installed)
E2E: npx playwright test
```

## Project Structure

```
app/
  Http/Controllers/Admin/*      Admin CRUD controllers (thin, delegate to services)
  Http/Controllers/Visitor/*    Public storefront controllers
  Http/Controllers/RoutingController.php   SPA-ish admin catch-all routing
  Http/Middleware/*             LockScreen, SetVisitorTheme
  Http/Requests/*               FormRequest validation classes (Admin + Auth + Visitor)
  Models/*                      Eloquent models (scopes, attributes, boot logic)
  Notifications/*               WelcomeSetPasswordNotification
  Providers/*                   AppServiceProvider
  Rules/*                       ReCaptcha rule
  Services/*                    Business logic per domain (BlogService, UserService, etc.)
  Traits/*                      UserLogTrait (audit logging)
config/                         Laravel config
database/                       Migrations, seeders, factories
routes/
  admin.php                     Admin route groups (module/element/management/settings/configuration)
  web.php                       Visitor routes + require admin.php
  console.php                   Artisan commands
resources/
  views/                        Blade views (admin.pages.*, pages.*)
tests/
  Feature/                      PHPUnit feature tests (AdminCrudContractTest via data providers)
  Unit/                         PHPUnit unit tests
e2e/                            Playwright E2E specs (admin.spec.js, storefront.spec.js)
```

## Code Style

One real snippet beats three paragraphs. Current conventions observed:

```php
// Controller: thin, DI-injected service, form-request validation
public function store(StoreBlogRequest $request): RedirectResponse
{
    $this->blog_service->store($request);
    return back()->with('success', 'Blog post created successfully');
}

// Service: strict typing, readonly constructor promteted property, const config
private const IMAGE_DIR = 'uploads/blog/images';
public function __construct(private readonly BlogService $blog_service) {}

// Model: scopes, Attribute casts, HasUuids, boot() with creating/updating callbacks
public function scopePublished($query)
{
    return $query->where('blog_status', true)
                 ->whereNotNull('blog_published')
                 ->where('blog_published', '<=', now());
}
```

Key conventions to check during review:
- PSR-12 formatting (pint available)
- Strict typing where possible
- Return type declarations on all methods
- `readonly` injected service dependencies
- Route model binding vs manual `findOrFail`
- Named route groups with `.` separators

## Testing Strategy

- Framework: PHPUnit (via `php artisan test`), config in `phpunit.xml`
- Feature tests: `tests/Feature/` — Admin CRUD contract covered by `AdminCrudContractTest` with data providers across 10 modules
- Unit tests: `tests/Unit/` — ExampleTest, ReCaptchaRuleTest
- Base: `tests/TestCase.php`
- E2E: Playwright (`e2e/*.spec.js`, `e2e/support/*`)
- Coverage expectation: no explicit threshold configured; review should assess coverage of critical paths (auth, CRUD, contact form)
- Test database: RefreshDatabase trait used; SQLite in-memory likely

## Boundaries

- **Always do:** Report findings with file:line references; classify by severity; suggest Laravel-native/PHP-native fixes; verify test commands run before closing.
- **Ask first:** Before fixing any bug, refactoring any file, adding a dependency, changing config, or altering routes/middleware.
- **Never do:** Change features, fix bugs without approval, edit `vendor/`, commit secrets, remove failing tests, or rewrite working code "just because."

## Success Criteria

- Review document produced with findings grouped by: Controllers, Services, Models, Requests/Validation, Routes, Middleware, Tests, Config/Environment.
- Each finding includes: file:line, skill lens, severity (low/medium/high), description, suggested fix (read-only), and whether it's a behavior risk.
- No file in `app/`, `routes/`, `config/`, `tests/`, or `resources/` is modified.
- Test suite (`php artisan test`) still passes after review (review itself doesn't run tests, but confirms commands).
- Open questions logged for your input.

## Open Questions

1. Are there specific areas you're most concerned about (auth, image uploads, admin CRUD, contact form)?
2. Do you want severity thresholds that would auto-trigger a fix request (e.g., any "high" finding)?
3. Should the review also cover `resources/views/` Blade templates and `vite.config.js`/`tailwind` asset setup?
4. Is there a staging/production `.env` to compare against `.env.example` for config drift?

## Next Step

Review this spec. Approve or request changes. Once approved, I'll execute the read-only review and deliver a findings report (no code changes).