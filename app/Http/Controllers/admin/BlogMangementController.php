<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\blogs;
use App\Models\admin\sitesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogMangementController extends Controller
{
    function __construct()
    {
       $this->data['sitesetting'] = sitesetting::getrecordbyid();
        $this->data['title'] = "Blog Mangment";
    }
    public function index(Request $request)
    {
        // echo "adda";die;
        $auth = Auth::user();
        $this->data['blog_title'] = $title = $request->title;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['getblogs'] = blogs::getblogs($title);

        // $this->data['title'] = "Blog Mangment";
        return view('admin/blog_mangment/index', $this->data);
    }

    public function create()
    {
        // echo "adda";die;
        return view('admin/blog_mangment/index', $this->data);
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
            return redirect("/admin/addblog")
                ->withErrors($validator, 'add_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['blog_title'] = $request->title;
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;
            $input['status'] = 1;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/blogs/', $name);
                $input['blog_image'] = $name;
            }

            $user = blogs::create($input);

            if ($user) {
                Session::flash('success', 'Blog added successfully.');
                return redirect('/admin/Blog');
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
        $this->data['title'] = "Edit Blogs";
        $this->data['data'] = blogs::getrecordById($id);
        return view('admin.blog_mangment.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect("/admin/Blog")
                ->withErrors($validator, 'blog_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['blog_title'] = $request->title;
            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/blogs/', $name);
                $input['blog_image'] = $name;
            }

            $blogs = blogs::find($id);
            $blogs->update($input);

            if ($blogs) {
                Session::flash('success', 'Blog updated successfully.');
                return redirect('admin/Blog');
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
        $delete = blogs::where('id', $id)->update(['deleted_by' => $auth->id, 'status' => 0, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Blog deleted successfully.');
            return redirect('/admin/Blog');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect('/admin/Blog');
        }
        return $delete;
    }
    public function addBlog(Request $request)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        // $this->data['getusers'] = User::getusers();
        $this->data['title'] = "Add Blog";
        return view('admin/blog_mangment/addBlog', $this->data);
    }
}
