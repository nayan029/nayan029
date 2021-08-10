<?php

namespace App\Models\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class legalissue extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'legal_issue';
    protected $fillable = ['category_id', 'issue_name', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'deleted_at'];

    public static function getrecordbyid($id)
    {
        $query = legalissue::where('id', $id)->orderBy('id', 'ASC')->first();
        return $query;
    }
    public static function issuelist()
    {
        // $query =  legalissue::where('status', 1)->orderBy('id', 'DESC')->paginate(5);
        $query = legalissue::select('legal_issue.*', 'legal_advice_qa_category.category_name as category_name')
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_issue.category_id', '=', 'legal_advice_qa_category.id');
            })
            ->orderBy("legal_issue.id", 'desc')
            ->paginate(10);
        return $query;
    }
}
