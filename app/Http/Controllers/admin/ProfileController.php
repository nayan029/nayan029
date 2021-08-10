<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->data['title'] = 'Profile';
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index()
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        return view('admin.profile', $this->data);
    }
    public function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("/admin/profile")
                ->withErrors($validator, 'profile_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['updated_at'] = date('Y-m-d H:i:s');

            if ($request->hasfile('profilepic')) {
                $file = $request->file('profilepic');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/profile/', $name);
                $input['photo'] = $name;
            }

            $user = User::find($auth->id);
            $user->update($input);

            if ($user) {
                Session::flash('success', 'Profile updated successfully.');
                return redirect('/admin/profile');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function checkOldPassword(Request $request)
    {
        $auth = Auth::user();
        $password = User::GetRecordByID($auth->id);

        if (Hash::check($request->old_password, $password->password)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function change_password(Request $request)
    {
        $auth = Auth::user();
        $password = User::getrecordbyid($auth->id);

        if (Hash::check($request->old_password, $password->password)) {

            $validator = Validator::make($request->all(), [
                'password' => 'required|same:confirm_password|min:8',
                'confirm_password' => 'required '
            ]);
            if ($validator->fails()) {
                return redirect("/admin/profile")
                    ->withErrors($validator, 'reset_password')
                    ->withInput();
            } else {

                $update_array = array('password' => Hash::make($request->password));

                $where = array('id' => $auth->id);
                $update =  User::where($where)->update($update_array);

                if ($update) {
                    Session::flash('success', 'Password changed successfully.');
                    return redirect('/admin/profile');
                } else {
                    Session::flash('error', 'Sorry, something went wrong. Please try again');
                    return redirect('error');
                    //  ->back();
                }
            }
        } else {
            Session::flash('error', 'Sorry, Old password does not match.');
            return redirect('errorlst');
            //  ->back();
        }
    }
}
