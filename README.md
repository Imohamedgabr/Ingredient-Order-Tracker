# Stack
- PHP 8.1
- Laravel 9

# Dev Requirements
- Docker (latest)
- Docker Compose (latest)
- Make sure that ports (app: 80, mysql: 3306) are not used on your host machine cause they are used by the app docker-compose file these pots exposes the services that you will need while development

# Dev Run
We are using [laravel/sail](https://laravel.com/docs/9.x/sail) for the development environment, just follow these steps to start the application.

- `cp .env.example .env` then fill the required data
- `docker-compose run --rm --user=$(id -u) composer install --ignore-platform-reqs`
- `docker-compose run --rm --user=$(id -u) php artisan key:generate`
- `./vendor/bin/sail up -d`
- `./vendor/bin/sail artisan migrate:fresh --seed`

### 2- Application Architectural Pattern
I'm using the baisc laravel application structure.

### 3- Guidelines
In code level we should use guidelines to be our code review refrence in context of namings, structure, and more ...
- [Laravel guidelines](https://spatie.be/guidelines/laravel-php)
- [PHP guidelines](https://www.php-fig.org/psr/psr-2/)
- [SQL & Database guidelines](https://www.sqlstyle.guide/)
