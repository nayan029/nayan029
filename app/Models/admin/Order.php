<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class Order extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'lb_order';
    protected $fillable = ['id', 'user_id', 'lawyer_id', 'amount', 'status', 'created_at', 'updated_at', 'deleted_at', 'transaction_id', 'order_status', 'order_no'];

    // public static function getrecordbyid($id)
    // {
    //     $query = adviceCategory::where('id', $id)->orderBy('id', 'ASC')->first();
    //     return $query;
    // }
   
}
