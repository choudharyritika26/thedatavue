<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Services;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\ContactUsDetales;

class IndexController extends Controller
{
    public function index(){   
        $about = About::where('is_active',1)->get();
        $services = Services::all();
        $portfolio = Portfolio::all();
        $team = Team::all();
        $contact_us_detales = contactusdetales ::all();
        return view('frontend.index',compact('about','services','portfolio','team','contact_us_detales'));
    }

    public function about(){
        $about = About::where('is_active',1)->get();
        $contact_us_detales = contactusdetales ::all();
        return view('frontend.about',compact('about','contact_us_detales'));
    }
     
    public function faq(){
        $contact_us_detales = contactusdetales::all();
        // dd($contact_us_detales);
        return view('frontend.faq',compact('contact_us_detales'));
    }

    public function service(){
        $contact_us_detales = contactusdetales ::all();
        return view('frontend.service',compact('contact_us_detales'));
    }

    public function contact(){
        $contact_us_detales = contactusdetales ::all();
        return view('frontend.contact',compact('contact_us_detales'));
    }

    public function training(){
        $contact_us_detales = contactusdetales ::all();
        return view('frontend.training',compact('contact_us_detales'));
    }
    
}
