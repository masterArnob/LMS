<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Illuminate\Http\Request;
use File;
class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $feature = Features::first();
        return view('admin.features.index', compact('feature'));
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
       
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $request->validate([
        'title_one' => ['required', 'string'],
        'title_two' => ['required', 'string'],
        'title_three' => ['required', 'string']
    ]);

    // Find the existing record or create a new one
    $feature = Features::findOrNew(1);

    $updateData = [
        'title_one' => $request->title_one,
        'subtitle_one' => $request->subtitle_one,
        'title_two' => $request->title_two,
        'subtitle_two' => $request->subtitle_two,
        'title_three' => $request->title_three,
        'subtitle_three' => $request->subtitle_three
    ];

    // Handle image_one
    if ($request->hasFile('image_one')) {

        if(!empty($feature->image_one) && File::exists(public_path($feature->image_one))) {
            File::delete(public_path($feature->image_one));
        }
        
        $file = $request->file('image_one');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $updateData['image_one'] = '/uploads/admin_images/' . $file_name;
    }

    // Handle image_two
    if ($request->hasFile('image_two')) {
        // Delete old image if exists
      if(!empty($feature->image_two) && File::exists(public_path($feature->image_two))) {
            File::delete(public_path($feature->image_two));
        }
        
        $file = $request->file('image_two');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $updateData['image_two'] = '/uploads/admin_images/' . $file_name;
    }

    // Handle image_three
    if ($request->hasFile('image_three')) {
        // Delete old image if exists
    if(!empty($feature->image_three) && File::exists(public_path($feature->image_three))) {
            File::delete(public_path($feature->image_three));
        }
        
        $file = $request->file('image_three');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $updateData['image_three'] = '/uploads/admin_images/' . $file_name;
    }

    // Update or create the record
    Features::updateOrCreate(
        ['id' => $id],
        $updateData
    );

    notyf()->success('Feature updated successfully');
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
