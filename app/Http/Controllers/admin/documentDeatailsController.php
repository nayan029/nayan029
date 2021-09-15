<?php

namespace App\Http\Controllers\admin;

use App\Helpers\SlugHelper;
use App\Http\Controllers\Controller;
use App\Models\admin\documentDetails;
use App\Models\admin\sitesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class documentDeatailsController extends Controller
{
    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index()
    {
        $this->data['title'] = "Document  Details";
        $this->data['allDetails'] = documentDetails::getallDetails();
        return view('admin/document_deatails/index', $this->data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect("/admin/document-deatils")
                ->withErrors($validator, 'document-error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['created_at'] = date('Y-m-d H:i:s');
            $input['created_by'] = $auth->id;
            $input['type'] = $request->type;
            $input['title'] = $request->title;
            $input['slug'] = SlugHelper::otheResource($request->title, 'document_deatils');

            $input['description'] = $request->description;


            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/document_image/', $name);
                $input['image'] = $name;
            }

            $user = documentDetails::create($input);

            if ($user) {
                Session::flash('success', 'Document deatils added successfully.');
                return redirect('/admin/document-deatils');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function addDetails()
    {
        $this->data['title'] = "Add Document  Details";
        return view('admin/document_deatails/add', $this->data);
    }
    public function show($id)
    {
        $this->data['detailsData'] = documentDetails::getRecordById($id)->first();
        $this->data['title'] = "Edit Details";
        return view('admin/document_deatails/edit', $this->data);
    }
    public function update(Request $request, $id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'title' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect("/admin/document-deatils")
                ->withErrors($validator, 'document-error')
                ->withInput();
        } else {

            $auth = Auth::user();
            $input = $request->all();
            $input['updated_at'] = date('Y-m-d H:i:s');
            $input['updated_by'] = $auth->id;
            $input['type'] = $request->type;
            $input['title'] = $request->title;
            $input['slug'] = SlugHelper::otheResource($request->title, 'document_deatils');

            $input['description'] = $request->description;


            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/document_image/', $name);
                $input['image'] = $name;
            }

            $update = documentDetails::find($id);
            $update->update($input);

            if ($update) {
                Session::flash('success', 'Document deatils update successfully.');
                return redirect('/admin/document-deatils');
            } else {

                Session::flash('error', 'Sorry, something went wrong. Please try again');
                return redirect()->back();
            }
        }
    }
    public function destroy($id)
    {
        $auth = Auth::user();
        $deletedby = $auth->id;
        $delete = documentDetails::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s'), 'deleted_by' => $deletedby]);
        if ($delete) {
            Session::flash('success', 'Details deleted successfully.');
            return "1";
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
    }
}
