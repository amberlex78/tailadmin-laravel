# Laravel 13 Upgrade Design

**Goal:** Upgrade the TailAdmin Laravel demo from Laravel 12 to the latest stable Laravel 13 release while preserving the dashboard template and its demo routes/components.

**Scope:** This is a dependency and compatibility upgrade for `/home/lex/projects/tailadmin-laravel`. The Blade dashboard, Tailwind CSS, Alpine.js behavior, routes, and demo content are preserved. Database contents are disposable and do not need migration preservation beyond keeping the existing schema runnable.

**Current baseline:** Laravel Framework `12.69.2`, PHP `8.5.10`, Node `24.20.0`, npm `11.19.0`; the application is a mostly static Blade dashboard with SQLite/file-backed local services.

**Target:** Laravel Framework `^13.0`, resolving to the latest stable 13.x available from Packagist at update time. Laravel 13 requires PHP 8.3+, which is satisfied by the current PHP runtime.

**Approach:** Update Composer constraints and lockfile, resolve compatible first-party/dev dependencies, regenerate the npm lockfile as needed, then verify the application through Laravel tests, migrations, route rendering, and a production frontend build. Do not recreate the project or replace the TailAdmin frontend.

**Success criteria:**

1. `composer.json` requires Laravel 13 and `composer.lock` resolves Laravel 13 packages without dependency conflicts.
2. `package-lock.json` is internally consistent with `package.json` and `npm run build` succeeds.
3. The full Laravel test suite passes.
4. Database migrations run successfully against the disposable SQLite database.
5. Dashboard and representative demo routes return successful responses with rendered HTML.
