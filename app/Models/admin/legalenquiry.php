<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class legalenquiry extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'legal_enquiry';
    protected $fillable = ['issue_id', 'subissue_id', 'location', 'name', 'mobile', 'email', 'other_info', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

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
            ->orderBy("legal_enquiry.id", 'desc')
            ->paginate(10);
        return $query;
    }
    public static function enquirylistedit($id)
    {
        $query = legalenquiry::select('legal_enquiry.*', 'legal_advice_qa_category.category_name as issue_name', 'service_sub_category.description as subissue_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_enquiry.issue_id', '=', 'legal_advice_qa_category.id');
            })
            ->leftjoin('service_sub_category', function ($join) {
                $join->on('legal_enquiry.subissue_id', '=', 'service_sub_category.id');
            })
            ->orderBy("legal_enquiry.id", 'desc')
            ->where('legal_enquiry.id', $id)
            ->first();
        return $query;
    }
}
