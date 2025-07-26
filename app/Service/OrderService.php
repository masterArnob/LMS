<?php

namespace App\Service;

use App\Models\Cart;
use App\Models\Enrollment;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public static function storeOrder($transactionId, $mainAmount, $paidAmount, $currency, $payment_method, $buyer_id, $status){
        try{
        $order = new Order();
        $order->invoice_id = uniqid('INV-');
        $order->transaction_id = $transactionId;
        $order->total_amount = $mainAmount;
        $order->paid_amount = $paidAmount;
        $order->currency = $currency;
        $order->payment_method = $payment_method;
        $order->buyer_id = $buyer_id;
        $order->status = $status;
        $order->save();

        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        foreach($cartItems as $item){
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->course_id = $item->course->id;
            $orderItem->qty = 1;
            $orderItem->price = $item->course->discount > 0 ? $item->course->discount : $item->course->price;
            $orderItem->item_type = 'course';
            $orderItem->commission_rate = config('settings.comission_rate');
            $orderItem->save();


            $enroll = new Enrollment();
            $enroll->user_id = Auth::user()->id;
            $enroll->course_id = $item->course->id;
            $enroll->instructor_id = $item->course->instructor_id;
            $enroll->have_access = 1;
            $enroll->save();


            $instructorWallet = $item->course->instructor;
            $instructorWallet->wallet += calculateComission($item->course->discount > 0 ? $item->course->discount : $item->course->price, config('settings.comission_rate'));
            $instructorWallet->save();
        }

        $cartItems->each(function($item){
            $item->delete();
        });


        }catch(\Throwable $th){
            throw $th;
        }
    }
}
