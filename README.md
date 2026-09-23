# TailAdmin Laravel - Tailwind CSS Free Laravel Dashboard

**TailAdmin Laravel** is a modern admin dashboard template powered by **Laravel 12**, **Tailwind CSS v4**, **Alpine.js**, and Blade components.

![TailAdmin - Next.js Dashboard Preview](./tailadmin-laravel.png)

## Quick Links

* [✨ Get TailAdmin Laravel](https://tailadmin.com/laravel)
* [📄 Documentation](https://tailadmin.com/docs)
* [⬇️ Download](https://tailadmin.com/download)
* [🌐 Live Demo](https://laravel-demo.tailadmin.com)

## Features

- Responsive Laravel dashboard layout with dark mode and RTL support.
- Reusable Blade components for dashboards, forms, tables, charts, modals, and profile pages.
- Tailwind CSS v4 with Vite.
- Alpine.js for lightweight UI interactions.
- Static demo pages ready to customize for an admin panel, CRM, SaaS application, or internal tool.

## Requirements

- PHP 8.3 or newer
- Composer
- Node.js 22.x and npm
- PHP extensions required by Laravel, including `pdo_sqlite`

This repository is configured for local development without Docker, Laravel Sail, MySQL, Redis, or a mail server. SQLite is used as the local database, while sessions and cache use the filesystem and queues run synchronously.

## Local Installation

### 1. Clone the repository

```bash
git clone https://github.com/TailAdmin/tailadmin-laravel.git
cd tailadmin-laravel
```

### 2. Install dependencies

```bash
composer install
npm install
```

Use Node.js 22.x for the version declared by the project:

```bash
node -v
npm -v
```

### 3. Configure the environment

```bash
cp .env.example .env
php artisan key:generate
```

On Windows, use `copy .env.example .env` instead of `cp`.

The default `.env.example` already contains the local SQLite and filesystem settings:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

### 4. Create the SQLite database and run migrations

```bash
touch database/database.sqlite
php artisan migrate
```

On Windows, create an empty file at `database/database.sqlite` manually if `touch` is unavailable.

The template does not require sample database records, but the optional seeder can be run with:

```bash
php artisan db:seed
```

### 5. Start the application

Use two terminals:

Terminal 1 — Laravel:

```bash
php artisan serve
```

Terminal 2 — Vite:

```bash
npm run dev
```

Open the dashboard at [http://127.0.0.1:8000](http://127.0.0.1:8000).

You can also build frontend assets for a production-like run:

```bash
npm run build
php artisan serve
```

## Useful Commands

```bash
# Clear Laravel caches
php artisan optimize:clear

# List application routes
php artisan route:list

# Run tests
php artisan test

# Run frontend development server
npm run dev

# Build frontend assets
npm run build

# Create the storage symlink
php artisan storage:link
```

## Testing

Run the PHP test suite with:

```bash
composer run test
```

or:

```bash
php artisan test
```

Before running feature tests that render Blade layouts, build the frontend assets first so that `public/build/manifest.json` exists:

```bash
npm run build
php artisan test
```

## Project Structure

```text
tailadmin-laravel/
├── app/                    # Application logic and Blade component classes
├── bootstrap/              # Laravel bootstrap configuration
├── config/                # Framework configuration
├── database/              # SQLite file, migrations, seeders, and factories
├── public/                # Public entry point and compiled assets
├── resources/             # Blade views, CSS, and JavaScript
├── routes/                # Web and console routes
├── storage/               # Logs, cache, sessions, and uploads
├── tests/                 # Pest tests
├── .env.example           # Local environment template
├── artisan                # Laravel command-line entry point
├── composer.json          # PHP dependencies and scripts
├── package.json           # Node.js dependencies and scripts
└── vite.config.js         # Vite configuration
```

## Troubleshooting

### PHP or Composer platform errors

Check the installed versions and Composer requirements:

```bash
php -v
composer check-platform-reqs
```

This project currently expects PHP 8.3+.

### Node engine warning

The project declares Node.js 22.x. Node.js 24 may work, but use Node.js 22 to avoid `EBADENGINE` warnings and keep the environment reproducible.

### Missing Vite manifest

Run:

```bash
npm run build
```

### SQLite errors

Confirm that the SQLite extension is enabled and the database file exists:

```bash
php -m | grep -Ei 'pdo_sqlite|sqlite3'
ls -l database/database.sqlite
```

Then clear cached configuration:

```bash
php artisan optimize:clear
```

### NPM build errors

Reinstall the frontend dependencies:

```bash
rm -rf node_modules package-lock.json
npm install
npm run build
```

## License

Refer to the [LICENSE](https://tailadmin.com/license) page for more information.
