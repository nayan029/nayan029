<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class querySubCategory extends Authenticatable
{

    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $table = 'query_sub_details';
    protected $fillable = [
        'query_id',
        'description',
        'document',
        'status',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
        'deleted_at',
        'deleted_by',
    ];

    public static function insert($data)
    {
        $auth = auth()->user();
        if ($auth) {
            $data['created_by'] = $auth->id;
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $insert = new querySubCategory($data);
        $insert->save();
        return $insert_id = $insert->id;
    }

    public static function getBYQueryById($service_id)
    {
        $getData = querySubCategory::where('query_id', $service_id)->where('status', '1')->get();
        return $getData;
    }

    public static function getById($id)
    {
        $getData = querySubCategory::where('id', $id)->where('status', '1')->first();
        return $getData;
    }
}
