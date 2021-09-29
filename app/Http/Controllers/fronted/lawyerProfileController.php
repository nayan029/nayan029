<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\court;
use App\Models\admin\lawyercourt;
use App\Models\admin\lawyerenrollmentcatgeory;
use Illuminate\Http\Request;
use App\Models\admin\lawyerlanguages;
use App\Models\admin\legalenquiry;
use App\Models\admin\location;
use App\Models\admin\reviewrating;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
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
        if ($auth) {
            $id = $auth->id;
            $this->data['lawyer_review'] = reviewrating::getrecordbylawyeridlimit($id);
            $this->data['userlanguages'] = lawyerlanguages::getrecordbyid($id);
            $this->data['specialization'] = lawyerenrollmentcatgeory::getrecordenrollmentbyid($id);
            $this->data['lawyerData'] = User::getrecordbyid($id);
            return view('fronted.lawyerprofile', $this->data);
        } else {
            return redirect('/login');
        }
    }
    public function update(Request $request, $id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'experience' => 'required',
            'court' => 'required',
            'language' => 'required',
            'category' => 'required',
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

            $input['basic_fees'] = $request->basic_fees;
            $input['fees'] = $request->fees;
            $input['full_legal_fees'] = $request->full_legal;

            $input['price'] = $request->price;

            $input['frollno'] = $request->degreename;
            $input['fyear'] = $request->year;
            $input['finstitue'] = $request->institution;
            $input['srollno'] = $request->sdegreename;
            $input['syear'] = $request->syear;
            $input['sinstitue'] = $request->sinstitution;

            $input['allotmentno'] = $request->allotment;
            $input['membershipno'] = $request->membership;


            // $input['location'] = $request->location;


            if ($request->about) {
                $about = $request->about;

                $inputuser = User::find($auth->id);
                $inputuser->update($input);
            }

            if ($request->court) {
                $delete = DB::table('lawyer_enrollment_court')->where('userid', $auth->id)->delete();
                foreach ($request->court as $courtdata) {
                    $array = array('userid' => $auth->id, 'courtid' => $courtdata, 'created_at' => date('Y:m:d h:i:s'), 'updated_at' => date('Y:m:d h:i:s'));

                    $inser_id = new lawyercourt($array);
                    $inser_id->save();

                    // $inputuser = User::find($auth->id);
                    // $inputuser->update($step);
                }
            }


            if ($request->category) {
                $delete = DB::table('lawyer_enrollment_category')->where('userid', $auth->id)->delete();
                foreach ($request->category as $categorydata) {
                    $array = array('userid' => $auth->id, 'categoryid' => $categorydata, 'created_at' => date('Y:m:d h:i:s'), 'updated_at' => date('Y:m:d h:i:s'));

                    $inser_id = new lawyerenrollmentcatgeory($array);
                    $inser_id->save();

                    // $step['step'] = '2';
                    // $inputuser = User::find($auth->id);
                    // $inputuser->update($step);
                }
            }

            if ($request->language) {
                $delete = DB::table('lawyer_languages')->where('userid', $auth->id)->delete();
                foreach ($request->language as $data) {
                    $array = array('userid' => $auth->id, 'language' => $data, 'created_at' => date('Y:m:d h:i:s'), 'updated_at' => date('Y:m:d h:i:s'));

                    $inser_id = new lawyerlanguages($array);
                    $inser_id->save();

                    // $step['step'] = '1';
                    // $inputuser = User::find($auth->id);
                    // $inputuser->update($step);
                }
            }

            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');

            $updateform = User::find($id);
            $updateform->update($input);

            if ($updateform) {
                Session::flash('success', 'Profile updated successfully.');
                return redirect('/lawyer/edit-profile');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function updateImage(Request $request)
    {

        $id = $request->id;
        //$file = $request->image;
        // $file = $request->file('file');
        // print_r($file->getClientOriginalName());        die();
        // return "trur";
        if ($request->hasfile('file')) {
            // return $id;
            $file = $request->file('file');

            $name = $file->getClientOriginalName();
            $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
            $file->move(public_path() . '/uploads/lawyerprofile/', $name);

            $input['profileimage'] = $name;
            // return $id;
            $inputusersignature = User::find($id);

            // return $inputusersignature;

            $inputusersignature->update($input);
        }

        if ($inputusersignature) {
            Session::flash('success', 'Profile updated successfully.');
            return redirect('/lawyer/edit-profile');
        } else {

            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
        // return response()->json(['error' => 'Image Update']);




        // if ($request->image) {
        //     $file = $request->image;
        //     $name = $file->getClientOriginalName();
        //     $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
        //     $file->move(public_path() . '/uploads/lawyerprofile/', $name);

        //     $input['profileimage'] = $name;

        //     $inputusersignature = User::find($request->id);
        //     $inputusersignature->update($input);
        // }

    }

    public function lawyerProfile($sid, $id)
    {
        $auth = Auth::user();
        $uid = $auth->id;
        $decryptid = Crypt::decrypt($id);
        $this->data['user_login'] = $auth;
        $this->data['title'] = "My Account";
        $this->data['bid'] = $sid;
        $this->data['userlanguages'] = lawyerlanguages::getrecordbyid($decryptid);
        $this->data['lawyer_review'] = $lawyer_review =  reviewrating::getrecordbylawyerid($decryptid);
        $this->data['review_bid'] = reviewrating::getRecordByOrderId($sid);
        $this->data['specialization'] = lawyerenrollmentcatgeory::getrecordenrollmentbyid($decryptid);

        $this->data['review_check'] = $review = reviewrating::getAvgRating($decryptid);
        $creview =  count($review);
        if ($creview > 0) {
            $this->data['review'] = $review = reviewrating::getAvgRating($decryptid);
        } else {
            $this->data['review'] = "";
        }
        // print_r(round($this->data['review'][0]->rating, 1));

        if (isset($decryptid)) {

            $this->data['lawyerData'] =  User::getrecordbyid($decryptid);

            $user_id = $uid;

            return view('fronted.lawyerProfileNew', $this->data);
        } else {
            Session::flash('error', 'Sorry, please try again');
            return redirect()->back();
        }
    }
}
