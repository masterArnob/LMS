<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function payWithPaypal(){
       $provider = new PayPalClient;
       $provider->getAccessToken();

       $total = cartTotal();

       $response = $provider->createOrder([
        'intent' => 'CAPTURE',
        'purchase_units' => [
            [
                'amount' => [
                    'currency_code' => config('paypal.currency'),
                    'value' => $total,
                ],
            ],
        ],
        'application_context' => [
            'return_url' => route('student.paypal.success'),
            'cancel_url' => route('student.paypal.cancel'),
        ],
       ]);


 if (isset($response['id']) && $response['id'] != NULL) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
    }
     public function paypalSuccess(Request $request){
       $provider = new PayPalClient();
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $capture = $response['purchase_units'][0]['payments']['captures'][0];

            $transactionId = $capture['id'];
            $total = cartTotal();
            $paidAmount = $capture['amount']['value'];
            $currency = $capture['amount']['currency_code'];

            return 'order success';
        }

        return 'order failed';
     } 
     
     public function paypalCancel(){

     }
}
