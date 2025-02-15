<?php

namespace App\Http\Controllers;

use App\Models\aboutus;
use App\Models\Frontedcontent;
use App\Models\plan;
use App\Models\trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('welcome', compact('user', 'aboutus', 'hero', 'plan', 'trainer','user'));
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
