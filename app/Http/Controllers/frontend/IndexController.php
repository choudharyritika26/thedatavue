<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;     
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\About;
use App\Models\Services;
use App\Models\Portfolio;
use App\Models\Catagory; 
use App\Models\Team;
use App\Models\ContactUsDetales;
use App\Models\Career;
use App\Models\Training;
use App\Models\Faqheading;
use App\Models\Faq;
use App\Models\Portfoliodetales;
use App\Models\Technology;
use App\Models\Servicesdetails;
use App\Models\Servicescatagries;
use App\Models\Client;
use App\Models\Whychooseus;
use App\Models\Whychooseustypes;
use App\Models\Trainingtype;
use App\Models\Blog;
use App\Models\Feedback;
use App\Models\Aboutdetail;
use App\Models\Achievement;
use App\Models\Percentage;
use App\Models\Project;
use App\Models\FooterCopyRight;
use App\Models\Qualification;

class IndexController extends Controller    
{
    public function index(){   
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        $about = About::where('is_active',1)->orderBy('sort_col', 'asc')->get();
       // $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
       $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
     //   $servicescatagries = Servicescatagries::where('is_active',1)->orderBy('sort_col', 'asc')->get();
       //  dd($servicescatagries);   
       // dd($services);
        $category = Catagory::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        // $portfolio = Portfolio::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $portfolio = Portfolio::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $team = Team::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $slider = Slider::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $training = Training::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $faqheading = Faqheading::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $faq = Faq::where('is_active',1)->orderBy('sort_col', 'asc')->get();    
        $career = Career::where('is_active',1)->orderBy('sort_col', 'asc')->get();   
        $portfoliodetales = Portfoliodetales::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $servicesdetails = Servicesdetails::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $clients = Client::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $whychooseus = Whychooseus::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $whychooseustypes = Whychooseustypes::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $trainingtype = Trainingtype::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $blog = Blog::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $feedback = Feedback::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $achievement = Achievement::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $aboutdetail = Aboutdetail::where('is_active',1)->orderBy('sort_col', 'asc')->get();  
        $project = Project::where('is_active',1)->orderBy('sort_col', 'asc')->get();  
        return view('frontend.index',compact('ser','about','services', 'category','portfolio','team',
        'contact_us_detales','footercopyright','slider' ,'career', 'training', 'faqheading','faq','servicesdetails',
        'clients','whychooseus','whychooseustypes','trainingtype','blog','feedback','achievement',
        'aboutdetail','project'));
    }       

    public function about(){   
        $about = About::where('is_active',1)->get();
        $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        $achievement = Achievement::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $aboutdetail = Aboutdetail::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $percentage = Percentage::where('is_active',1)->orderBy('sort_col', 'asc')->get();
       
        return view('frontend.about',compact('about','ser','contact_us_detales','footercopyright','achievement','aboutdetail','percentage'));
    }
     
    public function faq(){
       $faq = Faq::where('is_active',1)->orderBy('sort_col', 'asc')->get();    
      // $servicescatagries= Servicescatagries::where('is_active',1)->where('portfolio', $id)->get();  
        $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
       $faqheading = Faqheading::where('is_active',1)->get();
        $contact_us_detales = contactusdetales::where('is_active',1)->get();
        // dd($contact_us_detales);
        return view('frontend.faq',compact('faqheading','faq','contact_us_detales','footercopyright','ser'));
    }

    public function service($id){  
        $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $service  = Services::findOrFail($id);       
        // $service = Service::where('is_active',1)->get();  
        $servicesdetails = Servicesdetails::where('is_active',1)->where('service', $id)->orderBy('sort_col', 'asc')->get(); 
       // dd($servicesdetails->category);
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        return view('frontend.service',compact('service','contact_us_detales','footercopyright','servicesdetails','ser'));
    }    

    public function contact(){
        $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
         $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        // $contact = Contact::where('is_active',1)->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        return view('frontend.contact',compact('contact_us_detales','footercopyright','ser','ser'));
    }

    public function training(){
         $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
         $training = Training::where('is_active',1)->get();    
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        $trainingtype = Trainingtype::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        return view('frontend.training',compact('training','contact_us_detales','footercopyright','ser','trainingtype'));
    }

     public function trainingdetail($id){  
       // dd('ss'); 
        $trainingtype = Trainingtype::findOrFail($id);  
        //dd($training);  
         $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        //  $training = training::where('is_active',1)->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
      //  $trainingtype = Trainingtype::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        return view('frontend.trainingdetail',compact('trainingtype','contact_us_detales','footercopyright','ser'));
    }    

    public function trainingform(){
        $duration = request()->query('duration');
        //dd($duration);
        $qualification = Qualification::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
       $contact_us_detales = contactusdetales ::where('is_active',1)->get();
       $footercopyright = FooterCopyRight::where('is_active',1)->get();
       return view('frontend.trainingform',compact('contact_us_detales','footercopyright','ser','duration','qualification'));
   }

    public function careercontact(){   
        $heading = request()->query('heading');
       // dd($heading);
         $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        return view('frontend.careercontact',compact('contact_us_detales','footercopyright','ser', 'heading'));
    }

    public function enquiry(){
         $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        return view('frontend.enquiry',compact('contact_us_detales','footercopyright','ser'));
    }

    public function blog(){
        $blog = Blog::where('is_active',1)->orderBy('sort_col', 'asc')->get();
         $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        return view('frontend.blog',compact('contact_us_detales','footercopyright','ser','blog'));
    }

    public function blogdetail($id){   
        $blog = Blog::findOrFail($id);           
         $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        return view('frontend.blogdetail',compact('contact_us_detales','footercopyright','ser','blog'));
    }

    public function career(){
         $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $career = Career::where('is_active',1)->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        return view('frontend.career',compact('career','contact_us_detales','footercopyright','ser'));
    }
    
    public function portfoliodetales($id)   
    {
         $ser = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $portfolio = Portfolio::findOrFail($id); // Fetch the portfolio item by ID
        $portfoliodetales = Portfoliodetales::where('is_active',1)->where('portfolio', $id)->get();  
        $technology = Technology::where('is_active',1)->where('portfolio', $id)->get();    
        //dd($portfoliodetales);
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $footercopyright = FooterCopyRight::where('is_active',1)->get();
        return view('frontend.portfoliodetales',compact('contact_us_detales','footercopyright','portfolio','portfoliodetales','technology','ser'));   
    }

//     public function portfoliodetales($id)  
// {
//     $portfolio = Portfolio::findOrFail($id); // Fetch the portfolio item by ID
//     return view('frontend.portfoliodetales', compact('portfolio')); // Pass the portfolio to the view
// }
}