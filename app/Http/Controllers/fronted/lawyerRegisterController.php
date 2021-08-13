<?php

namespace App\Http\Controllers\fronted;

use App\Helpers\CryptHelper;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Models\admin\EmailTemplate;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class lawyerRegisterController extends Controller
{
    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index()
    {
        return view('fronted.lawyer_register');
    }
    public function login(Request $request)
    {
        return view('fronted.lawyer_login');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("lawyer/register")
                ->withErrors($validator, 'lawyer_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();


            $userdata = User::orderBy('id', 'desc')->first();

            $input['created_at'] = date('Y-m-d H:i:s');
            $input['email'] = $request->email;
            $input['name'] = $request->name;
            $input['username'] = $request->username;
            $input['user_type'] = 3;
            $input['status'] = 0;
            $input['password'] = Hash::make($request->password);

            $inputuser = User::create($input);

            $inser_id = $inputuser->id;

            /*verify-email*/
            $emailtemplate = EmailTemplate::where('type', 1)->first();
            $html = $emailtemplate->email;
            // $sitesetting = sitesetting::getrecordbyid();"
            $logo = '<img src="' . URL::to('/') . '/fronted/images/logo.png'  . '" alt="" style="margin-left: auto; margin-right: auto; display:block; margin-bottom: 10px;margin-top: 10px; height: 70px;">';

            $userid = CryptHelper::encryptstring($inser_id);
            $link = '<a style="text-decoration: none;background: #2196F3;border: 1px solid #2196F3;color: #fff;padding: 7px 7px;border-radius: 5px;margin-bottom:30px;font-size: 15px;" href=' . URL::to('/') . '/lawyer/verify-email/' . $userid . '>Verify your Email</a>';
            $subject = $emailtemplate->subject;
            $html = str_replace('{{NAME}}', $request->name, $html);
            $html = str_replace('{{LINK}}', $link, $html);
            $html = str_replace('{{DESCRIPTION}}', $emailtemplate->description, $html);
            $html = str_replace('{{LOGO}}', $logo, $html);

            $mail = MailHelper::mail_send_client($html, $request->email, $subject);
            /*verify-email*/

            if ($inputuser) {
                Session::flash('success', 'Successfully Registered</br> Please Varify Your Email id');
               return redirect('/lawyer/login');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
}
