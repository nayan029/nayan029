<?php

namespace App\Http\Controllers\admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\Category;
use App\Models\admin\sitesetting;
use App\Models\User;
use App\Models\admin\MainLegalQueryType;
use App\Models\admin\MainLegalQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class queryCategoryController extends Controller
{
    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index()
    {
        $this->data['title'] = "Query Category";
        $auth = Auth::user();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        // $this->data['categorylist'] = adviceCategory::categorylist();
        $this->data['MainLegalQueryList'] = MainLegalQuery::getAllData();
        return view('admin.header_category.index', $this->data);
    }
    public function addLegalQuery(Request $request)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['mainLegalQueryType'] = MainLegalQueryType::mainLegalTypeList();

        return view('admin.header_category.add', $this->data);
    }
    public function store(Request $request)
    {
        // return $request->all(); die;
        $validator = Validator::make($request->all(), [
            'query_id' => 'required',
            'title' => 'required',
            'type' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("admin/query-category")
                ->withErrors($validator, 'profile_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();

            $input['legal_query_type_id'] = $request->query_id;
            $input['title'] = $request->title;
            $input['type_name'] = $request->type;
            $input['description'] = $request->description;
            $input['created_at'] = date('Y-m-d H:i:s');

            $inser_id = new MainLegalQuery($input);
            $inser_id->save();
            $inser_id = $inser_id->id;


            if ($inser_id) {
                Session::flash('success', 'Legal Query added successfully.');
                return redirect('admin/query-category');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    // public function edit($id)
    // {
    //     $this->data['data'] = adviceCategory::getrecordbyid($id);
    //     return view('admin.advice_category.edit', $this->data);
    // }
    public function edit(Request $request, $id)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['mainLegalQueryType'] = MainLegalQueryType::mainLegalTypeList();
        $this->data['data'] = MainLegalQuery::where('id', $id)->where('status', 1)->first();
        return view('admin.header_category.edit', $this->data);
    }


    public function updateLegalQuery(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'title' => 'required',
            'type' => 'required',

        ]);


        if ($validator->fails()) {
            return redirect("admin/query-category")
                ->withErrors($validator, 'profile_error')
                ->withInput();
        } else {
            $auth = Auth::user();
            $input = $request->all();

            $input['legal_query_type_id'] = $request->query_id;
            $input['title'] = $request->title;
            $input['type_name'] = $request->type;
            $input['description'] = $request->description;
            $input['updated_at'] = date('Y-m-d H:i:s');

            $category = MainLegalQuery::find($id);
            $category->update($input);


            if ($category) {
                Session::flash('success', 'Legal Query updated successfully.');
                return redirect('admin/query-category');
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
        $delete = MainLegalQuery::where('id', $id)->update(['status' => '0', 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Legal Query deleted successfully.');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
    public function show($id)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['servicename'] = adviceCategory::getAllCategory();
        $this->data['query_name'] = MainLegalQuery::getrecordById($id);
        // $this->data['catagory'] = legalservicecategory::getallcategory();
        // $this->data['sub_service_list'] = ServiceSubCategory::getBYServiceById($id);
        $this->data['title'] = "Add Details";
        $this->data['id'] = $id;
        return view('admin/header_category/adddetails', $this->data);

        // return "truye";
    }
    public function insertSubService(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $id = $request->subcatId;

        $insert_array = array(
            'service_id' => request('service_id'),
            'description' => request('description')
        );

        if (!empty($id)) {
            $update = ServiceSubCategory::where('id', $id)->update($insert_array);
            if ($update) {
                Session::flash('success', 'Legal services description updated successfully.');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
            }
            return redirect()->back();
        } else {
            $insert = ServiceSubCategory::insert($insert_array);
            if ($insert) {
                Session::flash('success', 'Legal services description insert successfully.');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
            }
            return redirect()->back();
        }
    }
}
