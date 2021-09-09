<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class bookingTemp extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'booking_temp';
    protected $fillable = ['id', 'user_id', 'lawyer_id', 'amount', 'status', 'type', 'issue_id', 'subissue_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];


    public static function getDataById($id)
    {
        $query = bookingTemp::select('booking_temp.*', 'users.name as user_name', 'lawyer.name as lawyer_name', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name')
            ->leftjoin('users', function ($join) {
                $join->on('booking_temp.user_id', '=', 'users.id');
            })
            ->leftjoin('users as lawyer', function ($join) {
                $join->on('booking_temp.lawyer_id', '=', 'lawyer.id');
            })
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('booking_temp.issue_id', '=', 'legal_advice_qa_category.id');
            })
            ->leftjoin('service_sub_category', function ($join) {
                $join->on('booking_temp.subissue_id', '=', 'service_sub_category.id');
            })

            ->where('booking_temp.user_id', $id)
            ->orderBy("booking_temp.id", 'desc')
            ->where('booking_temp.status', '1')
            ->get();
        return $query;










        // $query = legalenquiry::select('legal_enquiry.*', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name')
        // ->leftjoin('legal_advice_qa_category', function ($join) {
        //     $join->on('legal_enquiry.issue_id', '=', 'legal_advice_qa_category.id');
        // })
        // ->leftjoin('service_sub_category', function ($join) {
        //     $join->on('legal_enquiry.subissue_id', '=', 'service_sub_category.id');
        // })
        // ->where('legal_enquiry.user_id', $uid)
        // ->orderBy("legal_enquiry.id", 'desc')
        // ->where('legal_enquiry.status', '2');
    }
}
