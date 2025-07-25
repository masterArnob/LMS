<?php

namespace App\Service;

use App\Models\Settings;
use Illuminate\Support\Facades\Cache;
class SettingsService
{
    public function getSettings(){
        return Cache::rememberForever('settings', function(){
            return Settings::pluck('value', 'key')->toArray();
        });
    }

    public function setGlobalSettings(){
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }
}
