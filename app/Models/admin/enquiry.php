<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class enquiry extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'enquiry';
    protected $fillable = ['name', 'email', 'mobile','feedback', 'status','created_at', 'updated_at', 'deleted_at'];

    public static function contactlistsearch($name)
    {
        $query = enquiry::orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getContacts($name)
    {
        $query =  enquiry::where('deleted_at', NULL)->orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
}
