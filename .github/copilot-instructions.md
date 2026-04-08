# Porichoy: Portfolio/Resume CMS Platform

## Project Overview

**Porichoy** (Bengali: "identity/profile") is a multi-user, theme-based portfolio and resume content management system built on Laravel 12. Users create professional portfolios with customizable sections (education, experience, skills, projects, services, blogs, research, training, testimonials, FAQs).

**Key Features:**
- Multi-theme support (Antux, Dorbesh, Reeni, Flixta) with light/dark variants
- Admin dashboard for content management
- Public-facing visitor portfolio pages
- User authentication & activity logging
- Responsive design with Bootstrap 5.3

---

## Architecture & Patterns

### Eloquent Models
All models are in `app/Models/` and follow the **`*Info` suffix convention** for domain entities:
- Portfolio data: `BlogInfo`, `EducationInfo`, `ExperienceInfo`, `ProjectInfo`, `ServiceInfo`, `SkillInfo`, `ResearchInfo`, `TrainingInfo`
- Meta/config: `ProfileInfo`, `ThemeInfo`, `ColumnSettings`, `Module`, `SelectType`
- User/audit: `User`, `UserLog`, `ClientInfo`

**Key trait:** [`UserLogTrait`](app/Traits/UserLogTrait.php) — auto-logs user actions (module, action, IP, user-agent) to `user_logs` table.

### Controllers
- **Admin controllers** (`app/Http/Controllers/Admin/`) — Resource-style CRUD (store/update/destroy)
- **Visitor controllers** (`app/Http/Controllers/Visitor/`) — Public portfolio render
- **RoutingController** — Dynamic view routing via URL segments (`/admin/section/subsection` maps to `views/admin.section.subsection`)

### Routes
- `routes/web.php` — Public visitor portfolio routes
- `routes/admin.php` — Admin dashboard (protected by `auth` & `verified` middleware)

### Theme System
- Configured in `config/themes.php` — theme name and view path per app
- Environment-based: `APP_THEME=antux` (or dorbesh/reeni/flixta), `APP_COLOR=light`
- Views organized per theme: `resources/views/themes/{theme_name}/`

---

## Development Workflow

### Setup & Dependencies

```bash
# Install PHP/Composer dependencies
composer install

# Install Node/npm dependencies
npm install

# Copy .env and generate app key
cp .env.example .env
php artisan key:generate

# Run migrations (SQLite default in .env)
php artisan migrate

# Optional: Seed database
php artisan db:seed
```

### Running the Application

**Development (all-in-one):**
```bash
composer dev
# Runs concurrently: Laravel server (port 8000) + queue worker + pail logs + Vite dev server
```

**Individual commands:**
```bash
php artisan serve           # Laravel dev server (http://localhost:8000)
npm run dev                 # Vite dev server (http://localhost:5173)
php artisan queue:listen   # Process queued jobs
php artisan pail           # Tail application logs
```

**Production build:**
```bash
npm run build  # Compile Vite assets
```

### Testing

```bash
composer test  # Runs: php artisan test (PHPUnit ^11.5.3)
```

**Test Structure:**
- `tests/Unit/` — Unit tests
- `tests/Feature/` — Feature/integration tests
- Config: `phpunit.xml` (in-memory SQLite, disabled Pulse/Maintenance modes)
- Use **Faker** for test data generation

---

## Code Conventions

### Custom Validation Rule
- [ReCaptcha](app/Rules/ReCaptcha.php) — Custom validation for reCAPTCHA v3

### Activity Logging
Use `UserLogTrait` to track user actions:
```php
use App\Traits\UserLogTrait;

class MyController extends Controller {
    use UserLogTrait;
    
    public function store(Request $request) {
        // Your logic...
        $this->userLog('module_name', 'action_name');  // Auto-logs to user_logs
    }
}
```

### Database
- **Migrations:** `database/migrations/` — timestamped, ordered by creation date
- **Seeders:** `database/seeders/` — schema & test data
- **Factories:** `database/factories/UserFactory.php` — Faker-based test data
- **Default DB:** SQLite (configured in `.env`); configurable to MySQL/PostgreSQL

---

## Frontend Architecture

### Build Tool & Assets
- **Bundler:** Vite (Laravel Vite plugin)
- **Framework:** Bootstrap 5.3.7
- **Entry points:** `resources/scss/app.scss` + `resources/js/app.js`
- **Output:** `public/build/` (JS, CSS, assets)

### Major Frontend Libraries
- **Data/Tables:** DataTables (responsive, fixed-header, multi-select plugins)
- **Charts:** Chart.js, ApexCharts
- **Calendar:** FullCalendar
- **Editors:** Quill (rich text), Summernote
- **UI Components:** Pickr (color picker), SweetAlert2, Tour.js
- **Forms:** Choices.js, InputMask, Filepond (uploads), Dropzone
- **Maps:** Leaflet, jsVectorMap
- **Utils:** jQuery, jQuery UI, Clipboard.js, DateRangePicker, Handlebars

### Blade/View Conventions
- Theme-aware: `views/themes/{APP_THEME}/`
- Admin views: `views/admin/` (dashboard, CRUD forms)
- Public views: `views/visitor/` (portfolio display)
- Shared components: `views/components/`

---

## Common Tasks

### Adding a New Portfolio Section
1. Create model: `app/Models/{NewSectionInfo}.php` (extends Model)
2. Create migration: `database/migrations/YYYY_MM_DD_HHMMSS_create_{new_section_infos}_table.php`
3. Create admin controller: `app/Http/Controllers/Admin/{NewSectionController}.php` (resource-style)
4. Add route to `routes/admin.php`: `Route::resource('new-section', NewSectionController::class)`
5. Create admin views: `resources/views/admin/new-section/` (index, create, edit, show)
6. Add visitor controller & route to display portfolio section

### Adding a New Theme
1. Create theme folder: `resources/views/themes/{new_theme_name}/`
2. Copy layout structure from existing theme
3. Add theme config to `config/themes.php`
4. Test with: `APP_THEME=new_theme_name` in `.env`

### Creating Tests
1. Place in `tests/Feature/` (integration) or `tests/Unit/`
2. Extend `Tests\TestCase` for feature tests
3. Use Faker factories for test data
4. Run: `composer test`

---

## Important Files

| File | Purpose |
|------|---------|
| [composer.json](composer.json) | PHP dependencies (Laravel 12, Intervention/Image) |
| [package.json](package.json) | NPM dependencies (100+ frontend libraries) |
| [vite.config.js](vite.config.js) | Vite bundler config (CSS/JS entry points) |
| [.env.example](.env.example) | Environment variables template |
| [config/themes.php](config/themes.php) | Theme definitions & view paths |
| [config/app.php](config/app.php) | App name, locale, timezone, service providers |
| [phpunit.xml](phpunit.xml) | Test suite configuration |
| [routes/web.php](routes/web.php) | Public portfolio routes |
| [routes/admin.php](routes/admin.php) | Admin dashboard routes (auth required) |
| [app/Traits/UserLogTrait.php](app/Traits/UserLogTrait.php) | Activity logging functionality |

---

## Debugging & Logs

**Application logs:** `storage/logs/laravel.log`  
**Real-time logs:** `php artisan pail`  
**Database logs:** Change `DB_LOG_QUERIES=true` in `.env` (if configured)  
**Queue failures:** Check `failed_jobs` table or `php artisan queue:failed`

---

## Performance Notes

- **Caching:** Configured in config/cache.php (uses database by default)
- **Sessions:** Database-based (configurable in config/session.php)
- **Images:** Intervention/Image library for dynamic image manipulation
- **Frontend:** Vite handles code-splitting and asset optimization

---

## Links & References

- **Laravel Docs:** https://laravel.com/docs/12
- **Vite + Laravel:** https://vitejs.dev/ and Laravel plugin docs
- **Bootstrap 5:** https://getbootstrap.com/docs/5.3/
- **Eloquent Models:** https://laravel.com/docs/12/eloquent
- **Testing:** https://laravel.com/docs/12/testing
