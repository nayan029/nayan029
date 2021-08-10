<?php
namespace App\Models\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EmailTemplate extends Authenticatable
{
    use Notifiable;
    protected $table = 'email_template';
    protected $fillable = ['subject','email','type','description','updated_at','updated_by'];
	
	public static function getallemailautomation(){
			$query = EmailTemplate::get();
		   return $query;
	} 
	public static function getrecordbyid($id){
			$query = EmailTemplate::where('id',$id)->first();
		   return $query;
	} 
	

}