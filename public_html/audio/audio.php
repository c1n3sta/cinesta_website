<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>Аудио</title>



<link href="/favicon.ico" rel="icon" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



<meta name="viewport" content="width=500">



</head>



<body>
<p>Дама Крести - фанфаталь</p>
<div>
<table>
<?php
	$n=6;
	$arrSize=array(2,2,2,2,2,2);
	$arrLabel=array('Бас','Вокал','Гитара','Клавиши','Соло','Ударные');
	$arrColumnLabel=array();
	$arrColumnLabel[]=array('off','1');
	$arrColumnLabel[]=array('off','1');
	$arrColumnLabel[]=array('off','1');
	$arrColumnLabel[]=array('off','1');
	$arrColumnLabel[]=array('off','1');
	$arrColumnLabel[]=array('off','1');
	for($i=1;$i<=$n;$i++){
		if($arrSize[$i-1]>0){
			echo '<tr id="r'.$i.'">';
			for($j=0;$j<$arrSize[$i-1];$j++){
				echo '<td id="t'.$i.$j.'" data-row="'.$i.'" data-column="'.$j.'" class="table-cell">'.$arrLabel[$i-1].'-'.$arrColumnLabel[$i-1][$j].'</td>';
			}
			echo '</tr>';
		}
	}
?>
</table>
	
<div style="position: relative;height:380px;">
<style>
.audi{
  background: #fff;
}
</style>

<div style="float:left;width:300px;height:380px;">
	<audio controls  id="audi" preload="metadata" >
    	<source src="/audio/m1.mp3" type="audio/mpeg">
  	</audio>
</div>
<div style="clear:both"></div>
</div>

<script type="text/javascript">
var currentRow=0;
var currentColumn=0;
function sleep(ms) {
	ms += new Date().getTime();
	while (new Date() < ms){}
} 
readyChange=true;
readyVolume=false;
timerID=null;

function volumeChange(flag,volume,obj){
	obj.volume=volume/100;
	console.log(obj.volume + ' ' + volume);
	if(timerID!=null) clearTimeout(timerID);
	if(flag){
		if(volume<100){
			//console.log(volume);
			//timerID=setTimeout(volumeChange,200,flag,volume+1,obj);
			sleep(100);
			volumeChange(flag,volume+10,obj);
		}else{
			readyVolume=true;
		}
	}else{
		if(volume>1){
			//console.log(volume);
			//timerID=setTimeout(volumeChange,200,flag,volume+1,obj);
			sleep(100);
			volumeChange(flag,volume-10,obj);
		}else{
			readyVolume=true;
			//console.log('stopped');
		}
	}
}
$('.table-cell').click(function(){
    	if(!readyChange) return;
    	readyChange=false;
    	audio=$('#audi')[0];
        if(currentRow!=0) {
         	currentRow=$(this).attr('data-row');
        	currentColumn=$(this).attr('data-column');
        	volumeChange(false,100,audio);
	        while(!readyVolume){sleep(100);}
	        readyVolume=false;
	     	console.log('stop');
	        audio.pause();
	        time=audio.currentTime;
	        //sleep(500);
	        audio.src="/audio/"+currentRow+currentColumn+".mp3";
	        audio.load();
	        audio.currentTime=time;
	        audio.play();
	        audio.volume=1;
	        //volumeChange(true,0,audio);
        }else{
        	currentRow=$(this).attr('data-row');
        	currentColumn=$(this).attr('data-column');
        	audio.src="/audio/"+currentRow+currentColumn+".mp3";
	        audio.load();
	        audio.play();
        }
        readyChange=true;
      
});

	</script>

</body>

</html>