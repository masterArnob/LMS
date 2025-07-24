<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    function payWithPaypal()
    {
        $provider = new PayPalClient();
        $provider->getAccessToken();

     $payableAmount = cartTotal();

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('student.paypal.success'),
                'cancel_url' => route('student.paypal.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('paypal.currency'),
                        'value' => $payableAmount
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != NULL) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
    }

    function paypalSuccess(Request $request)
    {

        $provider = new PayPalClient();
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $capture = $response['purchase_units'][0]['payments']['captures'][0];

            $transactionId = $capture['id'];
            $mainAmount = cartTotal();
            $paidAmount = $capture['amount']['value'];
            $currency = $capture['amount']['currency_code'];

            try{
                orderService::storeOrder(
                    $transactionId,
                    $mainAmount,
                    $paidAmount,
                    $currency,
                    'paypal',
                    Auth::user()->id,
                    'approved',
                );
                notyf()->success('Payment successful. Order has been placed successfully.');
                return to_route('student.order.success');
            }catch(\Throwable $th){
                throw $th;
            }
        }


    }

     
     public function paypalCancel(){
        return 'Payment cancelled error.';
     }
}
