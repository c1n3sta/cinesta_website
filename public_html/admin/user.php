<?
require_once('config.php');
echo $HEADER;

if(ADMIN <> "true")
{
	header("location: /admin");
	exit;
}

if(isset($_GET['edit']) && isset($_GET['id']))
{
	$id = dataprocessing($_GET['id']);
	$userresult = mysql_query("SELECT * FROM user WHERE id='".$id."' LIMIT 1");
	if (mysql_num_rows($userresult) <> 0)
	{
		$row = mysql_fetch_array($userresult);

		echo "<form action='user.php' method='post' enctype='multipart/form-data'>
			<div class='formbox'>
				Логин<br />
				<input type='text' id='formid' name='login' value='".$row['login']."' class='input' maxlength='40' required />
			</div>
			<div class='formbox'>
				Пароль<br />
				<input type='text' id='password' name='password' value='' class='input'  maxlength='40' />
			</div>
			<div class='formbox_submit'>
				<input type='hidden' name='id' value='".$id."' />
				<input name='edit' type='submit' value='Отправить' class='button' />
			</div>
		</form>";
	}
}
else if(isset($_POST['edit']))
{
	$_SESSION['notice'] = "Пользователь изменён";
	$id = dataprocessing($_POST['id']);
	$login=dataprocessing($_POST['login']);

	$password = dataprocessing($_POST['password']);

	$seachuser = mysql_query("SELECT * FROM user WHERE login='".$login."' AND id<>'".$id."' LIMIT 1");
	if (mysql_num_rows($seachuser)<>0)
	{
		$_SESSION['notice'] = "erroruser";
		header("location: ".$_SERVER['PHP_SELF']."?id=".$id."&edit");
		exit;
	}	
	if($password <> "")
	{
		$sault = md5(uniqid(rand(), true));
		$password = md5($sault.$password);
		
		mysql_query("UPDATE user SET 
			login='".$login."'
			, password='".$password."'
			, sault='".$sault."' 
			WHERE id='".$id."'
		");
		
		if($login == $username)
		{			
			setcookie("user", $login."|".$password , time() + 1209600, "/", $_SERVER['SERVER_NAME'], "0");
			$_SESSION['user'] = $login."|".$password;
		}
	}
	else
	{
		mysql_query("UPDATE user SET 
			login='".$login."' 
			WHERE id='".$id."'
		");
	}

	header("location: ".$_SERVER['PHP_SELF']."?edit&id=".$id."");	
	exit;
}
else if(isset($_GET['add']))
{
	echo "<form action='user.php' method='post' enctype='multipart/form-data'>
		<div class='formbox'>
			Логин<br />
			<input type='text' id='formid' name='login' value='' class='input' maxlength='40' required />
		</div>
		<div class='formbox'>
			Пароль<br />
			<input type='text' id='password' name='password' value='' class='input'  maxlength='40' required />
		</div>
		<div class='formbox_submit'>
			<input name='add' type='submit' value='Отправить' class='button' />
		</div>
	</form>";
}
else if(isset($_POST['add']))
{
	$login = dataprocessing($_POST['login']);
	$password = dataprocessing($_POST['password']);

	$seachuser = mysql_query("SELECT * FROM user WHERE login='".$login."' LIMIT 1");
	if (mysql_num_rows($seachuser)<>0)
	{
		$_SESSION['notice'] = "Логин занят";
		header("location: ".$_SERVER['PHP_SELF']."?add");
		exit;
	}
	else
	{
		$_SESSION['notice'] = "Пользователь добавлен";
		$sault = md5(uniqid(rand(), true));
		$password = md5($sault.$password);
		
		mysql_query("INSERT INTO user SET 
			login='".$login."'
			, password='".$password."'
			, sault='".$sault."'
			, regdate='".time()."'
			,  lastvisit='".time()."'
			, class='1'
		");	
		
		$res = mysql_query("SELECT * FROM user ORDER BY id DESC LIMIT 1");
		$row = mysql_fetch_array($res);
		$id = $row['id'];		
	
		header("location: ".$_SERVER['PHP_SELF']."?edit&id=".$id."");
		exit;
	}
}
else if(isset($_GET['delete']) && isset($_GET['id']))
{
	$id = dataprocessing($_GET['id']);
	mysql_query("DELETE FROM user WHERE id='".$id."'");

	$_SESSION['notice'] = "Пользователь удалён";

	header("location: ".$_SERVER['PHP_SELF']."");		
}
else
{
	$sq=mysql_query("SELECT * FROM user"); 
	$all=mysql_num_rows($sq); 
	if ($all) 
	{ 
		$pnumber=20; 
		$n = new Navigator($all, $pnumber, "");
		$q=mysql_query("SELECT * FROM user ORDER BY id DESC LIMIT ".$n->start().",$pnumber"); 
		echo $n->navi();
		while ($row=mysql_fetch_array($q)) 
		{
			echo "<div class='formbox_show'>
				<div class='show_name'>".$row['login']."</div>";
				
				if(USER_ID == 1 || $row['id'] > 1)
				{
					echo "<a class='top_button' id='delete".$row['id']."' href='".$_SERVER['PHP_SELF']."?delete&amp;id=".$row['id']."'>Удалить</a>
					<a class='top_button' href='".$_SERVER['PHP_SELF']."?edit&amp;id=".$row['id']."'>Редактировать</a>";
				}
				
				echo "<div class='clear'></div>
				<script>
					$('#delete".$row['id']."').click(function() {
						var i = $(this).attr('href');
						if (confirm('Вы действительно хотите удалить?'))
						top.location.href=i;
						else return false;
					});
				</script>
			</div>";
		}
		echo $n->navi();
	}
}

echo $FOOTER;
?>