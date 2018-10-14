<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## Installation

1. Git CLone
```
git clone https://github.com/abidkt/laravel-test.git
```

2. Install Laravel & dependencies
```
    cd laravel-test && composer install
```

3. Change permission of `storage` and the `bootstrap/cache` to writable by server
4. Copy `env.example` file to `.env` and add database details to .env file
5. Generate application key
```
    php artisan key:generate
```
6. Install migration tables
```
    php artisan migrate:install
```
6. Run Migration
```
    php artisan migrate
```
7. Seed database with test users
```
    php artisan db:seed
```
8. Run server
```
    php artisan serve
```
9. Register an new user and login

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
