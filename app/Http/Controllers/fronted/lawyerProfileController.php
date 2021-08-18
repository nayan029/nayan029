<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\court;
use App\Models\admin\lawyerenrollmentcatgeory;
use Illuminate\Http\Request;
use App\Models\admin\lawyerlanguages;
use App\Models\admin\location;
use App\Models\admin\reviewrating;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class lawyerProfileController extends Controller
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
        $id = $auth->id;
        $this->data['lawyer_review'] = reviewrating::getrecordbylawyeridlimit($id);
        $this->data['userlanguages'] = lawyerlanguages::getrecordbyid($id);
        $this->data['specialization'] = lawyerenrollmentcatgeory::getrecordenrollmentbyid($id);
        $this->data['lawyerData'] = User::getrecordbyid($id);
        return view('fronted.lawyerprofile', $this->data);
    }
    public function update(Request $request, $id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'experience' => 'required',
            'location' => 'required',
            'court' => 'required',
            'language' => 'required',
            'about' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect("/lawyer/edit-profile")
                ->withErrors($validator, 'edit_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['experience'] = $request->experience;
            $input['location'] = $request->location;

            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');


            $blogs = User::find($id);
            $blogs->update($input);

            if ($blogs) {
                Session::flash('success', 'Profile updated successfully.');
                return redirect('/lawyer/edit-profile');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
}
