<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class guides extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'legal_guides';
    protected $fillable = ['category_id', 'guide', 'guide_detail', 'status','image', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function guideslist($name)
    {
        // print_r($name); die;
        $TEMP = "legal_guides.status in (1,0)";

        if ($name != "") {
            $TEMP .= " AND legal_advice_qa_category.slug like '%$name%' ";
        }
        $query = guides::select('legal_guides.*', 'legal_advice_qa_category.category_name as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_guides.category_id', '=', 'legal_advice_qa_category.id');
            })

            ->whereRaw($TEMP)->orderBy("legal_guides.id", 'desc')
            ->paginate(5);

        // return $query =  guides::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
    public static function getrecordbyid($id)
    {
        $query = guides::where('id', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function allquerylist($category)
    {
        $TEMP = "legal_guides.status in (1,0)";

        if ($category != "") {
            $TEMP .= " AND legal_advice_qa_category.category_name like '%$category%' ";
        }

        $query = guides::select('legal_guides.*', 'legal_advice_qa_category.category_name as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_guides.category_id', '=', 'legal_advice_qa_category.id');
            })
            ->whereRaw($TEMP)->orderBy("legal_guides.id", 'desc')
            ->paginate(5);

        //$query =  adviceQuerys::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
    public static function getquestioncategorylist()
    {
          // $query = Category::orderBy('id', 'desc')->get();
          $query =  adviceCategory::where('status', 1)->where('type','guides')->orderBy('id', 'ASC')->get();
          return $query;
    }
}
