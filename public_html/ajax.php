<?php
if(isset($_POST['send'])){
		$from = "hello@cinesta.me\n";
		$subject = "=?utf-8?B?".base64_encode($_POST['send'])."?= \n";
		$to = "=?utf-8?B?".base64_encode("sales@cinesta.me")."?= <sales@cinesta.me> \n";
		//$to = "=?utf-8?B?".base64_encode("z8138@yandex.ru")."?= <z8138@yandex.ru> \n";
		$message='<h1>'.$_POST["send"].'</h1><br>';
		if(!empty($_POST["phone"])) $message.="<strong>Телефон</strong>: ".$_POST["phone"].'<br>';
		if(!empty($_POST["nisha"])) $message.="<strong>Услуга</strong>: ".$_POST["nisha"].'<br>';
		if(!empty($_POST["price"])) $message.="<strong>Цена</strong>: ".$_POST["price"].'руб.<br>';
		$message.="<p><br>© Cinesta 2013-2017. Все права защищены</p>";
		/*$send = mail(
			$to,
			$subject,
			$message,
			"Content-type: text/html; charset=utf-8 \n".
			"from: ".$from.""
		);*/
		echo $message;
		file_put_contents("email_log.txt", date("Y-m-d H:i:s ").' '.$message."\n", FILE_APPEND | LOCK_EX);
		exit;
}
?>