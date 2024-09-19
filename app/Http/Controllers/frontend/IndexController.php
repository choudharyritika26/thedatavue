<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function about(){
        return view('frontend.about');
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
