<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\sitesetting;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class customerManagmentController extends Controller
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
        $this->data['getusers'] = User::getcustdata($name);
        $this->data['title'] = "Customer Mangment";
       
        DB::table('users')->where('user_type','2')->update(array('notification' => 1));
        return view('admin/customer_manegment/index', $this->data);
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
                Session::flash('success', 'Customer deleted successfully.');
            } else {
                Session::flash('success', 'Successfully ' . $statusname);
            }
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
}
