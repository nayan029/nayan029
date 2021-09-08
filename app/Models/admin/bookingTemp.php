<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class bookingTemp extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'booking_temp';
    protected $fillable = ['id', 'user_id', 'lawyer_id', 'amount', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];

    public static function getData()
    {
        $query = bookingTemp::orderBy('id', 'desc')->first();
        $id = $query->id;
        return $id;
    }
}
