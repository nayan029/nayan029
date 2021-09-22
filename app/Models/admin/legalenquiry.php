<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use phpDocumentor\Reflection\Types\Null_;

class legalenquiry extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'legal_enquiry';
    protected $fillable = ['user_id', 'issue_id', 'subissue_id', 'location', 'name', 'mobile', 'email', 'other_info', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at', 'lawyer_id', 'assign_lawyer', 'notification', 'documentid','document','docstatus'];

    public static function getrecordbyid($id)
    {
        $query = legalenquiry::where('id', $id)->orderBy('id', 'ASC')->first();
        return $query;
    }
    public static function getAllData()
    {
        $query = legalenquiry::where('deleted_at', NULL)->orderBy('id', 'ASC')->paginate(10);

        return $query;
    }
    public static function enquirylist()
    {
        $query = legalenquiry::select('legal_enquiry.*', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_enquiry.issue_id', '=', 'legal_advice_qa_category.id');
            })
            ->leftjoin('service_sub_category', function ($join) {
                $join->on('legal_enquiry.subissue_id', '=', 'service_sub_category.id');
            })
            // ->leftjoin('legal_services', function ($join) {
            //     $join->on('legal_enquiry.documentid', '=', 'legal_services.id');
            // })
            ->where('legal_enquiry.documentid', '=', Null)
            ->orderBy("legal_enquiry.id", 'desc')
            ->paginate(10);
        return $query;
    }
    public static function loginUserEnquirylist($uid)
    {
        $query = legalenquiry::select('legal_enquiry.*', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_enquiry.issue_id', '=', 'legal_advice_qa_category.id');
            })
            ->leftjoin('service_sub_category', function ($join) {
                $join->on('legal_enquiry.subissue_id', '=', 'service_sub_category.id');
            })
            // ->leftjoin('legal_services', function ($join) {
            //     $join->on('legal_enquiry.documentid', '=', 'legal_services.id');
            // })
            ->where('legal_enquiry.user_id', $uid)
            ->where('legal_enquiry.documentid', '=', NULL)
            ->orderBy("legal_enquiry.id", 'desc')
            ->where('legal_enquiry.status', '1')
            ->get();
        return $query;
    }
    public static function enquirylistedit($id)
    {
        $query = legalenquiry::select('legal_enquiry.*', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name', 'legal_services.service_name as document_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_enquiry.issue_id', '=', 'legal_advice_qa_category.id');
            })
            ->leftjoin('service_sub_category', function ($join) {
                $join->on('legal_enquiry.subissue_id', '=', 'service_sub_category.id');
            })
            ->leftjoin('legal_services', function ($join) {
                $join->on('legal_enquiry.documentid', '=', 'legal_services.id');
            })
            ->orderBy("legal_enquiry.id", 'desc')
            ->where('legal_enquiry.id', $id)
            ->first();
        return $query;
    }
    public static function totalCart($uid)
    {
        $query = legalenquiry::select('legal_enquiry.*', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_enquiry.issue_id', '=', 'legal_advice_qa_category.id');
            })
            ->leftjoin('service_sub_category', function ($join) {
                $join->on('legal_enquiry.subissue_id', '=', 'service_sub_category.id');
            })
            ->where('legal_enquiry.user_id', $uid)
            ->orderBy("legal_enquiry.id", 'desc')
            ->where('legal_enquiry.status', '2')
            ->ORwhere('legal_enquiry.docstatus', '2')
            ->get();
        return $query;
    }
    public static function myCartDetails($uid)
    {
        $query = legalenquiry::select('legal_enquiry.*', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name', 'legal_services.service_name as document_name','booking_temp.orderid as orderid')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_enquiry.issue_id', '=', 'legal_advice_qa_category.id');
            })
            ->leftjoin('service_sub_category', function ($join) {
                $join->on('legal_enquiry.subissue_id', '=', 'service_sub_category.id');
            })
            ->leftjoin('legal_services', function ($join) {
                $join->on('legal_enquiry.documentid', '=', 'legal_services.id');
            })
            ->leftjoin('booking_temp', function ($join) {
                $join->on('legal_enquiry.id', '=', 'booking_temp.oid');
            })
            ->where('legal_enquiry.user_id', $uid)
            ->orderBy("legal_enquiry.id", 'desc')
            ->where('legal_enquiry.status', '2')
            ->ORwhere('legal_enquiry.docstatus', '2');

        return $query;
    }
    public static function customerCartDetails($uid)
    {
        $query = legalenquiry::select('legal_enquiry.*', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name', 'legal_services.service_name as document_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_enquiry.issue_id', '=', 'legal_advice_qa_category.id');
            })
            ->leftjoin('service_sub_category', function ($join) {
                $join->on('legal_enquiry.subissue_id', '=', 'service_sub_category.id');
            })
            ->leftjoin('legal_services', function ($join) {
                $join->on('legal_enquiry.documentid', '=', 'legal_services.id');
            })
            // ->leftjoin('booking_temp', function ($join) {
            //     $join->on('booking_temp.lawyer_id', '=', 'legal_enquiry.lawyer_id');
            // })
            // ->leftjoin('users', function ($join) {
            //     $join->on('booking_temp.user_id', '=', 'users.id');
            // })
            ->where('legal_enquiry.lawyer_id', $uid)
            ->orderBy("legal_enquiry.id", 'desc')
            ->where('legal_enquiry.status', '2');

        return $query;
    }
    public static function allBookingHistoryData()
    {
        $query = legalenquiry::select('legal_enquiry.*', 'users.name as uname', 'users.username', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name', 'booking_temp.type as feestype')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_enquiry.issue_id', '=', 'legal_advice_qa_category.id');
            })
            ->leftjoin('service_sub_category', function ($join) {
                $join->on('legal_enquiry.subissue_id', '=', 'service_sub_category.id');
            })
            ->leftjoin('booking_temp', function ($join) {
                $join->on('booking_temp.lawyer_id', '=', 'legal_enquiry.lawyer_id');
            })
            ->leftjoin('users', function ($join) {
                $join->on('booking_temp.user_id', '=', 'users.id');
            })

            ->orderBy("legal_enquiry.id", 'desc');

        return $query;
    }
    public static function getAllDataofEnquiry()
    {
        $query = legalenquiry::where('deleted_at', NULL)->orderBy('id', 'ASC')->get();

        return $query;
    }
    public static function getnotificationNewEnquiry()
    {
        $query = legalenquiry::where('notification', '0')->where('documentid',null)->get();
        return $query;
    }
    public static function loginUserDocumentlist()
    {
        $query = legalenquiry::select('legal_enquiry.*', 'legal_services.service_name as document_name')

            ->leftjoin('legal_services', function ($join) {
                $join->on('legal_enquiry.documentid', '=', 'legal_services.id');
            })
            ->where('legal_enquiry.documentid', '!=', 'NULL')
            ->orderBy("legal_enquiry.id", 'desc')
            ->where('legal_enquiry.status', '1')
            ->where('legal_enquiry.docstatus', '2')
            ->paginate('10');
        return $query;
    }
}
