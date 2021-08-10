<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\adviceQuerys;
use App\Models\admin\blogs;
use App\Models\admin\sitesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Echo_;

class adviceQuerysController extends Controller
{
    function __construct()
    {
        $this->data['title'] = "Advice Querys";
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        // echo "adda";die;
        $auth = Auth::user();
        $this->data['name'] = $name = $request->name;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['getquerys'] = adviceQuerys::querylist($name);
        return view('admin/adviceQuerys/index', $this->data);
    }
    function store(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'question' => 'required',
            'details' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("/admin/adviceQuerys")
                ->withErrors($validator, 'add_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['category_id'] = $request->category_id;
            $input['question_details'] = $request->details;
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;
            $input['status'] = 1;

            $query = adviceQuerys::create($input);

            if ($query) {
                Session::flash('success', 'Advice Querys added successfully.');
                return redirect('/admin/adviceQuerys');
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
        $this->data['advicecategory'] = adviceCategory::getquestioncategorylist();
        $this->data['data'] = adviceQuerys::getrecordbyid($id);
        return view('admin.adviceQuerys.edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'question' => 'required',
            'details' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect("/admin/adviceQuerys")
                ->withErrors($validator, 'query_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['category_id'] = $request->category_id;
            $input['question_details'] = $request->details;
            $input['updated_by'] = $auth->id;
            $input['updated_at'] = date('Y-m-d H:i:s');

            $query = adviceQuerys::find($id);
            $query->update($input);

            if ($query) {
                Session::flash('success', 'Advice Querys updated successfully.');
                return redirect('admin/adviceQuerys');
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
        $delete = adviceQuerys::where('id', $id)->update(['deleted_by' => $auth->id, 'status' => 0, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Advice Querys deleted successfully.');
            return redirect('/admin/adviceQuerys');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect('/admin/adviceQuerys');
        }
        return $delete;
    }
}
