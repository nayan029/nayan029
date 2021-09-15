<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\enquiry;
use App\Models\admin\sitesetting;
use App\Models\admin\legalenquiry;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class enquiryController extends Controller
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
        $this->data['name'] = $name = $request->name;
        $this->data['contact_us_data'] = enquiry::getContacts($name);
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        DB::table('enquiry')->update(array('notification' => 1));
        return view('admin.enquiry.index', $this->data);
    }
    public function edit($id)
    {
        $this->data['data'] = enquiry::getrecordbyid($id);
        return view('admin.enquiry.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'status' => 'required'
            // 'feedback' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("admin/enquiry")
                ->withErrors($validator, 'feddback_error')
                ->withInput();
        } else {
            $auth = Auth::user();
            $input = $request->all();
            $input['feedback'] = $request->feedback;
            $input['status'] = $request->status;
            $input['updated_at'] = date('Y-m-d H:i:s');
            $input['updated_by'] = $auth->id;

            $category = enquiry::find($id);
            $category->update($input);


            if ($category) {
                Session::flash('success', 'feedback add successfully');
                return redirect('admin/enquiry');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function store(Request $request)
    {
        // return $request->all(); die;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, '/')
                ->withInput();
        } else {

            $input = $request->all();
            $input['status'] = '0';
            $input['created_at'] = date('Y-m-d H:i:s');

            $inser_id = new enquiry($input);
            $inser_id->save();
            $inser_id = $inser_id->id;
        }

        if ($inser_id) {
            Session::flash('success', 'Successfully Inserted');
            // return redirect('products');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
    }
    public function destroy(Request $request, $id)
    {
        // $delete = enquiry::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        // if ($delete) {
        //     Session::flash('success', 'Successfully Deleted');
        //     return redirect()->back();
        // } else {
        //     Session::flash('error', 'Sorry, something went wrong. Please try again');
        //     return redirect()->back();
        // }
        // return $delete;
        $auth = Auth::user();
        if ($request->type == "delete") {
            $delete = enquiry::where('id', $id)->update(['deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        }
        /*staus change*/ else {
            $data = enquiry::where('id', $id)->first();
            $status = 1;
            $statusname = "Activated";
            if ($data->status == 1) {
                $statusname = "Inactivated";
                $status = 0;
            }
            $delete = enquiry::where('id', $id)->update(['status' => $status]);
        }
        if ($delete) {
            if ($request->type == "delete") {
                Session::flash('success', 'Lawyer deleted successfully.');
            } else {
                Session::flash('success', 'Successfully ' . $statusname);
            }
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
    public function feedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'feedback' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/")
                ->withErrors($validator, '/')
                ->withInput();
        } else {

            $input = $request->all();
            $input['created_at'] = date('Y-m-d H:i:s');

            $inser_id = new enquiry($input);
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
    public function bookingHistory(Request $request)
    {
        // $auth = Auth::user();
        // $this->data['name'] = $name = $request->name;
        // $this->data['contact_us_data'] = enquiry::getContacts($name);
        // $this->data['userdata'] = User::getrecordbyid($auth->id);

        $this->data['enquiry_data'] = $enquirydatas = legalenquiry::allBookingHistoryData()->get();
        
        return view('admin.enquiry.booking_histori', $this->data);
    }
}
