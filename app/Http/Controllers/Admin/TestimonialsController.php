<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use File;
use PHPUnit\Event\Code\Test;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Testimonials::orderBy('id', 'DESC')->paginate(12);
        return view('admin.testimonials.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);


        $testimonial = new Testimonials();

        if ($request->has('image')) {


            $file = $request->image;
            $file_name = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads/admin_images/'), $file_name);
            $testimonial->user_image = '/uploads/admin_images/' . $file_name;
        }


        $testimonial->rating = $request->rating;
        $testimonial->review = $request->review;
        $testimonial->user_name = $request->name;
        $testimonial->user_title = $request->title;
        $testimonial->status = $request->status;
        $testimonial->save();
        notyf()->success('Testimonial created successfully.');
        return to_route('admin.testimonials.index');
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
    public function edit(Testimonials $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500',
          
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);


        $testimonial = Testimonials::findOrFail($id);

        if ($request->has('image')) {
            if (File::exists(public_path($testimonial->image))) {
                File::delete(public_path($testimonial->image));
            }

             $request->validate([
          
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        
        ]);


            $file = $request->image;
            $file_name = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads/admin_images/'), $file_name);
            $testimonial->user_image = '/uploads/admin_images/' . $file_name;
        }


        $testimonial->rating = $request->rating;
        $testimonial->review = $request->review;
        $testimonial->user_name = $request->name;
        $testimonial->user_title = $request->title;
        $testimonial->status = $request->status;
        $testimonial->save();
        notyf()->success('Testimonial updated successfully.');
        return to_route('admin.testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonials $testimonial)
    {
        if (File::exists(public_path($testimonial->user_image))) {
            File::delete(public_path($testimonial->user_image));
        }
        $testimonial->delete();
        notyf()->success('Testimonial deleted successfully.');
         return response(['status' => 'success']);
    }
}
