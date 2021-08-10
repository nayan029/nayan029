<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\ContractPeriod;
use App\DriverContract;
use App\ContractAmount;
use Auth;
use Mail;
use App\User;
use Notification;
use App\Notifications\MyFirstNotification;

class MessageHelper
{

    public static function displaySuccessToastMessage($nameModule, $message){

        $message="";
        if ($nameModule == 'driverContract') {
            $message = "Inserted Successfully";
        }

    }
}
