<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\court;
use App\Models\admin\lawyerenrollmentcatgeory;
use Illuminate\Http\Request;
use App\Models\admin\lawyerlanguages;
use App\Models\admin\location;
use App\Models\admin\reviewrating;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class lawyerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->data['city'] = location::getAllRecord();
        $this->data['title'] = 'Lawyer Profile';
        $this->data['court'] = court::getAllRecord();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $id = $auth->id;
        $this->data['lawyer_review'] = reviewrating::getrecordbylawyeridlimit($id); 
        $this->data['userlanguages'] = lawyerlanguages::getrecordbyid($id);
        $this->data['specialization'] = lawyerenrollmentcatgeory::getrecordenrollmentbyid($id);
        $this->data['lawyerData'] = User::getrecordbyid($id);
        return view('fronted.lawyerprofile', $this->data);
    }
}
