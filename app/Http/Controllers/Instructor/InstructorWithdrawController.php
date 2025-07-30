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
      
        $withdraws = Withdraw::with('payoutGateway')
        ->where('instructor_id', Auth::user()->id)
        ->orderBy('id', 'DESC')
        ->paginate(10);
        return view('instructor.withdraw.index', compact('withdraws'));
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



    public function store(Request $request){
       // dd($request->all());
        $request->validate([
            'amount' => ['required', 'numeric'],
            'payout_gateway_id' => ['required'],
            'account_info' => ['required']
        ]);

        if(Auth::user()->wallet < $request->amount){
            notyf()->error('Insufficient balance in your wallet.');
            return back();
        }

        if(Withdraw::where(['instructor_id' => Auth::user()->id, 'status' => 'pending'])->exists()){
            notyf()->error('You already have a pending withdraw request.');
            return back();
        }

        $withdraw = new Withdraw();
        $withdraw->instructor_id = Auth::user()->id;
        $withdraw->amount = $request->amount;
        $withdraw->status = 'pending';
        $withdraw->account_information = $request->account_info;
        $withdraw->payout_gateway_id = $request->payout_gateway_id;
        $withdraw->save();
        notyf()->success('Withdraw request submitted successfully.');
        return to_route('instructor.withdraw.index');


    }
}
