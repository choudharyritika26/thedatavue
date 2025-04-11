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

class IndexController extends Controller    
{
    public function index(){   
        $about = About::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        //dd($services);
        $category = Catagory::where('is_active',1)->orderBy('sort_col', 'asc')->get();
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
        // $servicescatagries = Servicescatagries::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $clients = Client::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $whychooseus = Whychooseus::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $whychooseustypes = Whychooseustypes::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $trainingtype = Trainingtype::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $blog = Blog::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $feedback = Feedback::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $achievement = Achievement::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $aboutdetail = Aboutdetail::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $percentage = Percentage::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $project = Project::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        //dd($services);
        return view('frontend.index',compact('about','services', 'category','portfolio',
        'team','contact_us_detales','slider' ,'career', 'training', 'faqheading','faq',
        'servicesdetails','clients','whychooseus','whychooseustypes',
        'trainingtype','blog','feedback','achievement','aboutdetail','percentage','project'));
    }

    public function about(){
        $about = About::where('is_active',1)->get();
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $achievement = Achievement::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $aboutdetail = Aboutdetail::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $percentage = Percentage::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $project = Project::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        return view('frontend.about',compact('about','contact_us_detales',
        'services','achievement','aboutdetail','percentage','project'));
    }
     
    public function faq(){
       $faq = Faq::where('is_active',1)->get();
       $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
      // $servicescatagries= Servicescatagries::where('is_active',1)->where('portfolio', $id)->get();  
    //    $servicescatagries = Servicescatagries::where('is_active',1)->get();
       $faqheading = Faqheading::where('is_active',1)->get();
        $contact_us_detales = contactusdetales::where('is_active',1)->get();
        // dd($contact_us_detales);
        return view('frontend.faq',compact('faqheading','faq','contact_us_detales','services'));    
    }

    public function service($id){  
        $service  = Services::findOrFail($id);       
        $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        // $service = Service::where('is_active',1)->get();  
        $servicesdetails = Servicesdetails::where('is_active',1)->where('category', $id)->get(); 
       // dd($servicesdetails->category);
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get(); 
        return view('frontend.service',compact('service','contact_us_detales','servicesdetails','services'));
    }    

    public function contact(){
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        // $contact = Contact::where('is_active',1)->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        return view('frontend.contact',compact('contact_us_detales','services'));
    }

    public function training(){
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
         $training = Training::where('is_active',1)->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        $trainingtype = Trainingtype::where('is_active',1)->get();
        return view('frontend.training',compact('training','contact_us_detales','services','trainingtype'));
    }

    public function careercontact(){
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        return view('frontend.careercontact',compact('contact_us_detales','services'));
    }

    public function enquiry(){
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        return view('frontend.enquiry',compact('contact_us_detales','services'));
    }

    public function blog(){
        $blog = Blog::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        return view('frontend.blog',compact('contact_us_detales','services','blog'));
    }

    public function blogdetail($id){   
        $blog = Blog::findOrFail($id);           
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        return view('frontend.blogdetail',compact('contact_us_detales','services','blog'));
    }

    public function career(){
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $career = Career::where('is_active',1)->get();
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        return view('frontend.career',compact('career','contact_us_detales','services'));
    }
    
    public function portfoliodetales($id)   
    {
        // $servicescatagries = Servicescatagries::where('is_active',1)->get();
         $services = Services::where('is_active',1)->orderBy('sort_col', 'asc')->get();
        $portfolio = Portfolio::findOrFail($id); // Fetch the portfolio item by ID
        $portfoliodetales = Portfoliodetales::where('is_active',1)->where('portfolio', $id)->get();  
        $technology = Technology::where('is_active',1)->where('portfolio', $id)->get();    
        //dd($portfoliodetales);
        $contact_us_detales = contactusdetales ::where('is_active',1)->get();
        return view('frontend.portfoliodetales',compact('contact_us_detales','portfolio','portfoliodetales','technology','services'));   
    }

//     public function portfoliodetales($id)  
// {
//     $portfolio = Portfolio::findOrFail($id); // Fetch the portfolio item by ID
//     return view('frontend.portfoliodetales', compact('portfolio')); // Pass the portfolio to the view
// }
}
