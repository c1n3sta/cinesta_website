<?
require_once('config.php');
$Page=new PageList('service');
if(isset($_GET['id'])) $Page->id=dataprocessing($_GET['id']);
if(isset($_POST['id'])) $Page->id=dataprocessing($_POST['id']);
$Page->form[]=new checkType('show','Показывать');
$Page->form[]=new textType('name','ФИО',true);
$Page->form[]=new textType('work','Должность',true);
$Page->form[]=new textEditorType('descriptions','Описание');
$Page->form[]=new imgType('path','Фото jpg,png ',278,323, $Page->table,true,array('pent'=>true,'border'=>true));
$Page->form[]=new textType('rate','Рейтинг');
if(isset($_GET['q'])) echo $Page->getSql();

echo $HEADER;
if(ADMIN <> "true" && MODER <> "true" && AUTHOR <> "true")
{
	header("location: /admin");
	exit;
}

if(isset($_GET['add'])){
	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'  enctype='multipart/form-data'>";
	foreach ($Page->form as $formi) {
		$value='';
		if($formi->name=='url') $value=$_SERVER["HTTP_REFERER"];
		if($formi->name=='show') $value=1;
		echo $formi->print_element($value);
	}
	echo "
		<div class='formbox_submit'>
			<input name='add' type='submit' value='Отправить' class='button' />
		</div>
	</form>";
}

else if(isset($_POST['add'])){
	$_SESSION['notice'] = "Добавлено";
	$values=array();
	chdir("../images/".$Page->table."/");
	foreach ($Page->form as $formi) {
			if($formi->type!="img")$values[$formi->name]=$formi->get($_POST[$formi->name]);
			else{
				$img = $_POST["img_".$formi->name];
				if(isset($img))
				{
					$ress = mysql_query("SELECT * FROM ".$Page->table." WHERE id=".$Page->id);
					$rows = mysql_fetch_array($ress);
					unlink(trim($rows[$formi->name]));
					mysql_query("UPDATE ".$Page->table." SET ".$formi->name."=''"." WHERE id=".$Page->id);
					unset($img);
				}
				if (is_uploaded_file($_FILES[$formi->name]['tmp_name'])) 
				{
					$values[$formi->name]=makeImg($formi->name,$formi->width,$formi->height, $formi->filters['pent'],$formi->filters['border']);
					$ress = mysql_query("SELECT * FROM ".$Page->table." where id=".$Page->id);
					$rows = mysql_fetch_array($ress);
					unlink(trim($rows[$formi->name]));
				}
			}
	}
	if(empty($values['rate']))$values['rate']=0;
	$query="INSERT INTO ".$Page->table." SET ";
	$i=0;
	foreach ($values as $key => $value) {
		if($i!=0)$query.=', ';
		$query.="`$key`='$value'";
		$i++;
	}	
	mysql_query($query);
	$res = mysql_query("SELECT * FROM ".$Page->table." ORDER BY id DESC LIMIT 1");
	$row = mysql_fetch_array($res);
	$id = $row['id'];		
	header("location: ".$_SERVER['PHP_SELF']."?edit&id=".$id."");
	exit;
}

else if(isset($_GET['edit'])){
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

else if(isset($_POST['edit']))
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
					$values[$formi->name]=makeImg($formi->name,$formi->width,$formi->height, $formi->filters['pent'],$formi->filters['border']);
					$ress = mysql_query("SELECT * FROM ".$Page->table." where id=".$Page->id);
					$rows = mysql_fetch_array($ress);
					unlink(trim($rows[$formi->name]));
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
	$query.=" WHERE `id`=".$Page->id;
	mysql_query($query);
	header("location: ".$_SERVER['PHP_SELF']."?edit&id=".$Page->id);
	exit;
}

else if(isset($_GET[delete]))
{
	$_SESSION['notice'] = "Удалено";
	$id = dataprocessing($_GET['id']);
	chdir("../images/".$Page->table."/");
	$ress = mysql_query("SELECT * FROM ".$Page->table." WHERE id='".$Page->id."'");
	$rows = mysql_fetch_array($ress);
	foreach ($Page->form as $formi) {
			if($formi->type=='img') unlink(trim($rows[$formi->name]));
	}	
	mysql_query("DELETE FROM ".$Page->table." WHERE id='".$Page->id."'");
	header("location: ".$_SERVER['PHP_SELF']);
	exit;
}

else{
	$sq=mysql_query("SELECT count(*) FROM  ".$Page->table); 
	$all=mysql_num_rows($sq); 
	if ($all) 
	{ 
		$n = new Navigator($all, 40, "");
		$query="SELECT * FROM ".$Page->table." LIMIT ".$n->start().",40";
		$res = mysql_query($query);
		echo $n->navi();
		while($row=mysql_fetch_assoc($res)){
			if($row['show'] == 0) $cl = "style='color: #f00;'";
			else $cl = "";
		
			echo "<div class='formbox_show'>
				<div class='show_name' $cl>";
				foreach($Page->form as $formi){
					if($formi->inSearch) {
						if($formi->name!='price') echo $formi->print_inSearch($row[$formi->name]);
						else echo '<div style="color:#d6982c">'.$row[$formi->name].'Р</div>';
					}
				}
				echo "</div>";
				echo "<a class='top_button' id='delete".$row['id']."' href='".$_SERVER['PHP_SELF']."?delete&amp;id=".$row['id']."'>Удалить</a>";
				echo "<a class='top_button' href='".$_SERVER['PHP_SELF']."?edit&amp;id=".$row['id']."'>Редактировать</a>
				<div class='clear'></div>
				<script>
					$('#delete".$row['id']."').click(function() {
						var i = $(this).attr('href');
						if (confirm('Вы действительно хотите удалить?'))
						top.location.href=i;
						else return false;
					});
				</script>
				<div class='clear'></div>
			</div>";
		}
		echo $n->navi();
	}
}
echo $FOOTER;
?>