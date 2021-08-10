<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\adviceQuerys;
use App\Models\admin\blogs;
use App\Models\admin\Category;
use App\Models\admin\otherResource;
use App\Models\admin\otherResourceQueAns;
use App\Models\admin\sitesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Echo_;

class otherresourcesController extends Controller
{
    function __construct()
    {
        $this->data['title'] = "Other Resources";
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        // echo "adda";die;
        $auth = Auth::user();
        $this->data['name'] = $name = $request->name;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        // $this->data['resourcename'] = otherResourceQueAns::getresourcename();
        $this->data['getquerys'] = otherResource::getAllData($name);
        return view('admin/otherResources/index', $this->data);
    }
    function store(Request $request)
    {
        // return $request->all();die;
        $validator = Validator::make($request->all(), [
            'resourcename' => 'required',
            'question' => 'required',
            'answer' => 'required',
            // 'discription' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("/admin/other-resoureces")
                ->withErrors($validator, 'add_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();

            $input['category_fk'] = $request->resourcename;
            $input['question'] = $request->question;
            $input['answer'] = $request->answer;

            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;
            $input['status'] = 1;

            $query = otherResource::create($input);

            if ($query) {
                Session::flash('success', 'Other Resources added successfully');
                return redirect('/admin/other-resoureces');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function edit(Request $request, $id)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['categorylist'] = Category::getAllRecord();
        // $this->data['advicecategory'] = adviceCategory::getquestioncategorylist();
        $this->data['data'] = otherResource::getRecordById($id);
        return view('admin.otherResources.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'resourcename' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect("/admin//other-resoureces")
                ->withErrors($validator, 'query_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['category_fk'] = $request->resourcename;
            // $input['description'] = $request->discription;
            $input['question'] = $request->question;
            $input['answer'] = $request->answer;
            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');

            $query = otherResource::find($id);
            $query->update($input);

            if ($query) {
                Session::flash('success', 'Other Resources  updated successfully');
                return redirect('admin/other-resoureces');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function addResource(Request $request)
    {
        $auth = Auth::user();
        $this->data['categorylist'] = Category::getAllRecord();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['advicecategory'] = adviceCategory::getquestioncategorylist();
        return view('admin.otherResources.add', $this->data);
    }
    public function destroy($id)
    {
        $auth = Auth::user();
        $delete = otherResource::where('id', $id)->update(['deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Other Resources  deleted successfully.');
            return redirect('/admin/other-resoureces');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect('/admin/other-resoureces');
        }
        return $delete;
    }
}
