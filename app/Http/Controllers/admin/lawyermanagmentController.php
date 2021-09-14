<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\court;
use App\Models\admin\lawyercourt;
use App\Models\admin\lawyerenrollmentcatgeory;
use App\Models\admin\lawyerlanguages;
use App\Models\admin\sitesetting;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class lawyermanagmentController extends Controller
{

    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $this->data['name'] = $name = $request->name;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['getlawyer'] = User::getlawyertdata($name);
        $this->data['title'] = "Lawyer Mangment";
        return view('admin/lawyer_managment/index', $this->data);
    }
    public function edit($id)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['lawyerdata'] = User::getrecordbyid($id);
        $this->data['court'] = court::getAllRecord();
        $this->data['category'] = adviceCategory::getquestioncategorylist();
        $this->data['user_category'] = lawyerenrollmentcatgeory::getDataById($id)->pluck('categoryid')->toArray();
        $this->data['user_court'] = lawyercourt::getrecordbyid($id)->pluck('courtid')->toArray();
        $this->data['user_language'] = lawyerlanguages::getrecordbyid($id)->pluck('language')->toArray();

        $this->data['title'] = "Edit Lawyer";
        return view('admin/lawyer_managment/edit', $this->data);
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
            return redirect("/admin/manage-lawyer")
                ->withErrors($validator, 'edit_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();

            $input['experience'] = $request->experience;
            $input['about'] = $request->about;
            $input['ldob'] = $request->ldob;
            $input['frollno'] = $request->degreename;
            $input['fyear'] = $request->year;
            $input['finstitue'] = $request->institution;
            $input['srollno'] = $request->sdegreename;
            $input['syear'] = $request->syear;
            $input['sinstitue'] = $request->sinstitution;

            $input['basic_fees'] = $request->price;
            $input['fees'] = $request->fees;
            $input['full_legal_fees'] = $request->fullprice;




            if ($request->about) {
                $about = $request->about;

                $inputuser = User::find($id);
                $inputuser->update($input);
            }

            if ($request->court) {
                $delete = DB::table('lawyer_enrollment_court')->where('userid', $id)->delete();
                foreach ($request->court as $courtdata) {
                    $array = array('userid' => $id, 'courtid' => $courtdata, 'created_at' => date('Y:m:d h:i:s'), 'updated_at' => date('Y:m:d h:i:s'));

                    $inser_id = new lawyercourt($array);
                    $inser_id->save();
                }
            }


            if ($request->category) {
                $delete = DB::table('lawyer_enrollment_category')->where('userid', $id)->delete();
                foreach ($request->category as $categorydata) {
                    $array = array('userid' => $id, 'categoryid' => $categorydata, 'created_at' => date('Y:m:d h:i:s'), 'updated_at' => date('Y:m:d h:i:s'));

                    $inser_id = new lawyerenrollmentcatgeory($array);
                    $inser_id->save();
                }
            }

            if ($request->language) {
                $delete = DB::table('lawyer_languages')->where('userid', $id)->delete();
                foreach ($request->language as $data) {
                    $array = array('userid' => $id, 'language' => $data, 'created_at' => date('Y:m:d h:i:s'), 'updated_at' => date('Y:m:d h:i:s'));

                    $inser_id = new lawyerlanguages($array);
                    $inser_id->save();
                }
            }

            if ($request->hasfile('profileimage')) {
                $file = $request->file('profileimage');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/lawyerprofile/', $name);
                // $input['blog_image'] = $name;
                // $input['step'] = '1';
                $input['profileimage'] = $name;
            }

            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');

            $updateform = User::find($id);
            $updateform->update($input);

            if ($updateform) {
                Session::flash('success', 'Profile updated successfully.');
                return redirect('/admin/manage-lawyer');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function show(Request $request)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['title'] = "Add Admin";
        return view('admin/admin_mangment/add', $this->data);
    }
    public function destroy(Request $request, $id)
    {
        /*Delete record*/
        $auth = Auth::user();
        if ($request->type == "delete") {
            $delete = User::where('id', $id)->update(['deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        }
        /*staus change*/ else {
            $data = User::where('id', $id)->first();
            $status = 1;
            $statusname = "Activated";
            if ($data->status == 1) {
                $statusname = "Inactivated";
                $status = 0;
            }
            $delete = User::where('id', $id)->update(['status' => $status, 'email_verify' => $status]);
        }
        if ($delete) {
            if ($request->type == "delete") {
                Session::flash('success', 'Lawyer deleted successfully.');
            } else {
                Session::flash('success', 'Successfully ' . $statusname);
            }
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
    public function lawyerProfile(Request $request, $id)
    {
        $auth = Auth::user();
        $this->data['userlanguages'] = lawyerlanguages::getrecordbyid($id);
        $this->data['user_court'] = lawyercourt::getrecordenrollmentbyid($id);

         $this->data['user_category'] = lawyerenrollmentcatgeory::getrecordenrollmentbyid($id);
        //   return  $this->data['userdata'] = User::getrecordbyid($id);  die;

        $this->data['userdata'] = User::getrecordbyid($id);
        $this->data['title'] = "Lawyera Profile";
        return view('admin/lawyer_managment/lawyerProfile', $this->data);
    }
    public function showLawyer(Request $request, $id)
    {
        // return $request->all();
        $data = User::where('id', $id)->first();
        $status = 1;
        $statusname = "Show";
        if ($data->show_lawyer == 1) {
            $statusname = "Hide";
            $status = 0;
        }
        $delete = User::where('id', $id)->update(['show_lawyer' => $status]);

        if ($delete) {
            Session::flash('success', 'Successfully ' . $statusname . "Lawyer");
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
}
