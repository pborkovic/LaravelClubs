# General Commands
### Open Docker Container bash
docker exec -w /var/www/htmllaravel -it lampdockerdesktop-php-1 bash

# Creating Controllers and Models
### Make a new Controller
php artisan make:controller controllerName



# Database Commands
### DB Migration with seeding
php artisan migrate:fresh --seed

### Migrate rollback
php artisan migrate:rollback

### Show route list
php artisan route:list



### Use tinker in Terminal
php artisan tinker

### Make a new DB seeder
php artisan make:seeder seederName

### Require the php DB faker
composer require fakerphp/faker

### Clear the cache and cache new routes
php artisan route:cache

### Show the route list
php artisan route:list



# Clearing caches
- php artisan optimize
- php artisan config:cache
- php artisan cache:clear
- php artisan route:cache
- php artisan view:clear










