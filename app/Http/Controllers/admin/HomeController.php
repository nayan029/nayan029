<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\contactInquiry;
use App\Models\admin\enquiry;
use App\Models\admin\sitesetting;
use App\Models\User;
use App\Models\admin\legalenquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = "Deshboard";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['lawyerdata'] = User::gettotlaLawyers();
        $this->data['totaluserdata'] = User::gettotalUsers();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
        $this->data['legalEnquiry'] = legalenquiry::getAllDataofEnquiry();
        $this->data['total_revenue'] = $enquirydatas = legalenquiry::allBookingHistoryData()->get();
        return view('admin.home', $this->data);
    }

    public function lawyerNotification()
    {
        $sql = User::getNewLawyerData();
        $data =  count($sql);
        return $data;
    }
    public function customerNotification()
    {
        $sql = User::getNewCustomerrData();
        $data =  count($sql);
        return $data;
    }
    public function enquiryNotification()
    {
        $sql = legalenquiry::getnotificationNewEnquiry();
        $data =  count($sql);
        return $data;
    }
    public function contactenquiryNotification()
    {
        $sql = contactInquiry::getnotificationcontactenquiry();
        $data =  count($sql);
        return $data;
    }
    public function enquirynewNotification()
    {
        $sql = enquiry::getnotification();
        $data =  count($sql);
        return $data;
    }
   
}
