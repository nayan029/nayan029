<?php

use App\Http\Controllers\admin\adminMangmentController;
use App\Http\Controllers\admin\AjaxController;
use App\Http\Controllers\admin\BlogMangementController as AdminBlogMangementController;
use App\Http\Controllers\admin\documentDeatailsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\fronted\HomeController as FrontedHomeController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\BlogMangementController;
use App\Http\Controllers\fronted\ContactEnquiryController as FrontedContactEnquiryController;
use App\Http\Controllers\fronted\CustomerLoginController;
use App\Http\Controllers\fronted\CustomerRegisterController;
use App\Http\Controllers\fronted\customerforgotPasswordController;
use App\Http\Controllers\fronted\lawyerforgotPasswordController;
use App\Http\Controllers\fronted\enrollmentController;
use App\Http\Controllers\fronted\legalenquiryController;
use App\Http\Controllers\admin\ForgotPasswordController;
use App\Http\Controllers\admin\lawyermanagmentController;
use App\Http\Controllers\fronted\documentenquiryController;
use App\Http\Controllers\fronted\TypeaheadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth/login');
// });
///------------------------------------------------------------- ADMIN --------------------------------------------------------------

//-----------------------------Reset password=================
Route::get('/forgot-password', [App\Http\Controllers\admin\ForgotPasswordController::class, 'index']);
Route::any('/verify-email', [App\Http\Controllers\admin\ForgotPasswordController::class, 'verify_email']);
Route::post('/verify_otp', [App\Http\Controllers\admin\ForgotPasswordController::class, 'verify_otp']);
Route::get('/verify_otp_view', [App\Http\Controllers\admin\ForgotPasswordController::class, 'verify_otp_view']);
Route::get('/reset_password_view/{id}', [App\Http\Controllers\admin\ForgotPasswordController::class, 'reset_password_view']);
Route::post('/reset_password/{id}', [App\Http\Controllers\admin\ForgotPasswordController::class, 'reset_password']);
//----------------------------Reset Password======================
Route::get('/admin/password/email', [LoginController::class, 'chekemail']);

Auth::routes();
Route::get('admin/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');


// Route::group(['prefix' => '{admin}'], function () {
//     Auth::routes();
// });


Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/home', [HomeController::class, 'index'])->name('home');

    //------------------------------profile update-----------------------------
    Route::get('/admin/profile', [ProfileController::class, 'index']);
    Route::post('/admin/profile', [ProfileController::class, 'profileUpdate']);
    Route::post('/admin/check_oldpassword', [ProfileController::class, 'checkOldPassword']);
    Route::post('/admin/change_password', [ProfileController::class, 'change_password']);
    //------------------------------profle update--------------------------------


    //------------------------------Admin Managment-------------------------------
    Route::get('/admin/manageAdmin', [adminMangmentController::class, 'index']);
    Route::get('/admin/addAdmin', [adminMangmentController::class, 'show']);
    Route::post('/admin/addAdmin', [adminMangmentController::class, 'store']);
    Route::get('/admin/adminProfile/{id}', [adminMangmentController::class, 'adminProfile']);
    Route::get('/admin/adminEdit/{id}', [adminMangmentController::class, 'adminEdit']);
    Route::post('/admin/editAdmin/{id}', [adminMangmentController::class, 'update']);
    Route::any('/admin/adminDelete/{id}', [adminMangmentController::class, 'destroy']);
    Route::post('/admin/check_admin_register_email', [adminMangmentController::class, 'check_admin_register_email'])->name('check_admin_register_email');
    Route::post('/admin/check_admin_register_editEmail', [adminMangmentController::class, 'check_admin_register_editEmail'])->name('check_admin_register_editEmail');
    //------------------------------Admin Managment-------------------------------

    //------------------------------------contact enquiry---------------------
    Route::get('/admin/ContactEnquiry', [App\Http\Controllers\admin\ContactEnquiryController::class, 'index']);
    Route::get('/admin/ContactEnquiry/{id}', [App\Http\Controllers\admin\ContactEnquiryController::class, 'destroy']);
    //------------------------------------contact enquiry---------------------

    //--------------------------------------Blog And Webinar-----------------------------------
    Route::resource('admin/Blog', 'App\Http\Controllers\admin\BlogMangementController');
    Route::get('/admin/addBlog', 'App\Http\Controllers\admin\BlogMangementController@addBlog');
    Route::any('/admin/blogDelete/{id}', 'App\Http\Controllers\admin\BlogMangementController@destroy');

    Route::resource('admin/webinar', 'App\Http\Controllers\admin\webinarMangementController');
    Route::get('/admin/addwebinar', 'App\Http\Controllers\admin\webinarMangementController@addwebinar');
    Route::any('/admin/webinarDelete/{id}', 'App\Http\Controllers\admin\webinarMangementController@destroy');

    //--------------------------------------Blog And Webinar-----------------------------------
    Route::get('/admin/settings', 'App\Http\Controllers\admin\settingController@index');
    Route::post('/admin/settings', 'App\Http\Controllers\admin\settingController@update');

    Route::get('/admin/site-settings', 'App\Http\Controllers\admin\sitesettingController@index');
    Route::post('/admin/site-settings', 'App\Http\Controllers\admin\sitesettingController@update');

    Route::resource('/admin/manageCategory', 'App\Http\Controllers\admin\manageCategoryController');
    Route::post('admin/getexitcategory', 'App\Http\Controllers\admin\AjaxController@getexitcategory');
    Route::post('admin/getexitservicename', 'App\Http\Controllers\admin\AjaxController@getexitservicename');
    Route::post('admin/getexitcategoryedit', 'App\Http\Controllers\admin\AjaxController@getexitcategoryedit');

    Route::resource('admin/trends', 'App\Http\Controllers\admin\trendsController');
    Route::get('admin/addtrends', 'App\Http\Controllers\admin\trendsController@addtrends');
    Route::any('/admin/trendsDelete/{id}', 'App\Http\Controllers\admin\trendsController@destroy');

    Route::resource('/admin/adviceCategory', 'App\Http\Controllers\admin\adviceCategoryController');
    Route::post('admin/getexitadvicecategory', 'App\Http\Controllers\admin\AjaxController@getexitadvicecategory');
    Route::post('admin/getexitadvicecategoryedit', 'App\Http\Controllers\admin\AjaxController@getexitadvicecategoryedit');
    Route::post('/admin/getcategory', 'App\Http\Controllers\admin\AjaxController@getServiceNameByType');

    Route::resource('/admin/adviceQuerys', 'App\Http\Controllers\admin\adviceQuerysController');
    Route::get('/admin/addQuerys', 'App\Http\Controllers\admin\adviceQuerysController@addQuerys');
    Route::any('/admin/adviceQueryDelete/{id}', 'App\Http\Controllers\admin\adviceQuerysController@destroy');

    Route::resource('admin/customer_managment', 'App\Http\Controllers\admin\customerManagmentController');

    Route::resource('admin/manage-lawyer', 'App\Http\Controllers\admin\lawyermanagmentController');
    Route::post('admin/manage-lawyer/show-lawyer/{id}', 'App\Http\Controllers\admin\lawyermanagmentController@showLawyer');
    Route::get('/admin/lawyerProfile/{id}', [lawyermanagmentController::class, 'lawyerProfile']);

    Route::resource('admin/legal-services', 'App\Http\Controllers\admin\legalserviceController');
    Route::get('admin/addService', 'App\Http\Controllers\admin\legalserviceController@addService');
    Route::any('/admin/legalServiceDelete/{id}', 'App\Http\Controllers\admin\legalserviceController@destroy');
    Route::get('/admin/addDeatails/{id}', 'App\Http\Controllers\admin\legalserviceController@addDetils');
    Route::post('/admin/insertSubService', 'App\Http\Controllers\admin\legalserviceController@insertSubService');

    Route::any('/admin/deleteSubService/{id}', 'App\Http\Controllers\admin\legalserviceController@deleteSubService');

    Route::resource('/admin/guides-articles', 'App\Http\Controllers\admin\guidesarticlesController');
    Route::get('/admin/addGuides', 'App\Http\Controllers\admin\guidesarticlesController@show');
    Route::any('/admin/guidesArticlesDelete/{id}', 'App\Http\Controllers\admin\guidesarticlesController@destroy');

    Route::resource('/admin/other-resoureces', 'App\Http\Controllers\admin\otherresourcesController');
    Route::get('/admin/addresources', 'App\Http\Controllers\admin\otherresourcesController@addResource');
    Route::any('/admin/otherresoureces/{id}', 'App\Http\Controllers\admin\otherresourcesController@destroy');

    Route::resource('/admin/enquiry-category', 'App\Http\Controllers\admin\enquirycategoryController');


    //-----------------------------------------------location--------------------------------------
    Route::resource('/admin/manage-location', 'App\Http\Controllers\admin\managelocationController');
    Route::post('admin/getexitlocation', 'App\Http\Controllers\admin\AjaxController@getexitlocation');
    Route::post('admin/getexitlocationedit', 'App\Http\Controllers\admin\AjaxController@getexitlocationedit');
    //----------------------------------------------location----------------------------------------

    //---------------------------------------------legal-issue---------------------------------------------
    Route::resource('/admin/legal-issue', 'App\Http\Controllers\admin\legalissueController');
    Route::post('admin/getexistisuue', 'App\Http\Controllers\admin\AjaxController@getexistisuue');
    Route::post('admin/getexistisuueedit', 'App\Http\Controllers\admin\AjaxController@getexistisuueedit');

    //---------------------------------------------legal-issue---------------------------------------------

    Route::get('/admin/legal-enquiry', 'App\Http\Controllers\admin\legalenquiryController@index');
    Route::get('/admin/legal-enquiry/{id}', 'App\Http\Controllers\admin\legalenquiryController@destroy');
    Route::get('/admin/legal-enquiry/{id}/edit', 'App\Http\Controllers\admin\legalenquiryController@show');
    Route::post('/admin/update_statuss', 'App\Http\Controllers\admin\legalenquiryController@update_statuss');

    //----------------------------------------------ask free questions---------------------------
    Route::get('/admin/free-questions', 'App\Http\Controllers\admin\freeQuestionsController@index');
    Route::post('/admin/free-questions', 'App\Http\Controllers\admin\freeQuestionsController@store');
    Route::get('/admin/free-questions/{id}', 'App\Http\Controllers\admin\freeQuestionsController@destroy');
    Route::get('/admin/free-questions/{id}/edit', 'App\Http\Controllers\admin\freeQuestionsController@show');
    //----------------------------------------------ask free questions---------------------------

    Route::resource('admin/review-rating', 'App\Http\Controllers\fronted\reviewController');

    Route::resource('/admin/enquiry', 'App\Http\Controllers\fronted\enquiryController');
    Route::post('/enquiry/feedback', 'App\Http\Controllers\fronted\enquiryController@feedback');

    Route::resource('/admin/court-managment', 'App\Http\Controllers\admin\manageCourtController');

    Route::resource('/admin/add-category', 'App\Http\Controllers\admin\headerCategory');

    // category query

    Route::resource('/admin/query-category', 'App\Http\Controllers\admin\queryCategoryController');
    Route::get('/admin/query-category/{id}', 'App\Http\Controllers\admin\queryCategoryController@addDetils');
    Route::get('/admin/addLegalQuery', 'App\Http\Controllers\admin\queryCategoryController@addLegalQuery');
    Route::post('/admin/updateLegalQuery/{id}', 'App\Http\Controllers\admin\queryCategoryController@updateLegalQuery');
    Route::post('/admin/insertSubQuerys', 'App\Http\Controllers\admin\queryCategoryController@insertSubService');
    Route::any('/admin/deleteSubQuery/{id}', 'App\Http\Controllers\admin\queryCategoryController@deleteSubQuery');



    // Route::post('admin/getexitadvicecategory', 'App\Http\Controllers\admin\AjaxController@getexitadvicecategory');
    // Route::post('admin/getexitadvicecategoryedit', 'App\Http\Controllers\admin\AjaxController@getexitadvicecategoryedit');

    Route::post('/admin/legal-service-description', 'App\Http\Controllers\admin\legalissueController@store');
    Route::get('/admin/bookingHistory', 'App\Http\Controllers\fronted\enquiryController@bookingHistory');

    Route::get('/notification/lawyer_notification', 'App\Http\Controllers\admin\HomeController@lawyerNotification');
    Route::get('/notification/customer_notification', 'App\Http\Controllers\admin\HomeController@customerNotification');
    Route::get('/notification/enquiry_notification', 'App\Http\Controllers\admin\HomeController@enquiryNotification');
    Route::get('/notification/contactenquiry_notification', 'App\Http\Controllers\admin\HomeController@contactenquiryNotification');
    Route::get('/notification/enquirynew_notification', 'App\Http\Controllers\admin\HomeController@enquirynewNotification');

    // document details
    Route::resource('/admin/document-deatils', documentDeatailsController::class);
    Route::get('/admin/add-document-details', [documentDeatailsController::class, 'addDetails']);
    // document details
    // Route::resource('/admin/document-enquiry',documentenquiryController::class);
    Route::resource('/admin/document-enquiry', documentenquiryController::class);
    Route::post('/admin/document/upload', [documentenquiryController::class, 'uploaddocument']);
});

//------------------------------------------------------------- ADMIN --------------------------------------------------------------
Route::get('/admin/view-content/{id}', [FrontedHomeController::class, 'viewPage']);


//---------------------------------------------------------------------FRONTED---------------------------------------------------------
Route::get('/login', [CustomerRegisterController::class, 'login']);
Route::post('customer/login', [CustomerLoginController::class, 'login']);
Route::get('/register', [CustomerRegisterController::class, 'index']);
Route::post('customer/register', [CustomerRegisterController::class, 'store']);
Route::get('verify-email/{id}', [CustomerLoginController::class, 'verifyemail']);
Route::get('customer/customer-index', [CustomerLoginController::class, 'test']);

Route::get('customer/forgot-password', [customerforgotPasswordController::class, 'index']);
Route::any('/customerverify-email', [ForgotPasswordController::class, 'customerverify_email']);
Route::get('/customerreset_password_view/{id}', [ForgotPasswordController::class, 'customerreset_password_view']);
Route::post('/customerreset_password/{id}', [ForgotPasswordController::class, 'customerreset_password']);


Route::get('/', [FrontedHomeController::class, 'index'])->middleware('checkEnrollmentType');
Route::get('/about-us', [FrontedHomeController::class, 'about_us']);
Route::get('/new/login', [FrontedHomeController::class, 'loginNew']);
Route::get('/contact-us', [FrontedHomeController::class, 'contact_us']);
Route::post('/contact-us/store', [FrontedContactEnquiryController::class, 'store']);
Route::get('/free-legal-advice/answers', [FrontedHomeController::class, 'free_legalAdvice']);

Route::get('/indian-kanoon/free-legal-advice/answers', [FrontedHomeController::class, 'free_legalGuides']);
Route::post('/getAdviceData', [FrontedHomeController::class, 'adviceData']);
Route::post('/free-legal-advice/answers', [FrontedHomeController::class, 'legelAdviceSearch']);
Route::get('/legal-advice-details/{id}', [FrontedHomeController::class, 'legalAdviceDetails']);
Route::get('/indian-kanoon/legal-guides-details/{id}', [FrontedHomeController::class, 'legalGuidesDetails']);
Route::get('/divorce-lawyers', [FrontedHomeController::class, 'divorceLawyers']);
//----------------------------------legal issue----------------------------------------
Route::get('/legal-enquiry/{id}', [FrontedHomeController::class, 'legalEnquiry']);
Route::post('/legal-enquiry', [legalenquiryController::class, 'test']);
Route::post('/insert-quer', [legalenquiryController::class, 'store']);
Route::post('/insert-document', [legalenquiryController::class, 'storedocument']);
Route::post('/get-subissue', 'App\Http\Controllers\admin\AjaxController@getsubissue');
//----------------------------------legal issue----------------------------------------

Route::get('/thank-you', [FrontedHomeController::class, 'thankYou']);
Route::get('/free-legal-advice', [FrontedHomeController::class, 'freeAdvice']);
Route::get('/free-legal-guides', [FrontedHomeController::class, 'freeGuides']);


Route::get('/all-aids', [FrontedHomeController::class, 'allAid']);
Route::get('/all-docs', [FrontedHomeController::class, 'allDocs']);

Route::get('/all-querys-paper', [FrontedHomeController::class, 'allResearchPapers']);
Route::get('/all-querys-notes', [FrontedHomeController::class, 'allNotes']);
Route::get('/all-querys-acts', [FrontedHomeController::class, 'allBarsAct']);

//-----------------------------------------ask free questions-----------------------------------------
// Route::get('/ask-a-free-question', [FrontedHomeController::class, 'askFreeQuestion']);
Route::resource('/ask-a-free-question', 'App\Http\Controllers\fronted\askFreeQuestionController');
//-----------------------------------------ask free questions-----------------------------------------


Route::get('/free-legal-advice-phone', [FrontedHomeController::class, 'freeAdvicePhone']);
Route::post('/free-legal-advice-phone', 'App\Http\Controllers\fronted\enquiryController@store');

Route::get('/divorce-legal-services', [FrontedHomeController::class, 'divorce_legalServices']);
Route::get('/property-legal-services', [FrontedHomeController::class, 'property_legalServices']);
Route::get('/labour-service-legal-services', [FrontedHomeController::class, 'labour_legalServices']);
Route::get('/copyright-patent-trademark-legal-services', [FrontedHomeController::class, 'labour_legalServices']);
Route::get('/corporate-legal-services', [FrontedHomeController::class, 'corporate_legalServices']);
Route::get('/startup-legal-services', [FrontedHomeController::class, 'startup_legalServices']);
Route::get('/supreme-court-legal-services', [FrontedHomeController::class, 'supreme_legalServices']);
Route::get('/immigration-legal-services', [FrontedHomeController::class, 'immagination_legalServices']);



Route::get('/documentation-legal-services', [FrontedHomeController::class, 'documentation_legalServices']);
Route::get('/divorce-guide-detail', [FrontedHomeController::class, 'divorce_GuildDetail']);
Route::get('/mutual-divorce', [FrontedHomeController::class, 'mutualDivorce']);
Route::get('/legal-help-center', [FrontedHomeController::class, 'legalHelpCenter']);
Route::get('/law-video', [FrontedHomeController::class, 'lawVideo']);
Route::get('/law-guides', [FrontedHomeController::class, 'lawGuides']);
Route::get('/indian-kanoon', [FrontedHomeController::class, 'indianKnoon']);
Route::get('/indian-kanoon-detail', [FrontedHomeController::class, 'indianKnoonDetail']);
Route::get('/new-rules', [FrontedHomeController::class, 'newRules']);
Route::get('/in-the-media', [FrontedHomeController::class, 'inTheMedia']);
Route::get('/career', [FrontedHomeController::class, 'career']);
Route::post('getexitemailusers', 'App\Http\Controllers\admin\AjaxController@getexitemail');

// Route::get('/lawyer-profile', 'App\Http\Controllers\fronted\lawyerProfileController@index');
//lawyer profile

Route::get('/lawyer-profile/{fid}/{id}', 'App\Http\Controllers\fronted\lawyerProfileController@lawyerProfile');

//lawyer profile
//-----------------------------------------user account---------------------------------------------
Route::get('/my-account', [FrontedHomeController::class, 'myAccount']);
Route::resource('/my-profile', 'App\Http\Controllers\fronted\userProfileController');
Route::get('/account/all-questions', [FrontedHomeController::class, 'allQuestions']);
Route::get('/enquiryView/{id}', [FrontedHomeController::class, 'enquiryView']);
Route::get('/account/customer/my-booking', [FrontedHomeController::class, 'myBookings']);

Route::get('/user-book-history', [FrontedHomeController::class, 'userBookHistory']);
//documentation
Route::get('/account/all-documentation', [FrontedHomeController::class, 'allDocuments']);
//documentation
//-----------------------------------------user account---------------------------------------------

Route::get('/find-lawyer', 'App\Http\Controllers\fronted\findLawyer@index');
Route::post('/find-lawyer', 'App\Http\Controllers\fronted\findLawyer@getData');

Route::post('/find-name', 'App\Http\Controllers\fronted\findLawyer@getName');


Route::get('/legalQueryDesc', 'App\Http\Controllers\fronted\HomeController@legalQueryDesc');

Route::get('/{category}', [FrontedHomeController::class, 'divorce_legalAdvice']);
Route::get('indian-kanoon/{category}', [FrontedHomeController::class, 'divorce_legalGuides']);

Route::get('/lawyer/enrollment', [FrontedHomeController::class, 'enrollment']);
Route::post('/lawyer/enrollment', [enrollmentController::class, 'index']);

Route::post('/lawyer/getexitallotmentno', 'App\Http\Controllers\admin\AjaxController@getexitallotmentno');
Route::post('/lawyer/getexitenrollmentno', 'App\Http\Controllers\admin\AjaxController@getexitenrollmentno');

Route::post('/lawyer/getexitallotmentnoedit', 'App\Http\Controllers\admin\AjaxController@getexitallotmentnoedit');
Route::post('/lawyer/getexitenrollmentnoedit', 'App\Http\Controllers\admin\AjaxController@getexitenrollmentnoedit');

Route::get('/legal-services/{category}', [FrontedHomeController::class, 'family_services']);
Route::get('/legal-services/documents/{category}', [FrontedHomeController::class, 'document_services']);

Route::get('indian-kanoons/{name}', 'App\Http\Controllers\admin\indianKanoonController@dataById');

Route::post('quick-answer', [FrontedContactEnquiryController::class, 'store']);

Route::get('advocate/{id}', [FrontedHomeController::class, 'advocateProfile']);

Route::get('/search/lawyer', [FrontedHomeController::class, 'searchLawyer']);

Route::get('/page/terms-of-use', [FrontedHomeController::class, 'termsOfUse']);

Route::resource('/write-review', 'App\Http\Controllers\fronted\reviewController');

Route::get('/experts/reviews/{id}', 'App\Http\Controllers\fronted\reviewController@allReviews');

Route::resource('/enquiry-form', 'App\Http\Controllers\fronted\enquiryController');

Route::resource('/document-form', 'App\Http\Controllers\fronted\documentenquiryController');

Route::get('/lawyer/edit-profile', [FrontedHomeController::class, 'editProfile']);
Route::post('/lawyer/edit-profile/{id}', 'App\Http\Controllers\fronted\lawyerProfileController@update');
Route::post('/lawyer/edit-profile', 'App\Http\Controllers\fronted\lawyerProfileController@updateImage');

Route::post('/lawyer/change_password/{id}', [App\Http\Controllers\admin\ForgotPasswordController::class, 'lawyerchangePassword']);

Route::post('/fronted/getcategoryname', 'App\Http\Controllers\admin\AjaxController@getcategoryname');

Route::post('pay-fees', [FrontedHomeController::class, 'addOrderData']);
Route::get('fees/final-pay', [FrontedHomeController::class, 'payumoney']);
Route::get('page/submit-post', [FrontedHomeController::class, 'newPage']);

Route::get('/search/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);
Route::get('/search/autocomplete-search/two', [TypeaheadController::class, 'autocompleteSearchSecond']);
Route::get('/search/autocomplete-search/three', [TypeaheadController::class, 'autocompleteSearchThirds']);

// Route::post('/find-docs', 'App\Http\Controllers\fronted\findLawyer@getDocs');
// Route::post('/find-aid', 'App\Http\Controllers\fronted\findLawyer@getAids');

Route::get('/search/find-docs',  [TypeaheadController::class, 'searchDocs']);
Route::get('/search/find-aid', [TypeaheadController::class, 'searchAid']);

Route::post('/search/query/service', [TypeaheadController::class, 'queryService']);
Route::post('/admin/getcategorybyname',[AjaxController::class,'getCategoryNameByType']);

Route::get('/search/headerSearch',  [FrontedHomeController::class, 'headerSearch']);



//----------------------------------------------------------------------FRONTED---------------------------------------------------------



//----------------------------------------------------------------------Lawyer side---------------------------------------------------------
Route::get('/lawyer/register', 'App\Http\Controllers\fronted\lawyerRegisterController@index');
Route::post('lawyer/register', 'App\Http\Controllers\fronted\lawyerRegisterController@store');
Route::get('/lawyer/login', 'App\Http\Controllers\fronted\lawyerRegisterController@login');
Route::post('lawyer/login', 'App\Http\Controllers\fronted\lawyerLoginController@login');

Route::get('/lawyer/facebook', 'App\Http\Controllers\fronted\SocialAuthFacebookController@redirect');
Route::get('/lawyer/callback', 'App\Http\Controllers\fronted\SocialAuthFacebookController@callback');

Route::get('lawyer/forgot-password', [lawyerforgotPasswordController::class, 'index']);
Route::post('/lawyer/verify-email', [App\Http\Controllers\admin\ForgotPasswordController::class, 'lawyerverify_email']);
Route::get('/lawyer/verify-email/{id}', [App\Http\Controllers\admin\ForgotPasswordController::class, 'verify_lawyer_email']);
Route::get('/lawyerreset_password_view/{id}', [App\Http\Controllers\admin\ForgotPasswordController::class, 'lawyerreset_password_view']);
Route::post('/lawyerreset_password/{id}', [App\Http\Controllers\admin\ForgotPasswordController::class, 'lawyerreset_password']);

//----------------------------------------------------------------------Lawyer side---------------------------------------------------------
