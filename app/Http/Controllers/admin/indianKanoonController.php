<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\adviceCategory;
use App\Models\admin\adviceQuerys;
use App\Models\admin\blogs;
use App\Models\admin\Category;
use App\Models\admin\court;
use App\Models\admin\location;
use App\Models\admin\otherResource;
use App\Models\admin\sitesetting;
use App\Models\admin\otherResourceQueAns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Echo_;

class indianKanoonController extends Controller
{
    function __construct()
    {
        $this->data['title'] = "Other Resources";
        $this->data['city'] = location::getAllRecord();
        $this->data['court'] = court::getAllRecord();
        $this->data['sitesetting'] = sitesetting::getrecordbyid();
    }
    public function ips(Request $request){
        $name = $request->name;
        // return $name; die;
         $this->data['getquerys'] = otherResource::getAllData($name);  
        $this->data['getquerysdata'] = otherResource::getAllDataf($name); 
        return view('fronted.indianKnoonDetail',$this->data);
    }
    public function dataById(Request $request)
    {
        $name = $request->name;
    //    return $name;
        $this->data['title'] =  $name;
        // $catid = 1;
       $data = Category::getrecordbyslug($name);
         $id = $data->id; 
       $this->data['getquerysdata'] =  otherResource::getRecordById($id);
        return view('fronted.indianKnoonDetail', $this->data);
    }
}
