<?php
header('X-XSS-Protection: 0');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>

<script src="js/device.min.js" type="text/javascript"></script>
<script>
//if(device.mobile()) window.location.href="http://m.cinesta.me";
isIos=device.ios();
function getInternetExplorerVersion()
                            {
                                var rv = -1;
                                if (navigator.appName == 'Microsoft Internet Explorer')
                                {
                                    var ua = navigator.userAgent;
                                    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
                                    if (re.exec(ua) != null)
                                        rv = parseFloat( RegExp.$1 );
                                }
                                else if (navigator.appName == 'Netscape')
                                {
                                    var ua = navigator.userAgent;
                                    var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
                                    if (re.exec(ua) != null)
                                        rv = parseFloat( RegExp.$1 );
                                }
                                return rv;
                            }
isExplorer=false;
if(getInternetExplorerVersion()>0) isExplorer=true;
isSafari=false;
if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
	isSafari=true;
}

</script>
<meta name="p:domain_verify" content="7b5e3857eedc4c5d8ed6e7417fba9e2f"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="видео, съемка, спинфото, spinphoto,spin-photo,spin photo, spin photo, спин фото, Spin-photo™, 3d с вращением, видео 360, фото 360, фотография 360,предметная съемка, предметное видео, обзоры, реклама, рекламное агентство, cinesta, C1NΣSŦΛ, технологии, современный, проморолики, мультимедиа, предметное фото, корпоративное видео, рекламное фото, фото-каталог, мероприятия, социальные сети, заказать">
<meta name="description" content="Рекламное агентство  внедряющее современные технологии">
<title>C1NΣSŦΛ ✕ CINESTA</title>
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

<meta property="og:title" content="Рекламное агентство CINESTA"/>
<meta property="og:description" content="Мультимедийная компания, внедряющая современные технологии"/>
<meta property="og:locale" content="ru_RU" />
<meta property="og:site_name" content="Cinesta" />
<meta property="og:type" content="website" />
<meta property="og:url" content= "https://cinesta.me" />
<meta property="og:image" content="https://cinesta.me/img/logo_social.png" />
<meta property="og:image:secure_url" content="https://cinesta.me/img/logo_social.png" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="1365" />
<meta property="og:image:height" content="770" />

<meta name="viewport" content="initial-scale=1.0, user-scalable=yes, width=1240, device-width=1240" /> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="css/powerange.min.css" />
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/effect2.css" />
<link rel="stylesheet" href="css/wallop.css">

<link rel="stylesheet" href="all.css" />
<script> 
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ 
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), 
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) 
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); 

ga('create', 'UA-76579922-1', 'auto'); 
ga('send', 'pageview'); 

</script>
</head>
<body onload="initMap()">

<!--<div class='preload'></div>-->
  <div id='black'></div>
  <div id='mod'>
    <div class='close'></div>
    <div id='modbox'></div>
  </div>
<div id="ip-container" class="ip-container">
<header class="ip-header">
	<h5 class="ip-logo">
			<img src="img/logo.png" width="600" alt="cinesta" style="margin:0 auto;display:block;">
	</h5>
	<div class="ip-loader">
		<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
			<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
			<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
		</svg>
	</div>
</header>
<script type="text/javascript">
	if(device.mobile()){
		$('.ip-header').hide();
	}
</script>
<a name="link0" id="anchor_link0"></a>
<div class="slide" id="slide1">
	<div class="mask1-outer">
	<div class="mask1"></div>
	<div class="mask2"></div>
	<div class="bg">
		<video poster="img/Fon_site.jpg" preload="none" loop id="slide1_video">
			<source src="img/Fon_site.webm" type="video/webm">
			<source src="img/Fon_site.mp4" type="video/mp4">
		</video>
	</div>
	<div class="slide_inner">
		<div class="header-logo"></div>
		<div class="callback-header dialog" id="callback-header">
			Обратный звонок
<div class="m">
   <div class="">
   <div class="modal-header">
      <h2>Заказать обратный звонок</h2>
   </div>
   <div class="modal-body" style="width:575px">
      <div class="macros-form">
         <div class="outer">
            <div class="incon inner pad-invert">
               <div class="vertical none size-big">
                  <div class="body">
                     
                     <form class="form text-in">
                       <div style="float:left;"><input type="text" data-placeholder="" placeholder="Ваш телефон*" id="1phone" class="form-control phonemask" style="" maxlength="18"></div>
                       <div style="float:left;"><button class="btn submit font-text popup-button" id="uid445" data-action="" data-ym_goal="gimlpgoal_2_1" data-ga_category="forma_lp" data-ga_action="forma_lp_goal_2" data-id="" onclick="javascript:return false"> <span class="text">Отправить</span></button> </div>
                        <div style="clear: both"></div>
                     </form>
                     <div class="cont"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
		</div>
		<div class="mybox" style="height:900px;">
		<h1>Создание современного<br>мультимедийного контента</h1>
		<div class="line"></div>
		<p>Комплексное предложение от рекламного агенства CINESTA</p>
		</div>
		<div class="to_slide2"><img src="img/to_bot.png" alt="далее" title="далее"></div>
	</div>
	</div>
</div>
<a name="plus" id="anchor_plus"></a>
<div class="slide" id="slide2">
	<div class="slide_inner">
		<h2>Плюсы работы с нами</h2>
		<div class="mybox">
			<div class="plus">
				<img src="img/clock.png" alt="Оперативное взаимодействие" title="Оперативное взаимодействие">
				<div class="plus-text">Оперативное<br>взаимодействие</div>
				<div style="clear: both"></div>
			</div>
			<div class="plus" style="margin:0px 30px 0px 30px">
				<img src="img/money.png" alt="Прозрачное ценообразование" title="Прозрачное ценообразование">
				<div class="plus-text">Прозрачное<br>ценообразование</div>
				<div style="clear: both"></div>
			</div>
			<div class="plus">
				<img src="img/personal.png" alt="Опытная команда специалистов" title="Опытная команда специалистов">
				<div class="plus-text">Опытная команда<br>специалистов</div>
				<div style="clear: both"></div>
			</div>
			<div style="clear: both"></div>
		</div>
	</div>
</div>
<div id="slide2-3_line"></div>
<a name="projects" id="anchor_projects"></a>
<div class="slide" id="slide3">
	<div class="slide_inner">
		<div class="mybox">
			<h2>Проекты</h2>
			<div class="gal-content">
				<div class="gal" id="g1" style="display: none;height:380px">
					<iframe src="https://player.vimeo.com/video/200478832?color=fff" width="674" height="379"  allowfullscreen></iframe>
				</div>

				<div class="description" id="d1" style="display: none;height:240px">
					<h3>Медиа поддержка мероприятий</h3>	
					<p>Оперативно обеспечиваем концерты и фестивали красивым фото-, видео- контентом.
Предоставляем услуги мультикамерной съёмки и монтажа, съёмки лайвов, backstage и туров.</p>

				</div>
				<div class="gal" id="g2"  style="display: none;height:380px">
					<iframe src="https://player.vimeo.com/video/201465771?color=fff" width="674" height="379"  allowfullscreen></iframe>
				</div>
				<div class="description" id="d2" style="display: none;height:240px">
					<h3>Корпоративное видео</h3>	
					<p>Короткое интервью, репортаж с корпоративного мероприятия или
Полноформатная работа передающая ценности и идеи компании, 
форматов так же много как и наших возможностей по их реализации.</p>
				</div>
				<div class="gal promo-wallop-parent" id="g3"  style="display: none;height:380px">
					<div class="Wallop" id="promo-wallop">
					  <div class="Wallop-list">
						 <div class="Wallop-item"><iframe src="https://player.vimeo.com/video/193286412?loop=1&color=fff" width="674" height="379"  allowfullscreen></iframe></div>
						 <div class="Wallop-item"><iframe src="https://player.vimeo.com/video/193286489?loop=1&color=fff" width="673" height="379" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
						 <div class="Wallop-item"><iframe src="https://player.vimeo.com/video/193286452?loop=1&color=fff" width="674" height="379"  allowfullscreen></iframe></div>
						 <div class="Wallop-item"><iframe src="https://player.vimeo.com/video/193286386?loop=1&color=fff" width="674" height="379"  allowfullscreen></iframe></div>
						 <div class="Wallop-item"><iframe src="https://player.vimeo.com/video/193286353?loop=1&color=fff" width="674" height="379"  allowfullscreen></iframe></div>
						<button class="Wallop-buttonPrevious" style="left:-20px;padding:60px;top:150px"></button>
					  	<button class="Wallop-buttonNext" style="right:-20px;padding:60px;top:150px"></button>
					  </div>
					</div>
				</div>
				<div class="description" id="d3" style="display: none;height:240px">
					<h3>Промо-ролики</h3>	
					<p>Серия коротких видеороликов от 8 до 15 секунд, как оптимальный вариант для промотирования в 
социальных сетях или бэкграунд видео для сайтов и лендингов.</p>
				</div>
				<div class="gal" id="g4"  style="display: none;height:380px">
					<iframe src="https://player.vimeo.com/video/201463137?color=fff" width="674" height="379"  allowfullscreen></iframe>
				</div>
				<div class="description" id="d4" style="display: none;height:240px">
					<h3>Motion design и VFX</h3>	
					<p>Создаем графику и эффекты для компаний, клубов, фестивалей и музыкантов.
Анимируем логотипы, делаем видеозаставки.</p>
				</div>
				<div class="gal spin-wallop-parent" id="g5"  style="">
					<div class="Wallop" id="spin-wallop">
					  <div class="Wallop-list">
					    <div class="Wallop-item" data-text="Торговая марка мультимедийного контента компании CINESTA.<br>
						Идеальный инструмент для создания интерактивного опыта между клиентом и брендом.<br>
Имеет множество сфер применения, например – ювелирные украшения, потребительская электроника, косметика, сувениры, музейные экспонаты. <br>
" data-header="Spin-photo™<br>ювелирных изделий">
					    	<div class="preload-spin" data-iframe="https://cinesta.me/iframe.php?size=big&name=item&folder=item1&num=131&padding_y=50" style="background-image: url(img/sp1.jpg)"></div>
					    </div>
					    <div class="Wallop-item" data-text="Торговая марка мультимедийного контента компании CINESTA.<br>
						Идеальный инструмент для создания интерактивного опыта между клиентом и брендом.<br>
Имеет множество сфер применения, например – ювелирные украшения, потребительская электроника, косметика, сувениры, музейные экспонаты. <br>
" data-header="Spin-photo™<br>сувенирной продукции">
					    	<div class="preload-spin" data-iframe="https://cinesta.me/iframe.php?size=big&name=item&folder=item4&num=67&padding_y=81" style="background-image: url(img/sp4.jpg)"></div>
					    </div>
					    <div class="Wallop-item" data-text="Торговая марка мультимедийного контента компании CINESTA.<br>
						Идеальный инструмент для создания интерактивного опыта между клиентом и брендом.<br>
Имеет множество сфер применения, например – ювелирные украшения, потребительская электроника, косметика, сувениры, музейные экспонаты. <br>
" data-header="Spin-photo™<br>косметики">
					    	<div class="preload-spin" data-iframe="https://cinesta.me/iframe.php?size=big&name=item&folder=item5&num=66&padding_y=81" style="background-image: url(img/sp5.jpg)"></div>
					    </div>
					    <div class="Wallop-item" data-text="Торговая марка мультимедийного контента компании CINESTA.<br>
						Идеальный инструмент для создания интерактивного опыта между клиентом и брендом.<br>
Имеет множество сфер применения, например – ювелирные украшения, потребительская электроника, косметика, сувениры, музейные экспонаты. <br>
" data-header="Spin-photo™<br>техники">
					    	<div class="preload-spin" data-iframe="https://cinesta.me/iframe.php?size=big&name=item&folder=item6&num=67&padding_y=0" style="background-image: url(img/sp6.jpg)"></div>
					    </div>
					    <div class="Wallop-item" data-text="Торговая марка мультимедийного контента компании CINESTA.<br>
						Идеальный инструмент для создания интерактивного опыта между клиентом и брендом.<br>
Имеет множество сфер применения, например – ювелирные украшения, потребительская электроника, косметика, сувениры, музейные экспонаты. <br>
" data-header="Spin-photo™<br>музейных экспонатов">
					    	<div class="preload-spin" data-iframe="https://cinesta.me/iframe.php?size=big&name=item&folder=item2&num=105&padding_y=22" style="background-image: url(img/sp2.jpg)"></div>
					    </div>
					    <!--<div class="Wallop-item" data-text="Торговая марка мультимедийного контента компании CINESTA.<br>
						Идеальный инструмент для создания интерактивного опыта между клиентом и брендом.<br>
Имеет множество сфер применения, например – ювелирные украшения, потребительская электроника, косметика, сувениры. <br>
" data-header="Spin-photo™(Минерал)">
					    	<div class="preload-spin" data-iframe="https://cinesta.me/iframe.php?size=big&name=item&folder=item3&num=67&padding_y=22" style="background-image: url(img/sp3.jpg)"></div>
					    </div>-->
					    <!--<div class="Wallop-item"><iframe width="610" height="500" src="https://cinesta.me/media/iframe.php?size=big&name=item&folder=item6&num=67&padding_y=81" style="border:none;"></iframe></div>-->
					  </div>
					  <button class="Wallop-buttonPrevious"></button>
					  <button class="Wallop-buttonNext"></button>
					</div>
				</div>
				<div class="description spin-description" id="d5" style="height:360px">
						<h3></h3>
						<p></p>
				</div>
				<div class="gal reklam-wallop-parent" id="g6"  style="display: none">
					<div class="Wallop" id="reklam-wallop">
					  <div class="Wallop-list">
					     <div class="Wallop-item" data-text="Формат подходящий для оформления рекламных баннеров, сайтов, 
упаковок, постов в социальных сетях, обложек сообществ и пр." data-header="Рекламное фото"><img src="img/slide3_r1.jpg" width="500" alt="Рекламное фото 1"></div>
					     <div class="Wallop-item" data-text="Формат подходящий для оформления рекламных баннеров, сайтов, 
упаковок, постов в социальных сетях, обложек сообществ и пр." data-header="Рекламное фото"><img src="img/slide3_r2.jpg" width="500" alt="Рекламное фото 2"></div>
					     <div class="Wallop-item" data-text="Формат подходящий для оформления рекламных баннеров, сайтов, 
упаковок, постов в социальных сетях, обложек сообществ и пр." data-header="Рекламное фото"><img src="img/slide3_r3.jpg" width="500" alt="Рекламное фото 3"></div>
					     <div class="Wallop-item" data-text="Формат подходящий для оформления рекламных баннеров, сайтов, 
упаковок, постов в социальных сетях, обложек сообществ и пр." data-header="Рекламное фото"><img src="img/slide3_r4.jpg" width="500" alt="Рекламное фото 4"></div>
					     <div class="Wallop-item" data-text="Формат подходящий для оформления рекламных баннеров, сайтов, 
упаковок, постов в социальных сетях, обложек сообществ и пр." data-header="Рекламное фото"><img src="img/slide3_r5.jpg" width="500" alt="Рекламное фото 5"></div>
					  </div>
					  <button class="Wallop-buttonPrevious"></button>
					  <button class="Wallop-buttonNext"></button>
					</div>

				</div>
				<div class="description  reklam-description" id="d6" style="display: none;height:360px">
					<h3></h3>
						<p></p>
				</div>
				<div class="gal catalog-wallop-parent" id="g7"  style="display: none">
					<div class="Wallop" id="catalog-wallop">
					  <div class="Wallop-list">
					    <div class="Wallop-item" data-text="Серия качественных, технических фотографий для
демонстрации товара, создания рекламных обьявлений и интернет-магазинов. " data-header="Фото-каталог"><img alt="Фото-каталог 1" src="img/slide3_c1.jpg" width="500"></div>
					    <div class="Wallop-item" data-text="Серия качественных, технических фотографий для
демонстрации товара, создания рекламных обьявлений и интернет-магазинов." data-header="Фото-каталог"><img alt="Фото-каталог 2"  src="img/slide3_c2.jpg" width="500"></div>
					    <div class="Wallop-item" data-text="Серия качественных, технических фотографий для
демонстрации товара, создания рекламных обьявлений и интернет-магазинов." data-header="Фото-каталог"><img alt="Фото-каталог 3"  src="img/slide3_c3.jpg" width="500"></div>
					    <div class="Wallop-item" data-text="Серия качественных, технических фотографий для
демонстрации товара, создания рекламных обьявлений и интернет-магазинов." data-header="Фото-каталог"><img alt="Фото-каталог 4"  src="img/slide3_c4.jpg" width="500"></div>
					    <div class="Wallop-item" data-text="Серия качественных, технических фотографий для
демонстрации товара, создания рекламных обьявлений и интернет-магазинов." data-header="Фото-каталог"><img alt="Фото-каталог 5"  src="img/slide3_c5.jpg" width="500"></div>
					  </div>
					  <button class="Wallop-buttonPrevious"></button>
					  <button class="Wallop-buttonNext"></button>
					</div>

				</div>
				<div class="description catalog-description" id="d7" style="display: none;height:360px">
						<h3></h3>
						<p></p>
				</div>
				<div class="gal" id="g8"  style="display: none;height:380px">
					<iframe src="https://player.vimeo.com/video/201561804?color=fff" width="674" height="379"  allowfullscreen></iframe>

				</div>
				<div class="description" id="d8" style="display: none;height:240px">
					<h3>Предметное видео</h3>	
					<p>Специальный видеоформат для интернет магазинов.
Короткий видеоролик о товаре демонстрирующий его особенности
и повышающий конверсию.</p>
				</div>
				<div class="gal" id="g9"  style="display: none;height:380px">
					<iframe src="https://player.vimeo.com/video/201581986?color=fff" width="674" height="379"  allowfullscreen></iframe>

				</div>
				<div class="description " id="d9" style="display: none;height:240px">
					<h3>Клипмейкинг</h3>
					<p>А ещё мы снимаем полноценные видеоклипы и рекламные ролики. </p>	
				</div>
				<div class="callback-cv dialog" id="callback-cv">
				Заказать
<div class="m">
   <div class="">
   <div class="modal-header">
      <h2 id="slide3-modalheader"></h2>
   </div>
   <div class="modal-body" style="width:575px">
      <div class="macros-form">
         <div class="outer">
            <div class="incon inner pad-invert">
               <div class="vertical none size-big">
                  <div class="body">
                     
                     <form class="form text-in">
                       <div style="float:left;"><input type="text" data-placeholder="" placeholder="Ваш телефон*" id="4phone" class="form-control phonemask" style="" maxlength="18"></div>
                       <div style="float:left;"><button class="btn submit font-text popup-button" id="uid448" data-action="" data-ym_goal="gimlpgoal_2_1" data-ga_category="forma_lp" data-ga_action="forma_lp_goal_2" data-id="" onclick="javascript:return false"> <span class="text">Отправить</span></button> </div>
                        <div style="clear: both"></div>
                     </form>
                     <div class="cont"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
			</div>
				<div style="clear: both"></div>
			</div>
			<div class="gal-preview">
				<div id="scroll-preview-previous"></div>			  
				<div class="gal-preview-inner">
				<div id="gal-preview-inner-inner" style="left:-180px">
					<div class="gal-preview-item" onclick="javascript:galTo(2)" id="p2"></div>
					<div class="gal-preview-item" onclick="javascript:galTo(5)" id="p5"></div>
					<div class="gal-preview-item" onclick="javascript:galTo(9)" id="p9"></div>
					<div class="gal-preview-item" onclick="javascript:galTo(1)" id="p1" ></div>
					<div class="gal-preview-item" onclick="javascript:galTo(3)" id="p3"></div>
					<div class="gal-preview-item" onclick="javascript:galTo(4)" id="p4"></div>
					<div class="gal-preview-item" onclick="javascript:galTo(6)" id="p6"></div>
					<div class="gal-preview-item" onclick="javascript:galTo(7)" id="p7"></div>
					
					<div class="gal-preview-item" onclick="javascript:galTo(8)" id="p8"></div>
				</div>
				</div>
				<div id="scroll-preview-next"></div>
			</div>
		</div>
	</div>
</div>
<a name="calculator" id="anchor_calculator"></a>
<div class="slide" id="slide4">
	<div class="slide_inner">
		<h2>УДОБНЫЙ КАЛЬКУЛЯТОР УСЛУГ</h2>
		<div class="mybox">
			<div class="kostil"></div>
			<div class="line" style="top:-20px;left:111px;"></div>
			<div class="num" style="top:41px;left:101px;">10</div>
			<div class="line" style="top:-20px;left:355px;"></div>
			<div class="num" style="top:41px;left:347px;">25</div>
			<div class="line" style="top:-20px;left:599px;"></div>
			<div class="num" style="top:41px;left:591px;">50</div>
			<div class="line" style="top:-20px;left:844px;"></div>
			<div class="num" style="top:41px;left:836px;">100</div>
			<div class="line" style="top:-20px;left:1088px;"></div>
			<div class="num" style="top:41px;left:1078px;">>100</div>
			<div class="slider-wrapper">
            	<input type="text" class="js-min-max-start" />
          	</div>
			<!--<div id="slider"></div>-->
			<div class="taps" id="tap0" data-num="0" style="left:46px;top:-28px"></div>
			<div class="taps" id="tap1" data-num="1"  style="left:263px;top:-28px"></div>
			<div class="taps" id="tap2" data-num="2"  style="left:500px;top:-28px"></div>
			<div class="taps" id="tap3" data-num="3"  style="left:750px;top:-28px"></div>
			<div class="taps" id="tap4" data-num="4"  style="left:950px;top:-28px"></div>
			<span id="contentSlider" style="display: none"></span>
			<div class="service">
				<fieldset>
					<label class="mainch" for="ch1">
						<input type="checkbox" name="ch1" id="ch1" class="ch">
						<span style="display: block" class="plus-text">Spin-photo™</span>
						
					</label>
					<label class="mainch" style="margin:0px 30px 0px 30px" for="ch2">
						<input type="checkbox" name="ch2" id="ch2" class="ch">
						<span style="display: block" class="plus-text">5 предметных фото</span>
						
					</label>
					<label class="mainch" for="ch3">
						<input type="checkbox" name="ch3" id="ch3" class="ch">
						<span style="display: block" class="plus-text">Предметное видео</span>
						
					</label>
				</fieldset>
				<div class="options">
					<fieldset>
						<label class="dopch" for="ch1_1">
							<input type="checkbox" name="ch1_1" id="ch1_1" class="ch podch">
							<span style="display: block"  class="plus-text">Цветной\черный фон <span class="strong">(+300руб.\шт.)</span></span>
						</label>
						<label class="dopch" for="ch1_2">
							<input type="checkbox" name="ch1_2" id="ch1_2" class="ch podch">
							<span style="display: block"  class="plus-text">Установка на сайт <span class="strong">(+2000руб.)</span></span>
						</label>
					</fieldset>
					<fieldset>
						<label class="dopch" for="ch2_1" style="margin-left:11px">
							<input type="checkbox" name="ch2_1" id="ch2_1" class="ch podch">
							<span style="display: block"  class="plus-text">Цветной\черный фон <span class="strong">(+20руб.\шт.)</span></span>
						</label>
					</fieldset>
					<fieldset>
						<label class="dopch" for="ch3_1" style="margin-left:21px">
							<input type="checkbox" name="ch3_1" id="ch3_1" class="ch podch">
							<span style="display: block"  class="plus-text">Цветной\черный фон <span class="strong">(+200руб.\шт.)</span></span>
						</label>
					</fieldset>
					<div style="clear: both"></div>
				</div>
				<div style="clear: both"></div>
				<div class="price_line"></div>
				<div class="price" id="service_price">10 товаров</div>
				<div class="callback-price dialog" id="callback-price">
				Заказать
<div class="m">
   <div class="">
   <div class="modal-header">
      <h2>Заказать услугу</h2>
   </div>
   <div class="modal-body" style="width:575px">
      <div class="macros-form">
         <div class="outer">
            <div class="incon inner pad-invert">
               <div class="vertical none size-big">
                  <div class="body">
                     
                     <form class="form text-in">
                       <div style="float:left;"><input type="text" data-placeholder="" placeholder="Ваш телефон*" id="3phone" class="form-control phonemask" style="" maxlength="18"></div>
                       <div style="float:left;"><button class="btn submit font-text popup-button" id="uid447" data-action="" data-ym_goal="gimlpgoal_2_1" data-ga_category="forma_lp" data-ga_action="forma_lp_goal_2" data-id="" onclick="javascript:return false"> <span class="text">Отправить</span></button> </div>
                        <div style="clear: both"></div>
                     </form>
                     <div class="cont"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
			</div>
			</div>
		</div>
	</div>
</div>
<a name="how-work" id="anchor_how-work"></a>
<div class="slide" id="slide5">
<div class="mask"></div>
	<div class="slide_inner">
		
		
		<div class="mybox">
			<h2>Как мы работаем</h2>
			<div class="all-items">
<div style="position: absolute;z-index:35;top:285px;left:50px;background: url(img/arrows0.png) no-repeat top left; width:81px;height:22px;" id="arrow0"></div>
<div style="position: absolute;z-index:32;top:285px;left:50px;background: url(img/arrows0a.png) no-repeat top left; width:81px;height:22px;display: none;" id="arrow0a"></div>
			<div class="item" style="top:250px; left:130px" id="w1">
				<div class="img"><img src="img/w1.png" alt="Заявка" title="Заявка"><div class="circle">1</div></div>
				
				<div class="text">Заявка</div>
			</div>
<div style="position: absolute;z-index:35;top:285px;left:175px;background: url(img/arrows3.png) no-repeat top left; width:217px;height:22px;" id="arrow1"></div>
<div style="position: absolute;z-index:32;top:285px;left:175px;background: url(img/arrows3a.png) no-repeat top left; width:217px;height:22px;display: none;" id="arrow1a"></div>
			<div class="item" style="top:250px; left: 320px" id="w2">
				<div class="img"><img src="img/w2.png" alt="Заполнение брифа" title="Заполнение брифа"><div class="circle">2</div></div>
				<div class="text">Заполнение<br>брифа</div>
			</div>
<div style="position: absolute;z-index:35;top:285px;left:395px;background: url(img/arrows3.png) no-repeat top left; width:217px;height:22px;" id="arrow2"></div>
<div style="position: absolute;z-index:32;top:285px;left:395px;background: url(img/arrows3a.png) no-repeat top left; width:217px;height:22px;display: none;" id="arrow2a"></div>
			<div class="item" style="top:250px; left:550px" id="w3">
				<div class="img"><img src="img/w3.png" alt="Расчет стоимости" title="Расчет стоимости"><div class="circle">3</div></div>
				<div class="text">Расчет<br>стоимости</div>
			</div>
<div style="position: absolute;z-index:35;top:285px;left:615px;background: url(img/arrows3.png) no-repeat top left; width:217px;height:22px;" id="arrow3"></div>
<div style="position: absolute;z-index:32;top:285px;left:615px;background: url(img/arrows3a.png) no-repeat top left; width:217px;height:22px;display: none;" id="arrow3a"></div>
			<div class="item" style="top:250px; left:770px" id="w4">
				<div class="img"><img src="img/w4.png" alt="Составление договора" title="Составление договора"><div class="circle">4</div></div>
				<div class="text">Составление<br>договора</div>
			</div>
<div style="position: absolute;z-index:35;top:285px;left:825px;background: url(img/arrows3.png) no-repeat top left; width:217px;height:22px;" id="arrow4"></div>
<div style="position: absolute;z-index:32;top:285px;left:825px;background: url(img/arrows3a.png) no-repeat top left; width:217px;height:22px;display: none;" id="arrow4a"></div>		
			<div class="item" style="top:250px; left:960px" id="w5">
				<div class="img"><img src="img/w5.png" alt="Предоплата по договору" title="Предоплата по договору"><div class="circle">5</div></div>
				<div class="text">Предоплата по<br>договору</div>
			</div>
<div style="position: absolute;z-index:35;top:285px;left:1025px;background: url(img/arrows1.png) no-repeat top left; width:164px;height:228px;" id="arrow5"></div>
<div style="position: absolute;z-index:32;top:285px;left:1025px;background: url(img/arrows1a.png) no-repeat top left; width:164px;height:228px;display: none;" id="arrow5a"></div>	
			<div class="item" style="top:450px; left:130px" id="w10">
				<div class="img"><img src="img/w6.png" alt="Съемка" title="Съемка"><div class="circle">10</div></div>
				<div class="text">Оплата по<br>договору</div>
			</div>
<div style="position: absolute;z-index:35;top:485px;left:810px;background: url(img/arrows4.png) no-repeat top left; width:217px;height:22px;" id="arrow6"></div>
<div style="position: absolute;z-index:32;top:485px;left:810px;background: url(img/arrows4a.png) no-repeat top left; width:217px;height:22px;display: none;" id="arrow6a"></div>
			<div class="item" style="top:450px; left:335px" id="w9">
				<div class="img"><img src="img/w7.png" alt="Обработка" title="Обработка"><div class="circle">9</div></div>
				<div class="text">Доработка</div>
			</div>
<div style="position: absolute;z-index:35;top:485px;left:595px;background: url(img/arrows4.png) no-repeat top left; width:217px;height:22px;" id="arrow7"></div>
<div style="position: absolute;z-index:32;top:485px;left:595px;background: url(img/arrows4a.png) no-repeat top left; width:217px;height:22px;display: none;" id="arrow7a"></div>
			<div class="item" style="top:450px; left:535px" id="w8">
				<div class="img"><img src="img/w8.png" alt="Демонстрация" title="Демонстрация"><div class="circle">8</div></div>
				<div class="text">Демонстрация</div>
			</div>
<div style="position: absolute;z-index:35;top:485px;left:385px;background: url(img/arrows4.png) no-repeat top left; width:217px;height:22px;" id="arrow8"></div>
<div style="position: absolute;z-index:32;top:485px;left:385px;background: url(img/arrows4a.png) no-repeat top left; width:217px;height:22px;display: none;" id="arrow8a"></div>
			<div class="item" style="top:450px; left:780px" id="w7">
				<div class="img"><img src="img/w9.png" alt="Доработка" title="Доработка"><div class="circle">7</div></div>
				<div class="text">Постпродакшн</div>
			</div>
<div style="position: absolute;z-index:35;top:485px;left:175px;background: url(img/arrows4.png) no-repeat top left; width:217px;height:22px;" id="arrow9"></div>
<div style="position: absolute;z-index:32;top:485px;left:175px;background: url(img/arrows4a.png) no-repeat top left; width:217px;height:22px;display: none;" id="arrow9a"></div>
			<div class="item" style="top:450px; left:980px" id="w6">
				<div class="img"><img src="img/w10.png" alt="Оплата по договору" title="Оплата по договору"><div class="circle">6</div></div>	
				<div class="text">Съемка</div>
			</div>
<div style="position: absolute;z-index:35;top:485px;left:1px;background: url(img/arrows2.png) no-repeat top left; width:180px;height:227px;" id="arrow10"></div>
<div style="position: absolute;z-index:32;top:485px;left:1px;background: url(img/arrows2a.png) no-repeat top left; width:180px;height:227px;display: none;" id="arrow10a"></div>
			<div class="item" style="top:650px; left:100px" id="w11">
				<div class="img"><img src="img/w11.png" alt="Предоставление материалов" title="Предоставление материалов"><div class="circle">11</div></div>
				<div class="text">Предоставление<br>материалов</div>
			</div>
<div style="position: absolute;z-index:35;top:685px;left:175px;background: url(img/arrows3.png) no-repeat top left; width:217px;height:22px;" id="arrow11"></div>
<div style="position: absolute;z-index:32;top:685px;left:175px;background: url(img/arrows3a.png) no-repeat top left; width:217px;height:22px;display: none;" id="arrow11a"></div>
			<div class="item" style="top:650px; left:331px" id="w12">
				<div class="img"><img src="img/w12.png" alt="Завершение заказа" title="Завершение заказа"><div class="circle">12</div></div>
				<div class="text">Завершение<br>заказа</div>
			</div>
		</div>
		</div>
	</div>
</div>
<a name="map" id="anchor_map"></a>
<div class="slide" id="slide6">
<div id="map"></div>
	<div class="slide_inner">
		<div class="mybox">
			<h2>Связаться с нами</h2>
			<div class="map-phone">+7(999)-217-42-20</div>
			<div class="callback-map dialog" id="callback-footer">
				Обратный звонок
<div class="m">
   <div class="">
   <div class="modal-header">
      <h2>Заказать обратный звонок</h2>
   </div>
   <div class="modal-body" style="width:575px">
      <div class="macros-form">
         <div class="outer">
            <div class="incon inner pad-invert">
               <div class="vertical none size-big">
                  <div class="body">
                     
                     <form class="form text-in">
                       <div style="float:left;"><input type="text" data-placeholder="" placeholder="Ваш телефон*" id="2phone" class="form-control phonemask" style="" maxlength="18"></div>
                       <div style="float:left;"><button class="btn submit font-text popup-button" id="uid446" data-action="" data-ym_goal="gimlpgoal_2_1" data-ga_category="forma_lp" data-ga_action="forma_lp_goal_2" data-id="" onclick="javascript:return false"> <span class="text">Отправить</span></button> </div>
                        <div style="clear: both"></div>
                     </form>
                     <div class="cont"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
			</div>
			<div class="mail-map"><a href="mailto:sales@cinesta.me" title="sales@cinesta.me">sales@cinesta.me</a></div>
			<div class="social">
				<div class="social-item" style="margin-left: 31px;"><a href="https://vk.com/cinesta" target="_blank" title="vkontakte"><img src="img/social1.png" alt="vkontakte" title="vkontakte"></a></div>
				
				<div class="social-item" style="margin: 0px 10px;"><a href="https://www.youtube.com/channel/UCXPx6gg14riIUAvE4YQITmg" target="_blank" title="youtube"><img src="img/social2.png" alt="youtube" title="youtube"></a></div>
				
				<div class="social-item"><a href="https://vimeo.com/cinestavision" target="_blank" title="vimeo"><img src="img/social3.png" alt="vimeo" title="vimeo"></a></div>
				
				<div class="social-item" style="margin-left: 10px;"><a href="https://www.facebook.com/cinesta.me" target="_blank" title="facebook"><img src="img/social4.png" alt="facebook" title="facebook"></a></div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
</div>
<a name="footer" id="anchor_footer"></a>
<div class="slide" id="slide7">
	<div class="slide_inner">
		<div class="footer-logo"><img src="img/footer_logo.png" alt="Компания Cinesta" title="Компания cinesta"></div>
		<div class="copyright">© Cinesta 2013-2017. Все права защищены</div>
		
		<div class="footer-email">sales@cinesta.me</div>
		<div class="footer-phone">+7(999)-217-42-20</div>
		<div class="footer-address">Среднеохтинский пр., 2А, Санкт-Петербург, 195027</div>
		<div style="clear:both"></div>
	</div>
</div>
<div id="infowindow" style="display: none;">
<h2 style="    font-weight: 300;">Мультимедийная студия Cinesta</h2>
<p>Среднеохтинский пр., 2А, Санкт-Петербург, 195027</p>
</div>
</div>
<div id="popup-accept" style="display:none">
	<div style="width:250px;margin:auto"><img src="img/ok.gif" alt="ok" class="img-ok"></div>
	<h2 class="h2-ok">Ваше сообщение успешно отправлено!</h2>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrymkebhhEvdjaW6kDNvA7GtMiUC2BXjc&callback=initMap" async defer></script>  
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/powerange.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/pathLoader.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/preload.js"></script>
<script src="js/wallop.min.js"></script>
<script src="main.js"></script>
<div itemscope itemtype="https://schema.org/Organization">
  <meta itemprop="name" content="C1NΣSŦΛ ✕ CINESTA">
  <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
    <meta itemprop="streetAddress" content="Среднеохтинский пр., 2А, Санкт-Петербург, 195027">
    <meta itemprop="addressLocality" content="Санкт-Петербург">
    <meta itemprop="addressCountry" content="Россия">
  </div>
  <meta itemprop="telephone" content="+7(999)-217-42-20">
  <meta itemprop="email" content="sales@cinesta.me">
  <meta itemprop="image" content="img/logo.png">
  <meta itemprop="description" content="Рекламное агентство C1NΣSŦΛ ✕ CINESTA внедряющее современные технологии">
</div>
</body>
</html>
