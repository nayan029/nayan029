<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $auth = Auth::user();
        if ($auth) {
            if ($auth->user_type == 1) {
                Auth::logout();
                Session::flash('success', 'Successfully Logged Out');
                return redirect('/admin/login');
            } elseif ($auth->user_type == 2) {
                Auth::logout();
                Session::flash('success', 'Successfully Logged Out');
                return redirect('/login');
            } elseif ($auth->user_type == 3) {
                Auth::logout();
                Session::flash('success', 'Successfully Logged Out');
                return redirect('/lawyer/login');
            }
        } else {
            Session::flash('success', 'Successfully Logged Out');
            return redirect('/');
        }
    }
    public function login(Request $request)
    {
        $input = $request->all();

        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin/login")
                ->withErrors($validator, 'users_error')
                ->withInput();
        } else {
            if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password'], 'status' => 1, 'user_type' => 1))) {
                return redirect('/admin/home')->with('success', 'Successfully Logged In');
            } else {
                Session::flash('error', 'Please enter a valid email and password');
                return redirect()->back();
            }
        }
    }
    public function chekemail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        if ($request) {

            return view('reset');
        }
    }
}
