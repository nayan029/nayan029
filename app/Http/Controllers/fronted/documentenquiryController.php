<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\documentEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\enquiry;
use App\Models\admin\sitesetting;
use App\Models\admin\legalenquiry;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class documentenquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->data['title'] = 'Document Enquiry';
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        // $auth = Auth::user();
        // $this->data['getData'] = documentEnquiry::getContacts($name);
        // $this->data['userdata'] = User::getrecordbyid($auth->id);
        // return view('admin.document_enquiry.index', $this->data);
        $this->data['name'] = $name = $request->name;
        
        $auth = Auth::user();
        if (isset($auth)) {
            $uid = $auth->id;
            $this->data['userdata'] = User::getrecordbyid($uid);
            $this->data['title'] = "All Documentations";
            $this->data['getData'] = legalenquiry::loginUserDocumentlist($name);
            return view('admin.document_enquiry.index', $this->data);
        }
    }
    public function edit($id)
    {
        $this->data['data'] = enquiry::getrecordbyid($id);
        return view('admin.enquiry.edit', $this->data);
    }
    public function store(Request $request)
    {
        // return $request->all(); die;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            'doumnetid' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, '/')
                ->withInput();
        } else {

            $input = $request->all();
            $input['status'] = '1';
            $input['documnet_id'] = $request->doumnetid;
            $input['created_at'] = date('Y-m-d H:i:s');

            $inser_id = new documentEnquiry($input);
            $inser_id->save();
            $inser_id = $inser_id->id;
        }

        if ($inser_id) {
            Session::flash('success', 'Successfully Inserted');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
    }
    public function destroy(Request $request, $id)
    {

        $auth = Auth::user();
        if ($request->type == "delete") {
            $delete = legalenquiry::where('id', $id)->update(['deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        }
        /*staus change*/ else {
            $data = documentEnquiry::where('id', $id)->first();
            $status = 1;
            $statusname = "Activated";
            if ($data->status == 1) {
                $statusname = "Inactivated";
                $status = 0;
            }
            $delete = documentEnquiry::where('id', $id)->update(['status' => $status]);
        }
        if ($delete) {
            if ($request->type == "delete") {
                Session::flash('success', 'Document enquiry deleted successfully');
            } else {
                Session::flash('success', 'Successfully ' . $statusname);
            }
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;
    }
    public function uploaddocument(Request $request)
    {
        // return $request->all();  
        $auth = Auth::user();
        $validator = Validator::make($request->all(), [
            'document' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, '/admin/document-enquiry')
                ->withInput();
        } else {
            $id = $request->id;
            if ($request->hasfile('document')) {
                $file = $request->file('document');
                $name = $file->getClientOriginalName();
                $name = str_replace(" ", "", date("Ymdhis") + 1 . $name);
                $file->move(public_path() . '/uploads/legal_documents/', $name);
                $input = $name;
                $update = legalenquiry::where('id', $id)->update(['updated_by' => $auth->id, 'updated_at' => date('Y-m-d H:i:s'), 'document' => $input]);
            }
            Session::flash('success', 'Successfully Inserted');
            return redirect()->back();
        }
    }
}
