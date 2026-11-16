<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Веб-маршруты используют стандартную группу Laravel с сессиями и CSRF.
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Обработка исключений оставлена стандартной для Laravel.
    })
    ->create();
