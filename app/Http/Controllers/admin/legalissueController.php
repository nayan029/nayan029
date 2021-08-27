<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\lawyerlanguages;
use App\Models\admin\legalissue;
use App\Models\admin\sitesetting;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class legalissueController extends Controller
{

    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $this->data['category'] = adviceCategory::getquestioncategorylist();
        $this->data['issuelist'] = legalissue::issuelist();
        $this->data['title'] = "Issue Mangment";
        return view('admin.legal_issue.index', $this->data);
    }
    public function store(Request $request,$id)
    {
        return $id;
        // return $request->all(); die;
        $validator = Validator::make($request->all(), [
            // 'service_id' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("admin/legal-issue")
                ->withErrors($validator, 'issue_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();

            $input['category_id'] = $id;
            $input['issue_name'] = $request->description;

            $input['status'] = '1';
            $input['created_at'] = date('d-m-Y H:i:s');
            $input['created_by'] = $auth->id;

            $inser_id = new legalissue($input);
            $inser_id->save();
            $inser_id = $inser_id->id;


            if ($inser_id) {
                Session::flash('success', 'Legal issue added successfully');
                return redirect('admin/legal-issue');
            } else {
                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function edit(Request $request, $id)
    {
        $this->data['category'] = adviceCategory::getquestioncategorylist();
        $this->data['data'] = legalissue::getrecordbyid($id);
        return view('admin.legal_issue.edit', $this->data);
    }
    public function show(Request $request)
    {
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['title'] = "Add Admin";
        return view('admin/admin_mangment/add', $this->data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'name' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect("admin/legal-issue")
                ->withErrors($validator, 'issue_error')
                ->withInput();
        } else {
            $auth = Auth::user();
            $input = $request->all();
            $input['category_id'] = $request->type;
            $input['issue_name'] = $request->name;
            $input['updated_at'] = date('Y-m-d H:i:s');
            $input['updated_by'] = $auth->id;

            $category = legalissue::find($id);
            $category->update($input);


            if ($category) {
                Session::flash('success', 'legal issue updated successfully.');
                return redirect('admin/legal-issue');
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
        $delete = legalissue::where('id', $id)->update(['status' => '0', 'deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Legal issue deleted successfully.');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
    public function test()
    {
        return "tre";
    }
}
