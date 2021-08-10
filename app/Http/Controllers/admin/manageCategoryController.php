<?php

namespace App\Http\Controllers\admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class manageCategoryController extends Controller
{
    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $this->data['title'] = "Category";
        $this->data['name'] = $name = $request->name;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['categorylist'] = Category::categorylist($name);
        return view('admin.category.index', $this->data);
    }
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("admin/manageCategory")
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();


            $input['status'] = '1';
            $input['slug'] = SlugHelper::otheResource($request->name, 'category');
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;

            $inser_id = new Category($input);
            $inser_id->save();
            $inser_id = $inser_id->id;


            if ($inser_id) {
                Session::flash('success', 'Category added successfully.');
                return redirect('admin/manageCategory');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function edit($id)
    {
        $this->data['data'] = Category::getrecordbyid($id);
        return view('admin.category.edit', $this->data);
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("admin/manageCategory")
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {
            $auth = Auth::user();
            $input = $request->all();
            $input['updated_at'] = date('Y-m-d H:i:s');
            $input['updated_by'] = $auth->id;

            $category = Category::find($id);
            $category->update($input);


            if ($category) {
                Session::flash('success', 'Category updated successfully.');
                return redirect('admin/manageCategory');
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
        $delete = Category::where('id', $id)->update(['status' => '0', 'deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Category deleted successfully.');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
}
