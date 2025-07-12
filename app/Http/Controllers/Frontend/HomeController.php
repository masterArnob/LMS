<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Features;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $hero = HeroSection::first();
        $feature = Features::first();
        return view('frontend.home', compact(
            'hero',
            'feature'
        ));
    }
}
