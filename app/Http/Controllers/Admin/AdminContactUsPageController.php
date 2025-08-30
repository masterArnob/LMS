<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsPage;
use Illuminate\Http\Request;
use File;
class AdminContactUsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = ContactUsPage::first();
        return view('admin.contact-us.index', compact('page'));
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
        $request->validate([
            'map' => ['required']
        ]);

         $section = ContactUsPage::findOrNew(1);

    $updateData = [
        'map' => $request->map,
    ];

    // Handle image_one
    if ($request->hasFile('image')) {

        if(!empty($section->image) && File::exists(public_path($section->image))) {
            File::delete(public_path($section->image));
        }
        
        $file = $request->file('image');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $updateData['image'] = '/uploads/admin_images/' . $file_name;
    }

 

    // Handle image_three
 

    // Update or create the record
    ContactUsPage::updateOrCreate(
        ['id' => 1],
        $updateData
    );

    notyf()->success('Contact Us Page updated successfully');
    return redirect()->back();

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
