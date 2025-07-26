<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

if(!function_exists('convertMinutesToHours')) {
    function convertMinutesToHours(int $minutes) : string {
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        return sprintf('%dh %02dm', $hours, $minutes); // Returns format : 1h 30m
    }

}



if(!function_exists('cartTotal')) {
    function cartTotal(){
        $total = 0;
        $items = Cart::where('user_id', Auth::user()->id)->get();
        foreach($items as $item){
            if($item->course->discount > 0){
                $total += $item->course->discount;
            }else{
                $total += $item->course->price;
            }
        }

        return $total;
    }

}



if(!function_exists('cartCount')) {
    function cartCount(){
        $count = Cart::where('user_id', Auth::user()?->id)->count();
        return $count;
    }

}



/** Sidebar Item Active */
if(!function_exists('sidebarItemActive')) {
    function sidebarItemActive(array $routes) {

        foreach($routes as $route) {
            if(request()->routeIs($route)) {
                return 'active';
            }
        }
    }
}



if(!function_exists('calculateComission')) {
    function calculateComission($amount, $comission) {
        return $amount == 0 ? 0 : ($amount * $comission) / 100;
    }
}

