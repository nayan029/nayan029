<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class lawyercourt extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'lawyer_enrollment_court';
    protected $fillable = ['userid', 'courtid', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbyid($id)
    {
        $query = lawyercourt::where('userid', $id);
        return $query;
    }
    public static function categorylist($name)
    {
        // $query = Category::orderBy('id', 'desc')->get();
        $query =  lawyercourt::orderBy('id', 'desc');
        // $temp ="name like '%$name%' ";
        // if($name != "")
        // {
        // 	$query= $query->whereRaw($temp);
        // }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getrecordenrollmentbyid($id)
    {

        $query = lawyercourt::select('lawyer_enrollment_court.*', 'legal_advice_qa_category.category_name as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('lawyer_enrollment_court.categoryid', '=', 'legal_advice_qa_category.id');
            })
            ->where('lawyer_enrollment_court.userid', $id)
            ->orderBy("lawyer_enrollment_court.id", 'desc')
            ->get();

        return $query;
    }
}
