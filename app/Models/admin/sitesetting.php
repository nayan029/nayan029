<?php
namespace App\Models\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class sitesetting extends Authenticatable
{
    use Notifiable;
	use SoftDeletes;
    protected $table = 'site_setting';
    protected $fillable = ['id','logo','backend_logo','title','created_by','created_at','updated_by','updated_at','deleted_by','deleted_at'];
	
    public static function getrecordbyid(){
    
        $query = sitesetting::first();
         return $query;
    }
	
	
	
}