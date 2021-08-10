<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\sitesetting;
use App\Models\admin\webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class webinarMangementController extends Controller
{
    function __construct()
    {
        $this->data['title'] = "Webinar Management";
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        // echo "adda";die;
        $auth = Auth::user();
        $this->data['webinar_title'] = $title = $request->title;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['getwebinar'] = webinar::getwebinar($title);
        return view('admin/webinar_mengment/index', $this->data);
    }

    public function create()
    {
        // echo "adda";die;
        return view('admin/webinar_mengment/index', $this->data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("/admin/addwebinar")
                ->withErrors($validator, 'add_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['webinar_title'] = $request->title;
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;
            $input['status'] = 1;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/webinar/', $name);
                $input['webinar_image'] = $name;
            }

            $user = webinar::create($input);

            if ($user) {
                Session::flash('success', 'Webinar added successfully.');
                return redirect('/admin/webinar');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['title'] = "Edit webinar";
        $this->data['data'] = webinar::getrecordById($id);
        return view('admin.webinar_mengment.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect("/admin/webinar")
                ->withErrors($validator, 'blog_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['webinar_title'] = $request->title;
            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/webinar/', $name);
                $input['webinar_image'] = $name;
            }

            $blogs = webinar::find($id);
            $blogs->update($input);

            if ($blogs) {
                Session::flash('success', 'Webinar updated successfully ');
                return redirect('admin/webinar');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }


    public function destroy(Request $request, $id)
    {
        $id  = $request->id;
        $auth = Auth::user();
        $delete = webinar::where('id', $id)->update(['deleted_by' => $auth->id, 'status' => 0, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Webinar deleted Successfully.');
            return redirect('/admin/webinar');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect('/admin/Blog');
        }
        return $delete;
    }
    public function addwebinar(Request $request)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        // $this->data['getusers'] = User::getusers();
        $this->data['title'] = "Add Webinar";
        return view('admin/webinar_mengment/addwebinar', $this->data);
    }
}
