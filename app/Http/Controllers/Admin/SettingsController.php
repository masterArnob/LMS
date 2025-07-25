<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function generalSettings(){
        return view('admin.settings.site-settings.general-settings');
    }

    public function logoSettings(){
        return view('admin.settings.site-settings.logo-settings');
    }


    public function generalSettingsUpdate(Request $request){
          $validatedData = $request->validate([
            'site_name' => ['required'],
            'phone' => ['required'],
            'location' => ['required'],
            'site_default_currency' => ['required'],
            'currency_icon' => ['required'],
            'email' => ['required', 'email'],
        ]);

        foreach($validatedData as $key => $value){
            Settings::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Cache::forget('settings');
        notyf()->success('General settings updated successfully.');
        return redirect()->back();
        
    }
}
