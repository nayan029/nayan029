<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class lawyerenrollmentcatgeory extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'lawyer_enrollment_category';
    protected $fillable = ['userid', 'categoryid','courtid', 'about', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbyid($id)
    {
        $query = lawyerenrollmentcatgeory::where('userid', $id)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function categorylist($name)
    {
        // $query = Category::orderBy('id', 'desc')->get();
        $query =  lawyerenrollmentcatgeory::orderBy('id', 'desc');
        // $temp ="name like '%$name%' ";
        // if($name != "")
        // {
        // 	$query= $query->whereRaw($temp);
        // }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getcategorysById($id)
    {
        $query = lawyerenrollmentcatgeory::where('userid', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function getDataById($id)
    {
        $query = lawyerenrollmentcatgeory::where('userid', $id);
        return $query;
    }
    public static function getcategory($category)
    {
        $query = lawyerenrollmentcatgeory::where('categoryid', $category)->first();
        return $query;
    }
    public static function getusercategorys($id)
    {
        $query = lawyerenrollmentcatgeory::where('userid', $id)->get();
        return $query;
    }
    public static function getrecordenrollmentbyid($id)
    {

        $query = lawyerenrollmentcatgeory::select('lawyer_enrollment_category.*', 'legal_advice_qa_category.category_name as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('lawyer_enrollment_category.categoryid', '=', 'legal_advice_qa_category.id');
            })
            ->where('lawyer_enrollment_category.userid',$id)
            ->orderBy("lawyer_enrollment_category.id", 'desc')
            ->get();

        return $query;
    }
}
