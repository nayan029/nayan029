<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class lawyerlanguages extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'lawyer_languages';
    protected $fillable = ['userid', 'language', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbyid($id)
    {
        $query = lawyerlanguages::where('userid', $id)->orderBy('id', 'desc')->get();
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
		$query= $query->paginate(10);
        return $query;
    }
    public static function getcategorysById($id)
    {
        $query = lawyerenrollmentcatgeory::where('userid', $id)->orderBy('id', 'desc')->first();
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
}
