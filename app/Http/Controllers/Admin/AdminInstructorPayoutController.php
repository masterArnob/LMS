<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class AdminInstructorPayoutController extends Controller
{
    public function index()
    {
        $requests = Withdraw::with(['instructor', 'payoutGateway'])
        ->orderBy('id', 'DESC')->get();
        return view('admin.payout-requests.index', compact('requests'));
    }


        public function edit($id)
    {
        $request = Withdraw::with(['instructor', 'payoutGateway'])
        ->where('id', $id)->firstOrFail();
        return view('admin.payout-requests.edit', compact('request'));
    }



    public function update(Request $request, $id)
    {
       $request->validate([
        'transaction_id' => ['required'],
        'status' => ['required', 'in:pending,approved,rejected'],
       ]);

       $withdraw = Withdraw::findOrFail($id);
       $withdraw->transaction_id = $request->transaction_id;
       if($request->status == 'approved'){
        $withdraw->instructor->wallet = ($withdraw->instructor->wallet - $withdraw->amount);
        $withdraw->instructor->save();
       }
       $withdraw->status = $request->status;
       $withdraw->save();
       notyf()->success('Payout request updated successfully.');
       return to_route('admin.payout-request.index');
    }
}
