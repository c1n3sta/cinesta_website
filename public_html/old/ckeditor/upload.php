<?
/* ------ Design By Ziliboba (ziliboba0213@yandex.ru) ------ */
require_once('../config.php');
if(ADMIN <> "true")
{
	header("location: ".SCRIPT_FOLDER."");
	exit;
}

$funcNum = $_GET['CKEditorFuncNum'] ;
$CKEditor = $_GET['CKEditor'] ;
$langCode = $_GET['langCode'] ;

$file_name = $_FILES['upload']['name'];
$file_name_tmp = $_FILES['upload']['tmp_name'];
$dir = '../upload/'; // серверный адрес - папка для сохранения файлов. (нужны права на запись)
chdir($dir);
$http_path = '/upload/'.$file_name; // адрес изображения для обращения через http
$error = '';
if( move_uploaded_file($file_name_tmp, $file_name) )
{
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$http_path', 'Файл загружен');</script>";	
}
else
{
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$http_path', 'Ошибка загрузки файлов');</script>";
}
?>