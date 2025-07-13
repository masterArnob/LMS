<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\CourseCategory;
use App\Models\Features;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $hero = HeroSection::first();
        $feature = Features::first();
        $categories = CourseCategory::where(['status' => 'active', 'show_at_trending' => 'yes'])
        ->orderBy('id', 'DESC')
        ->get();
        $aboutSection = AboutSection::first();

        return view('frontend.home', compact(
            'hero',
            'feature',
            'categories',
            'aboutSection'
        ));
    }
}
