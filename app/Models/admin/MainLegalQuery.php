<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class MainLegalQuery extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'main_legal_query';
    protected $fillable = ['id', 'legal_query_type_id', 'title', 'type_name', 'description', 'document', 'status', 'created_at', 'updated_at', 'deleted_at'];

    public static function getAllData($name)
    {
        $query =  MainLegalQuery::where('deleted_at', NULL)->where('status', '1')->orderBy('id', 'desc');
        $temp = "title like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getallPapers()
    {
        $query = MainLegalQuery::where('legal_query_type_id', '1')->where('status', '1')->orderBy('title', 'asc')->get();
        return $query;
    }
    public static function getallNotes()
    {
        $query = MainLegalQuery::where('legal_query_type_id', '2')->where('status', '1')->orderBy('title', 'asc')->get();
        return $query;
    }
    public static function getallBareAct()
    {
        $query = MainLegalQuery::where('legal_query_type_id', '3')->where('status', '1')->orderBy('title', 'asc')->get();
        return $query;
    }
    public static function getrecordById($id)
    {
        $query = MainLegalQuery::where('id', $id)->where('status', '1')->first();
        return $query;
    }

    // search functionality lagal aid and query
    public static function searchResearchPapaers($query)
    {
        $sql = MainLegalQuery::where('title', 'LIKE', '%' . $query . '%')->where('legal_query_type_id', '1')->where('status', '1')->get();
        return $sql;
    }

    public static function searchNotes($query)
    {
        $sql = MainLegalQuery::where('title', 'LIKE', '%' . $query . '%')->where('legal_query_type_id', '2')->where('status', '1')->get();
        return $sql;
    }

    public static function searchBarsActs($query)
    {
        $sql = MainLegalQuery::where('title', 'LIKE', '%' . $query . '%')->where('legal_query_type_id', '3')->where('status', '1')->get();
        return $sql;
    }
    // search functionality legal aid and query

}
