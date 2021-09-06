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
    protected $fillable = ['review', 'rating', 'lawyer_id', 'user_id', 'user_name', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

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
        $query = reviewrating::select('review_rating.*', 'users.lname as lawyer_name')
            ->leftjoin('users', function ($join) {
                $join->on('review_rating.lawyer_id', '=', 'users.id');
            })

            ->orderBy("review_rating.id", 'desc')
            ->paginate('5');
        return $query;
    }

    public static function getVarifyRecords()
    {
        $TEMP = "review_rating.status = '1'";
        $query = reviewrating::select('review_rating.*', 'users.lname as lawyer_name', 'users.profileimage as profileimage')
            ->leftjoin('users', function ($join) {
                $join->on('review_rating.user_id', '=', 'users.id');
            })

            ->whereRaw($TEMP)
            ->orderBy("review_rating.id", 'desc')
            ->limit('6')
            ->get();
        return $query;
    }
}
