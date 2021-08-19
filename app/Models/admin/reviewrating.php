<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class reviewrating extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'review_rating';
    protected $fillable = ['review', 'rating', 'lawyer_id', 'user_id', 'user_name', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbylawyerid($lawyerid)
    {
        $query = reviewrating::where('lawyer_id', $lawyerid)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function getrecordbylawyeridlimit()
    {
        $query = reviewrating::orderBy('id', 'desc')->limit(5)->get();
        return $query;
    }
    public static function getAllRecord()
    {
        $query =  reviewrating::where('deleted_at', NULL)->orderBy('id', 'desc')->get();
        return $query;
    }
}
