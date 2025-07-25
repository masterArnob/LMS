<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('user')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.orders.index', compact('orders'));
    }


    public function show($id){
        $order = Order::with(['user', 'orderItems'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
}
