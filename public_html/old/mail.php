<?php
if(isset($_POST['tarifType'])){
	echo $_POST['tarifType'].' - '.$_POST['name'].' - '.$_POST['mail'];	
	$to      = 'hello@cinesta.me';
	$subject = 'Заказ';
	$message = 'Заказан тариф yf '.$_POST['tarifType'].'р. Имя:'.$_POST['name'].'. Почта: '.$_POST['mail'];
	$headers = 'From: hello@cinesta.me' . "\r\n" .
    	'Reply-To: hello@cinesta.me' . "\r\n" .
    	'X-Mailer: PHP/' . phpversion();
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	//mail($to, $subject, $message, $headers);
}
?>
