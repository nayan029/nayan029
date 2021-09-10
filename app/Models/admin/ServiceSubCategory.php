<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class ServiceSubCategory extends Authenticatable
{

    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $table = 'service_sub_category';
    protected $fillable = [
        'service_id',
        'description',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
        'deleted_at',
        'deleted_by',
        'deleted_flag',
    ];

    public static function insert($data)
    {
        $auth = auth()->user();
        if ($auth) {
            $data['created_by'] = $auth->id;
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $insert = new ServiceSubCategory($data);
        $insert->save();
        return $insert_id = $insert->id;
    }

    public static function getBYServiceById($service_id)
    {
        $getData = ServiceSubCategory::where('service_id', $service_id)->where('deleted_flag', 'N')->orderBy('description', 'asc')->get();
        return $getData;
    }

    public static function getById($id)
    {
        $getData = ServiceSubCategory::where('id', $id)->where('deleted_flag', 'N')->first();
        return $getData;
    }
}
