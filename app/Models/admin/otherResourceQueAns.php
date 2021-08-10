<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class otherResourceQueAns extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'other_resources_question_answers';
    protected $fillable = ['resource_id', 'question', 'answer', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getAllData()
    {
        // $query =  adviceCategory::where('status', 1);
        $query = otherResourceQueAns::where('deleted_at', NULL)->orderBy('id', 'DESC')->paginate(5);
        return $query;
    }
    public static function getRecordById($id)
    {
        $query = otherResourceQueAns::where('id', $id)->first();
        return $query;
    }
}
