<?php



namespace App\Http\Controllers\admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Helpers\MailHelper;
use App\Models\admin\sitesetting;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

// use Validator;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{



    /**

     * Create a new controller instance.

     *

     * @return void

     */
    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()
    {



        $this->data['title'] = "Forgot Password";

        // return view('forgot_password', $this->data);
        return view('auth.passwords.email');
    }

    public function verify_email(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email'

        ]);



        if ($validator->fails()) {

            return redirect("forgot-password")

                ->withErrors($validator, 'forgot_password')

                ->withInput();
        } else {

            $email = request('email');



            $checkEmail = User::getByemailWeb($email);

            if ($checkEmail) {

                $string = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';

                $rand =  substr(str_shuffle($string), 0, 8);

                $encrypted = Crypt::encrypt($rand);

                $subject = "Legelbench Reset Password";

                $email_message = '

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

        <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">



        <head>

        <meta name="viewport" content="width=device-width" />

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title>legelbench Reset Password</title>

        </head>



         <body style="margin:0px; background: #f8f8f8; ">

        <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">

        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">

            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">

                <tbody>

                    <tr>

                    <td style="vertical-align: top; padding-bottom:30px;" align="center"></td>

                    </tr>

                </tbody>

            </table>

            <div style="padding: 40px; background: #fff;">

                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">

                    <tbody>

                        <tr>

                            <td style="border-bottom:1px solid #f6f6f6;">

                                <h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear ' . ucfirst($checkEmail->name) . ',</h1>

                                <p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p>

                            </td>

                        </tr>

                        <tr>

                            <td style="padding:10px 0 30px 0;">

                                <p>A request to reset your Admin password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password</p>

                                <center>

                                    <a href="' . URL::to('/reset_password_view/' . $encrypted) . '" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;">Reset Password</a>

                                </center>

                                <b>- Thanks (LegelBench team)</b> </td>

                        </tr>

                    </tbody>

                </table>

            </div>



             </div>

         </div>

        </body>

        </html>';



                $mail = MailHelper::mail_send($email_message, $email, $subject);



                $data = array('verify_otp' => $rand);



                $update = User::where('id', $checkEmail->id)->update($data);

                Session::flash('success', 'Email send successfully');

                return redirect('/login');
            } else {

                Session::flash('error', 'Error There isn’t any account associated with this Email');

                return redirect('/forgot-password');
            }
        }
    }

    public function verify_lawyer_email(Request $request, $id)
    {
        Auth::logout();
        $userid = Crypt::decrypt($id);
        $userdata = User::where('id', $userid)->first();
        if ($userdata) {
            if ($userdata->email_verify == 0) {
                $update_array = array('email_verify' => 1);
                $update =  User::where('id', $userid)->update($update_array);
                Session::flash('success', 'Verified Successfully');
                if ($userdata->user_type == 2) {
                    return redirect('/customer/login');
                }
                if ($userdata->user_type == 3) {
                    Session::flash('success', 'Successfully Verify Email');
                    return redirect('/lawyer/login');
                }
            } else {
                return redirect('/expired');
            }
        } else {
            Session::flash('error', 'Your account was not found');
            return redirect('/');
        }
    }



    public function verify_otp_view(Request $request)
    {

        return view('verify_otp');
    }



    public function verify_otp(Request $request)
    {

        $otp = request('otp');

        $validator = Validator::make($request->all(), [

            'otp' => 'required'

        ]);

        if ($validator->fails()) {

            return redirect("verify_otp_view")

                ->withErrors($validator, 'otp')

                ->withInput();
        } else {

            $data['checkOtp'] = $checkOtp = User::verifyOtp($otp);



            if ($checkOtp) {



                $encrypted = Crypt::encrypt($checkOtp->id);





                $otp_data = array('verify_otp' => null);

                $where = array('verify_otp' => $otp, 'user_type' => '1');

                // $update = User::update($otp_data, $where);

                //	return view('admin.reset_password',$data);

                Session::flash('success', 'Verify OTP successfully.');

                return redirect('reset_password_view/' . $encrypted);
            } else {

                Session::flash('error', 'Invalid OTP.');

                return redirect()->back();
            }
        }
    }



    public function reset_password_view(Request $request, $otp)
    {


        $this->data['title'] = "ForgotPassword";

        $this->data['otp'] = $otp;

        // print_r($this->data['otp']); die;

        $otpDecrypt = Crypt::decrypt($otp);

        // dd($otpDecrypt);

        $checkOtp = User::getByOTP($otpDecrypt);

        if (!empty($checkOtp)) {

            return view('auth.passwords.reset', $this->data);
        } else {

            return view('auth.passwords.reset', $this->data);

            // return view('expire_reset_password');



        }
    }

    public function reset_password(Request $request, $otpen)
    {
        // return $request->all();
        $otp = Crypt::decrypt($otpen);
        $password = request('password');

        $cpassword = request('confirm_password');

        $validator = Validator::make($request->all(), [

            'password' => 'required',
            'confirm_password' => 'required|same:password'

        ]);

        if ($validator->fails()) {

            return redirect("reset_password_view/" . $otpen)

                ->withErrors($validator, 'reset')

                ->withInput();
        } else {

            $checkdata = User::getByOTP($otp);

            if ($checkdata) {

                $data = array('password' => Hash::make($password), 'verify_otp' => null);

                $update = User::where('verify_otp', $otp)->where('user_type', '1')->update($data);

                if ($update) {

                    Session::flash('success', 'Password reset successfully');

                    return redirect('/login');
                } else {

                    Session::flash('error', 'Sorry, something went wrong. Please try again');

                    return redirect()->back();
                }
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');

                // return redirect('/reset_password');
                return redirect()->back();
            }
        }
    }

    /* change password lawyer edit */

    public function lawyerchangePassword(Request $request, $otpen)
    {
        // return $request->all();
        $auth = Auth::user();
        $password = User::getrecordbyid($auth->id);

        if (Hash::check($request->oldpassword, $password->password)) {

            $validator = Validator::make($request->all(), [
                'newpassword' => 'required|same:confirmpassword|min:8',
                'confirmpassword' => 'required '
            ]);
            if ($validator->fails()) {
                return redirect("/lawyer/edit-profile")
                    ->withErrors($validator, 'reset_password')
                    ->withInput();
            } else {

                $update_array = array('password' => Hash::make($request->newpassword));

                $where = array('id' => $auth->id);
                $update =  User::where($where)->update($update_array);

                if ($update) {
                    Session::flash('success', 'Password changed successfully.');
                    // return redirect('/lawyer/edit-profile');
                    return redirect()->back();
                } else {
                    Session::flash('error', 'Sorry, something went wrong. Please try again');
                    return redirect()->back();
                }
            }
        } else {
            Session::flash('error', 'Sorry, Old password does not match.');
            return redirect('errorlst');
        }
    }
    /* change password lawyer edit */




    /* lawyer reset password */

    public function lawyerverify_email(Request $request)
    {
        // return $request->all();
        // return $email = request('email');

        // die();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        // return request('email');die;

        if ($validator->fails()) {

            return redirect('/lawyer/forgot-password')

                ->withErrors($validator, 'forgot_password')

                ->withInput();
        } else {

            $dicrypt = request('email');
            // $dicrypt = Crypt::decrypt($id);
            // echo $dicrypt;
            // die($dicrypt);
            // return request('email');die;

            $checkEmail = User::lawyergetByemailWeb($dicrypt);

            if ($checkEmail) {

                $string = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';

                $rand =  substr(str_shuffle($string), 0, 8);

                $encrypted = Crypt::encrypt($rand);

                $subject = "Legelbench Reset Password";

                $email_message = '

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

        <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">



        <head>

        <meta name="viewport" content="width=device-width" />

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title>legelbench Reset Password</title>

        </head>



         <body style="margin:0px; background: #f8f8f8; ">

        <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">

        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">

            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">

                <tbody>

                    <tr>

                    <td style="vertical-align: top; padding-bottom:30px;" align="center"></td>

                    </tr>

                </tbody>

            </table>

            <div style="padding: 40px; background: #fff;">

                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">

                    <tbody>

                        <tr>

                            <td style="border-bottom:1px solid #f6f6f6;">

                                <h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear ' . ucfirst($checkEmail->name) . ',</h1>

                                <p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p>

                            </td>

                        </tr>

                        <tr>

                            <td style="padding:10px 0 30px 0;">

                                <p>A request to reset your Admin password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password</p>

                                <center>

                                    <a href="' . URL::to('/lawyerreset_password_view/' . $encrypted) . '" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;">Reset Password</a>

                                </center>

                                <b>- Thanks (LegelBench team)</b> </td>

                        </tr>

                    </tbody>

                </table>

            </div>

             </div>

         </div>

        </body>

        </html>';

                $mail = MailHelper::mail_send($email_message, $dicrypt, $subject);



                $data = array('verify_otp' => $rand, 'email_verify' => '0');



                $update = User::where('id', $checkEmail->id)->update($data);

                Session::flash('success', 'Email Send Successfully');

                return redirect('/lawyer/login');
            } else {

                Session::flash('error', 'Error There isn’t any account associated with this Email');

                return redirect('/lawyer/forgot-password');
            }
        }
    }

    public function lawyerreset_password_view(Request $request, $otp)
    {


        $this->data['title'] = "ForgotPassword";

        $this->data['otp'] = $otp;

        // print_r($this->data['otp']); die;

        $otpDecrypt = Crypt::decrypt($otp);

        // dd($otpDecrypt);

        $checkOtp = User::lawyergetByOTP($otpDecrypt);

        if (!empty($checkOtp)) {

            return view('auth.passwords.lawyerreset', $this->data);
        } else {

            return view('auth.passwords.lawyerreset', $this->data);

            // return view('expire_reset_password');
        }
    }
    public function lawyerreset_password(Request $request, $otpen)
    {
        // return $request->all();
        $otp = Crypt::decrypt($otpen);
        $password = request('password');

        $cpassword = request('confirm_password');

        $validator = Validator::make($request->all(), [

            'password' => 'required',
            'confirm_password' => 'required|same:password'

        ]);

        if ($validator->fails()) {

            return redirect("lawyerreset_password_view/" . $otpen)

                ->withErrors($validator, 'reset')

                ->withInput();
        } else {

            $checkdata = User::lawyergetByOTP($otp);

            if ($checkdata) {

                $data = array('password' => Hash::make($password), 'verify_otp' => null, 'status' => '1', 'email_verify' => '1');

                $update = User::where('verify_otp', $otp)->where('user_type', '3')->update($data);

                if ($update) {

                    Session::flash('success', 'Password reset successfully');

                    return redirect('/lawyer/login');
                } else {

                    Session::flash('error', 'Sorry, something went wrong. Please try again');

                    return redirect()->back();
                }
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');

                // return redirect('/lawyerreset_password');
                return redirect()->back();
            }
        }
    }


    /*customer reset password */
    public function customerverify_email(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email'

        ]);



        if ($validator->fails()) {

            return redirect("forgot-password")

                ->withErrors($validator, 'forgot_password')

                ->withInput();
        } else {

            $email = request('email');

            $checkEmail = User::customergetByemailWeb($email);

            if ($checkEmail) {

                $string = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';

                $rand =  substr(str_shuffle($string), 0, 8);

                $encrypted = Crypt::encrypt($rand);

                $subject = "Legelbench Reset Password";

                $email_message = '

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

        <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">



        <head>

        <meta name="viewport" content="width=device-width" />

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title>legelbench Reset Password</title>

        </head>



         <body style="margin:0px; background: #f8f8f8; ">

        <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">

        <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">

            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">

                <tbody>

                    <tr>

                    <td style="vertical-align: top; padding-bottom:30px;" align="center"></td>

                    </tr>

                </tbody>

            </table>

            <div style="padding: 40px; background: #fff;">

                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">

                    <tbody>

                        <tr>

                            <td style="border-bottom:1px solid #f6f6f6;">

                                <h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear ' . ucfirst($checkEmail->name) . ',</h1>

                                <p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p>

                            </td>

                        </tr>

                        <tr>

                            <td style="padding:10px 0 30px 0;">

                                <p>A request to reset your Admin password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password</p>

                                <center>

                                    <a href="' . URL::to('/customerreset_password_view/' . $encrypted) . '" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;">Reset Password</a>

                                </center>

                                <b>- Thanks (LegelBench team)</b> </td>

                        </tr>

                    </tbody>

                </table>

            </div>

             </div>

         </div>

        </body>

        </html>';

                $mail = MailHelper::mail_send($email_message, $email, $subject);



                $data = array('verify_otp' => $rand);



                $update = User::where('id', $checkEmail->id)->update($data);

                Session::flash('success', 'Email Send Successfully');

                return redirect('/login');
            } else {

                Session::flash('error', 'Error There isn’t any account associated with this Email');

                return redirect('/customer/forgot-password');
            }
        }
    }
    public function customerreset_password_view(Request $request, $otp)
    {


        $this->data['title'] = "ForgotPassword";

        $this->data['otp'] = $otp;

        // print_r($this->data['otp']); die;

        $otpDecrypt = Crypt::decrypt($otp);

        // dd($otpDecrypt);

        $checkOtp = User::customergetByOTP($otpDecrypt);

        if (!empty($checkOtp)) {

            return view('auth.passwords.customerreset', $this->data);
        } else {

            return view('auth.passwords.customerreset', $this->data);

            // return view('expire_reset_password');
        }
    }
    public function customerreset_password(Request $request, $otpen)
    {
        // return $request->all();
        $otp = Crypt::decrypt($otpen);
        $password = request('password');

        $cpassword = request('confirm_password');

        $validator = Validator::make($request->all(), [

            'password' => 'required',
            'confirm_password' => 'required|same:password'

        ]);

        if ($validator->fails()) {

            return redirect("customerreset_password_view/" . $otpen)

                ->withErrors($validator, 'reset')

                ->withInput();
        } else {

            $checkdata = User::customergetByOTP($otp);

            if ($checkdata) {

                $data = array('password' => Hash::make($password), 'verify_otp' => null, 'status' => '1');

                $update = User::where('verify_otp', $otp)->where('user_type', '2')->update($data);

                if ($update) {

                    Session::flash('success', 'Password reset successfully');

                    return redirect('/login');
                } else {

                    Session::flash('error', 'Sorry, something went wrong. Please try again');

                    return redirect()->back();
                }
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');

                // return redirect('/lawyerreset_password');
                return redirect()->back();
            }
        }
    }
}
