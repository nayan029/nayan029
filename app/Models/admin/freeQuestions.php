<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class freeQuestions extends Authenticatable
{

    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $table = 'free_questions';
    protected $fillable = [
        'lawarea',
        'city',
        'subject',
        'short_description',
        'name',
        'mobile',
        'email',
        'user_id',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
        'deleted_at',
        'deleted_by',

    ];
    public static function getAllQuestions($name)
    {

        $query =  freeQuestions::where('deleted_at', NULL)->orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getQuestionById($id)
    {
        $query =  freeQuestions::where('deleted_at', NULL)->where('id', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function getRecordByUserId($id)
    {
        $query = freeQuestions::where('user_id',$id)->where('deleted_at', NULL)->get();
        return $query;
    }
}
