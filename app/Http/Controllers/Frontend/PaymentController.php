<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{



    public function paypalConfig()
    {

        return [
            'mode'    => config('gatewaySettings.PAYPAL_MODE'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => config('gatewaySettings.PAYPAL_CLIENT_ID'),
                'client_secret'     => config('gatewaySettings.PAYPAL_CLIENT_SECRET'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => config('gatewaySettings.PAYPAL_CLIENT_ID'),
                'client_secret'     => config('gatewaySettings.PAYPAL_CLIENT_SECRET'),
                'app_id'            => 'app-id',
            ],

            'payment_action' => "Sale",
            'currency'       => config('gatewaySettings.PAYPAL_CURRENCY'),
            'notify_url'     => '',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
    }
    function payWithPaypal()
    {
        $provider = new PayPalClient($this->paypalConfig());
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

        $provider = new PayPalClient($this->paypalConfig());
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $capture = $response['purchase_units'][0]['payments']['captures'][0];

            $transactionId = $capture['id'];
            $mainAmount = cartTotal();
            $paidAmount = $capture['amount']['value'];
            $currency = $capture['amount']['currency_code'];

            try {
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
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }


    public function paypalCancel()
    {
        return 'Payment cancelled error.';
    }
}
