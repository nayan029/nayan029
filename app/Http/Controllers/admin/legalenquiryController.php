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
use Illuminate\Support\Facades\DB;
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
        $this->data['title'] = 'Legal AID Enquiry';
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        // $this->data['contact_us_data'] = contactInquiry::all()->paginate(3)->sortByDesc('id'); 
        $this->data['name'] = $name = $request->name;
        $this->data['enquiry_list'] = legalenquiry::getAllData();
        
        $this->data['enquiry_data'] = legalenquiry::enquirylist($name);
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        DB::table('legal_enquiry')->update(array('notification' => 1));
        return view('admin.legalenquiry.index', $this->data);
    }
    public function show($id)
    {
        // return "true";
        $this->data['enquiry_id'] = $id;
        $this->data['enquirydata'] = legalenquiry::enquirylistedit($id);
        $this->data['getActivelawyer'] = User::getActivelawyertdata();
        return view('admin.legalenquiry.edit', $this->data);
    }
    public function update_statuss(Request $request)
    {
        // return $request->all();
        $id = $request->id;
        $ass_status = $request->ass_status;
        $enquiry_id = $request->enquiry_id;
        // $sql = User::where("id", $id)->update(array("assign_lawyer" => $ass_status));

        $sqlData = legalenquiry::where("id", $enquiry_id)->update(array("lawyer_id" => $id, "assign_lawyer" => $ass_status));

        return $ass_status;
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

    public function allDocuments()
    {
        $auth = Auth::user();
        if (isset($auth)) {
            $uid = $auth->id;
            $this->data['userdata'] = User::getrecordbyid($uid);
            $this->data['title'] = "All Documentations";
            $this->data['getData'] = legalenquiry::loginUserDocumentlist($uid);
            return view('admin.document_enquiry.index', $this->data);
        } else {
            return view('fronted.customer_login', $this->data);
        }
    }
}
