<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoSection;
use Illuminate\Http\Request;
use File;
class VideoSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section = VideoSection::first();
        return view('admin.video-section.index', compact('section'));
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



         // Find the existing record or create a new one
    $section = VideoSection::findOrNew(1);

    $updateData = [
        'video_url' => $request->video_url,
        'description' => $request->description,
        'button_text' => $request->button_text,
        'button_url' => $request->button_url,
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
    VideoSection::updateOrCreate(
        ['id' => $id],
        $updateData
    );

    notyf()->success('Section updated successfully');
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
