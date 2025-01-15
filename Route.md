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

The laravel application starts from bootstrap/app.php, in which it defines how requests are handled on web, api, or other channels

```php

// 文件配置了 Laravel 应用程序的基础设置，包括路由和中间件。以下是代码的主要部分：
//
// 配置应用程序的基础路径。
// 配置路由文件，包括 web、api、commands 和 health 路由。
// 配置中间件，包括 API 请求的中间件和别名中间件。
//  配置异常处理。

return Application::configure(basePath: dirname(__DIR__))
这段代码配置了应用程序的路由文件路径和健康检查路由。通过调用 withRouting 方法，开发者可以指定不同类型的路由文件位置以及健康检查路由的路径。

// 首先，web: __DIR__.'/../routes/web.php' 指定了 Web 路由文件的位置。Web 路由文件通常包含处理浏览器请求的路由定义，例如显示网页、处理表单提交等。通过指定这个文件路径，应用程序可以加载并使用这些 Web 路由。

// 其次，api: __DIR__.'/../routes/api.php' 指定了 API 路由文件的位置。API 路由文件通常包含处理 API 请求的路由定义，例如返回 JSON 数据、处理 API 端点等。通过指定这个文件路径，应用程序可以加载并使用这些 API 路由。

// 接下来，commands: __DIR__.'/../routes/console.php' 指定了命令行路由文件的位置。命令行路由文件通常包含处理 Artisan 命令的路由定义，例如自定义命令、调度任务等。通过指定这个文件路径，应用程序可以加载并使用这些命令行路由。

// 最后，health: '/up' 定义了一个健康检查路由，用于检查应用程序的运行状态。健康检查路由通常用于监控和运维，确保应用程序正常运行并能够响应请求。通过定义这个路由路径，运维人员可以定期访问这个端点，检查应用程序的健康状态。
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

// 这段代码配置了应用程序的中间件，特别是针对 API 请求的中间件。通过调用 withMiddleware 方法，开发者可以指定应用程序在处理请求时需要使用的中间件。

// 在这个例子中，withMiddleware 方法接收一个匿名函数作为参数，该函数接收一个 Middleware 对象。这个 Middleware 对象用于配置应用程序的中间件。

// 首先，代码使用 $middleware->api(prepend: [...]) 方法为 API 请求添加中间件。具体来说，这里添加了 \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class 中间件。这个中间件确保前端请求是有状态的，通常用于处理基于 Laravel Sanctum 的 API 认证。通过将这个中间件添加到 API 请求的前面，可以确保所有 API 请求在到达控制器之前都经过这个中间件的处理，从而增强应用程序的安全性。

// 这种配置方式使得中间件的管理更加灵活和可维护。开发者可以根据需要添加、移除或调整中间件的顺序，以满足不同的业务需求和安全要求。通过这种方式，可以确保应用程序在处理请求时，始终遵循预定义的安全和业务逻辑。

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

// 这段代码配置了一个中间件别名，用于简化中间件的引用和管理。具体来说，代码使用 $middleware->alias([...]) 方法定义了一个中间件别名映射。

// 在这个例子中，$middleware->alias([...]) 方法接收一个数组作为参数。数组的键是中间件的别名，值是中间件类的完全限定名。在这段代码中，定义了一个名为 verified 的别名，对应的中间件类是 \App\Http\Middleware\EnsureEmailIsVerified::class。

// 通过定义这个别名，开发者可以在路由或控制器中更方便地引用这个中间件，而不需要每次都写出完整的类名。例如，在路由定义中，可以使用 middleware('verified') 来应用这个中间件，而不需要使用 middleware(\App\Http\Middleware\EnsureEmailIsVerified::class)。这种方式不仅使代码更加简洁，还提高了代码的可读性和可维护性。

// 此外，使用中间件别名还可以方便地进行中间件的替换和重构。如果需要更改中间件的实现，只需更新别名映射，而不需要修改所有引用该中间件的代码。这种灵活性使得应用程序的中间件管理更加高效和便捷。


        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
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


