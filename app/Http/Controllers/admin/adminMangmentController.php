<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\sitesetting;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class adminMangmentController extends Controller
{
    public function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }

    public function index(Request $request)
    {
        $auth = Auth::user();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
        $this->data['name'] = $name = $request->name;
        $this->data['id'] = $id = $auth->id;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['getusers'] = User::getusers($name,$id);
        $this->data['title'] = "Admin Management";
        return view('admin/admin_mangment/index', $this->data);
    }
    public function show(Request $request)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['title'] = "Add Admin";
        return view('admin/admin_mangment/add', $this->data);
    }
    public function adminProfile(Request $request, $id)
    {
        // $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($id);
        $this->data['title'] = "Admin Profile";
        return view('admin/admin_mangment/adminProfile', $this->data);
    }
    // public function checkEmail(Request $request)
    // {
    //     // $request->email;
    //     $emailid = $request->email;
    //     // $auth = Auth::user();
    //     $email = User::getByemailWeb($emailid);
    //     if ($email != '') {
    //         echo 0;
    //     } else {
    //         echo 1;
    //     }
    // }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required',
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required '
        ]);


        if ($validator->fails()) {
            return redirect("/admin/addAdmin")
                ->withErrors($validator, 'add_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['mobile'] = $request->phone;
            $input['created_by'] = $auth->id;
            $input['user_type'] = 1;
            $input['password'] = Hash::make($request->password);
            $input['status'] = 1;


            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/profile/', $name);
                $input['photo'] = $name;
            }

            $user = User::create($input);

            if ($user) {
                Session::flash('success', 'Admin added successfully.');
                return redirect('/admin/manageAdmin');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function adminEdit(Request $request, $id)
    {
        $this->data['userdata'] = User::getrecordbyid($id);
        // $this->data['getusers'] = User::getusers();
        $this->data['title'] = "Edit Admin";
        return view('admin/admin_mangment/edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("/admin/manageAdmin")
                ->withErrors($validator, 'admin_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['mobile'] = $request->phone;
            $input['updated_at'] = date('Y-m-d H:i:s');

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/profile/', $name);
                $input['photo'] = $name;
            }

            $user = User::find($id);
            $user->update($input);

            if ($user) {
                Session::flash('success', 'Admin updated successfully');
                return redirect('/admin/manageAdmin');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect('/admin/manageAdmin');
            }
        }
    }
    public function destroy(Request $request, $id)
    {
        // $auth = Auth::user(); 
        $id  = $request->id;

        $delete = User::where('id', $id)->update(['deleted_by' => $id, 'status' => 0, 'deleted_at' => date('Y-m-d H:i:s')]);

        if ($delete) {
            Session::flash('success', 'Admin deleted successfully.');
            return redirect('/admin/manageAdmin');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect('/admin/manageAdmin');
        }
        return $delete;
    }

    public function check_admin_register_email(Request $request)
    {
        $email = $request->input('email');
        $status = '1';
        $isExists = User::where('email', $email)->first();
        // print_r($isExists);die;
        if ($isExists) {
            return response()->json(array("msg" => true));
        } else {
            return response()->json(array("msg" => false));
        }
    }

    public function check_admin_register_editEmail(Request $request)
    {

        $id = $request->get('editid');
        $email = $request->get('email');

        $query = User::where('id', '!=', $id)->where('email', '=', $email)->where('status', 1)->where('user_type', 1)->first();

        if (!empty($query)) {
            echo json_encode(array("count" => 0));
        } else {
            echo json_encode(array("count" => 1));
        }
    }
}
