<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\contactInquiry;
use App\Models\admin\freeQuestions;
use App\Models\admin\legalenquiry;
use App\Models\admin\sitesetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class freeQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        // $this->middleware('CheckEmailVerify');
        $this->data['title'] = 'Free Questions';
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $this->data['name'] = $name = $request->name;
        $this->data['quetion_list'] = freeQuestions::getAllQuestions($name);
        $this->data['userdata'] = User::getrecordbyid($auth->id);
        return view('admin.freeQuestions.index', $this->data);
    }
    public function show($id)
    {
        $this->data['data'] = freeQuestions::getQuestionById($id);
        return view('admin.freeQuestions.edit', $this->data);
    }
    public function destroy(Request $request, $id)
    {
        $delete = freeQuestions::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        if ($delete) {
            Session::flash('success', 'Free Question deleted successfully.');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sorry, something went wrong. Please try again');
            return redirect()->back();
        }
        // return $delete;

    }
}
