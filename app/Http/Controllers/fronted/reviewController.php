<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\contactInquiry;
use App\Models\admin\court;
use App\Models\admin\location;
use App\Models\admin\reviewrating;
use App\Models\admin\sitesetting;
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
        $this->data['title'] = 'Review Rating';
        $this->data['allreviews'] = reviewrating::getAllRecord();
        $this->data['court'] = court::getAllRecord();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $this->data['allreviews'] = reviewrating::getAllRecord();
        return view('admin.review_rating.index', $this->data);
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

        /*Delete record*/
        $auth = Auth::user();
        if ($request->type == "delete") {
            $delete = reviewrating::where('id', $id)->update(['deleted_by' => $auth->id, 'deleted_at' => date('Y-m-d H:i:s')]);
        }
        /*staus change*/ else {
            $data = reviewrating::where('id', $id)->first();
            $status = 1;
            $statusname = "Activated";
            if ($data->status == 1) {
                $statusname = "Inactivated";
                $status = 0;
            }
            $delete = reviewrating::where('id', $id)->update(['status' => $status]);
        }
        if ($delete) {
            if ($request->type == "delete") {
                Session::flash('success', 'Successfully Deleted');
            } else {
                Session::flash('success', 'Successfully ' . $statusname);
            }
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
        }
        return $delete;

        // $delete = reviewrating::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        // if ($delete) {
        //     Session::flash('success', 'Successfully Deleted');
        //     return redirect()->back();
        // } else {
        //     Session::flash('error', 'Sorry, something went wrong. Please try again');
        //     return redirect()->back();
        // }
        // return $delete;

    }
    public function allReviews($id)
    {
        $this->data['city'] = location::getAllRecord();
        // $this->data['allreviews'] = reviewrating::getrecordbylawyerid($id);
        $this->data['allreviews'] = reviewrating::getAllRecord();
        return view('fronted.allReviews', $this->data);
    }
}
