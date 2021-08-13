<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\contactInquiry;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class lawyerLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
       
        $this->data['title'] = 'Contact Enquiry';
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function login(Request $request)
    {
        // return $request->all(); die;
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password'], 'user_type' => 3,'email_verify'=>1))) {
            return redirect('/')->with('success', 'Successfully Logged In');
        } else {
            Session::flash('error', 'Please enter a valid email and password');
            return redirect()->back();
        }
        // return view('fronted.customer_login');
    }
    public function verifyemail(Request $request, $id)
    {
        Auth::logout();
        $userid = Crypt::decrypt($id);
        $userdata = User::where('id', $userid)->first();
        if ($userdata) {
            if ($userdata->email_verify == 0) {
                $update_array = array('email_verify' => 1);
                $update =  User::where('id', $userid)->update($update_array);
                Session::flash('success', 'Verified successfully');
                if ($userdata->user_type == 3) {
                    return redirect('/lawyer/login');
                }
            } else {
                Session::flash('error', 'Your link will be expired');
                return redirect('/');

            }
        } else {
            Session::flash('error', 'Your account was not found');
            return redirect('/');
        }
    }
}
