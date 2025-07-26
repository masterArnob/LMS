<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use File;
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






    public function logoSettingsUpdate(Request $request){

    // Handle image_one
    if ($request->hasFile('site_logo')) {

        if(!empty(config('settings.site_logo')) && File::exists(public_path(config('settings.site_logo')))) {
            File::delete(public_path(config('settings.site_logo')));
        }
        
        $file = $request->file('site_logo');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $validatedData['site_logo'] = '/uploads/admin_images/' . $file_name;
    }

    // Handle image_two
    if ($request->hasFile('site_footer_logo')) {
        // Delete old image if exists
      if(!empty(config('settings.site_footer_logo')) && File::exists(public_path(config('settings.site_footer_logo')))) {
            File::delete(public_path(config('settings.site_footer_logo')));
        }
        
        $file = $request->file('site_footer_logo');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $validatedData['site_footer_logo'] = '/uploads/admin_images/' . $file_name;
    }

    // Handle image_three
    if ($request->hasFile('site_favicon')) {
        // Delete old image if exists
    if(!empty(config('settings.site_favicon')) && File::exists(public_path(config('settings.site_favicon')))) {
            File::delete(public_path(config('settings.site_favicon')));
        }
        
        $file = $request->file('site_favicon');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $validatedData['site_favicon'] = '/uploads/admin_images/' . $file_name;
    }

    // Update or create the record
      foreach($validatedData as $key => $value){
            Settings::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Cache::forget('settings');
        notyf()->success('Logo settings updated successfully.');
        return redirect()->back();
    }



    public function comissionSettings(){
        return view('admin.settings.site-settings.comission-settings');
    }
    public function comissionSettingsUpdate(Request $request){
        
        $validatedData = $request->validate([
            'comission_rate' => ['required', 'numeric'],
        ]);

        foreach($validatedData as $key => $value){
            Settings::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Cache::forget('settings');
        notyf()->success('Comission settings updated successfully.');
        return redirect()->back();
    }


    public function smtpSettings(){
        return view('admin.settings.site-settings.smtp-settings');
    }
}
