# TailAdmin Laravel

TailAdmin Laravel is a responsive admin dashboard built with Laravel, Blade, Tailwind CSS, Alpine.js, and Vite. It includes dashboard pages, reusable Blade components, forms, tables, profile pages, authentication screens, and UI examples.

## Stack

- PHP 8.3+
- Laravel 13
- Blade
- Tailwind CSS 4
- Alpine.js 3
- Vite 8
- SQLite for local development

## Requirements

Make sure the following tools are installed:

- PHP 8.3 or newer with the SQLite extension enabled
- Composer
- Node.js 24.x
- npm

You can check the installed versions with:

```bash
php -v
composer --version
node -v
npm -v
```

## Installation

### 1. Clone the repository

```bash
git clone git@github.com:amberlex78/tailadmin-laravel.git
cd tailadmin-laravel
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure the environment

Create the local environment file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

On Windows, use the following command instead of `cp`:

```powershell
copy .env.example .env
```

The default environment configuration uses SQLite, local file sessions, a synchronous queue, file-based cache, and logged mail. No external database or mail server is required for local development.

### 4. Create the database

Create the SQLite database file and run the migrations:

```bash
touch database/database.sqlite
php artisan migrate
```

On Windows, create an empty file named `database.sqlite` inside the `database` directory before running the migration.

## Local development

Start the complete local development environment with:

```bash
composer run dev
```

This starts the Laravel server, queue listener, log viewer, and Vite development server together.

Open the application at [http://127.0.0.1:8000](http://127.0.0.1:8000).

If you prefer to run the services separately, use two terminals:

```bash
php artisan serve
```

```bash
npm run dev
```

## Frontend assets

Build the frontend assets for a production-style run with:

```bash
npm run build
```

After the build completes, start Laravel as usual:

```bash
php artisan serve
```

For continuous frontend development, use:

```bash
npm run dev
```

## Useful commands

```bash
# Clear Laravel caches
php artisan optimize:clear

# List registered routes
php artisan route:list

# Run the test suite
php artisan test

# Run tests through the Composer script
composer run test

# Create the public storage symlink
php artisan storage:link
```

## Available pages

The application currently includes the following page groups:

- E-commerce dashboard
- Profile
- Form elements
- Basic tables
- Blank page
- Sign in and sign up
- 404 error page
- Alerts
- Avatars
- Badges
- Buttons
- Images
- Videos

## Project structure

```text
tailadmin-laravel/
├── app/
│   ├── Helpers/             # Application helper classes
│   ├── Http/                # Controllers and HTTP-layer code
│   ├── Models/              # Eloquent models
│   └── Providers/           # Service providers
├── database/
│   ├── factories/           # Model factories
│   ├── migrations/          # Database migrations
│   ├── seeders/             # Database seeders
│   └── database.sqlite      # Local SQLite database
├── public/                  # Public entry point and built assets
├── resources/
│   ├── css/                 # Application styles
│   ├── js/                  # Frontend entry points
│   └── views/               # Layouts, pages, and Blade components
├── routes/                 # Application routes
├── storage/                # Logs, cache, sessions, and generated files
├── tests/                  # Pest feature and unit tests
├── .env.example            # Environment configuration template
├── composer.json            # PHP dependencies and scripts
├── package.json             # JavaScript dependencies and scripts
└── vite.config.js           # Vite configuration
```

## Troubleshooting

### Vite manifest is missing

If Laravel reports that it cannot find a file in the Vite manifest, build the frontend assets:

```bash
npm run build
```

### SQLite errors

Check that the SQLite extension is enabled and that the database file exists:

```bash
php -m | grep -Ei 'pdo_sqlite|sqlite3'
ls -l database/database.sqlite
```

Then clear the cached configuration:

```bash
php artisan optimize:clear
```

### Dependency or build errors

Check the required runtime versions first:

```bash
php -v
node -v
```

Then reinstall the dependencies and rebuild the assets:

```bash
composer install
npm install
npm run build
```

## License

This project is open-sourced under the [MIT license](LICENSE).
