# Understand Route

Refer to Basis-Routing section [Routing](https://laravel.com/docs/11.x/routing#basic-routing) in laravel framework.

## Basic Routing

The most basic Laravel routes accept a URI and a closure, providing a very simple and expressive method of defining routes and behavior without complicated routing configuration files:
```php
use Illuminate\Support\Facades\Route;
 
Route::get('/greeting', function () {
    return 'Hello World';
});
```

## Default Route Files

All Laravel routes are defined in your route files, which are located in the [routes directory](routes). These files are automatically loaded by Laravel using the configuration specified in your application's [bootstrap/app.php](bootstrap/app.php) file. 

The [routes/web.php](routes/web.php) file defines routes that are for your web interface. These routes are assigned the web middleware group, which provides features like session state and CSRF protection.

For most applications, you will begin by defining routes in your [routes/web.php](routes/web.php) file. The routes defined in routes/web.php may be accessed by entering the defined route's URL in your browser. For example, you may access the following route by navigating to http://example.com/user in your browser:

```php
use App\Http\Controllers\UserController;
 
Route::get('/user', [UserController::class, 'index']);
```

### API Routes
If your application will also offer a stateless API, you may enable API routing using the install:api Artisan command:

```bash
php artisan install:api
```

The install:api command installs Laravel Sanctum, which provides a robust, yet simple API token authentication guard which can be used to authenticate third-party API consumers, SPAs, or mobile applications. In addition, the install:api command creates the routes/api.php file:

```php
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
```

The routes in routes/api.php are stateless and are assigned to the api middleware group. Additionally, the /api URI prefix is automatically applied to these routes, so you do not need to manually apply it to every route in the file. You may change the prefix by modifying your application's bootstrap/app.php file:

```php
->withRouting(
    api: __DIR__.'/../routes/api.php',
    apiPrefix: 'api/admin',
    // ...
)
```

Available Router Methods
The router allows you to register routes that respond to any HTTP verb:

```php
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);
```

Sometimes you may need to register a route that responds to multiple HTTP verbs. You may do so using the match method. Or, you may even register a route that responds to all HTTP verbs using the any method:

```php
Route::match(['get', 'post'], '/', function () {
    // ...
});
 
Route::any('/', function () {
    // ...
});
```


