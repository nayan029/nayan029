<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\adviceQuerys;
use App\Models\admin\blogs;
use App\Models\admin\guides;
use App\Models\admin\sitesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Echo_;

class guidesarticlesController extends Controller
{
    function __construct()
    {
        $this->data['title'] = "Guides Articles";
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        // echo "adda";die;
        $auth = Auth::user();
        $this->data['name'] = $name = $request->name;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['getguides'] = guides::guideslist($name);
        return view('admin/guides_articles/index', $this->data);
    }
    function store(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'guide' => 'required',
            'image' => 'required',
            'details' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("/admin/guides-articles")
                ->withErrors($validator, 'add_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['category_id'] = $request->category_id;
            $input['guide'] = $request->guide;
            $input['guide_detail'] = $request->details;
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;
            $input['status'] = 1;

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/guides/', $name);
                $input['image'] = $name;
            }
            $query = guides::create($input);

            if ($query) {
                Session::flash('success', 'Guides Articles added successfully.');
                return redirect('/admin/guides-articles');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function show()
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['advicecategory'] = adviceCategory::getguidescategorylist();
        return view('admin/guides_articles/add', $this->data);
    }
    public function edit(Request $request, $id)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['advicecategory'] = adviceCategory::getguidescategorylist();
        $this->data['data'] = guides::getrecordbyid($id);
        return view('admin.guides_articles.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'guide' => 'required',
            // 'image' => 'required',
            'details' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect("/admin/guides-articles")
                ->withErrors($validator, 'query_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            
            $input['category_id'] = $request->category_id;
            $input['guide'] = $request->guide;
            $input['guide_detail'] = $request->details;
            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');
            
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/guides/', $name);
                $input['image'] = $name;
            }
            $query = guides::find($id);
            $query->update($input);

            if ($query) {
                Session::flash('success', 'Guides Articles updated successfully.');
                return redirect('admin/guides-articles');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function addQuerys(Request $request)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['advicecategory'] = adviceCategory::getquestioncategorylist();
        return view('admin.adviceQuerys.add', $this->data);
    }
    public function destroy(Request $request, $id)
    {
        $id  = $request->id;
        $auth = Auth::user();
        $delete = guides::where('id', $id)->update(['deleted_by' => $auth->id, 'status' => 0, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Guides Articles Deleted successfully.');
            return redirect('/admin/guides-articles');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect('/admin/guides-articles');
        }
        return $delete;
    }
}
