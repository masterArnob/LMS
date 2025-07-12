<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use File;
class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = HeroSection::first();
        return view('admin.hero-section.edit', compact('hero'));
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
        $request->validate([
            'title' => ['required', 'string'],
            'subtitle' => ['required', 'string'],
        ]);

        $hero = HeroSection::first();
        $image = null;
        if ($request->has('image')) {
            if (!empty($hero)) {
                if (File::exists(public_path($hero->image))) {
                    File::delete(public_path($hero->image));
                }
            }


            $file = $request->image;
            $file_name = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads/admin_images/'), $file_name);
            $image = '/uploads/admin_images/' . $file_name;
        }else{
            $image = $hero->image;
        }



        HeroSection::updateOrCreate(
            ['id' => $id],
            [
                'label' => $request->label,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'button_text' => $request->button_text,
                'button_url' => $request->button_url,
                'video_button_text' => $request->video_button_text,
                'video_button_url' => $request->video_button_url,
                'banner_item_title' => $request->banner_item_title,
                'banner_item_subtitle' => $request->banner_item_subtitle,
                'round_text' => $request->round_text,
                'image' => $image,
            ]
        );


        notyf()->success('Hero section has been updated successfully.');
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
