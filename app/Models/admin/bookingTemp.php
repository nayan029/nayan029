<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class bookingTemp extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'booking_temp';
    protected $fillable = ['id', 'user_id', 'lawyer_id', 'amount', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];


    public static function getDataById($id)
    {
        $query = bookingTemp::select('booking_temp.*', 'users.name as user_name', 'lawyer.name as lawyer_name')
            ->leftjoin('users', function ($join) {
                $join->on('booking_temp.user_id', '=', 'users.id');
            })
            ->leftjoin('users as lawyer', function ($join) {
                $join->on('booking_temp.lawyer_id', '=', 'lawyer.id');
            })

            ->where('booking_temp.user_id', $id)
            ->orderBy("users.id", 'desc')
            ->where('booking_temp.status', '1')
            ->get();
        return $query;
    }
}
