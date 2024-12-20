# Awesome Service Lite

Awesome Service Lite use laravel as backend API and Soybean Element Plus as front end

## Backend

``` bash
mkdir awesome-service-lite
cd awesome-service-lite
laravel new backend
```

Select as below

``` bash
   _                               _
  | |                             | |
  | |     __ _ _ __ __ ___   _____| |
  | |    / _` | '__/ _` \ \ / / _ \ |
  | |___| (_| | | | (_| |\ V /  __/ |
  |______\__,_|_|  \__,_| \_/ \___|_|


 ┌ Would you like to install a starter kit? ────────────────────┐
 │ Laravel Breeze                                               │
 └──────────────────────────────────────────────────────────────┘

 ┌ Which Breeze stack would you like to install? ───────────────┐
 │ API only                                                     │
 └──────────────────────────────────────────────────────────────┘

 ┌ Which testing framework do you prefer? ──────────────────────┐
 │ PHPUnit                                                      │
 └──────────────────────────────────────────────────────────────┘

```

After packages are installed, will ask dababases / mitigation

```bash
Confirm Execution: This Sudo Command requires admin rights. Are you sure you wish to proceed?
Yes/No: Yes
 ┌ Which database will your application use? ───────────────────┐
 │ SQLite                                                       │
 └──────────────────────────────────────────────────────────────┘

 ┌ Would you like to run the default database migrations? ──────┐
 │ Yes                                                          │
 └──────────────────────────────────────────────────────────────┘

```

Then install laratrust package [Santigarcor/laratrust](https://github.com/santigarcor/laratrust) / [Docs](https://laratrust.santigarcor.me/)

``` bash

cd backend
composer require santigarcor/laratrust
php artisan vendor:publish --tag="laratrust"

```
Update team features in laratrust if needed.

IMPORTANT: Before running the command go to your config/laratrust.php file and change the values according to your needs.

```bash
php artisan laratrust:setup


```

This command will generate the migrations, create the Role and Permission models (if you are using the teams feature it will also create a Team model).

Add the Laratrust\Contracts\LaratrustUser interface and Laratrust\Traits\HasRolesAndPermissions trait in your user classes.

```php
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements LaratrustUser
{
    use HasRolesAndPermissions;

    // ...
}

```

Then Dump the autoloader:
``` bash
composer dump-autoload
php artisan migrate
```

Laratrust comes with a database seeder, this seeder helps you fill the permissions for each role depending on the module, and creates one user for each role.

``` php

The seeder is going to work with the first user model inside the user_models array.

The seeder doesn't support teams.
```

To generate the seeder you have to run:

``` bash
php artisan laratrust:seeder
```

Then to customize the roles, modules and permissions you can publish the laratrust_seeder.php file:

``` bash
php artisan vendor:publish --tag="laratrust-seeder"

composer dump-autoload

```

In the database/seeds/DatabaseSeeder.php file you have to add this to the run method:

```php
$this->call(LaratrustSeeder::class);
```


Then run commands between to start backend service

``` bash
composer install
php artisan serve
```

# frontend

Use SoyBean Element-Plus version as frontend

[Element-Plus Version - Github 仓库](https://github.com/soybeanjs/soybean-admin-element-plus)
[Native UI version - Github 仓库](https://github.com/soybeanjs/soybean-admin)

``` bash
git clone https://github.com/soybeanjs/soybean-admin-element-plus.git

cd frontend
rm -rf node_modules
rm -rf pnpm-lock.yaml
pnpm install
pnpm build
pnpm run dev
```

then frontend server up

``` bash
> @sa/elp@1.3.8 dev /Users/yuanhui.sun/Herd/awesome-service-lite/frontend
> vite --mode test

◐ [elegant-router] watcher ready                                                               4:57:31 PM

  VITE v5.4.11  ready in 9896 ms

  ➜  Local:   http://localhost:9527/
  ➜  Network: http://10.163.74.148:9527/
  ➜  Network: http://10.191.121.84:9527/
  ➜  Vue DevTools: Open http://localhost:9527/__devtools__/ as a separate window
  ➜  Vue DevTools: Press Option(⌥)+Shift(⇧)+D in App to toggle the Vue DevTools

  ➜  press h + enter to show help
4:57:32 PM [vite] page reload index.html
4:57:50 PM [vite] ✨ new dependencies optimized: vue-draggable-plus
4:57:50 PM [vite] ✨ optimized dependencies changed. reloading

```

## Build git repository 

go to root directory

```bash
git init
git add .
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/yuanhuisun/awesome-service-lite.git
git push -u origin main

```

## Connect frontend to backend
Update front-end url in backend/.env

```php
FRONTEND_URL=http://localhost:9527
```

Starting API design [API Design](API.md)

```bash
php artisan make:Controller UserController

   INFO  Controller [app/Http/Controllers/UserController.php] created successfully.  

php artisan make:Resource UserResource

   INFO  Resource [app/Http/Resources/UserResource.php] created successfully.  

php artisan make:Request UserRequest              

   INFO  Request [app/Http/Requests/UserRequest.php] created successfully.  
```


