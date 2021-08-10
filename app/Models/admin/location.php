<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class location extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'location';
    protected $fillable = ['name', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbyid($id)
    {
        $query = location::where('id', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function locationlist($name)
    {
        // $query = location::orderBy('id', 'desc')->get();
        $query =  location::where('status', 1)->orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getAllRecord()
    {
        $query =  location::where('status', 1)->orderBy('name')->get();
        return $query;
    }
    public static function getrecordbyslug($slug)
    {
        // return $slug; die;
        $query = location::where('slug', $slug)->first();
        return $query;
    }
    public static function getRecordByName($name)
    {
         $query = location::where('name', $name)->get();
        return $query;
    }
}
