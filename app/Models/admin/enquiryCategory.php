<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class enquiryCategory extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'enquiry_category';
    protected $fillable = ['category_fk', 'enquiry_category','status', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getAllData()
    {
        $query = enquiryCategory::where('deleted_at',NULL)->paginate('5');
        return $query;
    }
}
