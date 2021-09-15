<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class documentDetails extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'document_deatils';
    protected $fillable = ['title', 'type', 'image', 'description', 'slug', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getallDetails()
    {
        $sql = documentDetails::where('deleted_at', NULL)->orderBy('id', 'desc')->paginate('10');
        return $sql;
    }
    public static function getRecordById($id)
    {
        $sql =  documentDetails::where('id',$id);
        return $sql;
    }
}
