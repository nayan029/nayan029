<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\blogs;
use App\Models\admin\setting;
use App\Models\admin\sitesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class settingController extends Controller
{
    function __construct()
    {
        $this->data['title'] = "Setings";
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index()
    {
        // echo "adda";die;
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['getsettings'] = setting::getsetings();
        // $this->data['title'] = "Blog Mangment";
        return view('admin/settings/index', $this->data);
    }
    public function update(Request $request)
    {
        // return $request->all();die;
        $validator = Validator::make($request->all(), [
            // 'marketing_name' => 'required',
            // 'marketing_email' => 'required',
            // 'marketing_phone' => 'required',
            
            // 'accountant_phone' => 'required',
            // 'accountant_name' => 'required',
            // 'accountant_email' => 'required',
            
            // 'hr_name' => 'required',
            // 'hr_email' => 'required',
            // 'hr_phone' => 'required',

            'opning_day'=> 'required',
            'opning_hours'=> 'required',
            'address'=> 'required',
            'support_email'=> 'required',
            'support_phone'=> 'required'

        ]);
        if ($validator->fails()) {
            return redirect("/admin/settings")
                ->withErrors($validator, 'setting_error')
                ->withInput();
        } else {
            $auth = Auth::user();
            $input = $request->all();
            // $input['blog_title'] = $request->title;
            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');


            $setting = setting::find($request->id);
            $setting->update($input);
            

            if ($setting) {
                Session::flash('success', 'Contact updated successfully');
                return redirect('admin/settings');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
}
