<?php

namespace App\Http\Controllers\fronted;

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
        $this->data['contact_us_data'] = contactInquiry::getContacts($name);
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        return view('admin.contactEnquiry.index', $this->data);
    }
    public function destroy(Request $request, $id)
    {
        $delete = contactInquiry::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Successfully Deleted');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
        // return $delete;

    }
    public function store(Request $request)
    {
        // return $request->all();  die;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            // 'city' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("enquiry")
                ->withErrors($validator, 'legal-enquiry')
                ->withInput();
        } else {

            // $input = $request->all();
            $input['issue_id'] = $request->issue_id;
            $input['subissue_id'] = $request->subissueid;
            // $input['location'] = $request->city;
            $input['name'] = $request->name;
            $input['mobile'] = $request->phone;
            $input['email'] = $request->email;
            $input['other_info'] = $request->otherinfo;
            $input['created_at'] = date('Y-m-d H:i:s');


            $inser_id = new legalenquiry($input);
            $inser_id->save();
            $inser_id = $inser_id->id;
        }

        if ($inser_id) {
            Session::flash('success', 'Successfully Inserted');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
    }
}
