<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class webinar extends Authenticatable
{

    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $table = 'webinar';
    protected $fillable = [
        'webinar_title',
        'webinar_image',
        'short_description',
        'description',
        'status',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
        'deleted_at',
        'deleted_by',

    ];
    public static function getallwebinar()
    {
        $query =  webinar::where('status', 1)->orderBy('id', 'desc')->get();
        return $query;
    }
    public static function getwebinar($title)
    {
        $query =  webinar::where('status', 1)->orderBy('id', 'desc');
        $temp ="webinar_title like '%$title%' ";
		if($title != "")
		{
			$query= $query->whereRaw($temp);
		}
		$query= $query->paginate(20);
        return $query;
    }
    public static function getrecordById($id)
    {
        $query = webinar::where('id', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
}
