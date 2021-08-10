<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class blogs extends Authenticatable
{
    
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $table = 'blogs';
    protected $fillable = [
        'blog_title',
        'blog_image',
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
    public static function getallblogs()
    {
        // return $title;
        $query =  blogs::where('status',1)->orderBy('id', 'desc')->get();
        return $query; 
    }
    public static function getblogs($title)
    {
        // return $title;
        $query =  blogs::orderBy('id', 'desc');
        $temp ="blog_title LIKE '%$title%' ";
		if($title != "")
		{
			$query= $query->whereRaw($temp);
        }
		$query= $query->paginate(5);
        return $query; 
    }
    public static function getrecordById($id)
    {
        $query = blogs::where('id',$id)->orderBy('id','desc')->first();
        return $query;
    }
}
