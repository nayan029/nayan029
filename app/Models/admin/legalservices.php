<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class legalservices extends Authenticatable
{

    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $table = 'legal_services';
    protected $fillable = [
        'service_name',
        'category_id',
        'rating',
        'service_title',
        'short_description',
        'description',
        'image',
        'status',
        'slug',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
        'deleted_at',
        'deleted_by',

    ];
    public static function getallservices()
    {
        $query =  legalservices::where('status', 1)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function getservices($title, $type)
    {
        $query =  legalservices::where('status', 1)->orderBy('id', 'desc');

        $temp = "service_name like '%$title%' ";
        if ($title != "") {
            $query = $query->whereRaw($temp);
        }
        //type
        if ($type == 'Documentation') {
            $type = "2";
        } elseif ($type == 'Legal Aid') {
            $type =  "1";
        }
        $temp = "category_id = $type";
        if ($type != "") {
            $query = $query->whereRaw($temp);
        }

        $query = $query->paginate(10);
        return $query;
    }
    public static function getrecordById($id)
    {
        // return $id; die;
        $query = legalservices::where('id', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function getfamilyData()
    {
        // return "true";
        $query = legalservices::where('category_id', 1)->orderBy('service_name', 'asc')->get();
        return $query;
    }
    public static function getpropertyData()
    {
        // return "true";
        $query = legalservices::where('category_id', 2)->orderBy('service_name', 'asc')->get();
        return $query;
    }
    public static function getdocData()
    {
        // return "true";
        $query = legalservices::where('category_id', 3)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function getlegalnoticeData()
    {
        // return "true";
        $query = legalservices::where('category_id', 4)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function getlabourserviceData()
    {
        // return "true";
        $query = legalservices::where('category_id', 7)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function getcorporateData()
    {
        // return "true";
        $query = legalservices::where('category_id', 8)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function gettradeData()
    {
        // return "true";
        $query = legalservices::where('category_id', 7)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function getsupremcourtData()
    {
        // return "true";
        $query = legalservices::where('category_id', 10)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function getstartupData()
    {
        // return "true";
        $query = legalservices::where('category_id', 9)->orderBy('id', 'desc')->get();
        return $query;
    }

    public static function getimmaginationData()
    {
        // return "true";
        $query = legalservices::where('category_id', 11)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function familylist($name)
    {
        // return $name; die;
        $query = legalservices::where('slug', $name)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function getDataBySlugName($name)
    {
        return $getData = legalservices::where('slug', $name)
            ->where('status', 1)
            ->first();
    }
    public static function getByName($name)
    {
        if (isset($name)) {
            $getData = legalservices::where('service_name', 'like', $name . '%')->where('deleted_at', NULL)->get();
            return $getData;
        }
    }

    //search
        public static function getDocumentationByName($query)
        {
            $sql = legalservices::where('service_name', 'LIKE', '%' . $query . '%')->where('category_id', 2)->where('deleted_at', NULL)->get();
            return $sql;
        }

        public static function getAidByName($query)
        {
            $sql = legalservices::where('service_name', 'LIKE', '%' . $query . '%')->where('category_id', 1)->where('deleted_at', NULL)->get();
            return $sql;
        }
        public static function searchAllData($query)
        {
            $sql = legalservices::where('service_name', 'LIKE', '%' . $query . '%')->where('deleted_at', NULL)->get()->toArray();
            return $sql;
        }
    //search
}
