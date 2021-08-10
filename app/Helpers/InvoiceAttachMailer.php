<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\DriverContract;
use App\PaymentLog;
use Config;

class InvoiceAttachMailer
{
    /*
     * @params url du document ajout� */

    
    public static function cronJobPaymentLogUpdate($contract_id, $payment_log_id = "")
    {
        $site_setting = DB::table('site_setting')->first();
        $contractDetails  = DriverContract::getRecordById($contract_id)->first();
        if (empty($contractDetails)) {
            return    $html = '';
        }
         $paymentLogData  = PaymentLog::getRecordByContractId($contract_id)->where('status', 'Pending')->get();

        $html = '<!DOCTYPE html>
        <html>
        <head>
            <title>Invoice</title>
        </head>
        <body style="font-size: 14px;">
        <table style="margin-right: auto;margin-left: auto;width: 60%;max-width: 800px;">
            <tr>
                <td colspan="4" style="text-align: center;"><img src="' . Config::get("constants.options.ImgSrcDisplay") . '/site_setting/' . $site_setting->logo . '" width="80px" height="50px"></td>
            </tr>
            <tr>
                <td colspan="4" style="padding-bottom: 10px;text-align: center;font-size: 20px;"><b>Invoice</b></td>
            </tr>
             
            <tr style="font-size: 24px;">
                <td colspan="2"><b>' . $site_setting->logo_title . '</b></td>
                <td colspan="2" style="direction: rtl;font-size: 22px;"><b>Contract No # ' . $contractDetails->contract_no . '</b></td>
            </tr>
            <tr>
                <td style="padding-top:10px;"></td>
            </tr>
            <tr>
                <td colspan="4" style="border-bottom: 1px solid black;"></td>
            </tr>
            <tr>
                <td style="padding-top:10px;"></td>
            </tr>
            <tr>
                <td colspan="2"><b>Billed To:</b></td>
                <td colspan="2" style="float: right;"><b>Shipped To:</b></td>
            </tr>
            <tr>
                <td colspan="2">ADRIVE </td>
                <td colspan="2" style="float: right;">' . $contractDetails->driver_name . '</td>
            </tr>
            
            
        
            <tr>
            <td colspan="2"></td>
            <td style="float: right;">' . $contractDetails->driver_email . '</td>
        </tr>
            <tr>
                <td style="padding-top:10px;"></td>
            </tr>
            
            <tr>
                  <td colspan="2"><b></b></td>  
                <td style="float: right;"><b>Order Date:</b></td>
            </tr>
            
            <tr>
            <td colspan="2"></td>
        
            <td style="float: right;">October 7, 2016</td>
        </tr>
        
                <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="padding-top:10px;"></td>
            </tr>
        </table>
        
        <table>
            
        
        <table style="margin-right: auto;margin-left: auto;width: 60%;border-collapse: collapse;max-width: 800px;border: 1px solid #f7f7f7;box-shadow: 1px 1px 1px #f7f7f7;">
        
                <tr style="background-color: #00000008;">
                <td colspan="4" style=" padding: 10px 10px 10px 10px;"><b>Summary</b></td>
            </tr>
        
            <tr style="border-bottom: 1px solid #dee2e6;font-weight: bold;padding: 5px 0px">
                <td style="padding: 18px 0px 18px 22px;">Item</td>
                <td style="text-align: center">Price</td>
                
                <td style="float: right;padding: 18px 22px 18px 0px;">Totals</td>
            </tr>'; 

            $html2 = ''; 
            $total= 0;
            foreach($paymentLogData as $rwData){
                $total += $rwData->payment_amount;
            $html2 .='<tr style="border-bottom: 1px solid #dee2e6;">
                 <td style="padding: 5px 0px 5px 22px;">Week-'.$rwData->week_count.'</td>
                 <td style="text-align: center">'.$rwData->payment_amount.'</td> ';
                 }
            $html3 = '<tr>
                <td></td> 
                <td style="text-align: center;padding: 5px 0;color: #797979;"><b>Total</b></td>
                <td style="float: right;padding: 5px 22px 5px 0px;">$'.$total.'</td>
            </tr>
                     
        </table>
        
        <table style="margin-right: auto;margin-left: auto;width: 60%;max-width: 800px;">
            <tr style="text-align: center;">
                <td colspan="4" style="padding:10px 0px;">© Copyright 2021 - ADRIVE  All rights reserved.</td>
            </tr>
        </table>
        </body>
        </html> ';
        $main_html = $html . $html2.$html3;
                 if(!empty($payment_log_id)){
                    $updateArray = array('invoice_html' => $main_html);

                    $update = PaymentLog::where('id', $payment_log_id)->update($updateArray);
                 }

        return $main_html;
    }
}
