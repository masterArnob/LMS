<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use File;
class AboutSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = AboutSection::first();
        return view('admin.about-section.index', compact('about'));
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
        //dd($request->all());
         // Find the existing record or create a new one
    $aboutSection = AboutSection::findOrNew(1);

    $updateData = [
               //'image' => $request->image,
                'rounded_text' => $request->rounded_text,
                'lerner_count' => $request->lerner_count,
                'lerner_count_text' => $request->lerner_count_text,
               // 'lerner_image' => $request->lerner_image,
                'title' => $request->title,
                'description' => $request->description,
                'button_text' => $request->button_text,
                'button_url' => $request->button_url,
                'video_url' => $request->video_url,
               // 'video_image' => $request->video_image,
    ];

    // Handle image_one
    if ($request->hasFile('image')) {

        if(!empty($aboutSection->image) && File::exists(public_path($aboutSection->image))) {
            File::delete(public_path($aboutSection->image));
        }
        
        $file = $request->file('image');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $updateData['image'] = '/uploads/admin_images/' . $file_name;
    }

    // Handle image_two
    if ($request->hasFile('lerner_image')) {
        // Delete old image if exists
      if(!empty($aboutSection->lerner_image) && File::exists(public_path($aboutSection->lerner_image))) {
            File::delete(public_path($aboutSection->lerner_image));
        }
        
        $file = $request->file('lerner_image');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $updateData['lerner_image'] = '/uploads/admin_images/' . $file_name;
    }

    // Handle image_three
    if ($request->hasFile('video_image')) {
        // Delete old image if exists
    if(!empty($aboutSection->video_image) && File::exists(public_path($aboutSection->video_image))) {
            File::delete(public_path($aboutSection->video_image));
        }
        
        $file = $request->file('video_image');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads/admin_images/'), $file_name);
        $updateData['video_image'] = '/uploads/admin_images/' . $file_name;
    }

    // Update or create the record
    AboutSection::updateOrCreate(
        ['id' => 1],
        $updateData
    );

    notyf()->success('About Section updated successfully');
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
