<?php

namespace App\Http\Controllers\admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\admin\location;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class managelocationController extends Controller
{
    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $this->data['title'] = "Manage Location";
        $this->data['name'] = $name = $request->name;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['locationlist'] = location::locationlist($name);
        return view('admin.location.index', $this->data);   
    }
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("admin/manage-location")
                ->withErrors($validator, 'lcoation_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();


            $input['status'] = '1';
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;

            $inser_id = new location($input);
            $inser_id->save();
            $inser_id = $inser_id->id;


            if ($inser_id) {
                Session::flash('success', 'location added successfully.');
                return redirect('admin/manage-location');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function edit($id)
    {
        $this->data['data'] = location::getrecordbyid($id);
        return view('admin.location.edit', $this->data);
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("admin/manage-location")
                ->withErrors($validator, 'location_error')
                ->withInput();
        } else {
            $auth = Auth::user();
            $input = $request->all();
            $input['updated_at'] = date('Y-m-d H:i:s');
            $input['updated_by'] = $auth->id;

            $location = location::find($id);
            $location->update($input);


            if ($location) {
                Session::flash('success', 'location updated successfully.');
                return redirect('admin/manage-location');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function destroy(Request $request, $id)
    {
        /*Record Delete*/
        $auth = Auth::user();
        $delete = location::where('id', $id)->update(['status' => '0', 'deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'location deleted successfully.');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
}
