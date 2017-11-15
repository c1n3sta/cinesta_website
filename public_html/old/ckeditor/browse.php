<?
/* ------ Design By Ziliboba (ziliboba0213@yandex.ru) ------ */
require_once('../config.php');
if(ADMIN <> "true")
{
	header("location: ".SCRIPT_FOLDER."");
	exit;
}
echo "<script type='text/javascript' src='/jquery/jquery.js'></script>
<script type='text/javascript' src='/ckeditor/ckeditor.js'></script>";

$funcNum = $_GET['CKEditorFuncNum'] ;
$CKEditor = $_GET['CKEditor'] ;
$langCode = $_GET['langCode'] ;


$current_dir = "../upload/";
$dir = opendir($current_dir);
echo "<ul>";
$i=1;
while ($file = readdir($dir))
{
	if($file<>'..' && $file<>'.') echo "<li><span id='file".$i."' style='cursor: pointer'><img src='/upload/".$file."' style='height: 100px; float: left'/> ".$file."<div style='clear: both'></div></span></li>";
	$http_path = '/upload/'.$file;
	echo "<script type='text/javascript'>
		$('#file".$i."').click(function(){
			window.opener.CKEDITOR.tools.callFunction( '$funcNum', '$http_path');
			self.close();
		});
	</script>";
	$i++;
}
echo "</ul>";
closedir($dir);

?>