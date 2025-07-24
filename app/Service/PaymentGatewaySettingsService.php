<?php

namespace App\Service;

use App\Models\PaymentSettings;
use Illuminate\Support\Facades\Cache;

class PaymentGatewaySettingsService
{
    public function getSettings(){
        return Cache::rememberForever('gatewaySettings', function(){
            return PaymentSettings::pluck('value', 'key')->toArray();
        });
    }

    public function setGlobalSettings(){
        $settings = $this->getSettings();
        config()->set('gatewaySettings', $settings);
    }
}
