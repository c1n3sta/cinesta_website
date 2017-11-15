<?
require_once('config.php');
$Page=new Page('license');
$Page->id=2;

//$Page->form[]=new textEditorType('list','Контакты');
echo $HEADER;
if(ADMIN <> "true" && MODER <> "true" && AUTHOR <> "true")
{
	header("location: /admin");
	exit;
}
if(isset($_POST['edit']))
{
	$_SESSION['notice'] = "Отправлено";
	$values=array();
	

	foreach ($Page->form as $formi) {
		if($formi->type=="url"){ if(empty($_POST[$formi->name])) $values[$formi->name]=rus_to_eng($_POST[$formi->translit]);
															else $values[$formi->name]=$_POST[$formi->name];}
			else if($formi->type=="rate"){ if(empty($_POST[$formi->name])) $values[$formi->name]=0;
																		 else $values[$formi->name]=$_POST[$formi->name];}
			else if($formi->type=="img"){
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
					$values[$formi->name]=makeImg($formi->name,$formi->width,$formi->height, $formi->filters['mask'],$formi->filters['watermark']);
					$ress = mysql_query("SELECT * FROM ".$Page->table." where id=".$Page->id);
					$rows = mysql_fetch_array($ress);
					unlink(trim($rows[$formi->name]));
				}
			}else if($formi->type=="gallery"){
				$num = count($_FILES[$formi->name]['name']);
				$n=count($_POST['galtext_gal']);
				for($i=0;$i<$num;$i++)
				{
					if (is_uploaded_file($_FILES[$formi->name]['tmp_name'][$i])) 
					{
						
						$path=makeGalImg($formi->name,$formi->width,$formi->height,$i, $formi->filters['mask'],$formi->filters['watermark']);
					mysql_query("INSERT INTO gal SET `path`='".$path."', `alt`='Лицензия".($n+$i)."', `title`='Лицензия".($n+$i)."', `rate`=0,  search_id='".$Page->table."_".$Page->id."'");
						
					}
				}
			}
			else $values[$formi->name]=$formi->get($_POST[$formi->name]);
	}
	$query="UPDATE ".$Page->table." SET ";
	$i=0;
	foreach ($values as $key => $value) {
		if($i!=0)$query.=', ';
		$query.="`$key`='$value'";
		$i++;
	}	
	$query.=" WHERE `id`=".$Page->id;
	//mysql_query($query);

	$n=count($_POST['galtext_gal']);
	for($i=0;$i<$n;$i++){
		mysql_query("UPDATE gal SET `text`='".$_POST['galtext_gal'][$i]."', `alt`='".$_POST['galalt_gal'][$i]."', `title`='".$_POST['galtitle_gal'][$i]."', `rate`='".$_POST['galrate_gal'][$i]."'
		WHERE id=".$_POST['galid_gal'][$i]);
	}

	foreach($_POST['gal_gal'] as $deli){
		$row = mysql_fetch_assoc(mysql_query("SELECT * FROM gal where `id`='$deli'"));
		chdir("../images/".$Page->table."/");
		unlink(trim($row['path']));
		mysql_query('DELETE FROM gal where id='.$deli);
	}

	$handle = @fopen("mails.txt", "r");
	if ($handle) {
			$i=1;
	    while (($buffer = fgets($handle, 4096)) !== false) {
	    	if(strripos($buffer,"E-mail: ")===false) echo '<br>';
	    	else {
	    		$start=strripos($buffer,"E-mail: ");
	    		//echo substr($buffer,$start).'|';
	    		$end1=strpos($buffer,' ',$start+9);
	    		//echo substr($buffer,$end1).'|';
	    		$end2=strpos($buffer,'"',$start);
	    		//echo substr($buffer,$end2).'|';
	    		$end=$end2;
	    		if($end1<$end && $end1!==false) $end=$end1;
	    		if($end!==false) echo substr($buffer,$start+8,$end-$start-8).'<br>';
	    		else echo substr($buffer,$start+8).'<br>';
	    	}
	    	$i++;
	    	continue;
        $from = "info@cinesta.me\n";
				$subject = "=?utf-8?B?".base64_encode("Съемка роликов")."?= \n";

				$to = "=?utf-8?B?".base64_encode($buffer)."?= <".$buffer."> \n";
				
				$message = "<h1 style='color:#ff0'>ТЕКСТ</h1>";
					
				$send = mail(
					$to,
					$subject,
					$message,
					"Content-type: text/html; charset=utf-8 \n".
					"from: ".$from.""
				);
	    }
	    if (!feof($handle)) {
	        echo "Error: unexpected fgets() fail\n";
	    }
	    fclose($handle);
	}
	//header("location: ".$_SERVER['PHP_SELF']);
	//exit;
}else{
	$row=mysql_fetch_assoc(mysql_query("select * from ".$Page->table." where id=".$Page->id));
	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'  enctype='multipart/form-data'>";
	foreach ($Page->form as $formi) {
		echo $formi->print_element($row[$formi->name]);
	}
	echo "
		<div class='formbox_submit'>
			<input name='id' type='hidden' value='".$Page->id."' />
			<input name='edit' type='submit' value='Отправить' class='button' />
		</div>
	</form>";
}

echo $FOOTER;
?>