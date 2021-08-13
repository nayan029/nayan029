<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;

use Mail;

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;

use App\Models\EmailSetting;

class MailHelper

{
	public static function mail_send($email_message, $semail, $subject)

	{
		$mail = new PHPMailer(true);

		$emailSetting = EmailSetting::getRecordById(1)->first();

		try {

			//Server settings

			/*$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output*/

			$mail->isSMTP(); // Send using SMTP

			$mail->Host = $emailSetting->smtp_server; // Set the SMTP server to send through

			$mail->SMTPAuth = true; // Enable SMTP authentication

			$mail->Username = $emailSetting->username; // SMTP username

			$mail->Password = $emailSetting->password; // SMTP password

			$mail->SMTPSecure = $emailSetting->encryption; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

			$mail->Port = $emailSetting->port; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			//Recipients

			$mail->setfrom($emailSetting->email, 'LegelBench');

			$mail->addAddress($semail);

			$mail->isHTML(true); // Set email format to HTML

			$mail->Subject = $subject;

			$mail->Body = $email_message;

			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();

			return  '1';
		} catch (Exception $e) {

			return $mail->ErrorInfo;
		}
	}
	public static function mail_send_client($email_message, $semail, $subject,$attachment = array()) 
	{
		
        $mail = new PHPMailer(true);
		try {
			//Server settings
			
		/*	$mail->SMTPDebug = SMTP::DEBUG_SERVER;        */         // Enable verbose debug output
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'apikey';                     // SMTP username
			$mail->Password   = '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';                               // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = '587';          // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('nayan.vhits@gmail.com', 'LegalBench');
			/*$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			$mail->addAddress('ellen@example.com');               // Name is optional*/
			
			$mail->addAddress($semail);
			
			$mail->addReplyTo('nayan.vhits@gmail.com', 'LegalBench');
			/*$mail->addCC('cc@example.com');
			$mail->addBCC('bcc@example.com');*/

			
			
			// Attachments
			if(count($attachment) > 0)
			{
				foreach($attachment as $attachmentdata)
				{
					$base_path = base_path('public/uploads/attachment/'.$attachmentdata->attachment);
					$mail->addAttachment($base_path);         // Add attachments
				}
			}
			
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $email_message;
			/*$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/

			$mail->send();
			/*echo 'Message has been sent';*/
			} catch (Exception $e) {
				/*echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";*/
			}
    }
}
