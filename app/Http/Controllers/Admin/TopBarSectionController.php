<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopBarSection;
use Illuminate\Http\Request;

class TopBarSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section = TopBarSection::first();
        return view('admin.topbar-section.index', compact('section'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'email' => ['required', 'email'],
            'phone' => ['required'],
        ]);


    $updateData = [
                'email' => $request->email,
                'phone' => $request->phone,
                'offer_name' => $request->offer_name,
                'offer_short_description' => $request->offer_short_description,
                'offer_button_text' => $request->offer_button_text,
                'offer_button_url' => $request->offer_button_url,
    ];



 

    // Update or create the record
    TopBarSection::updateOrCreate(
        ['id' => 1],
        $updateData
    );

    notyf()->success('Top Bar Section updated successfully');
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
