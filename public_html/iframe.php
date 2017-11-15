<?php
$width=600;

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CINESTA</title>
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<script src="/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src='js/threesixty.min.js'></script>

<style type="text/css">
body{
	font-family:sans-serif;	
  background: #111;
}
img
{
	width: <?php echo $width;?>px;
	position: absolute;
    top: 0;
    height: auto;
	padding:<?php echo $_GET['padding_y'];?>px 0px;
}
#iframe{
	width: <?php echo $width;?>px;
}
.imgArray {
    display: none;
    list-style: none;
    margin: 0;
    margin-top:-5px;
    padding: 0;
 }
 .imgArray .current-image {
    visibility: visible;
    
}
 .imgArray .previous-image {
    visibility: hidden;
    
}
.nav_bar{
	position: absolute;
	top: 0;
	z-index:100;
  display: block;
}
.spinner{
  width:150px;
  height:150px;
  margin-top:150px!important;
  margin:auto;
  color:#111;
  background:url(img/load.gif) no-repeat;
  background-size: 150px;
}
.product{
  width:100%!important;
  vertical-align: middle;
  cursor: pointer;
background: #111;

}
.i360{
      background:url(img/360.gif);
      background-size: 160px;
      position: absolute;
      bottom: 20px;
      right: 20px;
      width:160px;
      height:80px;
      z-index:20;
    }
</style>

<script>
	
	
</script>
</head>
<body style="padding:0px;margin:0px;">
<div id="iframe">
	  <div class="product">
      <div class="i360"></div>
        <div class="spinner">
          <span>0%</span>
        </div>
        <ol class="imgArray">
        	
        </ol>
      </div>

</div>
<script type="text/javascript">
	$(function () {

	//Click mode.
	var product = $("#iframe .product").ThreeSixty({
        totalFrames: <?php echo $_GET['num']; ?>, // Общее число кадров
        endFrame: <?php echo $_GET['num']; ?>, // конечный кадр
        currentFrame: 1, // с какого кадра стартовать
        progress: '.spinner',
        imgList: '.imgArray', // селектор изображений
        imagePath:'img/<?php echo $_GET['folder']; ?>/big/', // путь к папке с изображениями
        filePrefix: '<?php echo $_GET['name']; ?>_', // префикс файлов
        ext: '.jpg', // формат изображения
        autoplayDirection:-1,
        navigation: false,
        disableSpin:false
    });
    /*product.play();
    $("#iframe").click(function() {
      product.stop();
    });*/
	

	});
</script>
</body>
</html>
