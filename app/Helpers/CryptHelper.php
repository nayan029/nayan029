<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;

class CryptHelper {
	
	public static function encryptstring($string){
		
		$encrypted = Crypt::encrypt($string);
		return $encrypted;
	}
	
}