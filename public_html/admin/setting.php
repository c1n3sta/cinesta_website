<?
require_once('config.php');


$Page=new Page('setting');

$Page->form[]=new textType('site_name','Название сайта');
$Page->form[]=new textType('phone','Телефон');
$Page->form[]=new textType('mail','Email');
$Page->form[]=new textType('mailsend','Email для отправки заявок');
$Page->form[]=new textType('address','Адрес');
$Page->form[]=new textType('footer_text','Текст в подвале слева');
$Page->form[]=new textareaType('map','Карта в контактах');
echo $HEADER;
if(ADMIN <> "true" && MODER <> "true" && AUTHOR <> "true")
{
	header("location: /admin");
	exit;
}

if(isset($_POST['edit']))
{
	$_SESSION['notice'] = "Изменения приняты";
	$values=array();
	chdir("../images/".$Page->table."/");
	foreach ($Page->form as $formi) {
			if($formi->type!="img")$values[$formi->name]=$formi->get($_POST[$formi->name]);
			else{
				$img = $_POST["img_".$formi->name];
				if(isset($img))
				{
					$ress = mysql_query("SELECT * FROM ".$Page->table." where id=".$Page->id);
					$rows = mysql_fetch_array($ress);
					unlink(trim($rows[$formi->name]));
					mysql_query("UPDATE ".$Page->table." SET ".$formi->name."='' where id=".$Page->id);
					unset($img);
				}
				if (is_uploaded_file($_FILES[$formi->name]['tmp_name'])) 
				{
					$filename = $_FILES[$formi->name]['name'];
					$path_info = pathinfo($filename);
					$extension = $path_info['extension'];
					$path = rus_to_eng($path_info['filename'])."-".time().".".$extension;	
					move_uploaded_file($_FILES[$formi->name]['tmp_name'], $path);
					$nwidth1 = $formi->width;
					$nheight1 = $formi->height;
					$imageinfo = getimagesize($path);
					$width = $imageinfo[0];
					$height = $imageinfo[1];
					$nheight = $nheight1;
					$nwidth = ($nheight/$height)*$width;
					if ($nwidth < $nwidth1)
					{
						$nwidth = $nwidth1;
						$nheight = ($nwidth/$width)*$height;
					}
					else if ($nheight < $nheight1)
					{
						$nheight = $nheight1;
						$nwidth = ($nheight/$height)*$width;
					}
					exec("convert -resize ".round($nwidth)."x".round($nheight)." -quality 90 ".$path." ".$path."");
					exec("convert -gravity Center -crop ".$nwidth1."x".$nheight1."+0+0 -quality 90 ".$path." ".$path."");
					$ress = mysql_query("SELECT * FROM ".$Page->table." where id=".$Page->id);
					$rows = mysql_fetch_array($ress);
					unlink(trim($rows[$formi->name]));
					$values[$formi->name] = $path;
				}
			}
	}

	$query="UPDATE ".$Page->table." SET ";
	$i=0;
	foreach ($values as $key => $value) {
		if($i!=0)$query.=', ';
		$query.="`$key`='$value'";
		$i++;
	}	
	mysql_query($query);
	header("location: ".$_SERVER['PHP_SELF']."");
	exit;
}

else
{
	$sq=mysql_query("SELECT * FROM ".$Page->table); 
	$row=mysql_fetch_assoc($sq); 
	if ($row) 
	{ 
		echo "<form action='".$_SERVER['PHP_SELF']."' method='post'  enctype='multipart/form-data'>";
		foreach ($Page->form as $formi) {
			echo $formi->print_element($row[$formi->name]);
		}
		echo "
			<div class='formbox_submit'>
				<input name='edit' type='submit' value='Отправить' class='button' />
			</div>
		</form>";
	}
}

echo $FOOTER;
?>