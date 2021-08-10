<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\contactInquiry;
use App\Models\admin\enquiryCategory;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class enquirycategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        // $this->middleware('CheckEmailVerify');
        $this->data['title'] = 'Contact Enquiry';
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        // $this->data['contact_us_data'] = contactInquiry::all()->paginate(3)->sortByDesc('id'); 
        $this->data['name'] = $name = $request->name;
        $this->data['getData'] = enquiryCategory::getAllData(); 
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        return view('admin.enquiry_category.index', $this->data);
    }
    public function store(Request $request)
    {
        // return $request->all(); die;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("enquiry-category")
                ->withErrors($validator, 'enquiry-category')
                ->withInput();
        } else {

            $input = $request->all();
            $input['category_fk'] = $request->category;
            $input['enquiry_category'] = $request->name;
            $input['status'] = '1';
            // $input['created_at'] = date('Y-m-d H:i:s');


            // $inser_id = new enquiryCategory($input);
            $data = enquiryCategory::create($input);
            // $inser_id->save();
            // $inser_id = $inser_id->id;
        }

        if ($data) {
            Session::flash('success', 'enquiry added successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
    }
    public function destroy(Request $request, $id)
    {
        $delete = contactInquiry::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
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
