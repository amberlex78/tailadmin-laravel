# Laravel 13 Upgrade Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:executing-plans to implement this plan task-by-task.

**Goal:** Upgrade the TailAdmin Laravel demo from Laravel 12 to the latest stable Laravel 13 release while preserving all dashboard template behavior.

**Architecture:** Keep the existing Blade/Tailwind/Alpine application intact and perform a dependency-first upgrade. Composer owns the PHP framework and test/tooling lockfile; npm owns the frontend lockfile. Compatibility changes are limited to files proven necessary by the verification steps.

**Tech Stack:** Laravel 13, PHP 8.5, Composer, Blade, Tailwind CSS 4, Alpine.js, Vite, Pest, SQLite.

**Spec:** `docs/superpowers/specs/2026-09-23-laravel-13-upgrade-design.md`

## Global Constraints

- Preserve the TailAdmin dashboard UI, Blade components, routes, styles, and frontend interactions.
- Target Laravel Framework `^13.0` and PHP `^8.3` or newer.
- Treat local database contents as disposable; retain migration behavior.
- Allow `composer.lock` and `package-lock.json` to change as required by dependency resolution.
- Do not replace the project with a fresh skeleton or perform unrelated refactors.

## Review Focus

- Composer resolution must select Laravel 13-compatible versions for framework-adjacent dev tools; verify with `composer why-not`/installed versions in the lockfile.
- Existing Laravel tests must still boot the application; verify with `php artisan test`.
- A fresh SQLite migration must complete; verify with a disposable database and `php artisan migrate:fresh --force`.
- Representative dashboard routes must render successfully; verify with the Laravel HTTP test suite or a local server smoke test.
- Frontend dependency resolution must remain reproducible; verify `npm ci` and `npm run build`.

### Task 1: Upgrade PHP dependencies

**Files:**
- Modify: `composer.json`
- Modify: `composer.lock`

**Interfaces:**
- Produces a Laravel 13-compatible PHP dependency graph for the existing application.

- [ ] **Step 1: Change the framework constraint**

Update `laravel/framework` from `^12.0` to `^13.0`; keep the existing PHP floor because it already satisfies Laravel 13.

- [ ] **Step 2: Resolve the Composer graph**

Run `composer update --with-all-dependencies` from the project root. Expected: Composer completes without dependency conflicts and rewrites `composer.lock`.

- [ ] **Step 3: Inspect resolved versions**

Run `php -r '$j=json_decode(file_get_contents("composer.lock"), true); foreach(array_merge($j["packages"],$j["packages-dev"]) as $p) if (in_array($p["name"],["laravel/framework","laravel/tinker","pestphp/pest","pestphp/pest-plugin-laravel","nunomaduro/collision","laravel/pail","laravel/pint"])) echo $p["name"]." ".$p["version"].PHP_EOL;'`.

Expected: `laravel/framework` is a 13.x release and all locked packages satisfy Composer's constraints.

### Task 2: Rebuild and verify frontend dependencies

**Files:**
- Modify: `package-lock.json`

**Interfaces:**
- Consumes the existing `package.json`.
- Produces a reproducible frontend install for the unchanged TailAdmin assets.

- [ ] **Step 1: Recreate the npm lockfile install**

Run `npm install` from the project root. Expected: npm updates only dependency metadata needed for the current `package.json` and completes without unresolved peer dependency errors.

- [ ] **Step 2: Verify the production asset build**

Run `npm run build`. Expected: Vite exits with status 0 and produces `public/build/manifest.json`.

### Task 3: Verify Laravel behavior and dashboard routes

**Files:**
- Modify: `tests/Feature/ExampleTest.php` only if existing coverage needs representative route assertions.
- Modify: application compatibility files only if a verification failure identifies a Laravel 13 API incompatibility.

**Interfaces:**
- Consumes the Laravel 13 dependency graph and existing dashboard routes.
- Produces evidence that the demo application still boots, migrates, tests, and renders.

- [ ] **Step 1: Run the existing test suite**

Run `php artisan test`. Expected: all existing tests pass.

- [ ] **Step 2: Run a fresh disposable migration**

Run `rm -f database/database.sqlite && touch database/database.sqlite && php artisan migrate:fresh --force` from the project root. Expected: all project migrations complete successfully.

- [ ] **Step 3: Smoke-test representative routes**

Run `php artisan route:list` and exercise the root dashboard, profile, form-elements, basic-tables, signin, and error-404 routes through the application test harness or a temporary local server. Expected: each route returns a successful HTML response and no route/view exception.

- [ ] **Step 4: Inspect the final diff**

Run `git diff --check` and `git status --short`. Expected: no whitespace errors and only dependency/lockfile or narrowly justified compatibility changes are present.

