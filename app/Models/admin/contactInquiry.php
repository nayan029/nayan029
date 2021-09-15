<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class contactInquiry extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'contact_enquiry';
    protected $fillable = ['name', 'email', 'message','category', 'created_at', 'updated_at', 'deleted_at','notification'];

    public static function contactlistsearch($name)
    {
        $query = contactInquiry::orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getContacts($name)
    {
        $query =  contactInquiry::where('deleted_at', NULL)->orderBy('id', 'desc');
        $temp ="name like '%$name%' ";
		if($name != "")
		{
			$query= $query->whereRaw($temp);
        }
		$query= $query->paginate(10);
        return $query;
    }
    public static function getnotificationcontactenquiry()
    {
        $query = contactInquiry::where('notification', '0')->get();
        return $query;
    }
}
