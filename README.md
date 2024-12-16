# Awesome Service Lite

Awesome Service Lite use laravel as backend API and Soybean Element Plus as front end

## Backend

``` bash
laravel new awesome-service-lite
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

TBD
