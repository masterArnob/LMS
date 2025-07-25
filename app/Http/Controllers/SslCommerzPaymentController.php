<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Service\OrderService;
use Illuminate\Support\Facades\Auth;

class SslCommerzPaymentController extends Controller
{



    public function sslConfig()
    {

        
        $apiDomain = config('gatewaySettings.SSLCZ_TESTMODE') ? "https://sandbox.sslcommerz.com" : "https://securepay.sslcommerz.com";
        return [
            'apiCredentials' => [
                'store_id' => config('gatewaySettings.SSLCZ_STORE_ID'),
                'store_password' => config('gatewaySettings.SSLCZ_STORE_PASSWORD'),
            ],
            'apiUrl' => [
                'make_payment' => "/gwprocess/v4/api.php",
                'transaction_status' => "/validator/api/merchantTransIDvalidationAPI.php",
                'order_validate' => "/validator/api/validationserverAPI.php",
                'refund_payment' => "/validator/api/merchantTransIDvalidationAPI.php",
                'refund_status' => "/validator/api/merchantTransIDvalidationAPI.php",
            ],
            'apiDomain' => $apiDomain,
            'connect_from_localhost' => env("IS_LOCALHOST", false), // For Sandbox, use "true", For Live, use "false"
            'success_url' => '/success',
            'failed_url' => '/fail',
            'cancel_url' => '/cancel',
            'ipn_url' => '/ipn',
        ];
    }
    public function index(Request $request)
    {
        if (config('gatewaySettings.ssl_status') != 'enable') {
            notyf()->error('SSLCommerz payment gateway is disabled.');
            return to_route('student.checkout.index');
        }
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = cartTotal() * config('gatewaySettings.SSLCZ_RATE'); # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";



        $sslc = new SslCommerzNotification($this->sslConfig());
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }



    public function success(Request $request)
    {
        //dd('success');
        //echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = 'BDT';
        $mainAmount = cartTotal();
        $paidAmount = $request->input('amount');

        $sslc = new SslCommerzNotification($this->sslConfig());

        try {
            OrderService::storeOrder(
                $tran_id,
                $mainAmount,
                $paidAmount,
                $currency,
                'SSLCommerz',
                Auth::user()->id,
                'approved',
            );
        } catch (\Throwable $th) {
            throw $th;
        }


        $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);
        //dd($validation);
        if ($validation === true) {
            notyf()->success('Payment successful.');
            return to_route('student.order.success');
        } else {
            return 'payment failed';
        }
    }

    public function fail(Request $request) {}

    public function cancel(Request $request) {}
}
