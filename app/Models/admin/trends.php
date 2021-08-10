<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class trends extends Authenticatable
{

    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $table = 'trends';
    protected $fillable = [
        'trend_title',
        'trend_image',
        'trend_name',
        'short_description',
        'description',
        'status',
        'trend_likes',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
        'deleted_at',
        'deleted_by',

    ];

    public static function gettrends($title,$name)
    {
        $query =  trends::where('status', 1)->orderBy('id', 'desc');
        $tempname ="trend_name like '%$name%' ";
        $temptitle ="trend_title like '%$title%' ";
		if($name != "")
		{
			$query= $query->whereRaw($tempname);
        }
        if($title != "")
		{
			$query= $query->whereRaw($temptitle);
		}
		$query= $query->paginate(5);
        return $query;
    }
    public static function getrecordById($id)
    {
        $query = trends::where('id', $id)->orderBy('id', 'desc')->first();
        return $query;
    }
    public static function getTLPEvents()
    {
        $query = trends::where('trend_name', 'TLP Events')->where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
    public static function getLawFirm()
    {
        $query = trends::where('trend_name', 'Law Firm Insights')->where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
    public static function getCareerTips()
    {
        $query = trends::where('trend_name', 'Career Tips')->where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
    public static function getFreeGuides()
    {
        $query = trends::where('trend_name', 'Free Guides')->where('status', 1)->orderBy('id', 'desc')->paginate(5);
        return $query;
    }
}
