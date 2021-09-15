<?php

namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\court;
use App\Models\admin\legalservices;
use App\Models\admin\location;
use App\Models\admin\ServiceSubCategory;
use App\Models\admin\sitesetting;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class findLawyer extends Controller
{
    public function __construct()
    {
        $this->data['title'] = " ";
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
        $this->data['court'] = court::getAllRecord();
    }
    public function index(Request $request)
    {
        $slug = $request->city;
        $cat = $request->category;
        $lang = $request->language;
        $court = $request->court;
        $expi = $request->experience;
        $gender = $request->gender;
        $rating = $request->rating;
        $short_by = $request->sort_by;

        $this->data['title'] = "Find  Lawyer";
        $this->data['city'] = location::getAllRecord();

        $this->data['user_data'] = User::getRecordByData($slug, $cat, $court, $expi, $lang, $gender, $rating, $short_by);
        $this->data['category'] = adviceCategory::getquestioncategorylist();

        return view('fronted.findLawyer', $this->data);
    }
    public function getData(Request $request)
    {
        // return "true";
        $slug = $request->city;
        $cat = $request->category;
        $lang = $request->language;
        $court = $request->court;
        $expi = $request->experience;
        $gender = $request->gender;
        $rating = $request->rating;
        $short_by = $request->sort_by;

        $this->data['title'] = "Find  Lawyer";
        $this->data['city'] = location::getAllRecord();

        $this->data['user_data'] = User::getRecordByData($slug, $cat, $court, $expi, $lang, $gender, $rating, $short_by);
        $this->data['category'] = adviceCategory::getquestioncategorylist();

        return view('fronted.userbox',$this->data);

    }

    public function getName(Request $request)
    {
        $inputname = $request->inputname;
        if (isset($inputname)) {
            $this->data['user_data'] = ServiceSubCategory::getByName($inputname);
            return view('fronted.databox',$this->data);
        }else {
            // return redirect()->back();
        }

    }
}
