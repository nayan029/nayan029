<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\lawyerlanguages;
use App\Models\admin\sitesetting;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    public function edit()
    {
        // return "true";
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['title'] = "Edit Lawyer";
        return view('admin/lawyer_managment/edit', $this->data);
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
            $delete = User::where('id', $id)->update(['status' => $status,'email_verify'=>$status]);
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

        //   return  $this->data['userdata'] = User::getrecordbyid($id);  die;
        $this->data['userdata'] = User::getrecordbyid($id);
        $this->data['title'] = "Lawyera Profile";
        return view('admin/lawyer_managment/lawyerProfile', $this->data);
    }
}
