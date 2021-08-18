<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class otherResource extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'other_resources';
    protected $fillable = ['category_fk', 'question', 'answer', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getAllData()
    {
        // $query =  adviceCategory::where('status', 1);
        // $query = otherResource::where('deleted_at',NULL)->orderBy('id', 'DESC')->paginate(5);
        $query = otherResource::select('other_resources.*', 'category.name as category_name')
            ->leftjoin('category', function ($join) {
                $join->on('other_resources.category_fk', '=', 'category.id');
            })
            ->orderBy("other_resources.id", 'desc')
            ->paginate(10);
        return $query;
    }
  
    public static function getRecordById($id)
    {
        $query = otherResource::where('id', $id)->first();
        return $query;
    }
}
