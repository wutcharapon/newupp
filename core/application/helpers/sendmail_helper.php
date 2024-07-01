<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require APPPATH . 'libraries/phpmailer/vendor/autoload.php';

if ( ! function_exists('send_mail')) {

	function send_mail($to = NULL, $from = NULL, $name = NULL, $subject = NULL, $message = NULL, $attach = NULL) {

		$mail = new PHPMailer();

		//$mail->SMTPDebug  = 1; 
		$mail->isSMTP();
		$mail->CharSet = "utf-8";
		$mail->Host = 'smtp.office365.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'notice@upp.co.th';
		$mail->Password = 'Rog85472';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port = 587;
		$mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));

		$mail->setFrom('notice@upp.co.th', 'Website UPP');
		$mail->addAddress($to);

		$mail->addReplyTo($from,$name);
		//$mail->addCC('surasak_k@upp.co.th');
		$mail->addBCC('surasak_k@upp.co.th');

		if($attach != NULL) $mail->addAttachment($attach);

		// Content
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body = $message;

		if($mail->send()){
			return true;
		} else {
			return false;
		}

	}
}