<?php
    
    use PHPMailer\PHPMailer\PHPMailer; //This must be at the top of the page
    use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/Exception.php'; //This must come second 
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        require '../app/config.php'; //email config stored in seperate file

		$from = $_POST['email']; // this is the inquiry's Email address
		$name = $_POST['name']; //this is inquiry's name
        $sub = $_POST['subject']; //this is the subject 
		$regarding = "Form submission: " . $sub; //this is inquiry auto-gen subject
		$message = $name . " wrote the following:" . "<br />" . $_POST['message']; //change this in future
		$headers = "From:" . $from; //not used 

        $mail = new PHPMailer(true); //instantiates a new PHPmailer

        $mail->SMTPDebug = 0; //used for debugging
        $mail->isSMTP(); //desclares that SMTP is used 

        $mail->Host = $externalMailHost; //from config file
        $mail->SMTPAuth = $externalMailSMTPAuth; //from config file
        $mail->Username = $externalMailUsername; //from config file
        $mail->Password = $externalMailPassword; //from config file
        $mail->SMTPSecure = $externalMailSMTPSecure; //from config file
        $mail->Port = $externalMailPort; //from config file
        
        $mail->setFrom($externalMailAddress, 'Webmaster'); //from config file
        $mail->addAddress($mySendToEmail); //from config file
        $mail->addReplyTo($from, $name); //from $_POST form submit 

		//Content
		$Mail->Priority    = 1; 
		$Mail->CharSet     = 'UTF-8';
		$Mail->Encoding    = '8bit';
		$Mail->ContentType = 'text/html; charset=utf-8\r\n';
        $mail->isHTML(true);    
        $mail->Subject = $regarding;
        $mail->Body = $message;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }    
