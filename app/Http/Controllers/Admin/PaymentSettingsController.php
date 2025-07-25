<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PaymentSettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.payment-settings.index');
    }


    public function paypalSettingUpdate(Request $request){
      //  dd($request->all());
        $validatedData = $request->validate([
            'PAYPAL_MODE' => ['required', 'in:sandbox,live'],
            'PAYPAL_CURRENCY' => ['required'],
            'PAYPAL_RATE' => ['required', 'numeric'],
            'PAYPAL_CLIENT_ID' => ['required'],
            'PAYPAL_CLIENT_SECRET' => ['required'],
            'paypal_status' => ['required', 'in:enable,disable'],
        ]);

        foreach($validatedData as $key => $value){
            PaymentSettings::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Cache::forget('gatewaySettings');
        notyf()->success('Paypal settings updated successfully.');
        return redirect()->back();

    }



    public function stripeSettingUpdate(Request $request){
        //dd($request->all());
           $validatedData = $request->validate([
            'STRIPE_CURRENCY' => ['required'],
            'STRIPE_RATE' => ['required', 'numeric'],
            'STRIPE_PUBLISHABLE_KEY' => ['required'],
            'STRIPE_SECRET_KEY' => ['required'],
            'stripe_status' => ['required', 'in:enable,disable'],
        ]);

        foreach($validatedData as $key => $value){
            PaymentSettings::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Cache::forget('gatewaySettings');
        notyf()->success('Stripe settings updated successfully.');
        return redirect()->back();
    }



    public function sslSettingUpdate(Request $request){
            $validatedData = $request->validate([
            'SSLCZ_TESTMODE' => ['required'],
            'SSLCZ_RATE' => ['required', 'numeric'],
            'SSLCZ_STORE_ID' => ['required'],
            'SSLCZ_STORE_PASSWORD' => ['required'],
            'ssl_status' => ['required', 'in:enable,disable'],
        ]);

        foreach($validatedData as $key => $value){
            PaymentSettings::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Cache::forget('gatewaySettings');
        notyf()->success('SSLCommerz settings updated successfully.');
        return redirect()->back();
    }
}