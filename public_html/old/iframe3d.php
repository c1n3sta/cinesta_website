<?php
require_once("db.php");
$width=400;

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CINESTA</title>
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<script src="/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src='/js/threesixty.min.js'></script>
<script type="text/javascript" src="/js/prism.js"></script>
<script src="/js/jquery.elevateZoom-3.0.8.min.js" type="text/javascript"></script>
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
img
{
	width: <?php echo $width;?>px;
	position: absolute;
    top: 0;
    height: auto;
	
}
#iframe{
	width: 800px;
}
.imgArray {
    display: none;
    list-style: none;
    margin: 0;
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
  display: none;
}
.spinner{
  width:150px;
  height:150px;
  margin-top:100px!important;
  margin:auto;
  color:#fff;
  background:url(img/load.gif) no-repeat;
  background-size: 150px;
}
.product{
  width:100%!important;
  vertical-align: middle;
  cursor: pointer;
}
.i360{
      background:url(/img/360.gif);
      background-size: 160px;
      position: absolute;
      bottom: 20px;
      right: 20px;
      width:160px;
      height:160px;
      z-index:20;
    }
</style>

<script>
	
	
</script>
</head>
<body style="padding:0px;margin:0px;">

	  <div class="product">
      <div class="i360"></div>
        <div class="spinner">
          <span>0%</span>
        </div>
        <ol class="imgArray" style="    width: 600px;    padding-left: 200px;    height: 400px;">

        	<?php
            for($row=1;$row<=$_GET['rows'];$row++){
              for($i=1;$i<=$_GET['num'];$i++){
                if($row==1 && $i==1) echo '<li id="li_'.$row.'_'.$i.'"><img src="/img/cv/'.$_GET['folder'].'/big/'.$_GET['name'].'_'.$row.'_'.$i.'.jpg" class="current-image"></li>';
                else echo '<li id="li_'.$row.'_'.$i.'"><img src="/img/cv/'.$_GET['folder'].'/big/'.$_GET['name'].'_'.$row.'_'.$i.'.jpg" class="previous-image"></li>';
              }
            }
            $j=1;
            for($row=$_GET['rows']-1;$row>=2;$row--){
              for($i=1;$i<=$_GET['num'];$i++){
                echo '<li id="li_'.($_GET['rows']+ $j).'_'.$i.'"><img src="/img/cv/'.$_GET['folder'].'/big/'.$_GET['name'].'_'.($_GET['rows']+ $j).'_'.$i.'.jpg" class="previous-image"></li>';
              }
              $j++;
            }

          ?>
        </ol>
      </div>


<script type="text/javascript">
	$(function () {


    $('.spinner').css('display','none');
    $('.imgArray').css('display','block');
    var spin=false;
    var pageX=0;
    var pageY=0;
    var no_out=false;
    var is_mousedown=false;
	  $('.imgArray').mousedown(function(e){
      spin  = true;
      is_mousedown=true;
      pageX=e.pageX;
      pageY=e.pageY;
      return false;
    });
    $(document).mouseup(function(){
      spin  = false;
      is_mousedown=false;
      //console.log('up');
    });
    /*$('#iframe').mouseout(function(){
      spin  = false;
      is_mousedown=false;
      console.log('iframe out');
    });*/
     $('.imgArray').mouseout(function(){

      //if(!no_out) console.log('out');
      if(!no_out) spin  = false;
      else no_out=false;
    });
    $('.imgArray').mousemove(function(e){
      if(is_mousedown) spin=true;
      directionX=0;
      directionY=0;
      if(spin) {
        if(Math.abs(pageX-e.pageX)>20) {
          directionX=(pageX-e.pageX)/Math.abs(pageX-e.pageX);
          pageX=e.pageX;
        }
        if(Math.abs(pageY-e.pageY)>40) {
          directionY=(pageY-e.pageY)/Math.abs(pageY-e.pageY);
          pageY=e.pageY;
        }

        if(directionX!=0 || directionY!=0) nextImg(directionX,directionY);
      }
    });

    var currentColumn=1;
    var currentRow=1;
    var rows=2*<?php echo $_GET['rows']; ?>-2;
    var columns=<?php echo $_GET['num']; ?>;
    function nextImg(directionX,directionY){
      //console.log(directionX);
      previosColumn=currentColumn;
      previosRow=currentRow;
      currentColumn=currentColumn+directionX;
      currentRow=currentRow+directionY;

      if(currentColumn>columns) currentColumn=1;
      if(currentColumn==0) currentColumn=columns;
      if(currentRow>rows) currentRow=1;
      if(currentRow==0) currentRow=rows;
      //console.log(previosRow+"_"+previosColumn + ' ->' + currentRow+"_"+currentColumn);
      no_out=true;
      $("#li_"+currentRow+"_"+currentColumn+" img").addClass("current-image");
      $("#li_"+currentRow+"_"+currentColumn+" img").removeClass("previous-image");
      $("#li_"+previosRow+"_"+previosColumn+" img").removeClass("current-image");
      $("#li_"+previosRow+"_"+previosColumn+" img").addClass("previous-image");

    }

	});
</script>
</body>
</html>
