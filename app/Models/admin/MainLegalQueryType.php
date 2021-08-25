<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class MainLegalQueryType extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'main_legal_query_type';
    protected $fillable = ['id', 'title', 'status', 'created_at', 'updated_at', 'deleted_at'];

    public static function mainLegalTypeList()
    {
        $query = MainLegalQueryType::where('status','1')->get();
        return $query;
    }
}
