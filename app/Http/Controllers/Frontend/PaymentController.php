<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

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
        if (config('gatewaySettings.paypal_status') != 'enable') {
            notyf()->error('Paypal payment gateway is disabled.');
            return to_route('student.checkout.index');
        }
        $provider = new PayPalClient($this->paypalConfig());
        $provider->getAccessToken();

        $payableAmount = cartTotal() * config('gatewaySettings.paypal_rate');

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









    function payWithStripe()
    {
        if(config('gatewaySettings.stripe_status') != 'enable') {
            notyf()->error('Stripe payment gateway is disabled.');
            return to_route('student.checkout.index');
        }
        Stripe::setApiKey(config('gatewaySettings.STRIPE_SECRET_KEY'));

        $payableAmount = (cartTotal() * 100) * config('gatewaySettings.STRIPE_RATE');
        $quantityCount = cartCount();

        $response = StripeSession::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => config('gatewaySettings.STRIPE_CURRENCY'),
                        'product_data' => [
                            'name' => 'Course'
                        ],
                        'unit_amount' => $payableAmount
                    ],
                    'quantity' => $quantityCount
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('student.stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('student.stripe.cancel')
        ]);

        return redirect()->away($response->url);
    }

    function stripeSuccess(Request $request)
    {
        Stripe::setApiKey(config('gatewaySettings.STRIPE_SECRET_KEY'));

        $response = StripeSession::retrieve($request->session_id);
        if ($response->payment_status === 'paid') {
            $transactionId = $response->payment_intent;
            $mainAmount = cartTotal();
            $paidAmount = $response->amount_total / 100;
            $currency = $response->currency;

            try {
                OrderService::storeOrder(
                    $transactionId,
                    $mainAmount,
                    $paidAmount,
                    $currency,
                    'stripe',
                    Auth::user()->id,
                    'approved',
                );

                return redirect()->route('student.order.success');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        return redirect()->route('student.order.failed');
    }


    public function stripeCancel()
    {
        return 'Payment cancelled error.';
    }
}
