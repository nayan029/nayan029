<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'category';
    protected $fillable = ['name', 'slug', 'title', 'description', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbyid($id)
    {
        $query = Category::where('id', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function categorylist($name)
    {
        // $query = Category::orderBy('id', 'desc')->get();
        $query =  Category::where('status', 1)->orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getAllRecord()
    {
        $query =  Category::where('status', 1)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function getrecordbyslug($slug)
    {
        // return $slug; die;
        $query = Category::where('slug', $slug)->first();
        return $query;
    }

}
