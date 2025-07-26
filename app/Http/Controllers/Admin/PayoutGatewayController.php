<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayoutGateway;
use Illuminate\Http\Request;

class PayoutGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gateways = PayoutGateway::orderBy('id', 'DESC')->get();
        return view('admin.payout-gateway.index', compact('gateways'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payout-gateway.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $gateway = new PayoutGateway();
        $gateway->name = $request->name;
        $gateway->description = $request->description;
        $gateway->status = $request->status;
        $gateway->save();
        notyf()->success('Payout Gateway created successfully.');
        return to_route('admin.payout.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gateway = PayoutGateway::findOrFail($id);
        return view('admin.payout-gateway.edit', compact('gateway'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $gateway = PayoutGateway::findOrFail($id);
        $gateway->name = $request->name;
        $gateway->description = $request->description;
        $gateway->status = $request->status;
        $gateway->save();
        notyf()->success('Payout Gateway updated successfully.');
        return to_route('admin.payout.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gateway = PayoutGateway::findOrFail($id);
        $gateway->delete();
        notyf()->success('Payout Gateway deleted successfully!');
        return response(['status' => 'success']);
    }
}
