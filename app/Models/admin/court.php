<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class court extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'court';
    protected $fillable = ['name', 'status', 'created_at', 'created_by', 'updated_at', 'deleted_at', 'deleted_by'];

    public static function cortsearch($name)
    {
        $query = enquiry::orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getCorts($name)
    {
        $query =  court::where('deleted_at', NULL)->orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
}
