<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class MainLegalQuery extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'main_legal_query';
    protected $fillable = ['id', 'legal_query_type_id', 'title', 'type_name', 'description', 'status', 'created_at', 'updated_at', 'deleted_at'];

    public static function getAllData()
    {
        $query = MainLegalQuery::where('status','1')->orderBy('id', 'desc')->paginate(10);
        return $query;
    }
}
