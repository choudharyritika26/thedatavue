<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Services;
use App\Models\Portfolio;
use App\Models\Team;

class IndexController extends Controller
{
    public function index(){
        $about = About::where('is_active',1)->get();
        $services = Services::all();
        $portfolio = Portfolio::all();
        $team = Team::all();
        return view('frontend.index',compact('about','services','portfolio','team'));
    }

    public function about(){
        $about = About::where('is_active',1)->get();
        return view('frontend.about',compact('about'));
    }
     
    public function faq(){
        return view('frontend.faq');
    }

    public function service(){
        return view('frontend.service');
    }

    public function contact(){
        return view('frontend.contact');
    }

    
}
