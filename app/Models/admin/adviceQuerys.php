<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class adviceQuerys extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'legel_advice_querys';
    protected $fillable = ['category_id', 'question', 'question_details', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbyid($id)
    {
        $query = adviceQuerys::where('id', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function querylist($name)
    {

        $TEMP = "legel_advice_querys.status in (1,0)";

        if ($name != "") {
            $TEMP .= " AND legal_advice_qa_category.category_name like '%$name%' ";
        }
        $query = adviceQuerys::select('legel_advice_querys.*', 'legal_advice_qa_category.category_name as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legel_advice_querys.category_id', '=', 'legal_advice_qa_category.id');
            })

            ->whereRaw($TEMP)->orderBy("legel_advice_querys.id", 'desc')
            ->paginate(5);

        //$query =  adviceQuerys::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
    public function guideslist($name)
    {
        $TEMP = "legel_advice_querys.status in (1,0)";

        if ($name != "") {
            $TEMP .= " AND legal_advice_qa_category.category_name like '%$name%' ";
        }
        $query = adviceQuerys::select('legel_advice_querys.*', 'legal_advice_qa_category.category_name as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legel_advice_querys.category_id', '=', 'legal_advice_qa_category.id');
            })

            ->whereRaw($TEMP)->orderBy("legel_advice_querys.id", 'desc')
            ->paginate(5);

        //$query =  adviceQuerys::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
    public static function advicequerylist()
    {

        $TEMP = "legel_advice_querys.status in (1,0)";

        // if ($name != "") {
        //     $TEMP .= " AND legal_advice_qa_category.category_name like '%$name%' ";
        // }
        $query = adviceQuerys::select('legel_advice_querys.*', 'legal_advice_qa_category.category_name as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legel_advice_querys.category_id', '=', 'legal_advice_qa_category.id');
            })

            ->whereRaw($TEMP)->orderBy("legel_advice_querys.id", 'desc')
            ->paginate(5);

        //$query =  adviceQuerys::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
    public static function getrecordbcategoryyid($id)
    {
        $query = adviceQuerys::where('category_id', $id)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function allquerylist($category)
    {
        $TEMP = "legel_advice_querys.status in (1,0)";

        if ($category != "") {
            $TEMP .= " AND legal_advice_qa_category.category_name like '%$category%' ";
        }

        $query = adviceQuerys::select('legel_advice_querys.*', 'legal_advice_qa_category.category_name as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legel_advice_querys.category_id', '=', 'legal_advice_qa_category.id');
            })
            ->whereRaw($TEMP)->orderBy("legel_advice_querys.id", 'desc')
            ->paginate(5);

        //$query =  adviceQuerys::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }

    public static function divorcequerylist($name)
    {
        // return $name; die;
        $TEMP = "legel_advice_querys.status in (1,0)";

        if ($name != "") {
            $TEMP .= " AND legal_advice_qa_category.slug like '%$name%' ";
        }
        $query = adviceQuerys::select('legel_advice_querys.*', 'legal_advice_qa_category.slug as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legel_advice_querys.category_id', '=', 'legal_advice_qa_category.id');
            })

            ->whereRaw($TEMP)->orderBy("legel_advice_querys.id", 'desc')
            ->paginate(5);

        //$query =  adviceQuerys::where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
    public static function divorceGuideslist($name)
    {
        # code...
        return $name;
    }
}
