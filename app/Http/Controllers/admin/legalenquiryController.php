<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\contactInquiry;
use App\Models\admin\legalenquiry;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class legalenquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        // $this->middleware('CheckEmailVerify');
        $this->data['title'] = 'Legal Enquiry';
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        // $this->data['contact_us_data'] = contactInquiry::all()->paginate(3)->sortByDesc('id'); 
        $this->data['name'] = $name = $request->name;
        $this->data['enquiry_list'] = legalenquiry::getAllData(); 
        $this->data['enquiry_data'] = legalenquiry::enquirylist(); 
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        return view('admin.legalenquiry.index', $this->data);
    }
    public function show($id)
    {
        // return "true";
        $this->data['data'] = legalenquiry::enquirylistedit($id); 
        return view('admin.legalenquiry.edit', $this->data);

    }
   
    public function destroy(Request $request, $id)
    {
        $delete = legalenquiry::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Contact Inquiry deleted successfully.');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
        // return $delete;

    }
}
