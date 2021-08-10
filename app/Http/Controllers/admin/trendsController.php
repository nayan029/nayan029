<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\sitesetting;
use App\Models\admin\trends;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class trendsController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = "Manage Trends";
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['trend_title'] = $title = $request->title;
        $this->data['trend_name'] = $name = $request->trend_name;
        $this->data['trends'] = trends::gettrends($title,$name);
        return view('admin.trends.index', $this->data);
    }
    public function edit(Request $request, $id)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['title'] = "Edit Trends";
        $this->data['data'] = trends::getrecordById($id);
        return view('admin.trends.edit', $this->data);
    }
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'trends' => 'required',
            'image' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin/addtrends")
                ->withErrors($validator, 'add_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['trend_title'] = $request->title;
            $input['trend_name'] = $request->trends;
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;
            $input['status'] = 1;
            $input['trend_likes'] = 1;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/trends/', $name);
                $input['trend_image'] = $name;
            }

            $user = trends::create($input);

            if ($user) {
                Session::flash('success', 'Trends added successfully.');
                return redirect('/admin/trends');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function update(Request $request, $id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'trends' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect("/admin/trends")
                ->withErrors($validator, 'trend_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['trend_title'] = $request->title;
            $input['trend_name'] = $request->trends;
            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');
            $input['trend_likes'] = "1";
            $input['status'] = "1";

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/trends/', $name);
                $input['trend_image'] = $name;
            }

            $trends = trends::find($id);
            $trends->update($input);

            if ($trends) {
                Session::flash('success', 'Trends updated successfully.');
                return redirect('admin/trends');
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
        $delete = trends::where('id', $id)->update(['status' => '0', 'deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Trends deleted successfully.');
            return redirect('admin/trends');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect('admin/trends');
        }
        return $delete;
    }
    public function addtrends(Request $request)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        return view('admin.trends.addtrend', $this->data);
    }
}
