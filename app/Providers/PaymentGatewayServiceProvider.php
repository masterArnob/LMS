<?php

namespace App\Providers;

use App\Service\PaymentGatewaySettingsService;
use Illuminate\Support\ServiceProvider;

class PaymentGatewayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->singleton(PaymentGatewaySettingsService::class, function(){
            return new PaymentGatewaySettingsService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $paymentGatewaySettings = $this->app->make(PaymentGatewaySettingsService::class);
        $paymentGatewaySettings->setGlobalSettings();
    }
}
