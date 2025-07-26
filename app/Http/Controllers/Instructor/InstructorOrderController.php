<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorOrderController extends Controller
{
    public function index(){
        $orders = OrderItem::with(['course', 'order'])
        ->whereHas('course', function($query) {
            $query->where('instructor_id', Auth::user()->id);
        })
        ->orderBy('id', 'DESC')
        ->paginate(25);
        return view('instructor.orders.index', compact('orders')); 
    }
}
