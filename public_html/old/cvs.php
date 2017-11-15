<?php
require_once("db.php");


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CINESTA</title>
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<script src="jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/matdumsa/jQuery.threesixty/master/jquery.threesixty.js"></script>
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
	font-family:sans-serif;	
}
#main{
	width:1206px;
	margin:auto;
}

#items{
	width:402px;
	float:right;
	margin-top: 0px;
}
.item{
	width:42px;
	height:42px;
	cursor:pointer;
	background-color: #000;
	float:left;
}
.look{
	width:100%;
	height:42px;
	opacity: 1;
	position: relative;

}
.look:hover{
	opacity: .65
}
.look:hover > .title{
	display:block;
}
.title{
	color:#fff;
	font-size: 24px;
	position: absolute;
	z-index: 30;
	text-shadow:#000 0 0 4px;
	top:30px;
	left:0px;
	width:400px;
	display: none;
	text-align: center;
}
#item1 .look{
	
	
}
.look{
	background-size: 42px;
	color: #fff;
    line-height: 42px;
    text-align: center;
}
.i360{
	background:url(/img/360.gif);
	background-size: 80px;
	position: absolute;
	bottom: 20px;
	right: 20px;
	width:80px;
	height:80px;
	z-index:20;
}
.play{
	background:url(/img/play.png);
	background-size: 80px;
	position: absolute;
	bottom: 160px;
	right: 160px;
	width:80px;
	height:80px;
	z-index:20;	
}
#player, #player2{
	width:804px;
	float:right;
}
h2{
	text-align: center;
}
</style>

<script>
	//$(window).on('scroll', function() {
		
    	//if ($(window).scrollTop() >= 214) $('#player').addClass('player-fixed');
        //else $('#player').removeClass('player-fixed');
   // });
	
</script>
</head>
<body bgcolor="#fff" style="height:100%;padding:0px;margin:0px;min-width:800px;">


<div id="main">

	<div style="text-align:center;margin-top:40px;width:100%"><img src="/img/logo_cv.png" width="300"></div>
	<h1>Прайс-лист спин-фото</h1>
	<h2>3d спин-фото(полусфера)</h2>
	<div id="player"></div>
	<div id="items">
		<div class="item" id="item10">
			<div class="look">
				15
			</div>
		</div>
		<div class="item" id="item9">
			<div class="look">
				30
			</div>
		</div>
		<div class="item" id="item8">
			<div class="look">
				45
			</div>
		</div>
		
		<div class="item" id="item7">
			<div class="look">
				90
			</div>
		</div>


		

	</div>
	<hr color="000" style="width:100%">
	<h2>Спин-фото с вертикальным вращением</h2>
	<div id="player2"></div>
	<div id="items">
		
		
		<div class="item" id="items2">
			<div class="look">
				45
			</div>
		</div>
		
		<div class="item" id="items1">
			<div class="look">
				120
			</div>
		</div>
		<div style="clear:both"></div>
		<div class="item" id="items4">
			<div class="look">
				ЧФ
			</div>
		</div>

		
		<div style="clear:both"></div>
	</div>
</div>
<script>
	var current1=10;
	var current2=1;
	var black2=0;
	var black1=0;
	<?php
	$n=12;

	for($i=1;$i<=$n;$i++){
	?>
		
		$('#item<?php echo $i;?> .look').click(function(){

			 $.ajax({
			 			type: 'POST',
			 			url: '/ajax.php',
						data: {cvs_item_click:<?php echo $i;?>},
			 			success: function(data) {
			 				console.log(data);
			 					arr=data.split('|');
			 					$('#player').html('<h2>' + arr[2] + '</h2>' + '<div class="description">' + arr[1] + '</div><div style="float:left;width:804px;">' + arr[0] + '</div>');
								

			 			},
					});
		});
		$('#items<?php echo $i;?> .look').click(function(){
			if(<?php echo $i;?>==4){
				plus=0;
				if(black2==0) {
					plus=3;
					black2=1;
				}else black2=0;
				$.ajax({
				 			type: 'POST',
				 			url: '/ajax.php',
							data: {cvs_item_click:(plus+current2)},
				 			success: function(data) {
				 				console.log(data);
				 					arr=data.split('|');
				 					$('#player2').html('<h2>' + arr[2] + '</h2>' + '<div class="description">' + arr[1] + '</div><div style="float:left;width:804px;">' + arr[0] + '</div>');
									

				 			},
						});	
			}
			else{
				current2=<?php echo $i; ?>;
				plus=0;
				if(black2==1) {
					plus=3;
				}
				 $.ajax({
				 			type: 'POST',
				 			url: '/ajax.php',
							data: {cvs_item_click:(plus+current2)},
				 			success: function(data) {
				 				console.log(data);
				 					arr=data.split('|');
				 					$('#player2').html('<h2>' + arr[2] + '</h2>' + '<div class="description">' + arr[1] + '</div><div style="float:left;width:804px;">' + arr[0] + '</div>');
									

				 			},
						});
			}
			

		});
	
	<?php 
	}
	?>
	$('#item'+current1+' .look').click();
	$('#items'+current2+' .look').click();
	function scrollToElement(theElement) {
		var selectedPosX = 0;
		var selectedPosY = 0;
		selectedPosY += theElement.offset().top;                         
		$("html, body").animate({ scrollTop: selectedPosY }, 700);
	}
	/*$('.look').click(function(){
        scrollToElement($('#player'));  
    });*/
	
</script>
<div style="height:20px;"></div>
</body>
</html>
