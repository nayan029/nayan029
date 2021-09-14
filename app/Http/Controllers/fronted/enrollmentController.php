<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\adviceQuerys;
use App\Models\admin\blogs;
use App\Models\admin\guides;
use App\Models\admin\lawyercourt;
use App\Models\admin\lawyerenrollmentcatgeory;
use App\Models\admin\lawyerlanguages;
use App\Models\admin\setting;
use App\Models\admin\sitesetting;
use App\Models\admin\trends;
use App\Models\admin\webinar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use View;
use DB;

class enrollmentController extends Controller
{
    public function index(Request $request)
    {
        $auth = Auth::user();
        // return $request->all(); die();
        // $stepcount = $auth->step;
        $input = $request->all();

        $input['ldob'] = date('Y-m-d', strtotime($request->ldob));
        $input['location'] = "Delhi";
        // $input['court'] = $request->court;
        // $input['experience'] = $request->experience;
        // $input['finstitue'] = $request->finstitue;
        // $input['sinstitue'] = $request->sinstitue;
        // $input['tinstitue'] = $request->tinstitue;

        if ($request->lname) {
            $input['step'] = '1';
        }
        $input['updated_at'] = date('Y-m-d H:i:s');


        //lawyer image
        if ($request->hasfile('profileimage')) {
            $file = $request->file('profileimage');
            $name = $file->getClientOriginalName();
            $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
            $file->move(public_path() . '/uploads/lawyerprofile/', $name);
            // $input['blog_image'] = $name;
            // $input['step'] = '1';
            $input['profileimage'] = $name;
        }
        if ($request->hasfile('siganturepic')) {
            $file = $request->file('siganturepic');
            $name = $file->getClientOriginalName();
            $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
            $file->move(public_path() . '/uploads/signature/', $name);
            $input['step'] = '3';
            $input['siganturepic'] = $name;
        }
        $inputusersignature = User::find($auth->id);
        $inputusersignature->update($input);



        if ($request->about) {
            $about = $request->about;
            $input['step'] = '2';

            // $input['basic_fees'] = $request->basic_fees;
            $input['fees'] = $request->fees;
            $input['full_legal_fees'] = $request->full_legal;
            $inputuser = User::find($auth->id);
            $inputuser->update($input);
        }

        if ($request->court) {
            $delete = DB::table('lawyer_enrollment_court')->where('userid', $auth->id)->delete();
            foreach ($request->court as $courtdata) {
                $array = array('userid' => $auth->id, 'courtid' => $courtdata, 'created_at' => date('Y:m:d h:i:s'));

                $inser_id = new lawyercourt($array);
                $inser_id->save();

                $step['step'] = '2';
                $inputuser = User::find($auth->id);
                $inputuser->update($step);
            }
        }


        if ($request->category) {
            $delete = DB::table('lawyer_enrollment_category')->where('userid', $auth->id)->delete();
            foreach ($request->category as $categorydata) {
                $array = array('userid' => $auth->id, 'categoryid' => $categorydata, 'created_at' => date('Y:m:d h:i:s'));

                $inser_id = new lawyerenrollmentcatgeory($array);
                $inser_id->save();

                $step['step'] = '2';
                $inputuser = User::find($auth->id);
                $inputuser->update($step);
            }
        }

        if ($request->language) {
            $delete = DB::table('lawyer_languages')->where('userid', $auth->id)->delete();
            foreach ($request->language as $data) {
                $array = array('userid' => $auth->id, 'language' => $data, 'created_at' => date('Y:m:d h:i:s'));

                $inser_id = new lawyerlanguages($array);
                $inser_id->save();

                $step['step'] = '1';
                $inputuser = User::find($auth->id);
                $inputuser->update($step);
            }
        }

        if ($inputusersignature) {
            Session::flash('success', 'Profile successfully inserted');
            return redirect('/');
        }

        if ($inputuser) {
            Session::flash('success', 'Successfully Insert');
            return redirect('lawyer/enrollment');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
    }
}
