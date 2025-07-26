<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\PayoutGateway;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorWithdrawController extends Controller
{
    public function index(){
      
        return view('instructor.withdraw.index'); 
    }


    public function create(){
        $gateways = PayoutGateway::where('status', 'active')->orderBy('id', 'DESC')->get();
          $currentBalance = Auth::user()->wallet;
        $pendingBalance = Withdraw::where(['instructor_id' => Auth::user()->id, 'status' => 'pending'])
        ->sum('amount');
        $totalPayout = Withdraw::where(['instructor_id' => Auth::user()->id, 'status' => 'approved'])
        ->sum('amount');
        return view('instructor.withdraw.create', compact('gateways', 'currentBalance', 'pendingBalance', 'totalPayout')); 
    }
}
