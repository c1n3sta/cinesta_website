<?

/* --- Панель администратора --- */

	$admin_menu = "";
	
	foreach($adminpanel as $adminpanel) 
	{
		$nav = explode ("|", $adminpanel);
		if($_SERVER['PHP_SELF'] == "/admin/".$nav[0])
		{
			$admin_menu .= "<section class='admin_menu'><a href='".$nav[0]."' class='admin_menu_link1'>".$nav[1]."</a></section>";
			$name = $nav[1];
		}
		else $admin_menu .= "<section class='admin_menu'><a href='".$nav[0]."' class='admin_menu_link'>".$nav[1]."</a></section>";
	}

/* --- // --- */


/* --- Окно предупреждения --- */

if($_SESSION['notice'] <> "")
{
	$notice = "<div id='alert'><div id='alert_head'>Предупреждение</div><br />".$_SESSION['notice']."<br /><br /><input type='button' value='OK' onclick=\"alertz('#alert'); return false\" class='button_alert' /></div>";
	$_SESSION['notice']="";
}
else $notice = "";

/* --- // --- */


/* --- Переменная показа сайта до центрального текста --- */

$HEADER = "<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8' />
	<title>Панель управления сайтом | cinesta.me</title>
	<link rel='stylesheet' type='text/css' href='".CSS."?v=1' />
	<link rel='shortcut icon' href='favicon.ico' />
	<script src='".JQUERY."'></script>
	<script src='".FCKEDITOR."'></script>
	<script src='http://api-maps.yandex.ru/2.0/?load=package.standard&amp;mode=debug&amp;lang=ru-RU' type='text/javascript'></script>
</head>
<body class='admin'>
	
	<section class='top'>
		<section class='top_left'>
			<a href='https://".$_SERVER['SERVER_NAME']."' class='top_left_link' rel='external'><img src='".THEME_FOLDER."images/logo.jpg' alt='' style='    width: 150px;    padding-top: 23px;'/></a>
		</section>

		<header class='admin_header'>
		<section class='head_user'>
			<span class='head_user_txt'>Вы вошли как:</span>
			<span class='head_user_name'>".USER_LOGIN."</span>
			<a href='/admin/index.php?destroy' class='head_user_out'>Выйти</a>
		</section>
		<div class='clear'></div>
		</header>
		<section class='top_right'>
			<section class='top_name'>".$name."</section>
			".$button."
			<div class='clear'></div>
		</section>
		<div class='clear'></div>
	</section>
	<nav>
		".$admin_menu."
	</nav>
	<section class='content'>
		".$notice."
";

/* --- // --- */


/* --- Переменная показа сайта после центрального текста --- */

$FOOTER = "	
	</section>
	<div class='clear'></div>
	<footer>
		&copy; ".date('Y',time())." cinesta.me
	</footer>
</body>
</html>";

/* --- // --- */


/* --- Переменная показа сайта до центрального текста (авторизация) --- */

$IHEADER = "<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8' />
	<title>Панель управления сайтом | cinesta.me</title>
	<link rel='stylesheet' type='text/css' href='".CSS."?v=1' />
	<link rel='shortcut icon' href='favicon.ico' />
	<script src='".JQUERY."'></script>
	<script src='".FCKEDITOR."'></script>
</head>
<body class='index'>
	<div class='index_content'>
		<section class='logo_index'><img src='".THEME_FOLDER."images/logo.jpg' alt='' style='height:42px; margin-top:10px'/></section>
";

/* --- // --- */


/* --- Переменная показа сайта после центрального текста (авторизация) --- */
	
$IFOOTER = "
	</div>
</body>
</html>";

/* --- // --- */

?>