<?php

namespace App\Http\Controllers\admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\legalissue;
use App\Models\admin\legalservicecategory;
use App\Models\admin\legalservices;
use App\Models\admin\sitesetting;
use App\Models\admin\webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\admin\ServiceSubCategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class legalserviceController extends Controller
{
    function __construct()
    {
        $this->data['title'] = "Legal Service";
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        // echo "adda";die;
        $auth = Auth::user();
        $this->data['service_title'] = $title = $request->title;
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['getservices'] = legalservices::getservices($title);
        return view('admin/manage_legalservice/index', $this->data);
    }

    public function create()
    {
        // echo "adda";die;
        return view('admin/webinar_mengment/index', $this->data);
    }

    public function store(Request $request)
    {
        // return $request->all();
        // die();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'service_title' => 'required',
            'short_description' => 'required',
            'image' => 'required',
            // 'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/admin/error")
                ->withErrors($validator, 'add_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['service_name'] = $request->name;
            $input['category_id'] = $request->category_id;
            $input['rating'] = "1";
            $input['service_title'] = $request->service_title;
            $input['short_discription'] = $request->short_description;
            // $input['discription'] = $request->description;


            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/fronted/image/', $name);
                $input['image'] = $name;
            }

            $input['status'] = 1;
            $name = $request->name;
            $input['slug'] = SlugHelper::serviceslug($request->name, 'legal_services', $name);


            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;



            $user = legalservices::create($input);


            /* issue add description */

            // if ($request->description) {
            //     $input = $request->all();

            //     $input['category_id'] = $request->name;
            //     $input['issue_name'] = $request->description;

            //     $input['status'] = '1';
            //     $input['created_at'] = date('d-m-Y H:i:s');
            //     $input['created_by'] = $auth->id;

            //     $inser_id = new legalissue($input);
            //     $inser_id->save();
            // }

            /* issue add description */

            if ($user) {
                Session::flash('success', 'Legal services added successfully.');
                return redirect('/admin/legal-services');
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
        $this->data['servicename'] = adviceCategory::getAllCategory();
        $this->data['catagory'] = legalservicecategory::getallcategory();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['title'] = "Edit Services";
        $this->data['data'] = legalservices::getrecordById($id);
        return view('admin.manage_legalservice.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        // die();
        $validator = Validator::make($request->all(), [
            'service_name' => 'required',
            'service_title' => 'required',
            'short_description' => 'required',
            'category' => 'required',
            // 'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect("/admin/legal-services")
                ->withErrors($validator, 'service_error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['service_name'] = $request->service_name;
            $input['service_title'] = $request->service_title;
            $input['category_id'] = $request->category;
            $input['updated_by'] = $auth->id;

            if ($request->service_name) {
                $name = $request->service_name;
                // $input['slug'] = SlugHelper::serviceslug($request->service_name, 'legal_services', $name);
            }
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/fronted/image/', $name);
                $input['image'] = $name;
            }

            $input['updated_at'] = date('Y-m-d H:i:s');

            $services = legalservices::find($id);
            $services->update($input);

            if ($services) {
                Session::flash('success', 'Legal services updated successfully.');
                return redirect('admin/legal-services');
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
        $delete = legalservices::where('id', $id)->update(['deleted_by' => $auth->id, 'status' => 0, 'deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Legal services deleted successfully.');
            return redirect('/admin/legal-services');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect('/admin/legal-services');
        }
        return $delete;
    }
    public function addService(Request $request)
    {
        $this->data['servicename'] = adviceCategory::getAllCategory();
        $this->data['catagory'] = legalservicecategory::getallcategory();
        $auth = Auth::user();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        // $this->data['getusers'] = User::getusers();
        $this->data['title'] = "Add Service";
        return view('admin/manage_legalservice/add', $this->data);
    }
    public function addDetils($id)
    {
        $auth = Auth::user();
        $this->data['servicename'] = adviceCategory::getAllCategory();
        $this->data['catagory'] = legalservicecategory::getallcategory();
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        $this->data['service_name'] = legalservices::getrecordById($id);
        $this->data['sub_service_list'] = ServiceSubCategory::getBYServiceById($id);
        $this->data['title'] = "Add Details";
        $this->data['id'] = $id;
        return view('admin/manage_legalservice/adddetails', $this->data);
    }

    public function insertSubService(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $insert_array = array(
            'service_id' => request('service_id'),
            'description' => request('description')
        );

        $insert = ServiceSubCategory::insert($insert_array);
        if ($insert) {
            Session::flash('success', 'Legal services category insert successfully.');
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }

        return redirect()->back();
    }
}
