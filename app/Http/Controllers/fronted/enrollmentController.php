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
        // return $request->all(); die();
        $auth = Auth::user();
        $step = $auth->step;
        $steptwo = $auth->steptwo;
        $stepthree = $auth->stepthree;
        $input = $request->all();

        // $input['court'] = $request->court;
        // $input['experience'] = $request->experience;
        // $input['finstitue'] = $request->finstitue;
        // $input['sinstitue'] = $request->sinstitue;
        // $input['tinstitue'] = $request->tinstitue;

        if ($request->lname) {
            $input['ldob'] = date('Y-m-d H:i:s', strtotime($request->ldob));
            $input['location'] = "Delhi";
            $input['allotmentno'] = $request->allotment;
            $input['membershipno'] = $request->membership;
            $input['step'] = '1';
        }
        $input['updated_at'] = date('Y-m-d H:i:s');


        //lawyer image
        if ($request->hasfile('profileimage')) {
            $file = $request->file('profileimage');
            $name = $file->getClientOriginalName();
            $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
            $file->move(public_path() . '/uploads/lawyerprofile/', $name);
            $input['profileimage'] = $name;
        }
        if ($request->language) {
            $delete = DB::table('lawyer_languages')->where('userid', $auth->id)->delete();
            foreach ($request->language as $data) {
                // print_r($data); die();
                $array = array('userid' => $auth->id, 'language' => $data, 'created_at' => date('Y:m:d h:i:s'));

                $inser_id = new lawyerlanguages($array);
                $inser_id->save();

                // $step['step'] = '1';
                // $inputuser = User::find($auth->id);
                // $inputuser->update($step);
            }
        }
        $first = User::find($auth->id);
        $first->update($input);

        if ($request->about) {
            if ($step == 1) {
                // $about = $request->about;
                $inputa['steptwo'] = '1';
                $inputa['fees'] = $request->fees;
                $inputa['full_legal_fees'] = $request->full_legal;
                $inputuser = User::find($auth->id);
                $inputuser->update($inputa);
            } else {
                Session::flash('error', 'Sorry,Please fill personal information');
                return redirect()->back();
            }
        }

        if ($request->court) {

            $delete = DB::table('lawyer_enrollment_court')->where('userid', $auth->id)->delete();
            foreach ($request->court as $courtdata) {
                $array = array('userid' => $auth->id, 'courtid' => $courtdata, 'created_at' => date('Y:m:d h:i:s'));

                $inser_id = new lawyercourt($array);
                $inser_id->save();

                // $step['steptwo'] = '1';
                // $inputuser = User::find($auth->id);
                // $inputuser->update($step);
            }
        }


        if ($request->category) {
            $delete = DB::table('lawyer_enrollment_category')->where('userid', $auth->id)->delete();
            foreach ($request->category as $categorydata) {
                $array = array('userid' => $auth->id, 'categoryid' => $categorydata, 'created_at' => date('Y:m:d h:i:s'));

                $inser_id = new lawyerenrollmentcatgeory($array);
                $inser_id->save();

                // $step['steptwo'] = '1';
                // $inputuser = User::find($auth->id);
                // $inputuser->update($step);
            }
        }
        if ($request->hasfile('siganturepic')) {
                    if ($step == 1 && $steptwo == 1) {
                        $file = $request->file('siganturepic');
                        $name = $file->getClientOriginalName();
                        $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                        $file->move(public_path() . '/uploads/signature/', $name);
                        $inputs['stepthree'] = '1';
                        $inputs['siganturepic'] = $name;
                    } else {
                        Session::flash('error', 'Sorry, Please fill personal information and specialization');
                        return redirect()->back();
                    }
           
        }
        if (isset($request->siganturepic)) {
            $inputusersignature = User::find($auth->id);
            $inputusersignature->update($inputs);
        } else {
            $inputusersignature = User::find($auth->id);
            $inputusersignature->update($input);
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
