<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first();
        return view('admin.footer.index', compact('footer'));
    }


    public function storeInfo(Request $request)
    {
        $request->validate([
            'copyright' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email'],
            'desc' => ['nullable', 'string'],
        ]);


        $updateData = [
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'copyright' => $request->copyright,
            'desc' => $request->desc,
        ];





        // Update or create the record
        Footer::updateOrCreate(
            ['id' => 1],
            $updateData
        );

        notyf()->success('Footer updated successfully');
        return redirect()->back();
    }
}
