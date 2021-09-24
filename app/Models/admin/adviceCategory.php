<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class adviceCategory extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'legal_advice_qa_category';
    protected $fillable = ['category_name', 'description', 'status', 'slug', 'type', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbyid($id)
    {
        $query = adviceCategory::where('id', $id)->orderBy('id', 'ASC')->first();
        return $query;
    }
    public static function categorylist($name)
    {
       
        $query =  adviceCategory::where('deleted_at', NULL)->where('status', 1)->orderBy('id', 'ASC');
        $temp = "category_name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function categorylistenrollment()
    {
        // $query = Category::orderBy('id', 'desc')->get();
        $query =  adviceCategory::where('status', 1)->where('type', '1')->orderBy('id', 'ASC')->get();
        return $query;
    }
    public static function getquestioncategorylist()
    {
        // $query = Category::orderBy('id', 'desc')->get();
        $query =  adviceCategory::where('status', 1)->where('type', '1')->orderBy('id', 'ASC')->get();
        return $query;
    }
    public static function getquestioncategorylistlimit()
    {
        // $query = Category::orderBy('id', 'desc')->get();
        $query =  adviceCategory::where('status', 1)->where('type', '1')->limit(6)->get();
        return $query;
    }
    public static function getguidescategorylist()
    {
        // $query = Category::orderBy('id', 'desc')->get();
        $query =  adviceCategory::where('status', 1)->where('type', 'guides')->orderBy('id', 'ASC')->get();
        return $query;
    }
    public static function getrecordbyname($name, $type)
    {
        $query = adviceCategory::where('category_name', $name, 'type', $type)->get();
        return $query;
    }
    public static function getAllCategory()
    {
        $query = adviceCategory::where('status', 1)->where('type', '1')->get();
        return $query;
    }
    public static function getDataByType($type)
    {
        // return $type;
        $data = adviceCategory::where('type', $type)->get();
        return  $data;
    }
}
