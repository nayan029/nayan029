<?php

namespace App\Models;

use App\Models\admin\lawyerenrollmentcatgeory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'email_verify',
        'password',
        'mobile',
        'photo',
        'status',
        'user_type',
        "lname",
        'ldob',
        "fathername",
        "profileimage",
        "frollno",
        "srollno",
        "trollno",
        "fyear",
        "syear",
        "tyear",
        "finstitue",
        "sinstitue",
        "tinstitue",
        "nationality",
        "nicno",
        "location",
        "siganturepic",
        'step',
        'about',
        'experience',
        'gender',
        'court',
        'price',
        'basic_fees',
        'fees',
        'full_legal_fees',
        'created_at',
        'created_by',
        'updated_at',
        'deleted_at',
        'deleted_by',
        'assign_lawyer',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getByemailWeb($email)
    {
        // $userType = collect([1, 2, 3]);
        $query = User::where('email', $email)->where('user_type', 1)->first();
        // dd($query);
        return $query;
    }
    public function getLawyerEmailWeb($email)
    {
        $query = User::where('email', $email)->where('user_type', 3)->first();
        return $query;
    }
    public static function getByOTP($otp)
    {
        // $userType = collect([1, 2, 3]);
        $query = User::where('user_type', 1)->where('verify_otp', $otp)->first();
        return $query;
    }
    public static function getrecordbyid($id)
    {
        $query = User::where('id', $id)->first();
        return $query;
    }
    public static function getUsers($name, $id)
    {
        $query =  User::where('id', '!=', $id)->where('status', 1)->where('user_type', 1)->orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(10);
        return $query;
    }
    public static function checkexitemail($email, $type)
    {
        $query = User::where('email', $email)->where('user_type', $type)->where('email_verify', 1)->first();
        return $query;
    }
    public static function getcustdata($name)
    {
        $query =  User::where('user_type', 2)->orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(20);
        return $query;
    }
    /*lawyer */
    public static function getlawyertdata($name)
    {
        $query =  User::where('user_type', 3)->orderBy('id', 'desc');
        $temp = "name like '%$name%' ";
        if ($name != "") {
            $query = $query->whereRaw($temp);
        }
        $query = $query->paginate(20);
        return $query;
    }
    public static function getActivelawyertdata()
    {
        $query = User::select('users.*', 'legal_advice_qa_category.category_name')
            ->leftjoin('lawyer_enrollment_category', function ($join) {

                $join->on('users.id', '=', 'lawyer_enrollment_category.userid');
                $join->whereNull('users.deleted_at');
            })
            ->leftjoin('legal_advice_qa_category', function ($join) {

                $join->on('legal_advice_qa_category.id', '=', 'lawyer_enrollment_category.categoryid');
                $join->whereNull('users.deleted_at');
            })
            ->where('users.user_type', '=', '3')
            ->where('users.status', '1')
            ->where('users.email_verify', '=', '1')
            ->orderBy("users.id", 'desc');

        // $query =  User::where('user_type', 3)->where('status','1')->orderBy('id', 'desc');

        $query = $query->paginate(10);
        return $query;
    }
    public static function getActivelawyertdataview($id)
    {
        $query = User::select('users.*', 'legal_advice_qa_category.category_name')
            ->leftjoin('lawyer_enrollment_category', function ($join) {

                $join->on('users.id', '=', 'lawyer_enrollment_category.userid');
                $join->whereNull('users.deleted_at');
            })
            ->leftjoin('legal_advice_qa_category', function ($join) {

                $join->on('legal_advice_qa_category.id', '=', 'lawyer_enrollment_category.categoryid');
                $join->whereNull('users.deleted_at');
            })
            ->where('users.user_type', '=', '3')
            ->where('users.status', '1')
            //->where('users.email_verify','=','1')
            //->where('users.id',$id)
            ->where('users.assign_lawyer', '1')
            ->first();


        // $query =  User::where('user_type', 3)->where('status','1')->orderBy('id', 'desc');

        return $query;
    }
    public static function lawyergetByemailWeb($id)
    {
        // $userType = collect([1, 2, 3]);
        $query = User::where('email', $id)->where('user_type', 3)->first();
        return $query;
    }
    public static function lawyergetByOTP($otp)
    {
        // $userType = collect([1, 2, 3]);
        $query = User::where('user_type', 3)->where('verify_otp', $otp)->first();
        return $query;
    }
    /*customer */
    public static function customergetByemailWeb($email)
    {
        // $userType = collect([1, 2, 3]);
        $query = User::where('email', $email)->where('user_type', 2)->first();
        return $query;
    }
    public static function customergetByOTP($otp)
    {
        // $userType = collect([1, 2, 3]);
        $query = User::where('user_type', 2)->where('verify_otp', $otp)->first();
        return $query;
    }
    public static function getsteps($id)
    {
        $query = User::select('step')->where('id', $id)->first();
        return $query;
    }
    public static function getLawyers()
    {
        $query =  User::where('email_verify', 1)->where('user_type', 3)->where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
        return $query;
    }
    public static function getRecordByData($location, $cat, $court, $expi, $language, $gender, $rating, $short_by)
    {
        // return $language;
        $TEMP = "users.status in (1)";

        if ($cat != "") {
            $TEMP .= " AND lawyer_enrollment_category.categoryid = '$cat' ";
        }
        if ($location != "") {
            $TEMP .= " AND users.location like '$location' and users.user_type = 3 ";
        }
        if ($language) {
            $TEMP .= " AND lawyer_languages.language like '$language' and users.user_type = 3 ";
        }
        if ($gender) {
            $TEMP .= " AND users.gender like '$gender' and users.user_type = 3 ";
        }
        $query = User::select('users.*')
            ->leftjoin('lawyer_enrollment_category', function ($join) {

                $join->on('users.id', '=', 'lawyer_enrollment_category.userid');
                $join->whereNull('users.deleted_at');
            })
            ->leftjoin('lawyer_languages', function ($join) {

                $join->whereNull('users.deleted_at');
            })
            ->where('users.user_type', '=', '3')
            ->where('step', '=', '3')
            ->where('email_verify', '=', '1')
            ->whereRaw($TEMP)->groupBy('users.id')->orderBy("users.id", 'desc')
            ->get();

        return $query;
    }
    public static function getRecordByName($name)
    {

        $TEMP = "users.status in (1)";

        if ($name) {
            $TEMP .= "AND (CONCAT(users.lname,' ',users.fathername) LIKE '%" . $name . "%')";
        }
        if ($name) {
            $TEMP .= "OR legal_advice_qa_category.category_name like '$name'";
        }

        $query = User::select('users.*', 'legal_advice_qa_category.category_name')
            ->leftjoin('lawyer_enrollment_category', function ($join) {
                $join->on('users.id', '=', 'lawyer_enrollment_category.userid');
                $join->whereNull('users.deleted_at');
            })
            ->leftjoin('legal_advice_qa_category', function ($join) {
                $join->on('legal_advice_qa_category.id', '=', 'lawyer_enrollment_category.categoryid');
            })
            ->where('users.user_type', '=', '3')
            ->whereRaw($TEMP)->groupBy('users.id')->orderBy("users.id", 'desc')
            ->get();
        return $query;
    }
    public static function gettotlaLawyers()
    {
        $query = User::where('email_verify', 1)->where('user_type', 3)->where('status', 1)->get();
        return $query;
    }
    public static function gettotalUsers()
    {
        $query = User::where('email_verify', 1)->where('user_type', 2)->where('status', 1)->get();
        return $query;
    }
    public static function checkexistemaillawyer($email)
    {
        $query = User::where('user_type', 3)->where('email_verify', 0)->where('email', $email)->first();
        return $query;
    }
}
