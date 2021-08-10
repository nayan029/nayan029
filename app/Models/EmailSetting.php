<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    use HasFactory;
    protected $table = 'email_setting';
    public $timestamps = false;
    protected $fillable = ['id','smtp_server','username','password','email','port','encryption','created_date','updated_date','deleted_date'];
	
	public static function getemail_setting()
    {
        $query =EmailSetting::where("status",1)->orderBy("id","desc")->paginate(10);
        return $query;
    }
    public static function getRecordById($id)
    {
        $query =EmailSetting::where("status",1)->where('id',$id)->orderBy("id","desc");
        return $query;
    }
}
