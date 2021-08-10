<?php

namespace App\Http\Controllers\fronted;
use App\Http\Controllers\Controller;
use App\Models\admin\sitesetting;

class lawyerforgotPasswordController extends Controller
{
    function __construct()
    {
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }

    public function index()
    {
        $this->data['title'] = "Lawyer Forgot Password";
        return view('fronted.forgotpassword');
    }
}