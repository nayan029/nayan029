<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class documentEnquiry extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'document_enquiry';
    protected $fillable = ['name', 'email', 'mobile', 'documnet_id', 'status', 'created_at', 'updated_at', 'deleted_at', 'notification'];

    public static function contactlistsearch($name)
    {
        $query = documentEnquiry::orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function getContacts($name)
    {
        // $query =  documentEnquiry::where('deleted_at', NULL)->orderBy('id', 'desc');

        $query = documentEnquiry::select('document_enquiry.*', 'legal_services.service_name as document_name')
            ->leftjoin('legal_services', function ($join) {
                $join->on('document_enquiry.documnet_id', '=', 'legal_services.id');
            })
            ->orderBy("document_enquiry.id", 'desc')
            ->paginate(10);
        $temp = "document_enquiry.name like '%$name%' ";
        if ($name != "") {
            // $query = $query->whereRaw($temp);
        }
        // $query = $query->paginate(10);
        return $query;
    }
    public static function getRecordById($id)
    {
        $query = documentEnquiry::where('id', $id)->where('deleted_at', NULL)->first();
        return $query;
    }
    public static function getnotification()
    {
        $query = documentEnquiry::where('notification', '0')->get();
        return $query;
    }
}
