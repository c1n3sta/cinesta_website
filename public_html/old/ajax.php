<?php

/* --- Клик в портфолио по превью --- */
if(isset($_POST['cv_item_click']) || isset($_POST['cvs_item_click']))
{
	$context="";
	$title="";
	$description="";
	switch ($_POST['cv_item_click']) {
		case '1':
			$context='<iframe width="801" height="940" src="https://cinesta.me/iframe.php?size=big&name=item&folder=item1&num=66" style="border:none;"></iframe>';
			//$title=1;
			//$description="1desc";
			break;
		case '2':
			$context='<img src="/img/cv/item3/item3.jpg" style="width:804px">';
			//$title=2;
			//$description="2desc";
			break;
		case '3':
			$context='<iframe width="801" height="875" src="https://cinesta.me/iframe.php?size=big&name=item3&folder=item4&num=67" style="border:none;"></iframe>';
			//$title=3;
			//$description="3desc";
			break;
		default:
			
			break;
		case '5':
			$context='<img src="/img/cv/item5/item5.jpg" style="width:804px">';
			//$title=5;
			//$description="5desc";
			break;
		case '6':
			$context='<video width="800"  src="/img/cv/item6/item6.mp4"  controls loop autoplay></video>';
			//$title=6;
			//$description="6desc";
			break;
		case '7':
			$context='<video width="800"  src="/img/cv/item7/item7.mp4"  controls autoplay></video>';
			//$title=7;
			//$description="7desc";
			break;
		case '8':
			$context='<iframe src="https://media.megavisor.com/player/embed?3a031ff0-d4e9-4a56-a164-6f7a0858ea37" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';

			//$title=8;
			//$description="8desc";
			break;
		case '9':
			$context='<iframe src="//media.megavisor.com/player/embed?bc2f7313-3692-46f9-b5f3-6205162f50a9" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '10':
			$context='<iframe src="//media.megavisor.com/player/embed?f8375156-e8a5-4e9b-83fa-032ef57adab1" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '11':
			$context='<iframe src="//media.megavisor.com/player/embed?fa837205-0c55-42ae-a9d5-1e0b1dfc6b87" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '12':
			$context='<iframe src="//media.megavisor.com/player/embed?dffef0b8-e68a-4515-a140-67877f982501" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '13':
			$context='<iframe src="//media.megavisor.com/player/embed?e276a40c-9088-4f2e-8075-b9afde8e18eb" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '14':
			$context='<iframe src="//media.megavisor.com/player/embed?9bb4b7df-b64b-4ed5-ae09-21435ee62f14" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;	
		case '15':
			$context='<iframe src="//media.megavisor.com/player/embed?9b039f27-a221-40d3-86e6-ef8dbc3fd50b" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;	
		case '16':
			$context='<iframe src="//media.megavisor.com/player/embed?cfa2968a-4155-4721-b0a2-ce70e1c8c7be" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;	
		case '17':
			$context='<iframe src="//media.megavisor.com/player/embed?e1e808ea-c80c-455f-b606-f095ab648c83" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;	
		case '18':
			$context='<iframe src="//media.megavisor.com/player/embed?4153d02d-1996-407e-a3da-6a676e02b03e" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;	
		case '19':
			$context='<iframe src="//media.megavisor.com/player/embed?a048d953-f57c-4fe9-9ec5-1dc25fdbe931" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '20':
			$context='<iframe src="//media.megavisor.com/player/embed?7148109f-dd06-4418-b82b-97592ffcd3a7" width="801" height="550" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;		
		case '21':
			$context='<iframe width="801" height="451" src="https://www.youtube.com/embed/XsKbK7NCc9k" frameborder="0" allowfullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;	
		case '22':
			$context='<iframe width="801" height="451" src="https://www.youtube.com/embed/QQmzJnPTJyE?list=PLbRwo1TEkmRrEtP82-y2juoyPx4_fM0wU" frameborder="0" allowfullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;	
		case '23':
			$context='<iframe width="801" height="461" src="https://cinesta.me/iframe3d.php?size=big&name=item23&folder=item23&num=43&rows=5" frameborder="0" allowfullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '24':
			$context='<iframe src="//media.megavisor.com/player/embed?e333be90-59f8-477a-9bcf-2a5112a5e908" width="801" height="461" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '25':
			$context='<iframe width="804" height="534" src="https://cinesta.me/iframe.php?size=big&name=item25&folder=item25&num=131" style="border:none;"></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '26':
			$context='<iframe width="804" height="534" src="https://cinesta.me/iframe.php?size=big&name=item26&folder=item26&num=131" style="border:none;"></iframe>';
			//$title=9;
			//$description="9desc";
			break;
		case '27':
			$context='<iframe src="//media.megavisor.com/player/embed?cd9b90a7-8b9b-43e9-8e34-0ffee25721b8" width="800" height="560" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;	
		case '28':
			$context='<iframe width="801" height="461" src="https://cinesta.me/iframe3ds.php?size=big&name=item7&folder=item7&num=72&rows=14&x=36&y=14" frameborder="0" allowfullscreen></iframe>';
			//$title=9;
			//$description="9desc";
			break;	
			
	}
	switch ($_POST['cvs_item_click']) {
		case '1':
			$context='<iframe src="//media.megavisor.com/player/embed?4139d873-88f0-4286-b4a7-94e6d1ea5a69#allowFlash=true&allowFullscreen=true&allowAnaglyph=true&autoPlay=true&zoom=true" width="640" height="480" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			$title=120;
			//$description="2500 руб./шт.";
			break;
		case '2':
			$context='<iframe src="//media.megavisor.com/player/embed?7008c8a6-2554-4cea-8f9c-9cf1131fb552#allowFlash=true&allowFullscreen=true&allowAnaglyph=true&autoPlay=true&zoom=true" width="640" height="480" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			$title=45;
			//$description="1500 руб./шт.";
			break;
		case '3':
			$context='<iframe src="//media.megavisor.com/player/embed?a68b7b42-d5ec-455f-93d4-be27162cd8a1#allowFlash=true&allowFullscreen=true&allowAnaglyph=true&autoPlay=true&zoom=true" width="640" height="480" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			$title=30;
			//$description="800 руб./шт.";
			break;
		case '4':
			$context='<iframe src="//media.megavisor.com/player/embed?2fbc0151-78e9-42e4-9ff2-07eb0a29939f#allowFlash=true&allowFullscreen=true&allowAnaglyph=true&autoPlay=true&zoom=true" width="640" height="480" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			$title="ч120";
			//$description="2700 руб./шт.";
			break;
		case '5':
			$context='<iframe src="//media.megavisor.com/player/embed?81b02346-68f1-443e-8b1c-4f99702f1086#allowFlash=true&allowFullscreen=true&allowAnaglyph=true&autoPlay=true&zoom=true" width="640" height="480" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			$title="ч45";
			//$description="1700 руб./шт.";
			break;
		case '6':
			$context='<iframe src="//media.megavisor.com/player/embed?10a930a9-a08f-4f04-8b42-4203a6994686#allowFlash=true&allowFullscreen=true&allowAnaglyph=true&autoPlay=true&zoom=true" width="640" height="480" frameborder="0" webkitAllowFullscreen allowFullscreen></iframe>';
			$title="ч30";
			//$description="1000 руб./шт.";
			break;	
		case '7':
			$context='<iframe width="801" height="461" src="https://cinesta.me/iframe3ds.php?size=big&name=item7&folder=item7&num=72&rows=14&x=72&y=14" frameborder="0" allowfullscreen></iframe>';
			$title=90;
			//$description="17000 руб./шт. уровней 14<br>
			//13000 руб./шт. уровней 10<br>
			//10000 руб./шт. уровней 5";
			break;
		case '8':
			$context='<iframe width="801" height="461" src="https://cinesta.me/iframe3ds.php?size=big&name=item7&folder=item7&num=72&rows=14&x=36&y=14" frameborder="0" allowfullscreen></iframe>';
			$title=45;
			//$description="13000 руб./шт. уровней 14<br>
			//10000 руб./шт. уровней 10<br>
			//6000 руб./шт. уровней 5";
			break;
		case '9':
			$context='<iframe width="801" height="461" src="https://cinesta.me/iframe3ds.php?size=big&name=item7&folder=item7&num=72&rows=14&x=24&y=14" frameborder="0" allowfullscreen></iframe>';
			$title=30;
			//$description="10000 руб./шт. уровней 14<br>
			//8000 руб./шт. уровней 10<br>
			//4000 руб./шт. уровней 5";
			break;	
		case '10':
			$context='<iframe width="801" height="461" src="https://cinesta.me/iframe3ds.php?size=big&name=item7&folder=item7&num=72&rows=14&x=12&y=14" frameborder="0" allowfullscreen></iframe>';
			$title=15;
			//$description="6000 руб./шт. уровней 14<br>
			//4000 руб./шт. уровней 10<br>
			//2800 руб./шт. уровней 5";
			break;	
		
							
	}
	echo $context.'|'.$description.'|'.$title;
	exit;
}

?>