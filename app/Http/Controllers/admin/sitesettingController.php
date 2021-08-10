<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class sitesettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->data['title'] = 'Site Setting';
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $this->data['site_setting'] = sitesetting::getrecordbyid();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        return view('admin.site_settings.index', $this->data);
    }

    public function update(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("admin/site-settings")
                ->withErrors($validator, 'required-error')
                ->withInput();
        } else {
            $auth = Auth::user();
            $input = $request->all();
            $input['updated_at'] = date('Y-m-d H:i:s');
            $input['updated_by'] = $auth->id;

            if ($request->hasfile('logo')) {
                $file = $request->file('logo');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/logo/', $name);
                $input['logo'] = $name;
            }
            if ($request->hasfile('backend_logo')) {
                $file = $request->file('backend_logo');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/logo/', $name);
                $input['backend_logo'] = $name;
            }

            $sitesetting = sitesetting::find($request->id);
            $sitesetting->update($input);

            if ($sitesetting) {
                Session::flash('success', 'Successfully Updated');
                return redirect('admin/site-settings');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
}
