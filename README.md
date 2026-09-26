# TailAdmin Laravel

TailAdmin Laravel is a responsive admin dashboard built with Laravel, Blade, Tailwind CSS, Alpine.js, and Vite. It includes dashboard pages, reusable Blade components, forms, tables, profile pages, authentication screens, and UI examples.

## About this version

This repository is a personal, simplified adaptation of the [official TailAdmin Laravel template](https://github.com/TailAdmin/tailadmin-laravel). The original project includes a Docker and Laravel Sail setup for running the application in containers. This version is intended for fast local development without Docker, Sail, or container services.

The trade-off is intentional: the project uses the PHP, Composer, Node.js, npm, and SQLite installations already available on the local machine. This keeps the setup smaller and makes it faster to start the dashboard for personal development, while requiring the local environment to meet the versions listed below.

### Original template compared with this version

| Area | Official TailAdmin Laravel template | This repository |
| --- | --- | --- |
| Runtime | Docker and Laravel Sail are supported, alongside native local setup | Native local setup only; Docker and Sail are not included |
| Services | Docker setup provides PHP, MySQL, Redis, and Mailpit containers | Uses local PHP and SQLite; file sessions, file cache, synchronous queue, and logged mail are used by default |
| Development command | Docker workflow uses `./vendor/bin/sail`; native workflow uses separate local tools | `composer run dev`, which starts Laravel, Vite, the queue listener, and log viewer locally |
| Current baseline | Official repository currently targets Laravel 12 and Node.js 22.x | This version targets Laravel 13 and Node.js 24.x |
| Purpose | General-purpose TailAdmin template with containerized development support | Personal local dashboard with a smaller, quicker setup |

## Stack

- PHP 8.3+
- Laravel 13
- Blade
- Tailwind CSS 4
- Alpine.js 3
- Vite 8
- SQLite for local development

## Requirements for native local development

- PHP 8.3 or newer with the SQLite extension enabled
- Composer
- Node.js 24.x and npm

Docker, Laravel Sail, MySQL, Redis, and Mailpit are not required for this version.

Check your installed versions:

```bash
php -v
composer --version
node -v
npm -v
```

## Installation

Clone the repository and install the dependencies:

```bash
git clone git@github.com:amberlex78/tailadmin-laravel.git
cd tailadmin-laravel
composer install
npm install
```

Create the environment file, generate the application key, and prepare SQLite:

```bash
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
```

On Windows, create an empty `database.sqlite` file inside the `database` directory instead of using `touch`.

The default configuration uses SQLite, file sessions, a synchronous queue, file-based cache, and logged mail. No external database or mail server is required for local development.

## Local development

Start the complete development environment:

```bash
composer run dev
```

Laravel starts the application server, queue listener, log viewer, and Vite through `php artisan dev`. Open the application at [http://127.0.0.1:8000](http://127.0.0.1:8000).

To run only the frontend development server:

```bash
npm run dev
```

## Useful commands

```bash
# Build production frontend assets
npm run build

# Run the test suite
php artisan test --compact
composer run test

# Clear Laravel caches
php artisan optimize:clear

# List registered routes
php artisan route:list

# Create the public storage symlink
php artisan storage:link
```

## Available pages

- E-commerce dashboard
- Profile
- Form elements
- Basic tables
- Blank page
- Sign in and sign up
- 404 error page
- Alerts, avatars, badges, buttons, images, and videos

## Project structure

```text
tailadmin-laravel/
├── app/                  # Application code, models, providers, and HTTP layer
├── database/             # Migrations, factories, seeders, and SQLite database
├── public/               # Public entry point and built assets
├── resources/
│   ├── css/              # Tailwind and application styles
│   ├── js/               # Frontend entry points
│   └── views/            # Layouts, pages, and Blade components
├── routes/               # Application routes
├── storage/              # Logs, cache, sessions, and generated files
├── tests/                # Pest feature and unit tests
├── composer.json         # PHP dependencies and Composer scripts
├── package.json          # JavaScript dependencies and npm scripts
└── vite.config.js        # Vite configuration
```

## Troubleshooting

### Vite manifest is missing

Build the frontend assets and try again:

```bash
npm run build
```

### SQLite errors

Make sure the SQLite extension is enabled and the database file exists:

```bash
php -m | grep -Ei 'pdo_sqlite|sqlite3'
ls -l database/database.sqlite
php artisan optimize:clear
```

### Dependency or build errors

Check the runtime versions, then reinstall dependencies and rebuild:

```bash
php -v
node -v
composer install
npm install
npm run build
```

## Credits

This project is based on the [TailAdmin Laravel dashboard template](https://github.com/TailAdmin/tailadmin-laravel). The original template was adapted and simplified for personal local development by removing the Docker/Sail workflow and using the local machine's runtime with SQLite.

## License

This project is open-sourced under the [MIT license](LICENSE).
