<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\contactInquiry;
use App\Models\admin\court;
use App\Models\admin\freeQuestions;
use App\Models\admin\location;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class askFreeQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        // $this->middleware('CheckEmailVerify');
        $this->data['title'] = 'Ask Free Questions';
        $this->data['court'] = court::getAllRecord();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $this->data['category'] = adviceCategory::getquestioncategorylist();
        $this->data['city'] = location::getAllRecord();
        return view('fronted.askFreeQuestion', $this->data);
    }
    public function store(Request $request)
    {
        // return $request->all();die;
        $validator = Validator::make($request->all(), [
            'lawarea' => 'required',
            // 'city' => 'required',
            'subject' => 'required',
            'short_description' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect("ask-a-free-question")
                ->withErrors($validator, 'ask-a-free-question')
                ->withInput();
        } else {
            
            $auth = Auth::user();
            if ($auth) {
                $user_id = $auth->id;
                $input['user_id'] = $user_id;
            }

            $input['lawarea'] = $request->lawarea;
            // $input['city'] = $request->city;
            $input['subject'] = $request->subject;
            $input['short_description'] = $request->short_description;
            $input['name'] = $request->name;
            $input['mobile'] = $request->mobile;
            $input['email'] = $request->email;
            

            $input['created_at'] = date('Y-m-d H:i:s');


            $inser_id = new freeQuestions($input);
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
        $delete = freeQuestions::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Successfully Deleted');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
    }
}
