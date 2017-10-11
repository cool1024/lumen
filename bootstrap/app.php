<?php
require_once __DIR__ . '/../vendor/autoload.php';

try { (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //

}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
 */

$app = new Laravel\Lumen\Application(
    realpath(__DIR__ . '/../')
);

$app->withFacades();

$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
 */

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
 */

// $app->middleware([
//    App\Http\Middleware\ExampleMiddleware::class
// ]);

$app->routeMiddleware([
    'auth' => 'App\Api\Middleware\AuthMiddleware',
]);
/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
 */

// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);
$app->register(App\Api\Providers\FileServiceProvider::class);
$app->register(App\Api\Providers\ApiServiceProvider::class);
$app->register(App\Api\Providers\AuthServiceProvider::class);
$app->register(App\Sdk\SdkServiceProvider::class);



/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
 */

//公开模块（无需登入，及其他权限即可使用）
$app->group(['namespace' => 'App\Api\Controllers'], function () use ($app) {
    require __DIR__ . '/../routes/test.php';    
    require __DIR__ . '/../routes/public.php';
});

//基础模块（大部分为测试模块）
$app->group(['middleware' => 'auth', 'namespace' => 'App\Api\Controllers'], function () use ($app) {
    require __DIR__ . '/../routes/base.php';
});

//系统模块（需要系统管理的权限）
$app->group(['namespace' => 'App\Api\Controllers'], function ($app) {
    require __DIR__ . '/../routes/system.php';
});

// $app->group(['namespace' => 'App\Http\Controllers', ], function ($app) {
//     require __DIR__ . '/../routes/web.php';
// });

return $app;
