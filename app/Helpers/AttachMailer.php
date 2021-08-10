<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\DriverContract;
use App\DriverInstallment;
use Config;
use Faker\Provider\ar_SA\Color;

class AttachMailer
{
    /*
     * @params url du document ajout� */

    public static function contractTerminationDefaulter($contract_id)
    {
        $site_setting = DB::table('site_setting')->first();
        $contractDetails  = DriverContract::getRecordById($contract_id)->first();
        //  dd($contractDetails);
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Contract Termination Defaulter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    </head>
    <body style="margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
            <tr>
                <td style="padding: 10px 0 30px 0;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                        <tr>
                            <td align="center" bgcolor="#ffffff" style="background-image: url("' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '");background-repeat: repeat-y;padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                <img src="' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '" onerror="this.onerror=null;this.src="' . Config::get("constants.options.ImgSrcDisplay") . '/logo.png" alt="Creating Email Magic" style="display: block;margin-bottom:10px;margin-top:20px;max-height: 50px;">
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 30px 10px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                            <b>Hi,</b>
                                            <p style="margin-bottom:10px;">' . ucwords($contractDetails->driver_name) . ' is defaulter, below are the contract details.</p>
                                           <p> Weekly Price ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->price, 2) . '</strong> </p>
                                           <p> Deposit Price ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->deposit_price, 2) . '</strong> </p>
                                           <p> Contract  Start  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->contract_start_date)) . '</strong> </p>
                                          
                                           <p> Contract Month  : <strong>' . ucwords($contractDetails->contract_month) . '</strong> </p>
                                           
                                             
                                            <p style="margin-top:30px;"><small>This is to inform you that we have early contract termination.Hope to see you there!</small></p>
                                        </td>
                                    </tr> 
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td  bgcolor="#f9f9f9" style="padding: 30px 30px 30px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="color: #58666e; font-family: Arial, sans-serif; font-size: 10px;" width="75%">
                                        &copy; Copyright 2021 - <strong>  ' . $site_setting->logo_title . ' <i class="fa fa-heart" style="color:#ef5c6a !important"></i>  </strong> <span > All rights reserved. </span>
                                        </td>
                                              
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>';
        return $html;
    }


    public static function Notification_of_Contract_Due_sendmail($contract_id, $installment_id = "")
    {
        $site_setting = DB::table('site_setting')->first();
        $contractDetails  = DriverContract::getRecordById($contract_id)->first();
        $html = '';
        if (!empty($installment_id)) {

            $dueContractData = DriverInstallment::find($installment_id);
        } else {
            return $html;
        }
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Contract Termination Defaulter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    </head>
    <body style="margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
            <tr>
                <td style="padding: 10px 0 30px 0;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                        <tr>
                            <td align="center" bgcolor="#ffffff" style="background-image: url("' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '");background-repeat: repeat-y;padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                <img src="' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '" onerror="this.onerror=null;this.src="' . Config::get("constants.options.ImgSrcDisplay") . '/logo.png" alt="Creating Email Magic" style="display: block;margin-bottom:10px;margin-top:20px;max-height: 50px;">
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 30px 10px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                            <b>Hi ' . ucwords($contractDetails->driver_name) . ',</b>
                                            <p style="margin-bottom:10px;"> This message is to notify you that your next installment due date is <b>' . date(Config::get('constants.options.DateFormat'), strtotime($dueContractData->start_date)) . '</b> so pay your amount either prior or on the date.</p>
                                           <p> Installment Amount ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($dueContractData->installment_amount, 2) . '</strong> </p>
                                           <p> Interest Type   : <strong>' . $dueContractData->interest_type . '</strong> </p>
                                           <p> Interest Percentage  : <strong>' . $dueContractData->interest_percentage. ' %</strong> </p>
                                           <p> Installment Due Date  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($dueContractData->start_date)) . '</strong> </p>
                                             
                                            <p style="margin-top:30px;"><small>This is to inform you that we have notify installment due date.Hope to see you there!</small></p>
                                        </td>
                                    </tr> 
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td  bgcolor="#f9f9f9" style="padding: 30px 30px 30px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="color: #58666e; font-family: Arial, sans-serif; font-size: 10px;" width="75%">
                                        &copy; Copyright 2021 - <strong>  ' . $site_setting->logo_title . ' <i class="fa fa-heart" style="color:#ef5c6a !important"></i>  </strong> <span > All rights reserved. </span>
                                        </td>
                                              
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>';
        return $html;
    }

    public static function Notification_of_ContractSend_Reminder($contract_id, $payment, $Return_vehicle)
    {
        $site_setting = DB::table('site_setting')->first();
        $contractDetails  = DriverContract::getRecordById($contract_id)->first();

        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Contract Termination Defaulter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    </head>
    <body style="margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
            <tr>
                <td style="padding: 10px 0 30px 0;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                        <tr>
                            <td align="center" bgcolor="#ffffff" style="background-image: url("' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '");background-repeat: repeat-y;padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                <img src="' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '" onerror="this.onerror=null;this.src="' . Config::get("constants.options.ImgSrcDisplay") . '/logo.png" alt="Creating Email Magic" style="display: block;margin-bottom:10px;margin-top:20px;max-height: 50px;">
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 30px 10px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                            <b>Hi,</b>
                                            <p style="margin-bottom:10px;">' . ucwords($contractDetails->driver_name) . ' is defaulter, below are the contract details.</p>
                                           <p> Weekly Price ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->price, 2) . '</strong> </p>
                                           <p> Deposit Price ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->deposit_price, 2) . '</strong> </p>
                                           <p> Contract  Start  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->contract_start_date)) . '</strong> </p>

                                           <p style="margin-bottom:10px;">' . ucwords($payment) . ' is Ensure payment is made .</p>
                                           <p style="margin-bottom:10px;">' . ucwords($Return_vehicle) . ' is Return vehicle .</p>
                                          
                                           <p> Contract Month  : <strong>' . ucwords($contractDetails->contract_month) . '</strong> </p>
                                           
                                             
                                            <p style="margin-top:30px;"><small>This is to inform you that we have early contract termination.Hope to see you there!</small></p>
                                        </td>
                                    </tr> 
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td  bgcolor="#f9f9f9" style="padding: 30px 30px 30px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="color: #58666e; font-family: Arial, sans-serif; font-size: 10px;" width="75%">
                                        &copy; Copyright 2021 - <strong>  ' . $site_setting->logo_title . ' <i class="fa fa-heart" style="color:#ef5c6a !important"></i>  </strong> <span > All rights reserved. </span>
                                        </td>
                                              
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>';
        return $html;
    }




    /* Contract Create Send Mail */

    public static function contractCreateMail($contract_id)
    {
        $site_setting = DB::table('site_setting')->first();
        $contractDetails  = DriverContract::getRecordById($contract_id)->first();
        //  dd($contractDetails);
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Contract Create</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" bgcolor="#ffffff" style="background-image: url("' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '");background-repeat: repeat-y;padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            <img src="' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '" onerror="this.onerror=null;this.src="' . Config::get("constants.options.ImgSrcDisplay") . '/logo.png" alt="Creating Email Magic" style="display: block;margin-bottom:10px;margin-top:20px;max-height: 50px;">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 10px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        <b>Hi,</b>
                                        <p style="margin-bottom:10px;">' . ucwords($contractDetails->driver_name) . ' is create new contract, below are the contract details.</p>
                                        <p> Driver Name : <strong>' . $contractDetails->driver_name . '</strong> </p>
                                        <p> Contract No : <strong>' . $contractDetails->contract_no . '</strong> </p>
                                        <p> Vehicle Number : <strong>' . $contractDetails->vehicle_number . '</strong> </p>
                                        <p> Price ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->price, 2) . '</strong> </p>
                                        <p> Deposit Price  ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->deposit_price, 2) . '</strong> </p>
                                        <p> Contract  Start Date  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->contract_start_date)) . '</strong> </p>
                                        <p> Contract  End Date  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->end_date)) . '</strong> </p>
                                        <p> Contract Month  : <strong>' . ucwords($contractDetails->contract_month) . '</strong> </p>
                                       
                                         
                                        <p style="margin-top:30px;"><small>This is to inform you that we have contract details.Hope to see you there!</small></p>
                                    </td>
                                </tr> 
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td  bgcolor="#f9f9f9" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #58666e; font-family: Arial, sans-serif; font-size: 10px;" width="75%">
                                    &copy; Copyright 2021 - <strong>  ' . $site_setting->logo_title . ' <i class="fa fa-heart" style="color:#ef5c6a !important"></i>  </strong> <span > All rights reserved. </span>
                                    </td>
                                          
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
        return $html;
    }
    /* Contract Create Send Mail End */

    /* Contract Approved Send Mail */

    public static function contractApprovedMail($contract_id)
    {
        $site_setting = DB::table('site_setting')->first();
        $contractDetails  = DriverContract::getRecordById($contract_id)->first();
        //  dd($contractDetails);
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contract Approved</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
<link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                <tr>
                    <td align="center" bgcolor="#ffffff" style="background-image: url("' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '");background-repeat: repeat-y;padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                        <img src="' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '" onerror="this.onerror=null;this.src="' . Config::get("constants.options.ImgSrcDisplay") . '/logo.png" alt="Creating Email Magic" style="display: block;margin-bottom:10px;margin-top:20px;max-height: 50px;">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 40px 30px 10px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                    <b>Hi,</b>
                                    <p style="margin-bottom:10px;">' . ucwords($contractDetails->driver_name) . ' is contract approved, below are the contract details.</p>
                                    <p> Driver Name : <strong>' . $contractDetails->driver_name . '</strong> </p>
                                    <p> Contract No : <strong>' . $contractDetails->contract_no . '</strong> </p>
                                    <p> Vehicle Number : <strong>' . $contractDetails->vehicle_number . '</strong> </p>
                                    <p> Price ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->price, 2) . '</strong> </p>
                                    <p> Deposit Price  ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->deposit_price, 2) . '</strong> </p>
                                    <p> Contract  Start Date  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->contract_start_date)) . '</strong> </p>
                                    <p> Contract  End Date  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->end_date)) . '</strong> </p>
                                    <p> Contract Month  : <strong>' . ucwords($contractDetails->contract_month) . '</strong> </p>
                                   
                                     
                                    <p style="margin-top:30px;"><small>This is to inform you that we have contract details.Hope to see you there!</small></p>
                                </td>
                            </tr> 
                        </table>
                    </td>
                </tr>
                <tr>
                    <td  bgcolor="#f9f9f9" style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #58666e; font-family: Arial, sans-serif; font-size: 10px;" width="75%">
                                &copy; Copyright 2021 - <strong>  ' . $site_setting->logo_title . ' <i class="fa fa-heart" style="color:#ef5c6a !important"></i>  </strong> <span > All rights reserved. </span>
                                </td>
                                      
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>';
        return $html;
    }


    /* Contract Approved Send Mail End */



    /* Contract Rejected Send Mail */


    public static function contractRejectMail($contract_id)
    {
        $site_setting = DB::table('site_setting')->first();
        $contractDetails  = DriverContract::getRecordById($contract_id)->first();
        //  dd($contractDetails);
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contract Disapprove</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
<link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                <tr>
                    <td align="center" bgcolor="#ffffff" style="background-image: url("' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '");background-repeat: repeat-y;padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                        <img src="' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '" onerror="this.onerror=null;this.src="' . Config::get("constants.options.ImgSrcDisplay") . '/logo.png" alt="Creating Email Magic" style="display: block;margin-bottom:10px;margin-top:20px;max-height: 50px;">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 40px 30px 10px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                    <b>Hi,</b>
                                    <p style="margin-bottom:10px;">' . ucwords($contractDetails->driver_name) . ' is contract disapprove, below are the contract details.</p>
                                    <p> Driver Name : <strong>' . $contractDetails->driver_name . '</strong> </p>
                                    <p> Contract No : <strong>' . $contractDetails->contract_no . '</strong> </p>
                                    <p> Vehicle Number : <strong>' . $contractDetails->vehicle_number . '</strong> </p>
                                    <p> Price ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->price, 2) . '</strong> </p>
                                    <p> Deposit Price  ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->deposit_price, 2) . '</strong> </p>
                                    <p> Contract  Start Date  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->contract_start_date)) . '</strong> </p>
                                    <p> Contract  End Date  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->end_date)) . '</strong> </p>
                                    <p> Contract Month  : <strong>' . ucwords($contractDetails->contract_month) . '</strong> </p>
                                   
                                     
                                    <p style="margin-top:30px;"><small>This is to inform you that we have contract details.Hope to see you there!</small></p>
                                </td>
                            </tr> 
                        </table>
                    </td>
                </tr>
                <tr>
                    <td  bgcolor="#f9f9f9" style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #58666e; font-family: Arial, sans-serif; font-size: 10px;" width="75%">
                                &copy; Copyright 2021 - <strong>  ' . $site_setting->logo_title . ' <i class="fa fa-heart" style="color:#ef5c6a !important"></i>  </strong> <span > All rights reserved. </span>
                                </td>
                                      
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>';
        return $html;
    }

    /* Contract Rejected End Mail */
    /* Early End  Contract Send Mail */

    public static function contractEarlyEndMail($contract_id)
    {
        $site_setting = DB::table('site_setting')->first();
        $contractDetails  = DriverContract::getRecordById($contract_id)->first();
        //  dd($contractDetails);
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contract Create</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
<link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                <tr>
                    <td align="center" bgcolor="#ffffff" style="background-image: url("' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '");background-repeat: repeat-y;padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                        <img src="' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '" onerror="this.onerror=null;this.src="' . Config::get("constants.options.ImgSrcDisplay") . '/logo.png" alt="Creating Email Magic" style="display: block;margin-bottom:10px;margin-top:20px;max-height: 50px;">
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 40px 30px 10px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                    <b>Hi,</b>
                                    <p style="margin-bottom:10px;">' . ucwords($contractDetails->driver_name) . ' is early contract termination , below are the contract details.</p>
                                    <p> Driver Name : <strong>' . $contractDetails->driver_name . '</strong> </p>
                                    <p> Contract No : <strong>' . $contractDetails->contract_no . '</strong> </p>
                                    <p> Vehicle Number : <strong>' . $contractDetails->vehicle_number . '</strong> </p>
                                    <p> Price ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->price, 2) . '</strong> </p>
                                    <p> Deposit Price  ' . Config::get('constants.options.CurrencyFormat') . '   : <strong>' . number_format($contractDetails->deposit_price, 2) . '</strong> </p>
                                    <p> Contract  Start Date  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->contract_start_date)) . '</strong> </p>
                                    <p> Contract  End Date  : <strong>' . date(Config::get('constants.options.DateFormat'), strtotime($contractDetails->end_date)) . '</strong> </p>
                                    <p> Contract Month  : <strong>' . ucwords($contractDetails->contract_month) . '</strong> </p>
                                   
                                     
                                    <p style="margin-top:30px;"><small>This is to inform you that we have contract details.Hope to see you there!</small></p>
                                </td>
                            </tr> 
                        </table>
                    </td>
                </tr>
                <tr>
                    <td  bgcolor="#f9f9f9" style="padding: 30px 30px 30px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #58666e; font-family: Arial, sans-serif; font-size: 10px;" width="75%">
                                &copy; Copyright 2021 - <strong>  ' . $site_setting->logo_title . ' <i class="fa fa-heart" style="color:#ef5c6a !important"></i>  </strong> <span > All rights reserved. </span>
                                </td>
                                      
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>';
        return $html;
    }
    /* Early End Contract Send Mail End */
}
