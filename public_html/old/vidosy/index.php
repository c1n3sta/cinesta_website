<?php

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
mysql_close ( $connect);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cinesta</title>
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<script src="jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="jquery.zclip.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76579922-1', 'auto');
  ga('send', 'pageview');

</script>
<style type="text/css">
body{
	font-family:"MS Serif", "New York", serif;	
}
.ankers a{
	display:block;
	width:50%;
	color:#ffffff;
	font-weight:normal;
	float:left;
	text-decoration: none;
	background:none;
	text-align: center;
}
}
.b-container{
    width:200px;
    height:150px;
    margin:0px auto;
    padding:10px;
    font-size:30px;
    color: #fff;
}
.b-popup{
    width:100%;
    height: 2000px;
    background-color: rgba(0,0,0,0.9);
    overflow:hidden;
    position:fixed;
    top:0px;
	z-index:1000;
}
.b-popup .b-popup-content{
    margin:200px auto 0px auto;
    width:440px;
    height: 88px;
    padding-top:20px;
    padding-bottom:20px;
    padding-left:25px;
    padding-right:25px;	
    box-shadow: 0px 0px 10px #000;
	background:url(img/popup.png);
}
.suck{
	background-color:#eab0b0;
	color:#FFF;
	width:210px;
	line-height:40px;
	height:40px;
	padding:3px;
	opacity:0.9;
	font-weight:bold;
	font-size:22px;
	display:block;
	border-radius:8px;
	text-decoration: none;
}
.suckPopup{
	background-color:#eab0b0;
	color:#fff;
	width:104px;
	line-height:20px;
	height:24px;
	padding:3px;
	text-align:center;
	font-weight:bold;
	font-size:18px;
	display:block;
	text-decoration: none;
}
#vidosik{
	overflow:hidden;
	position:relative;
	width:auto;
}
h2{
	text-align:center;
	margin:0px;
	font-size:48pt;
	padding:0px;
	color:#ccc;	
}
.slide{
	
}
#fuzz{ 
	position:absolute; top:0; left:0; width:100%; z-index:1000; background: url('img/fuzz.gif'); display:none; text-align:left; 
}
#slide3{
	min-height:403px;	
}
</style>

<script>
	var tarif=0;
	var send=-1;
    $(document).ready(function(){
        //Скрыть PopUp при загрузке страницы    
		$("#popup1").hide();
		$("body").click(function(e) {
    		PopUpHide();
		});
		$("#popup").click(function(e) {
    		e.stopImmediatePropagation();
		});
        //PopUpHide();
    });
    //Функция отображения PopUp
    function PopUpShow(tarifi){
		send=1;
		tarif=tarifi;
        $("#popup1").fadeIn("slow");
    }
    //Функция скрытия PopUp
    function PopUpHide(){
		if(tarif!=0 && send==1){
			$.post('mail.php',{tarifType:tarif,name:$('#name').val(),mail:$('#mail').val()}, function(data) {
  				//alert(data);
			});
			send=0;
		}
		
        $("#popup1").fadeOut("slow");
    }
	var scrollY=0;
	$(window).scroll(function() {
		MakeSize();
		
	});
	
</script>
</head>
<body bgcolor="#000000" style="height:100%;padding:0px;margin:0px;min-width:600px;">
<div id="fuzz">
</div>

<div class="b-popup" id="popup1">
    <div class="b-popup-content" id="popup">
	<table width="430" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><input type="text" value="" style="width:320px;height:26px;margin-top:10px;margin-bottom:10px;"  placeholder="Имя" id="name"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="text" value="" style="width:320px;height:26px" placeholder="Почта" id="mail"></td>
    <td><a href="javascript:PopUpHide()" class="suckPopup">заказать</a></td>
  </tr>
</table>
    </div>
</div>
<div id="main">
<div style="position: fixed;top: 0px; left:0px;width: 100%;z-index:0;">
<center>
	<img id="vidosik" src="vidosy/back.jpg"  >
</center>
</div>
<!--rightMenu-->
<div style="position:absolute; width:61px; right:35px;z-index:1001" id="rightMenu">
<table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td><a href="https://vk.com/cinesta"><img src="img/vk.png" style="border:none"></a></td>
  </tr>
  <tr>
    <td><a href="https://www.instagram.com/cinesta.me/"><img src="img/insta.png" style="border:none"></a></td>
  </tr>
</table>
</div>
<!--header -->
<div style="width:100%;background-image: url(img/menuBg.png);	background-repeat: repeat-x;position:relative" class="topMenu">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:auto;min-width:600px">
  <tr>
  	<td width="5%">&nbsp;</td>
    <td width="25%" class="logoCell"><a href="javascript:GoToNextSlide(0,1)"><span class="logoText" style="float:left; width:100%; text-align:center; font-weight:bold; color:#FFF;line-height: initial;"><img src="img/logo.png" alt="cinesta" title="cinesta" width="342" height="58"></span></a></td>
    <td width="35%">&nbsp;</td>
    <td width="30%" class="navCell" valign="middle">
    <div class="ankers" style="width:100%;margin:auto;float:left;    line-height: 33px;">
    	<a href="javascript:GoToNextSlide(0,2)">работы</a>
		<a href="javascript:GoToNextSlide(0,4)" id="price">тарифы</a>
	</div>
    </td>
    <td width="5%">&nbsp;</td>
  </tr>
</table>
</div>
<div style="position:relative;" id="slider">
<!-- Первый слайд -->
<div class="slide" id="slide1">
<div id="slide1Center" style="position:relative;">
<div style="margin-bottom:50px;">
	<h2>профессионально снимаем<br>промо-видео в инстаграм</h2>
</div>
<div style="width:100%;min-width:600px;height:30px;line-height:30px;color:#000" id="suckDiv">
	<center>
		<a href="javascript:GoToNextSlide(0,4)" class="suck">заказать</a>
	</center>
</div>
</div>
</div>
<!-- второй Слайд-->
<div class="slide" id="slide2">
<div id="slide2Center" style="position:relative;">
<div style="height:600px">
	<h2>НАШИ РАБОТЫ</h2>
   	<script src="filmrol.js"></script>
    <div id="film_roll">
  		<div>
    		<video controls="controls" width="640" height="360">
	<source src="backM.mp4" type="video/mp4" />
	<object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="640" height="360">
		<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
		<param name="allowFullScreen" value="true" />
		<param name="wmode" value="transparent" />
		<param name="flashVars" value="config={'playlist':[{'url':'backM.mp4','autoPlay':false}]}" />
		<span title="No video playback capabilities, please download the video below">backM.mp4</span>
	</object>
</video>
  		</div>
  		<div>
    		    		<video controls="controls" width="640" height="360">
	<source src="backM.mp4" type="video/mp4" />
	<object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="640" height="360">
		<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
		<param name="allowFullScreen" value="true" />
		<param name="wmode" value="transparent" />
		<param name="flashVars" value="config={'playlist':[{'url':'backM.mp4','autoPlay':false}]}" />
		<span title="No video playback capabilities, please download the video below">backM.mp4</span>
	</object>
</video>
  		</div>
	</div>
    <script>
		$(function() {
		  fr = new FilmRoll({
    		container: '#film_roll',
    		height: 330
  			});
		});
</script>
</div>
</div>
</div>
<!-- третий Слайд-->
<style>
.mainComment{
	color:#FFF;font-size:20px;font-weight:bold;
}
.dopComment{
	color:#FFF;font-size:14px;font-weight:bold;
}
</style>
<div class="slide" id="slide3">
<div id="slide3Center" style="position:relative;">
<div>
	<h2 style="margin-bottom:30px;">ПОЧЕМУ ВЫБИРАЮТ НАС?</h2>
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="33%" align="center" valign="top"><img src="img/plus3.png" width="97" height="97"><br>
    <span class="mainComment">всегда есть<br>свободные руки</span><br>
    <span class="dopComment">персональная команда<br>специалистов<br>для каждого клиента</span>
    </td>
    <td align="center" valign="top"><img src="img/plus2.png" width="97" height="97"><br>
    <span class="mainComment">работаем<br>с безналом</span><br>
    <span class="dopComment">а ещё с наличными<br>сбербанком онлайн<br>яндекс кошельком<br>рокетбанком и pay pal</span></td>
    <td width="33%" align="center" valign="top"><img src="img/plus1.png" width="97" height="97"><br>
    <span class="mainComment">умеем<br>как надо</span><br>
    <span class="dopComment">сотрудники – крутые специалисты<br>с объёмным бэкграундом</span></td>
  </tr>
</table>

</div>
<div style="width:210px;margin:auto; height:37px; color:#FFF;font-size:15pt;"><a href="javascript:dopPlusPanel()" style="text-decoration:none; color:#eab0b0;display:block;width:210px; text-align:center">еще больше плюсов</a>
<img src="img/dopplusLinkLine.png"  style="position: relative;    top: -19px;">
</div><style>
#morePlus{
	display:none;
	width:100%;
	height:268px;
	background:url(img/dopplusBg.png);
	background-repeat:repeat-x;
	color:#fff;
	padding-top:15px;
}
#morePlus .mainComment{
	color:#fff;
}
#morePlus .dopComment{
	color:#fff;
}
</style><div id="morePlus">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" width="20%"><img src="img/dopplus5.png" width="97" height="97"><br>
    <span class="mainComment">ценим<br>клиентов и партнёров</span><br>
    <span class="dopComment">любим когда к нам приводят друзей<br>рекомендуют знакомым <br>
и обращаются повторно.</span></td>
    <td align="center" valign="top" width="20%"><img src="img/dopplus4.png" width="97" height="97"><br>
    <span class="mainComment">делаем<br>актуальный контент</span><br>
    <span class="dopComment">следим за трендами и<br>стоим за андеграундом </span></td>
    <td align="center" valign="top" width="20%"><img src="img/dopplus3.png" width="97" height="97"><br>
    <span class="mainComment">работаем<br>быстро</span><br>
    <span class="dopComment">напишем сценарий<br>проведём съёмку<br>и смонтируем видео<br>всего за 7 дней</span></td>
    <td align="center" valign="top" width="20%"><img src="img/dopplus2.png" width="97" height="97"><br>
    <span class="mainComment">экономим<br>деньги</span><br>
    <span class="dopComment">удобная сетка тарифов<br>подойдёт для любой задачи</span></td>
    <td align="center" valign="top" width="20%"><img src="img/dopplus1.png" width="97" height="97"><br>
    <span class="mainComment">гарантируем<br>результат</span><br>
    <span class="dopComment">работаем в области<br>видеопроизводства с 2012 года.</span></td>
  </tr>
</table>
<script>
var dopPlusPanelVisible=false;
function dopPlusPanel(){
	dopPlusPanelVisible=!dopPlusPanelVisible;
	if(dopPlusPanelVisible){
		 $('#morePlus').css('display','block');
		 $('html, body').animate({ scrollTop: $("#morePlus").offset().top-$(window).height()+$("#morePlus").height()}, 500);
		 $('#slide3').css('min-height',403+268);
	}
	else {
		$('#morePlus').css('display','none');
		$('#slide3').css('min-height',403);
	}

}
</script>
</div>
</div>
</div>
<!-- четвертый Слайд-->
<div class="slide" id="slide4">
<div id="slide4Center" style="position:relative;">
<div style="height:300px">
	<h2>ТАРИФЫ</h2>
    <style>
    .tarif{
		background:url(img/tarifBg.png);
		width:215px;
		height:373px;
		font-size:14px;
		color:#fff;	
	}
	.suckTarif{
		background-color:#eab0b0;
		color:#FFF;
		width:110px;
		line-height:30px;
		height:30px;
		padding:3px;
		font-weight:bold;
		font-size:16pt;
		display:block;
		margin-top:7px;
		text-decoration: none;	
	}
    </style>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" id="tarifs" style="position:relative;">
  <tr>
    <td width="33%" align="center" valign="top">
    <div class="tarif">
    	<span style="font-size:80pt">3</span><br>
        <span style="position:relative;top:-20px;">ролика</span><br>
        <span>Идеальный вариант для<br>разовой рекламы<br>мероприятия, товара,<br> услуги, места<br>или сообщества.<br>А так-же чтобы<br>испытать нас</span><br>
        <span style="font-size:32pt;">7000р</span><br>
        <a href="javascript:PopUpShow(7000)" class="suckTarif">заказать</a>
    </div>
    </td>
    <td width="33%" align="center" valign="top">
    <div class="tarif">
    	<span style="font-size:80pt">9</span><br>
        <span style="position:relative;top:-20px;">роликов</span><br>
        <span>Ищите простой способ<br>создания качественного<br>видео контента?<br><br>Оптимальный тариф<br>для тех кто знает<br>как важно быть в тренде.</span><br>
        <span style="font-size:32pt;">14000р</span><br>
        <a href="javascript:PopUpShow(14000)" class="suckTarif">заказать</a>
    </div>
    </td>
    <td width="33%" align="center" valign="top">
    <div class="tarif">
    	<span style="font-size:80pt">31</span><br>
        <span style="position:relative;top:-20px;">ролик<br>(подписка на месяц)</span><br>
        <span>Лучшее предложение!<br><br>Подходит<br>для постоянного<br>развития аккаунтов<br>в социальных сетях.</span><br>
        <span style="font-size:32pt;">31000р</span><br>
        <a href="javascript:PopUpShow(31000)" class="suckTarif">заказать</a>
    </div>
    </td>
  </tr>
</table>
<script>
	
</script>
</div>
</div>
</div>
<!--footer-->
<div style="height:578px">
<div style="height:360px;background:url(img/footerBg.png); background-repeat:repeat-x; line-height:360px; margin:auto; text-align:center;">
  <img src="img/Partners.png" width="80%" style="vertical-align:middle;max-height:260px;max-width:1072px"> 
  </div>
<div style="background-color:#666666; height:218px">
<div style="height:180px; width:100%">
<div style="width:300px;height:61px;float:left; margin-top:30px;margin-left:20px">
<style>
#footerMenu a{
	font-size:21pt;
	color:#FFF;
	text-decoration:none;
	font-weight:normal;	
}
#footerPopup{
	position:relative;
	top:44px;
	float:right;
	right:260px;
	width:247px;
	height:24px;
	line-height:24px;
	color:#FFF;
	font-size:14px;
	text-align:center;
	background:url(img/footerPopupBg.png);
	display:none;
}
</style>
<table width="100%" border="0" cellspacing="10" cellpadding="0" id="footerMenu">
  <tr><td><a href="javascript:GoToNextSlide(0,1)">Главная</a></td></tr>
   <tr><td><a href="javascript:GoToNextSlide(0,2)">Портфолио</a></td></tr>
      <tr><td><a href="javascript:GoToNextSlide(0,4)">Тарифы</a></td></tr>
</table>
</div>
<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/master/dist/clipboard.min.js"></script>
<script>
function copyToBofferFooter(n){
	if(n==1)	{
		$('#footerPopup').css('right',60+'px');
	}
	if(n==2){
		$('#footerPopup').css('right',160+'px');
	}
	if(n==3){
		$('#footerPopup').css('right',260+'px');
	}
	$('#footerPopup').fadeIn(400).delay(200).fadeOut(400);
}
</script>
<script>
var clipboardVk =new Clipboard('#footerVk',{text: function(trigger) {
		copyToBofferFooter(1)
    	return trigger.getAttribute('aria-label');
  	}
  });
clipboardVk.on('error', function(e) {
   window.open("https://vk.com/cinesta");
});
var clipboardInsta = new Clipboard('#footerInsta',{text: function(trigger) {
	 	copyToBofferFooter(2)
    	return trigger.getAttribute('aria-label');
  	}
  });
clipboardInsta.on('error', function(e) {
   window.open("https://www.instagram.com/cinesta.me/");
});
var clipboardMail = new Clipboard('#footerMail',{text: function(trigger) {
	 	copyToBofferFooter(3)
    	return trigger.getAttribute('aria-label');
  	}
  });
clipboardMail.on('error', function(e) {
   window.open("https://hello@cinesta.me");
});
</script>

<div style="float:right;height:180px;width:300px">
<div style="height:70px;width:100%">
	<div id="footerPopup">адрес скопирован в буфер обмена</div>
</div>
<div style="width:300px;height:90px;float:right; margin-right:10px" id="divSocial">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle" width="33%"><button id="footerMail" style="cursor:pointer;border: none;outline:none;width:61px;height:61px;padding: 0;background: url('img/mail.png') no-repeat 0 0;" aria-label="goshanthehero@gmail.com" title="hello@cinesta.me"></button></td>
    <td align="center" valign="middle" width="33%"><button id="footerInsta" style="cursor:pointer;border: none;outline:none;width:61px;height:61px;padding: 0;background: url('img/insta.png') no-repeat 0 0;" aria-label="https://www.instagram.com/cinesta.me/" title="https://www.instagram.com/cinesta.me/"></button></td>
    <td align="center" valign="middle" width="33%"><button id="footerVk" style="cursor:pointer;border: none;outline:none;width:61px;height:61px;padding: 0;background: url('img/vk.png') no-repeat 0 0;" aria-label="https://vk.com/cinesta" title="https://vk.com/cinesta"></button></td>
  </tr>
</table>
</div>
</div>

</div>
<div style="width:100%; margin:auto;text-align:center;">
<span style="color:#aaa; font-size:14pt">© Оформление сайта. Студия "Я", 2016</span>
</div>
</div>
</div>

</div>
</div>


<script>

$("#slide1").css("display","block");
function showVidos(){
	$('#vidosik').css('height',$(window).height());
	var left=0;
	left=($('#vidosik').width()-$(window).width())/2;
	
	if(left<0){
		$('#vidosik').css('left',0);
	}else{
		$('#vidosik').css('left',-left);
	}	
}
$(window).resize(function(){
	if($(window).height()>200){
		MakeSize();
	}
	
});
var ActiveSlide=1;
function GoToNextSlide(step,slide){
	if(slide!=0) step=slide-ActiveSlide;
	if(ActiveSlide+step==5 || ActiveSlide+step==0) return;
	//$("#fuzz").fadeIn(400);
	setTimeout(
		function(){
			console.log(ActiveSlide);
			//$("#slide"+ActiveSlide).css("display","none");
			ActiveSlide+=step;
			if(ActiveSlide==0) ActiveSlide=1;
			if(ActiveSlide==5) ActiveSlide=4;
	    	$('html, body').animate({ scrollTop: $("#slide"+ActiveSlide).offset().top}, 500); 
			if(ActiveSlide==1) $("#upArrow").css("display","none");
			else $("#upArrow").css("display","block");
			if(ActiveSlide==4) $("#downArrow").css("display","none");			
			else $("#downArrow").css("display","block");			
			$("#slide"+ActiveSlide).css("display","block");
			//console.log(ActiveSlide);
			//$("#fuzz").fadeOut(800);
		}
  	, 1000);
}
function MakeSize(){
	showVidos();	
	//ActiveSlide=(($(window).scrollTop())/$(window).height()>>0) + 1;
	//console.log('MS='+ActiveSlide);
	if(ActiveSlide==1) $("#upArrow").css("display","none");
	else $("#upArrow").css("display","block");
	if(ActiveSlide==4) $("#downArrow").css("display","none");			
	else $("#downArrow").css("display","block");			
	var del=5;
	//if($(window).scrollTop()>=$(window).height()/2) del=del*1.6;
	//console.log(del);
	var heightMenuTop=$(window).height()/del;
	if($(window).height()<700)	heightMenuTop=700/del;
	$('.topMenu').height(heightMenuTop/2);
	$('.topMenu').css('line-height',heightMenuTop/2+'px');
	
	$('.slide').height($(window).height());
	$('#slider').css("top",heightMenuTop/2+"px");
	
	if($('.logoCell').width()<250){
		var heightLogo=$(window).height()/12;
		var heightLogo2=$('.logoCell').width()/5;
		//console.log(heightLogo + ' 1? ' + heightLogo2);
		if(heightLogo>heightLogo2) heightLogo=heightLogo2;
		if(heightLogo<6) heightLogo=6;
		//$('.logoText').css('font-size',heightLogo + 'px');
		var	delit=$('.logoText img').height()/heightLogo;
		$('.logoText img').css('height',heightLogo + 'px');
		$('.logoText img').css('width',$('.logoText img').width()/delit + 'px');
		if(heightLogo>36) $('h2').css('font-size',heightLogo + 'px');
	}else{
		var heightLogo=$(window).height()/12;
		var heightLogo2=250/5;
		//console.log(heightLogo + ' 1? ' + heightLogo2);
		if(heightLogo>heightLogo2) heightLogo=heightLogo2;
		if(heightLogo<6) heightLogo=6;
		//$('.logoText').css('font-size',heightLogo + 'px');
		var	delit=$('.logoText img').height()/heightLogo;
		$('.logoText img').css('height',heightLogo + 'px');
		$('.logoText img').css('width',$('.logoText img').width()/delit + 'px');
		if(heightLogo>36) $('h2').css('font-size',heightLogo + 'px');
	}
	if($('.navCell').width()<300){
		var heightNav=$(window).height()/14;
		var heightNav2=$('.navCell').width()/9;
		//console.log(heightNav + ' 2? ' + heightNav2);
		if(heightNav>heightNav2) heightNav=heightNav2;
		if(heightNav<5) heightNav=5;
		$('.ankers').css('font-size',heightNav + 'px');
	}else{
		var heightNav=$(window).height()/14;
		var heightNav2=300/9;
		//console.log(heightNav + ' 2? ' + heightNav2);
		if(heightNav>heightNav2) heightNav=heightNav2;
		if(heightNav<5) heightNav=5;
		$('.ankers').css('font-size',heightNav + 'px');
	}
	$("#fuzz").css("height", $(window).height());
	$("#rightMenu").css("top",heightMenuTop/2+30+'px');
	$('#slide1Center').css('top',$(window).height()/2-heightMenuTop);
	$('#slide2Center').css('top',0);
	//$('#slide3Center').css('top',0);
	//
	$('#slide4Center').css('top',0);
	$('#tarifs').css('top',$('#slide4').height()/2-205);
}
if($(window).height()>200){
		MakeSize();
	}
</script>

</body>
</html>
