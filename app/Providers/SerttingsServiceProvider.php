<?php

namespace App\Providers;

use App\Service\SettingsService;
use Illuminate\Support\ServiceProvider;

class SerttingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SettingsService::class, function(){
            return new SettingsService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $settings = $this->app->make(SettingsService::class);
        $settings->setGlobalSettings();
    }
}
