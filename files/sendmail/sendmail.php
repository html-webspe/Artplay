<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	/*
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'user@example.com';                     //SMTP username
	$mail->Password   = 'secret';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	*/

	//От кого письмо
	$mail->setFrom('myhoome19@gostinydom.pl'); // Указать нужный E-mail
	//$mail->addAddress('myhoome19@gmail.com'); 
	$mail->addAddress('andreypbiz@gmail.com'); // Указать нужный E-mail
	//Тема письма


	if(trim(!empty($_POST['firstName']))){

		$mail->Subject = 'Subject';

		$body = '<p><b>firstName:</b>' . $_POST['firstName'] .'</p>';
		$body.= '<p><b>lastName:</b> ' . $_POST['lastName'].'</p>';
		$body.= '<p><b>license:</b>'. $_POST['license'].'</p>';
		$body.= '<p><b>taxNumber:</b>'. $_POST['taxNumber'].'</p>';
		$body.= '<p><b>legalName:</b>'. $_POST['legalName'].'</p>';
		$body.= '<p><b>instagram:</b>'. $_POST['instagram'].'</p>';
		$body.= '<p><b>phone:</b>'. $_POST['phone'].'</p>';
		$body.= '<p><b>email:</b>'. $_POST['email'].'</p>';
		$body.= '<p><b>address:</b>'. $_POST['address'].'</p>';
	}
	
	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>