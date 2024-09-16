<?php

use App\Http\Middleware\Localization;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //before new middlware should be added in kernel.php but in laravel 11 it is registered in this place
        // Register your middleware here
        // $middleware->alias([
        //     \App\Http\Middleware\Localization::class,
        // ]);
        $middleware->appendToGroup('Localization',Localization::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
