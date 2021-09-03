<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\adviceQuerys;
use App\Models\admin\blogs;
use App\Models\admin\Category;
use App\Models\admin\court;
use App\Models\admin\freeQuestions;
use App\Models\admin\guides;
use App\Models\admin\lawyercourt;
use App\Models\admin\lawyerenrollmentcatgeory;
use App\Models\admin\lawyerlanguages;
use App\Models\admin\legalissue;
use App\Models\admin\legalservicecategory;
use App\Models\admin\legalservices;
use App\Models\admin\location;
use App\Models\admin\otherResource;
use App\Models\admin\reviewrating;
use App\Models\admin\setting;
use App\Models\admin\sitesetting;
use App\Models\admin\trends;
use App\Models\admin\webinar;
use App\Models\admin\ServiceSubCategory;
use App\Models\User;
use App\Models\admin\MainLegalQuery;
use App\Models\admin\querySubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data['title'] = " ";
        $this->data['city'] = location::getAllRecord();
        $this->data['court'] = court::getAllRecord();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $name = '';
        // return $request->all();
        $auth = Auth::user();
        $this->data['title'] = "Home";
        $this->data['getwebinar'] = webinar::getallwebinar();
        $this->data['getblogs'] = blogs::getallblogs();
        $this->data['getTlp'] = trends::getTLPEvents();
        $this->data['getlawfirm'] = trends::getLawFirm();
        $this->data['getfreeguides'] = trends::getFreeGuides();
        $this->data['getcarrertips'] = trends::getCareerTips();
        $this->data['getlegalservices'] = legalservices::getallservices();
        $this->data['advicecategory'] = adviceCategory::getquestioncategorylistlimit();
        // $this->data['getquerysdata'] = otherResource::getAllDataf($name);
        $this->data['allAids'] = legalservices::getfamilyData();
        $this->data['city'] = location::getAllRecord();
        $this->data['category'] = adviceCategory::getquestioncategorylist();
        $this->data['verifyreviews'] = reviewrating::getVarifyRecords();

        $this->data['getlawyer'] = User::getLawyers();

        // $this->data['familydataone'] = legalservices::getfamilyData();                           
        return view('fronted.index', $this->data);
    }
    public function about_us(Request $request)
    {
        $this->data['title'] = "About Us";
        $this->data['category'] = adviceCategory::getquestioncategorylist();
        return view('fronted.aboutus', $this->data);
    }
    public function contact_us(Request $request)
    {
        $this->data['title'] = "Contact Us";
        $this->data['getsettings'] = setting::getsetings();
        return view('fronted.contactus', $this->data);
    }
    public function free_legalAdvice(Request $request)
    {
        $this->data['title'] = "Legal Advice";
        $this->data['search_name'] = $search_name = $request->search_name;
        $this->data['getquerys'] = adviceQuerys::allquerylist($search_name);
        $this->data['advicecategory'] = adviceCategory::getquestioncategorylist();
        return view('fronted.legelAdvice', $this->data);
    }
    public function free_legalGuides(Request $request)
    {
        $this->data['title'] = "Legal Guides";
        $this->data['search_name'] = $search_name = $request->search_name;
        $this->data['getquerys'] = guides::allquerylist($search_name);
        $this->data['advicecategory'] = guides::getquestioncategorylist();
        return view('fronted.legelGuides', $this->data);
    }


    /* urls */
    public function divorce_legalAdvice(Request $request, $category)
    {
        // return explode('-',$category);
        // $n = explode("-",$category);

        $exploxe = explode('-', $category);
        if (isset($exploxe[1]) && $exploxe[1] != '') {
            list($part1, $part2) = explode('-', $category);

            $this->data['title'] = $part1 . " Advice";
            $this->data['category_name'] = $part1;
            $this->data['search_name'] = $search_name = $request->search_name;
            $this->data['getquerys'] = adviceQuerys::divorcequerylist($part1);
            $this->data['advicecategory'] = adviceCategory::getquestioncategorylist();
            return view('fronted.legelAdvice', $this->data);
        } else {
            abort(404);
        }
    }
    public function divorce_legalGuides(Request $request, $category)
    {
        //   echo $category."<br>";die;
        // $n = explode("-",$category);
        list($part1, $part2) = explode('-', $category);
        // echo $part1;
        $this->data['category_name'] = $part1;
        // die;
        $this->data['city'] = location::getAllRecord();

        // return $request->all(); die;
        $this->data['title'] = $part1 . " Advice";
        $this->data['search_name'] = $search_name = $request->search_name;
        $this->data['getquerys'] = guides::guideslist($part1);
        $this->data['advicecategory'] = adviceCategory::getguidescategorylist();
        return view('fronted.legelGuides', $this->data);
    }
    /* service urls */

    public function family_services(Request $request, $name)
    {
        //   echo $name."<br>";die;
        // $n = explode("-",$category);
        $part1 = $name;
        // list($part1, $part2) = explode('-', $name);
        // echo $part1;
        // die;
        // return $request->all(); die;
        $this->data['title'] = "Get Your " . $part1 . " Done By Experts Advocates ";
        $this->data['search_name'] = $search_name = $request->search_name;
        $this->data['getquerys'] = legalservices::familylist($part1);
        // $this->data['advicecategory'] = adviceCategory::getguidescategorylist();
        $this->data['advicecategory'] = $serviceData = legalservices::getDataBySlugName($name);
        $this->data['sub_service_list'] = ServiceSubCategory::getBYServiceById($serviceData->id);

        return view('fronted.mutualDivorce', $this->data);
    }

    /* service urls */



    /* urls */
    public function adviceData(Request $request)
    {
        // return $request->all();
        $this->data['title'] = "Legal Advice";
        $this->data['getsettings'] = setting::getsetings();
        $this->data['getquerys'] = adviceQuerys::advicequerylist();
        $this->data['advicecategory'] = adviceCategory::getcategorylist();
        $this->data['selectdata'] = adviceQuerys::getrecordbcategoryyid($request->id);

        $aa = (string)View::make('fronted.adviceQuestions', $this->data);
        $category = adviceCategory::find($request->id);
        $category = $category->category_name;
        $arr = array('view' => $aa, 'cat' => $category);
        return json_encode($arr);
    }
    public function legelAdviceSearch(Request $request)
    {
        $id =  $request->id;
        // return "true"; die;
        // $name = $request->search_name;
        // if (isset($name)) {
        //     $this->data['getsearchdata'] = adviceCategory::getrecordbyname($name);   
        // }
        $this->data['getquerys'] = adviceQuerys::advicequeryById($id);
        $this->data['advicecategory'] = adviceCategory::getcategorylist();
        return view('fronted.legelAdvice', $this->data);
    }
    public function legalAdviceDetails(Request $request, $id)
    {
        // return $id;
        $this->data['title'] = "Legal Advice Detail";
        $this->data['getdata'] = adviceQuerys::getrecordbyid($id);
        return view('fronted.legelAdviceDetails', $this->data);
    }
    public function legalGuidesDetails(Request $request, $id)
    {
        // return $id;
        $this->data['title'] = "Legal Guide Detail";
        $this->data['getdata'] = guides::getrecordbyid($id);
        return view('fronted.legelguidesdetail', $this->data);
    }
    public function divorceLawyers()
    {
        $this->data['title'] = "Divorce Lawyers";
        return view('fronted.divorceLawyers', $this->data);
    }
    public function legalEnquiry(Request $request, $id)
    {
        $auth = auth()->user();
        if($auth) 
        {
            if($auth->user_type == '2')
            {
                $this->data['id'] = $id;
                $this->data['title'] = "Legal Enquiry";
                $this->data['category'] = adviceCategory::getquestioncategorylist();
                $this->data['location'] = location::getAllRecord();
                $this->data['sub_category'] = ServiceSubCategory::getById($id);
                return view('fronted.legalEnquiry', $this->data);
            }
            else
            {
                return redirect('lawyer/login');
            }
        }
        else
        {
            return redirect('lawyer/login');
        }
        // if (!$auth) {
        //     return redirect('lawyer/login');
        // } 
        
    }
    public function thankYou(Request $request)
    {
        $this->data['title'] = "Thank You";
        return view('fronted.thankYou', $this->data);
    }
    public function freeAdvice()
    {
        $this->data['title'] = "Free Advice";
        $this->data['advicecategory'] = adviceCategory::getquestioncategorylist();
        return view('fronted.freeAdvice', $this->data);
    }
    public function allAid(Request $request)
    {
        $this->data['title'] = "LEGAL AID";
        $this->data['advicecategory'] = legalservices::getfamilyData();
        return view('fronted.allAids', $this->data);
    }
    public function allDocs(Request $request)
    {
        $this->data['title'] = "LEGAL Documents";
        $this->data['advicecategory'] = legalservices::getpropertyData();
        return view('fronted.allAids', $this->data);
    }

    public function freeGuides(Request $requestl)
    {
        // return "true"; die;
        $this->data['title'] = "Free Guides";
        $this->data['advicecategory'] = adviceCategory::getguidescategorylist();
        return view('fronted.freeGuides', $this->data);
    }
    public function askFreeQuestion()
    {
        $this->data['title'] = "Ask Free Questions";
        return view('fronted.askFreeQuestion', $this->data);
    }
    public function freeAdvicePhone()
    {
        $this->data['title'] = "Talk To Lawyer";
        return view('fronted.talkToLawyer', $this->data);
    }
    public function divorce_legalServices(Request $request)
    {
        // return $request->all();
        $this->data['title'] = "Legal Services";
        // $this->data['title'] = "Legal Services";
        $this->data['familydata'] = legalservices::getfamilyData();
        return view('fronted.legalServices', $this->data);
    }
    public function property_legalServices()
    {
        $this->data['title'] = "Legal Services";
        $this->data['familydata'] = legalservices::getpropertyData();
        return view('fronted.legalServices', $this->data);
    }
    public function labour_legalServices()
    {
        $this->data['title'] = "Legal Services";
        $this->data['familydata'] = legalservices::getlabourserviceData();
        return view('fronted.legalServices', $this->data);
    }
    public function copyright_legalServices()
    {
        $this->data['title'] = "Legal Services";
        $this->data['familydata'] = legalservices::gettradeData();
        return view('fronted.legalServices', $this->data);
    }
    public function corporate_legalServices()
    {
        $this->data['title'] = "Legal Services";
        $this->data['familydata'] = legalservices::getcorporateData();
        return view('fronted.legalServices', $this->data);
    }
    public function startup_legalServices()
    {
        $this->data['title'] = "Legal Services";
        $this->data['familydata'] = legalservices::getstartupData();
        return view('fronted.legalServices', $this->data);
    }
    public function supreme_legalServices()
    {
        $this->data['title'] = "Legal Services";
        $this->data['familydata'] = legalservices::getsupremcourtData();
        return view('fronted.legalServices', $this->data);
    }
    public function immagination_legalServices()
    {
        $this->data['title'] = "Legal Services";
        $this->data['familydata'] = legalservices::getimmaginationData();
        return view('fronted.legalServices', $this->data);
    }
    public function documentation_legalServices()
    {
        $this->data['title'] = "Legal Services";
        $this->data['familydata'] = legalservices::getdocData();
        return view('fronted.legalServices', $this->data);
    }
    public function divorce_GuildDetail()
    {
        $this->data['title'] = "Guid Details";
        return view('fronted.divorceGuideDetails', $this->data);
    }
    public function mutualDivorce()
    {
        $this->data['title'] = "Mutual Divorce";
        $this->data['service_title'] = "test";
        return view('fronted.mutualDivorce', $this->data);
    }
    public function legalHelpCenter()
    {
        $this->data['title'] = "Help Center";
        return view('fronted.legalHelpCenter', $this->data);
    }
    public function lawVideo()
    {
        $this->data['title'] = "Law Video";
        return view('fronted.lawVideo', $this->data);
    }
    public function lawGuides()
    {
        $this->data['title'] = "Law Guides";
        return view('fronted.lawGuides', $this->data);
    }
    public function indianKnoon()
    {
        $this->data['title'] = "Indian Kanoon";
        return view('fronted.indianKnoon', $this->data);
    }
    public function indianKnoonDetail()
    {
        $this->data['title'] = "Indian Kanoon Detail";
        return view('fronted.indianKnoonDetail', $this->data);
    }
    public function newRules()
    {
        $this->data['title'] = "New Rules";
        return view('fronted.newRules', $this->data);
    }
    public function inTheMedia()
    {
        $this->data['title'] = "The Media";
        return view('fronted.inTheMedia', $this->data);
    }
    public function career()
    {
        $this->data['title'] = "Career";
        return view('fronted.career', $this->data);
    }
    public function enrollment()
    {
        $auth = Auth::user();
        if (isset($auth)) {
            if ($auth) {
                if ($auth->user_type == 3) {
                    $this->data['test'] = $auth = Auth::user();
                    $this->data['title'] = "Enrollment";
                    $this->data['step'] = User::getsteps($auth->id);
                    $this->data['category'] = adviceCategory::categorylistenrollment();
                    $this->data['lawyerDataNew'] = User::getrecordbyid($auth->id);
                    $this->data['catdata'] = lawyerenrollmentcatgeory::getusercategorys($auth->id);
                    $this->data['location'] = location::getAllRecord();
                    return view('fronted.lawyerenrollment', $this->data);
                } else {
                    return view('fronted.lawyer_login', $this->data);
                }
            }
        } else {
            return view('fronted.lawyer_login', $this->data);
        }
    }
    public function myAccount()
    {
        $auth = Auth::user();
        $uid = $auth->id;
        $this->data['my_questions'] = freeQuestions::getRecordByUserId($uid);
        $this->data['title'] = "My Account";
        return view('fronted.myaccount', $this->data);
    }
    public function allQuestions()
    {
        $auth = Auth::user();
        $uid = $auth->id;
        $this->data['my_questions'] = freeQuestions::getRecordByUserId($uid);
        return view('fronted.userquestionslist', $this->data);
    }
    public function advocateProfile($id)
    {

        $this->data['title'] = "Advocate Profile";
        $this->data['userlanguages'] = lawyerlanguages::getrecordbyid($id);
        $this->data['specialization'] = lawyerenrollmentcatgeory::getrecordenrollmentbyid($id);
        $this->data['lawyerData'] =  User::getrecordbyid($id);
        $this->data['allreviews'] = reviewrating::getAllRecord();
        // $this->data['lawyer_review'] = reviewrating::getrecordbylawyeridlimit($id);
        $this->data['lawyer_review'] = reviewrating::getrecordbylawyeridlimit();
        return view('fronted.advocateProfile', $this->data);
    }
    public function searchLawyer(Request $request)
    {
        // return $request->all();
        $name = $request->name;
        $this->data['title'] = "Search By";
        $this->data['city'] = location::getAllRecord();
        $this->data['category'] = adviceCategory::getquestioncategorylist();
        $this->data['user_data'] = User::getRecordByName($name);
        return view('fronted.findLawyer', $this->data);
    }
    public function termsOfUse()
    {
        return view('fronted.terms_of_use', $this->data);
    }
    public function editProfile()
    {
        $auth = Auth::user();
        if ($auth) {
            if ($auth->step == '3') {
                $this->data['user_login'] = $auth;
                $this->data['court'] = court::getAllRecord();
                $this->data['category'] = adviceCategory::getquestioncategorylist();
                $this->data['user_category'] = lawyerenrollmentcatgeory::getDataById($auth->id)->pluck('categoryid')->toArray();
                $this->data['user_court'] = lawyercourt::getrecordbyid($auth->id)->pluck('courtid')->toArray();
                $this->data['user_language'] = lawyerlanguages::getrecordbyid($auth->id)->pluck('language')->toArray();
                $this->data['title'] = "Edit Profile";
                return view('fronted.editprofile', $this->data);
            } else {
                return view('/');
            }
        } else {
            return view('fronted.lawyer_login', $this->data);
        }
    }
    public function legalQueryDesc(Request $request)
    {
        $id = $request->id;
        $this->data['dataLegalQuery'] = MainLegalQuery::where('id', $id)->where('status', '1')->first();
        $this->data['description'] = querySubCategory::getBYQueryById($id);
        return view('fronted.legalQuery', $this->data);
    }
     public function loginNew()
    {
        $this->data['title'] = "Login";
        
        return view('fronted.login_new', $this->data);
    }
    
    public function allResearchPapers(Request $request)
    {
        $this->data['title'] = "Research Papers";
        $this->data['allQuerys'] = MainLegalQuery::getallPapers();
        return view('fronted.allResearchPapers', $this->data);
    }
    public function allNotes(Request $request)
    {
        $this->data['title'] = "Research Papers";
        $this->data['allQuerys'] = MainLegalQuery::getallNotes();
        return view('fronted.allResearchPapers', $this->data);
    }
    public function allBarsAct(Request $request)
    {
        $this->data['title'] = "Research Papers";
        $this->data['allQuerys'] = MainLegalQuery::getallBareAct();
        return view('fronted.allResearchPapers', $this->data);
    }
}
