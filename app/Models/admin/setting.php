<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class setting extends Authenticatable
{
    
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $table = 'setting';
    protected $fillable = [
        'marketing_name',
        'marketing_email',
        'marketing_phone',
        'accountant_name',
        'accountant_email',
        'accountant_phone',
        'hr_name',
        'hr_email',
        'hr_phone',
        'opning_day',
        'opning_hours',
        'address',
        'support_email',
        'support_phone',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
        'deleted_at',
        'deleted_by',

    ];

    public static function getsetings()
    {
        $query =  setting::first();  
        return $query;
    }
    public static function getrecordById($id)
    {
        $query = setting::where('id',$id)->orderBy('id','desc')->first();
        return $query;
    }
}
