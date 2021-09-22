<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\bookingTemp;
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
        // return $request->all();
        $auth = auth()->user();
        if ($auth) {
            if ($auth->user_type == '2') {
                $loginDetail = Auth::user();
                $uemail = $loginDetail->email;
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


                    $insert_array = array(
                        'user_id' => $loginDetail->id,
                        'issue_id' => request('service_id'),
                        'subissue_id' => request('sub_service_id'),
                        'name' => request('name'),
                        'mobile' => request('phone'),
                        'email' => $uemail,
                        'status' => '1',
                        'documentid' => request('doumnetid'),
                        'other_info' => request('otherinfo'),
                        'created_at' => date('Y-m-d H:i:s'),
                    );



                    $inser_id = new legalenquiry($insert_array);
                    $inser_id->save();
                    $inser_id = $inser_id->id;

                    if ($inser_id) {
                        Session::flash('success', 'Successfully Inserted');
                        return redirect()->back();
                    } else {
                        Session::flash('error', 'Sorry, something went wrong. Please try again');
                        return redirect()->back();
                    }
                }
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
    public function storedocument(Request $request)
    {
        $auth = auth()->user();
        if ($auth) {
            if ($auth->user_type == '2') {
                $loginDetail = Auth::user();
                $uemail = $loginDetail->email;
                $uname = $loginDetail->name;
                $validator = Validator::make($request->all(), [
                    'doumnetid' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect("enquiry")
                        ->withErrors($validator, 'legal-enquiry')
                        ->withInput();
                } else {
                    $insert_array = array(
                        'user_id' => $loginDetail->id,
                        'issue_id' => request('service_id'),
                        'subissue_id' => request('sub_service_id'),
                        'name' => $uname,
                        'mobile' => request('phone'),
                        'email' => $uemail,
                        'docstatus' => '1',
                        'status' => '1',
                        'documentid' => request('doumnetid'),
                        'other_info' => request('otherinfo'),
                        'created_at' => date('Y-m-d H:i:s'),
                    );
                    $inser_id = new legalenquiry($insert_array);
                    $inser_id->save();
                    $inser_id = $inser_id->id;

                    // return request('doumnetid');
                    //insert into booking  
                    $order = new bookingTemp;
                    $order->user_id = Auth()->id();
                    $order->orderid = 'B' . str_pad(date("Ymdhis") + 1, 8, "0", STR_PAD_LEFT);
                    // return $order;

                    $input = array(
                        'amount' => '100',
                        'user_id'=>$loginDetail->id,
                        'orderid' => $order->orderid,
                        'status' => 1,
                        'oid' => $inser_id,
                        'documentid' => request('doumnetid'),
                        'created_at' => date('Y-m-d H:i:s'),
                    );
                    // **status update when fees pay**
                    $status['docstatus'] = '2';
                    $enquiry = legalenquiry::find($inser_id);
                    $enquiry->update($status);

                    // **status update when fees pay** 
                    $userOrderData = bookingTemp::create($input);
                    $insertId = $userOrderData->id;
                    //insert into booking 

                    if ($inser_id) {
                        Session::flash('success', 'Successfully Paid');
                        return redirect()->back();
                    } else {
                        Session::flash('error', 'Sorry, something went wrong. Please try again');
                        return redirect()->back();
                    }
                }
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
}
