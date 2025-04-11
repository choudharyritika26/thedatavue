<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\IndexController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\SliderController;
// use App\Http\Controllers\AboutController;
// use App\Http\Controllers\ServicesController;
// use App\Http\Controllers\PortfolioController;
// use App\Http\Controllers\TeamController;
// use App\Http\Controllers\ContactUsDetalesController;
// use App\Http\Controllers\TrainingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//===============================laravel page=====================================
// Route::get('/', function () {
//     return view('welcome');
// });

//==============================frontend===============================
Route::get('/', [App\Http\Controllers\frontend\IndexController::class,'index'])->name('frontend.index');

Route::get('/about', [App\Http\Controllers\frontend\IndexController::class,'about'])->name('frontend.about');

Route::get('/faq', [App\Http\Controllers\frontend\IndexController::class,'faq'])->name('frontend.faq');

Route::get('/service', [App\Http\Controllers\frontend\IndexController::class,'service'])->name('frontend.services');
Route::get('/service{id}', [App\Http\Controllers\frontend\IndexController::class,'service'])->name('frontend.service');


Route::get('/training', [App\Http\Controllers\frontend\IndexController::class,'training'])->name('frontend.training');

Route::get('/contact', [App\Http\Controllers\frontend\IndexController::class,'contact'])->name('frontend.contact');
Route::post('/store-contact', [App\Http\Controllers\frontend\ContactController::class,'store'])->name('store-contact');


Route::get('/careercontact', [App\Http\Controllers\frontend\IndexController::class,'careercontact'])->name('frontend.careercontact');
Route::post('/store-careercontact', [App\Http\Controllers\frontend\CareercontactController::class,'store'])->name('store-careercontact');

Route::get('/career', [App\Http\Controllers\frontend\IndexController::class,'career'])->name('frontend.career');

Route::get('/enquiry', [App\Http\Controllers\frontend\IndexController::class,'enquiry'])->name('frontend.enquiry');

//Route::get('/portfoliodetales', [App\Http\Controllers\frontend\IndexController::class,'portfoliodetales'])->name('frontend.portfoliodetales');

Route::get('/portfoliodetials/{id}', [App\Http\Controllers\frontend\IndexController::class, 'portfoliodetales'])->name('frontend.portfoliodetales');

Route::get('/blog', [App\Http\Controllers\frontend\IndexController::class,'blog'])->name('frontend.blog');

Route::get('/blogdetail/{id}', [App\Http\Controllers\frontend\IndexController::class,'blogdetail'])->name('frontend.blogdetail');

Route::post('/store-enquiry', [App\Http\Controllers\frontend\EnquiryController::class,'store'])->name('store-enquiry');

//==============================Login And Register ===========================
Auth::routes();           

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//=======================================admin=======================================

Route::group(['namespace' => 'admin','prefix'=>'thedatavue-admin', 'middleware' => ['auth', 'verified']], function() {
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('index', [App\Http\Controllers\admin\AdminController::class,'index'])->name('admin.index');


// ==========================Slider crud=================================
Route::get('/add-slider', [App\Http\Controllers\admin\SliderController::class,'create'])->name('add-slider');   
Route::post('/store-slider', [App\Http\Controllers\admin\SliderController::class,'store'])->name('store-slider');
Route::get('/slider-index', [App\Http\Controllers\admin\SliderController::class,'index'])->name('slider-index');
Route::get('/edit-slider/{id}', [App\Http\Controllers\admin\SliderController::class,'edit'])->name('edit-slider');
Route::post('/update-slider/{id}', [App\Http\Controllers\admin\SliderController::class,'update'])->name('update-slider');
Route::delete('/delete-slider/{id}', [App\Http\Controllers\admin\SliderController::class,'destroy'])->name('destroy-slider');

Route::post('/update-slider-order', [App\Http\Controllers\admin\SliderController::class, 'updateOrder'])->name('update-slider-order');
//==========================About crud=================================

Route::get('/add-about', [App\Http\Controllers\admin\AboutController::class,'create'])->name('add-about');
Route::post('/store-about', [App\Http\Controllers\admin\AboutController::class,'store'])->name('store-about');
Route::get('/about-index', [App\Http\Controllers\admin\AboutController::class,'index'])->name('about-index');
Route::get('/edit-about/{id}', [App\Http\Controllers\admin\AboutController::class,'edit'])->name('edit-about');
Route::post('/update-about/{id}', [App\Http\Controllers\admin\AboutController::class,'update'])->name('update-about');
Route::delete('/delete-about/{id}', [App\Http\Controllers\admin\AboutController::class,'destroy'])->name('destroy-about');

Route::post('/update-about-order', [App\Http\Controllers\admin\AboutController::class, 'updateOrder'])->name('update-about-order');

//==========================Services crud=================================

Route::get('/add-services', [App\Http\Controllers\admin\ServicesController::class,'create'])->name('add-services');
Route::post('/store-services', [App\Http\Controllers\admin\ServicesController::class,'store'])->name('store-services');
Route::get('/services-index', [App\Http\Controllers\admin\ServicesController::class,'index'])->name('services-index');
Route::get('/edit-services/{id}', [App\Http\Controllers\admin\ServicesController::class,'edit'])->name('edit-services');
Route::post('/update-services/{id}', [App\Http\Controllers\admin\ServicesController::class,'update'])->name('update-services');
Route::delete('/delete-services/{id}', [App\Http\Controllers\admin\ServicesController::class,'destroy'])->name('destroy-services');

Route::post('/update-services-order', [App\Http\Controllers\admin\ServicesController::class, 'updateOrder'])->name('update-services-order');

//==========================Portfolio crud=================================

Route::get('/add-portfolio', [App\Http\Controllers\admin\PortfolioController::class,'create'])->name('add-portfolio');
Route::post('/store-portfolio', [App\Http\Controllers\admin\PortfolioController::class,'store'])->name('store-portfolio');
Route::get('/portfolio-index', [App\Http\Controllers\admin\PortfolioController::class,'index'])->name('portfolio-index');
Route::get('/edit-portfolio/{id}', [App\Http\Controllers\admin\PortfolioController::class,'edit'])->name('edit-portfolio');
Route::post('/update-portfolio/{id}', [App\Http\Controllers\admin\PortfolioController::class,'update'])->name('update-portfolio');
Route::delete('/delete-portfolio/{id}', [App\Http\Controllers\admin\PortfolioController::class,'destroy'])->name('destroy-portfolio');
Route::post('/remove-slider-image', [App\Http\Controllers\admin\PortfolioController::class, 'removeSliderImage'])->name('remove-slider-image');

Route::post('/update-portfolio-order', [App\Http\Controllers\admin\PortfolioController::class, 'updateOrder'])->name('update-portfolio-order');

//==========================Team crud=================================

Route::get('/add-team', [App\Http\Controllers\admin\TeamController::class,'create'])->name('add-team');
Route::post('/store-team', [App\Http\Controllers\admin\TeamController::class,'store'])->name('store-team');
Route::get('/team-index', [App\Http\Controllers\admin\TeamController::class,'index'])->name('team-index');
Route::get('/edit-team/{id}', [App\Http\Controllers\admin\TeamController::class,'edit'])->name('edit-team');
Route::post('/update-team/{id}', [App\Http\Controllers\admin\TeamController::class,'update'])->name('update-team');
Route::delete('/delete-team/{id}', [App\Http\Controllers\admin\TeamController::class,'destroy'])->name('destroy-team');


//==========================Client crud=================================

Route::get('/add-client', [App\Http\Controllers\admin\ClientController::class,'create'])->name('add-client');
Route::post('/store-client', [App\Http\Controllers\admin\ClientController::class,'store'])->name('store-client');
Route::get('/client-index', [App\Http\Controllers\admin\ClientController::class,'index'])->name('client-index');
Route::get('/edit-client/{id}', [App\Http\Controllers\admin\ClientController::class,'edit'])->name('edit-client');
Route::post('/update-client/{id}', [App\Http\Controllers\admin\ClientController::class,'update'])->name('update-client');
Route::delete('/delete-client/{id}', [App\Http\Controllers\admin\ClientController::class,'destroy'])->name('destroy-client');

Route::post('/update-client-order', [App\Http\Controllers\admin\ClientController::class, 'updateOrder'])->name('update-client-order');

//==========================Contactus crud=================================

Route::get('/add-contactus', [App\Http\Controllers\admin\ContactUsDetalesController::class,'create'])->name('add-contactus');
Route::post('/store-contactus', [App\Http\Controllers\admin\ContactUsDetalesController::class,'store'])->name('store-contactus');
Route::get('/contactus-index', [App\Http\Controllers\admin\ContactUsDetalesController::class,'index'])->name('contactus-index');
Route::get('/edit-contactus/{id}', [App\Http\Controllers\admin\ContactUsDetalesController::class,'edit'])->name('edit-contactus');
Route::post('/update-contactus/{id}', [App\Http\Controllers\admin\ContactUsDetalesController::class,'update'])->name('update-contactus');
Route::delete('/delete-contactus/{id}', [App\Http\Controllers\admin\ContactUsDetalesController::class,'destroy'])->name('destroy-contactus');

Route::post('/update-contactus-order', [App\Http\Controllers\admin\ContactUsDetalesController::class, 'updateOrder'])->name('update-contactus-order');

//==========================Training crud=================================

Route::get('/add-training', [App\Http\Controllers\admin\TrainingController::class,'create'])->name('add-training');
Route::post('/store-training', [App\Http\Controllers\admin\TrainingController::class,'store'])->name('store-training');
Route::get('/training-index', [App\Http\Controllers\admin\TrainingController::class,'index'])->name('training-index');
Route::get('/edit-training/{id}', [App\Http\Controllers\admin\TrainingController::class,'edit'])->name('edit-training');
Route::post('/update-training/{id}', [App\Http\Controllers\admin\TrainingController::class,'update'])->name('update-training');
Route::delete('/delete-training/{id}', [App\Http\Controllers\admin\TrainingController::class,'destroy'])->name('destroy-training');

Route::post('/update-training-order', [App\Http\Controllers\admin\TrainingController::class, 'updateOrder'])->name('update-training-order');

//==========================Faqheading crud=================================

Route::get('/add-faqheading', [App\Http\Controllers\admin\FaqheadingController::class,'create'])->name('add-faqheading');
Route::post('/store-faqheading', [App\Http\Controllers\admin\FaqheadingController::class,'store'])->name('store-faqheading');
Route::get('/faqheading-index', [App\Http\Controllers\admin\FaqheadingController::class,'index'])->name('faqheading-index');
Route::get('/edit-faqheading/{id}', [App\Http\Controllers\admin\FaqheadingController::class,'edit'])->name('edit-faqheading');
Route::post('/update-faqheading/{id}', [App\Http\Controllers\admin\FaqheadingController::class,'update'])->name('update-faqheading');
Route::delete('/delete-faqheading/{id}', [App\Http\Controllers\admin\FaqheadingController::class,'destroy'])->name('destroy-faqheading');

Route::post('/update-faqheading-order', [App\Http\Controllers\admin\FaqheadingController::class, 'updateOrder'])->name('update-faqheading-order');

//==========================Faq crud=================================

Route::get('/add-faq', [App\Http\Controllers\admin\FaqController::class,'create'])->name('add-faq');
Route::post('/store-faq', [App\Http\Controllers\admin\FaqController::class,'store'])->name('store-faq');
Route::get('/faq-index', [App\Http\Controllers\admin\FaqController::class,'index'])->name('faq-index');
Route::get('/edit-faq/{id}', [App\Http\Controllers\admin\FaqController::class,'edit'])->name('edit-faq');
Route::post('/update-faq/{id}', [App\Http\Controllers\admin\FaqController::class,'update'])->name('update-faq');
Route::delete('/delete-faq/{id}', [App\Http\Controllers\admin\FaqController::class,'destroy'])->name('destroy-faq');

Route::post('/update-faq-order', [App\Http\Controllers\admin\FaqController::class, 'updateOrder'])->name('update-faq-order');


//==========================Why choose us crud=================================

Route::get('/add-whychooseus', [App\Http\Controllers\admin\WhychooseusController::class,'create'])->name('add-whychooseus');
Route::post('/store-whychooseus', [App\Http\Controllers\admin\WhychooseusController::class,'store'])->name('store-whychooseus');
Route::get('/whychooseus-index', [App\Http\Controllers\admin\WhychooseusController::class,'index'])->name('whychooseus-index');
Route::get('/edit-whychooseus/{id}', [App\Http\Controllers\admin\WhychooseusController::class,'edit'])->name('edit-whychooseus');
Route::post('/update-whychooseus/{id}', [App\Http\Controllers\admin\WhychooseusController::class,'update'])->name('update-whychooseus');
Route::delete('/delete-whychooseus/{id}', [App\Http\Controllers\admin\WhychooseusController::class,'destroy'])->name('destroy-whychooseus');

Route::post('/update-whychooseus-order', [App\Http\Controllers\admin\WhychooseusController::class, 'updateOrder'])->name('update-whychooseus-order');

//==========================Why choose us types crud=================================

Route::get('/add-whychooseustypes', [App\Http\Controllers\admin\WhychooseustypesController::class,'create'])->name('add-whychooseustypes');
Route::post('/store-whychooseustypes', [App\Http\Controllers\admin\WhychooseustypesController::class,'store'])->name('store-whychooseustypes');
Route::get('/whychooseustypes-index', [App\Http\Controllers\admin\WhychooseustypesController::class,'index'])->name('whychooseustypes-index');
Route::get('/edit-whychooseustypes/{id}', [App\Http\Controllers\admin\WhychooseustypesController::class,'edit'])->name('edit-whychooseustypes');
Route::post('/update-whychooseustypes/{id}', [App\Http\Controllers\admin\WhychooseustypesController::class,'update'])->name('update-whychooseustypes');
Route::delete('/delete-whychooseustypes/{id}', [App\Http\Controllers\admin\WhychooseustypesController::class,'destroy'])->name('destroy-whychooseustypes');

Route::post('/update-whychooseustypes-order', [App\Http\Controllers\admin\WhychooseustypesController::class, 'updateOrder'])->name('update-whychooseustypes-order');


//==========================Career crud=================================

Route::get('/add-career', [App\Http\Controllers\admin\CareerController::class,'create'])->name('add-career');
Route::post('/store-career', [App\Http\Controllers\admin\CareerController::class,'store'])->name('store-career');
Route::get('/career-index', [App\Http\Controllers\admin\CareerController::class,'index'])->name('career-index');
Route::get('/edit-career/{id}', [App\Http\Controllers\admin\CareerController::class,'edit'])->name('edit-career');
Route::post('/update-career/{id}', [App\Http\Controllers\admin\CareerController::class,'update'])->name('update-career');
Route::delete('/delete-career/{id}', [App\Http\Controllers\admin\CareerController::class,'destroy'])->name('destroy-career');

Route::post('/update-career-order', [App\Http\Controllers\admin\CareerController::class, 'updateOrder'])->name('update-career-order');


//==========================Training crud=================================

Route::get('/add-trainingtype', [App\Http\Controllers\admin\TrainingtypeController::class,'create'])->name('add-trainingtype');
Route::post('/store-trainingtype', [App\Http\Controllers\admin\TrainingtypeController::class,'store'])->name('store-trainingtype');
Route::get('/trainingtype-index', [App\Http\Controllers\admin\TrainingtypeController::class,'index'])->name('trainingtype-index');
Route::get('/edit-trainingtype/{id}', [App\Http\Controllers\admin\TrainingtypeController::class,'edit'])->name('edit-trainingtype');
Route::post('/update-trainingtype/{id}', [App\Http\Controllers\admin\TrainingtypeController::class,'update'])->name('update-trainingtype');
Route::delete('/delete-trainingtype/{id}', [App\Http\Controllers\admin\TrainingtypeController::class,'destroy'])->name('destroy-trainingtype');

Route::post('/update-trainingtype-order', [App\Http\Controllers\admin\TrainingtypeController::class, 'updateOrder'])->name('update-trainingtype-order');

// ==========================  Career Contact Form ================================
Route::get('/careercontact-index', [App\Http\Controllers\frontend\CareercontactController::class,'index'])->name('careercontact-index');
Route::delete('/delete-careercontact/{id}', [App\Http\Controllers\frontend\CareercontactController::class,'destroy'])->name('destroy-careercontact');



// ==========================   Contact Form ================================
Route::get('/contact-index', [App\Http\Controllers\frontend\ContactController::class,'index'])->name('contact-index');
Route::delete('/delete-contact/{id}', [App\Http\Controllers\frontend\ContactController::class,'destroy'])->name('destroy-contact');



// ==========================Catagory crud=================================
Route::get('/add-catagory', [App\Http\Controllers\admin\CatagoryController::class,'create'])->name('add-catagory');   
Route::post('/store-catagory', [App\Http\Controllers\admin\CatagoryController::class,'store'])->name('store-catagory');
Route::get('/catagory-index', [App\Http\Controllers\admin\CatagoryController::class,'index'])->name('catagory-index');
Route::get('/edit-catagory/{id}', [App\Http\Controllers\admin\CatagoryController::class,'edit'])->name('edit-catagory');
Route::post('/update-catagory/{id}', [App\Http\Controllers\admin\CatagoryController::class,'update'])->name('update-catagory');
Route::delete('/delete-catagory/{id}', [App\Http\Controllers\admin\CatagoryController::class,'destroy'])->name('destroy-catagory');

Route::post('/update-catagory-order', [App\Http\Controllers\admin\CatagoryController::class, 'updateOrder'])->name('update-catagory-order');

// ==========================Portfolio Detales crud=================================
Route::get('/add-portfoliodetales', [App\Http\Controllers\admin\PortfoliodetalesController::class,'create'])->name('add-portfoliodetales');   
Route::post('/store-portfoliodetales', [App\Http\Controllers\admin\PortfoliodetalesController::class,'store'])->name('store-portfoliodetales');
Route::get('/portfoliodetales-index', [App\Http\Controllers\admin\PortfoliodetalesController::class,'index'])->name('portfoliodetales-index');
Route::get('/edit-portfoliodetales/{id}', [App\Http\Controllers\admin\PortfoliodetalesController::class,'edit'])->name('edit-portfoliodetales');
Route::post('/update-portfoliodetales/{id}', [App\Http\Controllers\admin\PortfoliodetalesController::class,'update'])->name('update-portfoliodetales');
Route::delete('/delete-portfoliodetales/{id}', [App\Http\Controllers\admin\PortfoliodetalesController::class,'destroy'])->name('destroy-portfoliodetales');

Route::post('/update-portfoliodetales-order', [App\Http\Controllers\admin\PortfoliodetalesController::class, 'updateOrder'])->name('update-portfoliodetales-order');

// ==========================technology crud=================================
Route::get('/add-technology', [App\Http\Controllers\admin\TechnologyController::class,'create'])->name('add-technology');   
Route::post('/store-technology', [App\Http\Controllers\admin\TechnologyController::class,'store'])->name('store-technology');
Route::get('/technology-index', [App\Http\Controllers\admin\TechnologyController::class,'index'])->name('technology-index');
Route::get('/edit-technology/{id}', [App\Http\Controllers\admin\TechnologyController::class,'edit'])->name('edit-technology');
Route::post('/update-technology/{id}', [App\Http\Controllers\admin\TechnologyController::class,'update'])->name('update-technology');
Route::delete('/delete-technology/{id}', [App\Http\Controllers\admin\TechnologyController::class,'destroy'])->name('destroy-technology');

Route::post('/update-technology-order', [App\Http\Controllers\admin\TechnologyController::class, 'updateOrder'])->name('update-technology-order');


// ==========================Services Detailes crud=================================
Route::get('/add-servicesdetails', [App\Http\Controllers\admin\ServicesdetailsController::class,'create'])->name('add-servicesdetails');   
Route::post('/store-servicesdetails', [App\Http\Controllers\admin\ServicesdetailsController::class,'store'])->name('store-servicesdetails');
Route::get('/servicesdetails-index', [App\Http\Controllers\admin\ServicesdetailsController::class,'index'])->name('servicesdetails-index');
Route::get('/edit-servicesdetails/{id}', [App\Http\Controllers\admin\ServicesdetailsController::class,'edit'])->name('edit-servicesdetails');
Route::post('/update-servicesdetails/{id}', [App\Http\Controllers\admin\ServicesdetailsController::class,'update'])->name('update-servicesdetails');
Route::delete('/delete-servicesdetails/{id}', [App\Http\Controllers\admin\ServicesdetailsController::class,'destroy'])->name('destroy-servicesdetails');

Route::post('/update-servicesdetails-order', [App\Http\Controllers\admin\ServicesdetailsController::class, 'updateOrder'])->name('update-servicesdetails-order');

// ==========================Services Catagriescrud=================================
Route::get('/add-servicescatagries', [App\Http\Controllers\admin\ServicescatagriesController::class,'create'])->name('add-servicescatagries');   
Route::post('/store-servicescatagries', [App\Http\Controllers\admin\ServicescatagriesController::class,'store'])->name('store-servicescatagries');
Route::get('/services-catagries-index', [App\Http\Controllers\admin\ServicescatagriesController::class,'index'])->name('servicescatagries-index');   
Route::get('/edit-servicescatagries/{id}', [App\Http\Controllers\admin\ServicescatagriesController::class,'edit'])->name('edit-servicescatagries');
Route::post('/update-servicescatagries/{id}', [App\Http\Controllers\admin\ServicescatagriesController::class,'update'])->name('update-servicescatagries');
Route::delete('/delete-servicescatagries/{id}', [App\Http\Controllers\admin\ServicescatagriesController::class,'destroy'])->name('destroy-servicescatagries');
Route::post('/update-servicescatagries-order', [App\Http\Controllers\admin\ServicescatagriesController::class, 'updateOrder'])->name('update-servicescatagries-order');



// ==========================  Enquiry Contact Form ================================

Route::get('/enquiry-index', [App\Http\Controllers\frontend\EnquiryController::class,'index'])->name('enquiry-index');
Route::delete('/delete-enquiry/{id}', [App\Http\Controllers\frontend\EnquiryController::class,'destroy'])->name('destroy-enquiry');


// ========================== Blog crud=================================
Route::get('/add-blog', [App\Http\Controllers\admin\BlogController::class,'create'])->name('add-blog');   
Route::post('/store-blog', [App\Http\Controllers\admin\BlogController::class,'store'])->name('store-blog');
Route::get('/blog-index', [App\Http\Controllers\admin\BlogController::class,'index'])->name('blog-index');   
Route::get('/edit-blog/{id}', [App\Http\Controllers\admin\BlogController::class,'edit'])->name('edit-blog');
Route::post('/update-blog/{id}', [App\Http\Controllers\admin\BlogController::class,'update'])->name('update-blog');
Route::delete('/delete-blog/{id}', [App\Http\Controllers\admin\BlogController::class,'destroy'])->name('destroy-blog');

Route::post('/update-blog-order', [App\Http\Controllers\admin\BlogController::class, 'updateOrder'])->name('update-blog-order');

// ========================== Feedback crud=================================
Route::get('/add-feedback', [App\Http\Controllers\admin\FeedbackController::class,'create'])->name('add-feedback');   
Route::post('/store-feedback', [App\Http\Controllers\admin\FeedbackController::class,'store'])->name('store-feedback');
Route::get('/feedback-index', [App\Http\Controllers\admin\FeedbackController::class,'index'])->name('feedback-index');   
Route::get('/edit-feedback/{id}', [App\Http\Controllers\admin\FeedbackController::class,'edit'])->name('edit-feedback');
Route::post('/update-feedback/{id}', [App\Http\Controllers\admin\FeedbackController::class,'update'])->name('update-feedback');
Route::delete('/delete-feedback/{id}', [App\Http\Controllers\admin\FeedbackController::class,'destroy'])->name('destroy-feedback');

Route::post('/update-feedback-order', [App\Http\Controllers\admin\FeedbackController::class, 'updateOrder'])->name('update-feedback-order');

//==========================aboutdetail crud=================================

Route::get('/add-aboutdetail', [App\Http\Controllers\admin\AboutdetailController::class,'create'])->name('add-aboutdetail');
Route::post('/store-aboutdetail', [App\Http\Controllers\admin\AboutdetailController::class,'store'])->name('store-aboutdetail');
Route::get('/aboutdetail-index', [App\Http\Controllers\admin\AboutdetailController::class,'index'])->name('aboutdetail-index');
Route::get('/edit-aboutdetail/{id}', [App\Http\Controllers\admin\AboutdetailController::class,'edit'])->name('edit-aboutdetail');
Route::post('/update-aboutdetail/{id}', [App\Http\Controllers\admin\AboutdetailController::class,'update'])->name('update-aboutdetail');
Route::delete('/delete-aboutdetail/{id}', [App\Http\Controllers\admin\AboutdetailController::class,'destroy'])->name('destroy-aboutdetail');

Route::post('/update-aboutdetail-order', [App\Http\Controllers\admin\AboutdetailController::class, 'updateOrder'])->name('update-aboutdetail-order');


//==========================achievement crud=================================

Route::get('/add-achievement', [App\Http\Controllers\admin\AchievementController::class,'create'])->name('add-achievement');
Route::post('/store-achievement', [App\Http\Controllers\admin\AchievementController::class,'store'])->name('store-achievement');
Route::get('/achievement-index', [App\Http\Controllers\admin\AchievementController::class,'index'])->name('achievement-index');
Route::get('/edit-achievement/{id}', [App\Http\Controllers\admin\AchievementController::class,'edit'])->name('edit-achievement');
Route::post('/update-achievement/{id}', [App\Http\Controllers\admin\AchievementController::class,'update'])->name('update-achievement');
Route::delete('/delete-achievement/{id}', [App\Http\Controllers\admin\AchievementController::class,'destroy'])->name('destroy-achievement');

Route::post('/update-achievement-order', [App\Http\Controllers\admin\AchievementController::class, 'updateOrder'])->name('update-achievement-order');



//==========================percentage crud=================================

Route::get('/add-percentage', [App\Http\Controllers\admin\PercentageController::class,'create'])->name('add-percentage');
Route::post('/store-percentage', [App\Http\Controllers\admin\PercentageController::class,'store'])->name('store-percentage');
Route::get('/percentage-index', [App\Http\Controllers\admin\PercentageController::class,'index'])->name('percentage-index');
Route::get('/edit-percentage/{id}', [App\Http\Controllers\admin\PercentageController::class,'edit'])->name('edit-percentage');
Route::post('/update-percentage/{id}', [App\Http\Controllers\admin\PercentageController::class,'update'])->name('update-percentage');
Route::delete('/delete-percentage/{id}', [App\Http\Controllers\admin\PercentageController::class,'destroy'])->name('destroy-percentage');

Route::post('/update-percentage-order', [App\Http\Controllers\admin\PercentageController::class, 'updateOrder'])->name('update-percentage-order');


//==========================Project crud=================================

Route::get('/add-project', [App\Http\Controllers\admin\ProjectController::class,'create'])->name('add-project');
Route::post('/store-project', [App\Http\Controllers\admin\ProjectController::class,'store'])->name('store-project');
Route::get('/project-index', [App\Http\Controllers\admin\ProjectController::class,'index'])->name('project-index');
Route::get('/edit-project/{id}', [App\Http\Controllers\admin\ProjectController::class,'edit'])->name('edit-project');
Route::post('/update-project/{id}', [App\Http\Controllers\admin\ProjectController::class,'update'])->name('update-project');
Route::delete('/delete-project/{id}', [App\Http\Controllers\admin\ProjectController::class,'destroy'])->name('destroy-project');

Route::post('/update-project-order', [App\Http\Controllers\admin\ProjectController::class, 'updateOrder'])->name('update-project-order');

Route::get('/add-footer-copy-right', [App\Http\Controllers\admin\FooterCopyRightController::class,'create'])->name('add-footer-copy-right');
Route::post('/store-footer-copy-right', [App\Http\Controllers\admin\FooterCopyRightController::class,'store'])->name('store-footer-copy-right');
Route::get('/footer-copy-right-index', [App\Http\Controllers\admin\FooterCopyRightController::class,'index'])->name('footer-copy-right-index');
Route::get('/edit-footer-copy-right/{id}', [App\Http\Controllers\admin\FooterCopyRightController::class,'edit'])->name('edit-footer-copy-right');
Route::post('/update-footer-copy-right/{id}', [App\Http\Controllers\admin\FooterCopyRightController::class,'update'])->name('update-footer-copy-right');
Route::delete('/delete-footer-copy-right/{id}', [App\Http\Controllers\admin\FooterCopyRightController::class,'destroy'])->name('destroy-footer-copy-right');

Route::get('/add-qualification', [App\Http\Controllers\admin\QualificationController::class,'create'])->name('add-qualification');
Route::post('/store-qualification', [App\Http\Controllers\admin\QualificationController::class,'store'])->name('store-qualification');
Route::get('/qualification-index', [App\Http\Controllers\admin\QualificationController::class,'index'])->name('qualification-index');
Route::get('/edit-qualification/{id}', [App\Http\Controllers\admin\QualificationController::class,'edit'])->name('edit-qualification');
Route::post('/update-qualification/{id}', [App\Http\Controllers\admin\QualificationController::class,'update'])->name('update-qualification');
Route::delete('/delete-qualification/{id}', [App\Http\Controllers\admin\QualificationController::class,'destroy'])->name('destroy-qualification');

Route::post('/update-qualification-order', [App\Http\Controllers\admin\QualificationController::class, 'updateOrder'])->name('update-qualification-order');
   
});