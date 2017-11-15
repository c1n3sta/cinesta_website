<?php
ob_start();
session_start();
$connect=mysql_connect("localhost","goshanthe3","G8TKfRGNG");
mysql_select_db ("goshanthe3");
$RealRef='';
if(isset($_GET['new'])){
	$RealRef='instagram';
}
if(strripos($_SERVER["HTTP_REFERER"],"vk")){
	$RealRef='vkontakte';
}
if(strripos($_SERVER["HTTP_REFERER"],"t.co")){
	$RealRef='twitter';
}
if(strripos($_SERVER["HTTP_REFERER"],"facebook")){
	$RealRef='facebook';
}
$query = "INSERT INTO Statistik VALUES ('','"
         .$_SERVER["REMOTE_ADDR"]."', '".$_SERVER["HTTP_REFERER"]."','".date("Y-m-d H:i:s")."','".$RealRef."')";
$result = mysql_query ( $query );

?>