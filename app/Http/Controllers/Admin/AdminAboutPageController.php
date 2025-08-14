<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AdminAboutPageController extends Controller
{
    public function index()
    {
        $about = AboutPage::first();
        return view('admin.about-page.index', compact('about'));
    }


    public function store(Request $request){
       // dd($request->all());
  

       $request->validate([
            'title_one' => ['required', 'string'],
            'counter_one' => ['required', 'numeric'],
            'title_two' => ['required', 'string'],
            'counter_two' => ['required', 'numeric'],
            'title_three' => ['required', 'string'],
            'counter_three' => ['required', 'numeric'],
            'title_four' => ['required', 'string'],
            'counter_four' => ['required', 'numeric'],
        ]); 


        AboutPage::updateOrCreate([
             'title_one' => $request->title_one,
        'counter_one' => $request->counter_one,
        'title_two' => $request->title_two,
        'counter_two' => $request->counter_two,
        'title_three' => $request->title_three,
        'counter_three' => $request->counter_three,
        'title_four' => $request->title_four,
        'counter_four' => $request->counter_four,
        ]);

    notyf()->success('About Page updated successfully');
    return redirect()->back();

    }
}