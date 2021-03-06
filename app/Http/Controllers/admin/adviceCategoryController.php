<?php

namespace App\Http\Controllers\admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\Category;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class adviceCategoryController extends Controller
{
    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $this->data['title'] = "Lawyer Category";
        $auth = Auth::user();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
        $this->data['name'] = $name = $request->name;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['categorylist'] = adviceCategory::categorylist($name);
        return view('admin.advice_category.index', $this->data);
    }
    public function store(Request $request)
    {
        // return $request->all(); die;
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'name' => 'required',
            'discription' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("admin/adviceCategory")
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();

            $input['type'] = $request->type;
            $input['category_name'] = $request->name;
            $input['description'] = $request->discription;
            $input['status'] = '1';
            $type = $request->type;
            $input['slug'] = SlugHelper::slug($request->name, 'legal_advice_qa_category', $type);
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;

            $inser_id = new adviceCategory($input);
            $inser_id->save();
            $inser_id = $inser_id->id;


            if ($inser_id) {
                Session::flash('success', 'Lawyer category added successfully');
                return redirect('admin/adviceCategory');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function edit($id)
    {
        $this->data['data'] = adviceCategory::getrecordbyid($id);
        return view('admin.advice_category.edit', $this->data);
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'name' => 'required',
            'discription' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("admin/adviceCategory")
                ->withErrors($validator, 'category_error')
                ->withInput();
        } else {
            $auth = Auth::user();
            $input = $request->all();
            $input['type'] = $request->type;
            $input['category_name'] = $request->name;
            $input['description'] = $request->discription;
            $input['updated_at'] = date('Y-m-d H:i:s');
            $input['updated_by'] = $auth->id;

            $category = adviceCategory::find($id);
            $category->update($input);


            if ($category) {
                Session::flash('success', 'Lawyer category updated successfully.');
                return redirect('admin/adviceCategory');
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
        $delete = adviceCategory::where('id', $id)->update(['status' => '0', 'deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Lawyer category deleted successfully.');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
}
