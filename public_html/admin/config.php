<?
/* --- Соединение с базой MYSQL --- */
require_once("../db.php");
/* --- // --- */
/* --- Константы --- */
define ("EDIT", "Редактировать");
define ("DELETE", "Удалить");
define ("SEND", "Отправить");
/* --- // --- */
/* --- Псевдо УРЛ --- */
function Clear_array($array)
{
	$c=sizeof($array);
	$tmp_array=array();
	for($i=0; $i<$c; $i++)
	{
		if (!(trim($array[$i])==""))
		{
			$tmp_array[]=$array[$i];
		}
	}
	return $tmp_array;
}
$param=$_SERVER['REQUEST_URI'];
$params=explode("/",$param);
$params=Clear_array($params);
/* --- // --- */
/* --- Определение пользователя --- */
if(isset($_COOKIE['user']))
{
	$user = dataprocessing($_COOKIE['user']);
}
elseif(isset($_SESSION['user']))
{
	$user = dataprocessing($_SESSION['user']);	
}
$user = explode("|",$user);
$username = $user['0'];
$userpassword = $user['1'];
$usersearch = mysql_query("SELECT * FROM user WHERE login='".$username."' AND password='".$userpassword."' AND class='1' LIMIT 1");
if (mysql_num_rows($usersearch) <>0) {
	$usersearchresult = mysql_fetch_array($usersearch);
	mysql_query("UPDATE user SET lastvisit='".time()."' WHERE login='".$username."' AND password='".$userpassword."'");
	define("USER_LASTVISIT", time());
	define("USER", "true");
	define("USER_LOGIN", $usersearchresult['login']);
	define("USER_ID", $usersearchresult['id']);
	if($usersearchresult['class'] == 1) define("ADMIN", "true");
}
else 
{
	if (isset($_COOKIE['user'])) 
	{
		setcookie("user", "", time() - 7200, "/", $_SERVER['SERVER_NAME'], "1");
	}
	session_destroy();
	define("USER_LASTVISIT", time());
}
/* --- // --- */
/* --- Работа с присланными данными пользователя --- */
function dataprocessing ($value)
{
	$value = trim($value);
	$value = preg_replace("/[\r\n]{3,}/i","\r\n\r\n", $value);
	$value = stripslashes($value);
	$value = strip_tags($value);
	$value = htmlspecialchars($value);
	$value = mysql_escape_string($value);
	return $value;
}
function adataprocessing ($value)
{
	$value = trim($value);
	$value = preg_replace("/[\r\n]{3,}/i", "\r\n\r\n", $value);
	$value = stripslashes($value);
	$value = mysql_escape_string($value);
	return $value;
}
/* --- // --- */
/* --- Замена алфавита на транслит --- */
function rus_to_eng($text)
{
$text = trim($text);
$text = str_replace(array('А','а','Б','б','В','в','Г','г','Д','д','Е','е','Ё','ё','Ж','ж','З','з','И','и','Й','й','К','к','Л','л','М','м','Н','н','О','о','П','п','Р','р','С','с','Т','т','У','у','Ф','ф','Х','х','Ц','ц','Ч','ч','Ъ','ъ','Ы','ы','Ь','ь','Э','э','Ю','ю','Я','я','Ш','ш','Щ','щ'),   
		    array('a','a','b','b','v','v','g','g','d','d','e','e','e','e','zh','zh','z','z','i','i','y','y','k','k','l','l','m','m','n','n','o','o','p','p','r','r','s','s','t','t','u','u','f','f','h','h','c','c','ch','ch','','','i','i','','','e','e','u','u','ya','ya','sh','sh','sch','sch'),   
		   $text);
$text = preg_replace("|[^a-z0-9\s]|i", "", $text);
$text = preg_replace("|\s|", "-", $text);
return $text;
}
/* --- // --- */
/* --- Случайный пароль --- */
function random_password()
{
	$out = '';
	$arr = array();
	for($i=97; $i<123; $i++) $arr[] = chr($i);
	for($i=65; $i<91; $i++) $arr[] = chr($i);
	for($i=0; $i<10; $i++) $arr[] = $i;
	shuffle($arr);
	for($i=0; $i<9; $i++)
	{
		$out .= $arr[mt_rand(0, sizeof($arr)-1)];
	}
	return $out;
}
/* --- // --- */
/* --- Подключение CKEditor --- */
require_once('../ckeditor/ckeditor.php') ;
function fckeditor($name, $value, $height, $width, $style)
{
	$ckeditor = new CKEditor($name) ;
	$ckeditor->returnOutput = true;
	$ckeditor->config['ToolbarSet'] = $style;
	$ckeditor->config['width'] = $width;
	$ckeditor->config['height'] = $height;
	$CKEditor->basePath = 'ckeditor/';
	return $ckeditor->editor($name, $value, $config);
}
/* --- // --- */
/* --- Навигация страниц --- */
class navigator
{
	function navigator($all,$pnumber,$query)
	{
		$this->all=$all;
		$this->pnumber=$pnumber;
		$this->query=$query;
		if(isset($_GET['page']))
		{
			$this->page = (int)$_GET['page'];
		}
		else
		{
			$this->page = 1;
		}
	}
	function num_pages()
	{
		$this->num_pages=ceil($this->all/$this->pnumber);
		return $this->num_pages;
	}
	function start()
	{
		$this->num_pages=ceil($this->all/$this->pnumber);
		if ($this->page>$this->num_pages)
		{
			$this->page=$this->num_pages;
		}	
		if (isset($_GET['last']))
		{
			$this->page=$this->num_pages;
		}
		$this->start=$this->page*$this->pnumber-$this->pnumber;
		if ($this->page > $this->num_pages || $this->page < 1)
		{
			$this->page=$this->num_pages;
		}
		return abs($this->start);
	}
	function navi()
	{
		if ($this->page < $this->num_pages) 
		{
			$next = "<div class='next_page'>
				<a href='".$_SERVER['SCRIPT_NAME']."?page=".($this->page+1).$this->query."'>следующая &#8594;</a>
			</div>";
		}
 		else 
		{
			$next ="";
		}
		if ($this->page > 1) 
		{
			$prev = "<div class='prev_page'>
				<a href='".$_SERVER['SCRIPT_NAME']."?page=".($this->page-1).$this->query."'>&#8592; предыдущая</a>
			</div>";
		}
		else
		{
			$prev ="";
		}
		if ($this->num_pages<2)
		{
			return "";
		}
		$main = $prev."<div class='block_nav'><table class='nav_table'><tr><td>";
		for($pr = "", $i =1; $i <= $this->num_pages; $i++)
		{
			if($i == 1 || $i == $this->num_pages || abs($i-$this->page) < 7)
			{
				if($i == $this->page)
				{
					$pr = "<div class='active_nav'>".$i."</div>";
				}
				else
				{
					$pr = "<div class='noactive_nav'><a href='".$_SERVER['SCRIPT_NAME']."?page=".$i.$this->query."'>".$i."</a></div>";
				}
			}
			else
			{
				if($pr == "<div class='etc'>...</div>" || $pr == "")
				{
					$pr = "";
				}
				else
				{
					$pr = "<div class='etc'>...</div>";
				}
			}
		$main .= $pr;
		}
		$main .= "<div class='clear'></div><td></tr></table></div>";
		return "<div class='navigation'>".$next.$main."</div>";
	}
}
/* --- // --- */
/* --- Панель администратора --- */
$adminpanel = array(
	"mailtemplate.php|Шаблоны письма",	
	"mail.php|Рассылка",
//	"brand.php|Бренды",
//	"license.php|Лицензии",
//	"setting.php|Настройки",
//	"personal.php|Персонал", 
//	"user.php|Пользователи", 
//	"page.php|Страницы",
//	"tz.php|ТЗ",
//	"uslugi.php|Услуги", 
//	"seo.php|Seo"
);
/* --- // --- */
$cres = mysql_query("SELECT * FROM setting WHERE id='1' LIMIT 1");
$crow = mysql_fetch_array($cres);
/* --- Кнопки показа всех записей и добавления новой --- */
if($_SERVER['PHP_SELF'] <> "/admin/setting.php")
{
	$button = "<a href='".$_SERVER['PHP_SELF']."' class='top_button'>Показать</a>
		<a href='".$_SERVER['PHP_SELF']."?add' class='top_button'>Добавить</a>";
}
else $button = "";
/* --- // --- */
/* --- Тема --- */
define ("THEME_NAME", "VT");
ini_set('include_path', getenv("DOCUMENT_ROOT")."/");
define ("THEME", 'theme/'.THEME_NAME);
define("THEME_FOLDER", "https://".$_SERVER['SERVER_NAME']."/admin/theme/".THEME_NAME."/");
define ("CSS", "https://".$_SERVER['SERVER_NAME']."/admin/theme/".THEME_NAME."/style.css");
define ("JQUERY", "https://".$_SERVER['SERVER_NAME']."/admin/js/jquery.js");
define ("FCKEDITOR", "https://".$_SERVER['SERVER_NAME']."/ckeditor/ckeditor.js");
require_once(THEME."/theme.php");
/* --- // --- */

require_once("adminConsructor.class.php");
?>