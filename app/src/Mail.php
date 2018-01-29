<?php

namespace app\src;

include_once __DIR__ . '/../lib/PHPMailer/src/PHPMailer.php';
include_once __DIR__ . '/../lib/PHPMailer/src/Exception.php';
include_once __DIR__ . '/../lib/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use app\src\model\User;
use app\src\App;

class Mail {

	/**
	 * Send email.
	 *
	 * @param User $to
	 * @param string $subject
	 * @param string $message
	 * @param string $headers
	 * @return void
	 */
	public static function send(User $to, string $subject, string $view)
	{
		# If user has disabled notifications, leave him be
		if (!$to->notifications)
			return;

		$mail = new PHPMailer;

		# Mail settings
		$mail->isSMTP();
		$mail->SMTPDebug = App::env()['app']['debug'];
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;

		# Email credentials
		$mail->Username = App::env()['mail']['from'];
		$mail->Password = App::env()['mail']['password'];
		$mail->setFrom($mail->Username, 'Friender');
		$mail->AddReplyTo($mail->Username, 'Friender');
		$mail->addAddress($to->email, $to->first_name . ' ' . $to->last_name);

		# Write mail
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$filename = __DIR__ . "/view/mail/$view.php";
		if (file_exists($filename))
			$mail->msgHTML(file_get_contents($filename));

		# Send the message, check for errors
		if (!$mail->send())
			if (App::env()['app']['debug'])
				echo "Mailer Error: " . $mail->ErrorInfo;
			else
				echo "Message sent!";
	}
}