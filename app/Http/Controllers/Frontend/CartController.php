<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        if(!Auth::check()){
           $cartItems = collect();
             return view('frontend.pages.cart.index', compact('cartItems'));
        }
        $cartItems = Cart::with('course')
        ->where('user_id', Auth::user()->id)
        ->get();

        return view('frontend.pages.cart.index', compact('cartItems'));
    }


    public function addToCart(Request $request){
        //dd($request->all());
        if(!Auth::check()){
            return response(['status' => 'error', 'message' => 'You must be logged in to add items to the cart.'], 401);
        }

        if(Cart::where(['user_id' => Auth::user()->id, 'course_id' => $request->course_id])->exists()){
            return response(['status' => 'error', 'message' => 'This course is already in your cart.'], 400);
        }

        if(Auth::user()->role !== 'student'){
            return response(['status' => 'error', 'message' => 'Only students can add courses to the cart.'], 403);
        }

        if(Enrollment::where(['user_id' => Auth::user()->id, 'course_id' => $request->course_id])->exists()){
            return response(['status' => 'error', 'message' => 'This course is already enrolled.'], 400);
        }

        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->course_id = $request->course_id;
        $cart->save();

        $cartCount = cartCount();
        return response(['status' => 'success', 'message' => 'Course added to cart successfully.', 'cartCount' => $cartCount]);
    }


    public function removeItemCart($cart_item_id){
      
        if(!Auth::check()){
            notyf()->error('You must be logged in to remove items from the cart.');
           return redirect()->back();
        }

        $item = Cart::where(['id' => $cart_item_id, 'user_id' => Auth::user()->id])->first();
        $item->delete();
        notyf()->success('Item removed from cart successfully.');
        return redirect()->back();
    }
}
