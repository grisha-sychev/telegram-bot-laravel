<?php

namespace Reijo\Telebot;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class TelegramProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../app' => app_path(),
            __DIR__ . '/../config' => config_path(),
            __DIR__ . '/../database' => database_path(),
            __DIR__ . '/../routes' => base_path('routes'),
        ], 'reijo-telebot');

        Route::middleware('web')->withoutMiddleware(['web', 'App\Http\Middleware\VerifyCsrfToken'])
            ->group(base_path('routes/telegram.php'));
    }
}
