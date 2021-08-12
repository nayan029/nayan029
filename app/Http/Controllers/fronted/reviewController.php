<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\contactInquiry;
use App\Models\admin\reviewrating;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class reviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        // $this->middleware('CheckEmailVerify');
        $this->data['title'] = 'Review';
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
      
    }
    public function store(Request $request)
    {
        // return $request->all();   die;
        $validator = Validator::make($request->all(), [
            'review' => 'required',
            'rating2' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/")
                ->withErrors($validator, '/')
                ->withInput();
        } else {

            $input = $request->all();
            $input['review'] = $request->review;
            $input['rating'] = $request->rating2;
            $input['user_name'] = $request->user_name;
            $input['user_id'] = $request->user_id;
            $input['lawyer_id'] = $request->lawyer_id;
            $input['created_at'] = date('Y-m-d H:i:s');


            $inser_id = new reviewrating($input);
            $inser_id->save();
            $inser_id = $inser_id->id;
        }

        if ($inser_id) {
            Session::flash('success', 'Successfully Inserted');
            // return redirect('products');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
    }
    public function destroy(Request $request, $id)
    {
        $delete = contactInquiry::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Successfully Deleted');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
        // return $delete;

    }
}
