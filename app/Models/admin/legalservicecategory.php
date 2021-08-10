<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class legalservicecategory extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'legal_services_category';
    protected $fillable = ['category_name', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbyid($id)
    {
        $query = legalservicecategory::where('id', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function categorylist($name)
    {
        // $query = Category::orderBy('id', 'desc')->get();
        $query =  legalservicecategory::where('status', 1)->orderBy('id', 'desc');
        $temp ="name like '%$name%' ";
		if($name != "")
		{
			$query= $query->whereRaw($temp);
		}
		$query= $query->paginate(10);
        return $query;
    }
    public static function getallcategory()
    {
        $query = legalservicecategory::where('deleted_at',NULL)->get();
        return $query;
    }
}
