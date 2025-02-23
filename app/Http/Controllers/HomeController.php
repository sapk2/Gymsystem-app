<?php

namespace App\Http\Controllers;

use App\Models\aboutus;
use App\Models\Footer;
use App\Models\Frontedcontent;
use App\Models\plan;
use App\Models\trainer;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $aboutus = aboutus::first();
        $hero = Frontedcontent::first();
        $plan = plan::all();
        $trainer = trainer::all();
        $user=User::all();
        $footer =Footer::first();
        return view('welcome', compact('user', 'aboutus', 'hero', 'plan', 'trainer','user','footer'));
    }

    public function aboutus()
    {
        $trainer =trainer::all();
        $user =User::all();
        $aboutus = aboutus::first();
        return view('partials.about', compact('aboutus','trainer','user'));
    }

    public function herofeature()
    {
        $hero = Frontedcontent::first();
        return view('partials.hero', compact('hero'));
    }

    public function contact()
    {
        return view('partials.contact');
    }
}
