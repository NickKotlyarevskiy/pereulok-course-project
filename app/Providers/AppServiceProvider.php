<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Регистрация дополнительных сервисов не требуется.
    }

    public function boot(): void
    {
        // Общие настройки приложения.
    }
}
