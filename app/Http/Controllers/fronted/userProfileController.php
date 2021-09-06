<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\court;
use App\Models\admin\lawyercourt;
use App\Models\admin\lawyerenrollmentcatgeory;
use Illuminate\Http\Request;
use App\Models\admin\lawyerlanguages;
use App\Models\admin\location;
use App\Models\admin\reviewrating;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class userProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->data['city'] = location::getAllRecord();
        $this->data['title'] = 'Lawyer Profile';
        $this->data['court'] = court::getAllRecord();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        if (isset($auth)) {
            $this->data['user_login'] = $auth;
            return view('fronted.userProfile', $this->data);
        } else {
            return view('fronted.customer_login', $this->data);
        }
    }

    public function store(Request $request)
    {
        // return $request->all();

        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect("/my-profile")
                ->withErrors($validator, 'edit_error')
                ->withInput();
        } else {
            $auth = Auth::user();
            $input = $request->all();

            $input['name'] = $request->firstname;
            $input['username'] = $request->lastname;

            if ($request->profilepic) {
                $file = $request->profilepic;
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/userprofile/', $name);

                $input['profileimage'] = $name;

                $updateimg = User::find($auth->id);
                $updateimg->update($input);
            }


            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');

            $updateform = User::find($auth->id);
            $updateform->update($input);

            if ($updateform) {
                Session::flash('success', 'Profile updated successfully.');
                return redirect('/my-profile');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
}
