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
/*working=false;
var timeoutID=null;
if($(window).scrollTop()+380>=$('#slide5').offset().top && $(window).scrollTop()+200<=$('#slide6').offset().top){
	working=true;
	slide5Active=0;
	arrow=true;
	nextWork();
}*/
$(window).scroll(function(e) {
	/*
	if(!working){
		if(($(window).scrollTop()+$(window).height()-100)>=$('#slide5').offset().top && ($(window).scrollTop()-$(window).height()+100)<=$('#slide6').offset().top){
			if(timeoutID!=null) clearTimeout(timeoutID);
			for(i=0;i<12;i++){
				$('#arrow'+i+'a').css('display','none');
				$('#arrow'+i).css('display','block');

				$('#w'+(i+1)+' .circle').css('background','url(img/circle.png)');
				$('#w'+(i+1)+' .img img').css('opacity','0.7');		
			}
			working=true;
			slide5Active=0;
			arrow=true;
			var timeoutID=null;
			nextWork();
		}
	}else{
		if(($(window).scrollTop()+$(window).height()-100)>=$('#slide5').offset().top && ($(window).scrollTop()-$(window).height()+100)<=$('#slide6').offset().top){
			working=false;
			clearTimeout(timeoutID);
			var timeoutID=null;
			for(i=0;i<12;i++){
				$('#arrow'+i+'a').css('display','none');
				$('#arrow'+i).css('display','block');

				$('#w'+(i+1)+' .circle').css('background','url(img/circle.png)');
				$('#w'+(i+1)+' .img img').css('opacity','0.7');		
			}
		}

	}*/
});
isPC=device.windows();
var map;
function initMap() {
  if(isPC){
	  map = new google.maps.Map(document.getElementById('map'), {
	    center: {lat: 59.9428625, lng: 30.4316098},
	    scrollwheel:false,
	    zoom: 14
	  });
	   var marker = new google.maps.Marker({
	    position: {lat: 59.9447884, lng: 30.4126605},
	    map: map,
	    title: 'Cinesta',
	    icon: 'img/baloon.png'
	  });
	   var contentString = '';
	   var infowindow = new google.maps.InfoWindow({
	    content: '<div id="infowindow">'+$('#infowindow').html()+'</div>'
	  });
	   marker.addListener('click', function() {
	    infowindow.open(map, marker);
	  });
  }
}
	slide1MinHeight=800;
	slide1MaskMaxHeight=658;
	slide4CountArr=[10,25,50,100,'Свяжитесь с нами! Для вас персональное предложение'];
	Sum=0;
	Services=[];
	function scrollToElement(theElement) {
       var selectedPosX = 0;
       var selectedPosY = 0;
       selectedPosY += theElement.offset().top;                          
       $("html, body").animate({ scrollTop: selectedPosY -30 }, 500);
    }	
    var vals = document.querySelector('.js-min-max-start');
    var initVals = new Powerange(vals, { min: 0, max: 4, start: 0,step: 1 });	
	$(document).ready(function(){
		slide1_size();
		new Image().src = "img/calc_circle_hover.png";
		new Image().src = "img/circle_hover.png";
		new Image().src = "img/p1.jpg";
		new Image().src = "img/p2.jpg";
		new Image().src = "img/p3.jpg";
		new Image().src = "img/p4.jpg";
		new Image().src = "img/p5.jpg";
		new Image().src = "img/p6.jpg";
		new Image().src = "img/p7.jpg";
		new Image().src = "img/p8.jpg";
		new Image().src = "img/p9.jpg";
		new Image().src = "img/logo_black.png";
		new Image().src = "img/phone_black.png";
		new Image().src = "img/close2_hover.png";	
		$( "#slide4 .ch" ).checkboxradio();
	    /*$( "#slider" ).slider({
		value : 0,//Значение, которое будет выставлено слайдеру при загрузке
		min : 0,//Минимально возможное значение на ползунке
		max : 4,//Максимально возможное значение на ползунке
		step : 1,//Шаг, с которым будет двигаться ползунок
		create: function( event, ui ) {
		   	val = $( "#slide4 #slider" ).slider("value");//При создании слайдера, получаем его значение в перемен. val
		  	$( "#slide4 #contentSlider" ).html( slide3CountArr[val] );//Заполняем этим значением элемент с id contentSlider
		 },
		slide: function( event, ui ) {
		  $( "#slide4 #contentSlider" ).html( slide3CountArr[ui.value] );//При изменении значения ползунка заполняем элемент с id contentSlider
		            }
		});
		$('#slide4 .taps').click(function(){
			$( "#slide4 #slider" ).slider("value",$(this).attr('data-num'))
			console.log($( "#slide4 #slider" ).slider("value"));
		});*/
		$('.header-logo').hover(function(){
			$('.header-logo').css('background','url(img/logo_black.png)');
		},function(){
			$('.header-logo').css('background','url(img/slogo.png)');
		});
		$('.header-logo').focus(function(){
			$('.header-logo').css('background','url(img/logo_black.png)');
		},function(){
			$('.header-logo').css('background','url(img/slogo.png)');
		});
		$('.header-logo').click(function(){
			$('.header-logo').css('background','url(img/logo_black.png)');
		});
		if($('.header-logo').is(":focus")){$('.header-logo').css('background','url(img/logo_black.png)');}


		kostil2=false;

		$('#slide4 .ui-checkboxradio-label').click(function(){
			kostil2=!kostil2;
			if(kostil2) return; 
			calculate();
		});
		document.querySelector('.js-min-max-start').onchange = function() {
			calculate();
		};
		function calculate(){
			str='';
			num=slide4CountArr[document.querySelector('.js-min-max-start').value];
			summ=0;
			if(document.querySelector('.js-min-max-start').value!=4){
				needplus=false;
				Services=[];
				$('.mainch').each(function(){
					if($('#slide4 #'+$(this).attr('for')).is(":checked")) {
						switch($(this).attr('for')){
							case 'ch1':
								if($('#slide4 #ch1_1').is(":checked")){
									str+=num+'*(600+300)';
									summ+=num*(600+300);
									Services.push('Спинфото(цветной фон)');
								}
								else{
									Services.push('Спинфото');
									str+=num+'*600';
									summ+=num*(600);	
								}
								if($('#slide4 #ch1_2').is(":checked")){
									Services.push('Установка спин-фото на сайт');
									str+='+2000';
									summ+=2000;	
								}
								needplus=true;
							break;
							case 'ch2':
								if(needplus) str+=' + ';
								if($('#slide4 #ch2_1').is(":checked")){
									Services.push('Предметное фото(цветной фон)');
									str+=num+'*(50+20)*5';
									summ+=num*(50+20)*5;
								}
								else{
									Services.push('Предметное фото');
									str+=num+'*50*5';
									summ+=num*50*5;
								}
								needplus=true;
							break;
							case 'ch3':
								if(needplus) str+=' + ';
								if($('#slide4 #ch3_1').is(":checked")){
									Services.push('Предметное видео(цветной фон)');
									str+=num+'*(800+200)';
									summ+=num*(800+200);	
								}
								else{
									Services.push('Предметное видео');
									str+=num+'*800';
									summ+=num*(800);	
								}
							break;
						}
					}
				});
				if(summ!=0) {
					if(summ>=100000){ 
						str+=' = <span class="summ-through">'+summ+'</span> <span class="strong">'+summ*0.85+' руб.</span>';
						Sum=summ*0.85;
					}
					if(summ>=25000 && summ<100000){ 
						str+=' = <span class="summ-through">'+summ+'</span> <span class="strong">'+summ*0.9+' руб.</span>';
						Sum=summ*0.9;
					}
					if(summ>=10000 && summ<25000){ 
						str+=' = <span class="summ-through">'+summ+'</span> <span class="strong">'+summ*0.95+' руб.</span>';
						Sum=summ*0.95;
					}
					if(summ<10000){
						str+=' = <span class="strong">'+summ+' руб.</span>';
						Sum=summ;
					}

				}else{
					str=num + ' товаров';
				}
			}else str=num;
			$('#slide4 #service_price').html(str);
		}
		$('#slide1_video').get(0).play();
		loc = window.location.hash.replace("#","");
		if(loc=="") loc="link0";
		scrollToElement($('#anchor_'+loc));
		//setTimeout(function(){$('.preload').fadeOut(600)},2000);
	});
	 $(window).resize(function() {
	 	slide1_size();
	 });
	function slide1_size(){
		var height=slide1MinHeight;
		if($(window).height()>slide1MinHeight) height=$(window).height();
		$('#slide1 .mybox').height(height);
		$('#slide1 .mask1').height(height);
		$('#slide1 .bg').height(height);
		//if($(window).height()>slide1MaskMaxHeight) height=slide1MaskMaxHeight;
		$('#slide1 .mask1-outer').height(height);
	}
	$('.to_slide2').click(function(){
		scrollToElement($('#slide2'));
	});

	
	working=true;
	arrow=true;
	slide5Active=0;
	
	function nextWork(){
		if(!working) return;
		if(!arrow){
			//$('#slide5 .mybox').css('background-image','url(img/arrrows.png)');
			//$('#arrow'+slide5Active+'a').css('display','none');
			
			//$('#w'+slide5Active+' .circle').css('background','url(img/circle.png)');
			//$('#w'+slide5Active+' .img img').css('opacity','0.7');
			
			if(slide5Active==13) {
				slide5Active=0;
				for(i=0;i<12;i++){
					$('#arrow'+i+'a').css('display','none');
					$('#arrow'+i).css('display','block');

					$('#w'+(i+1)+' .circle').css('background','url(img/circle.png)');
					$('#w'+(i+1)+' .img img').css('opacity','0.7');		
				}
				arrow=true;
			}else if(slide5Active==12){
				
				slide5Active+=1;	
				arrow=false;
			}else{
				slide5Active+=1;	
				$('#w'+slide5Active+' .circle').css('background','url(img/circle_hover.png)');
				$('#w'+slide5Active+' .img img').css('opacity','1');
				arrow=true;
				if(slide5Active==12) arrow=false;
			}
			
		}else{
			$('#arrow'+slide5Active+'a').css('display','block');
			$('#arrow'+slide5Active).css('display','none');
			//$('#w'+slide5Active+' .circle').css('background','url(img/circle.png)');
			//$('#w'+slide5Active+' .img img').css('opacity','0.7');
			arrow=false;
		}
		timeoutID=setTimeout(function(){nextWork()},200);
	}

	if(isPC){
		nextWork();
	}else{

		$('#map').css('background','url(img/map.png) no-repeat center center');
		$('#map').html();
		$('.bg').html('');
		$('.bg').css('background','url(img/slide1_image_bg.png) no-repeat top center');
		$('.bg').css('background-size','3600px 2250px');
		$('#slide5 .mask').hide();
		$('#slide5').css('background-image','url(img/slide5-bg-mobile.jpg)'); 
		$('#slide5 .all-items').hide();
		//$('.taps').css('display','block');
	}
	activeGal=5;

	wallopRec=null;
	wallopSpin=null;
	wallopCat=null;
	wallopPromo=null;
	function galTo(num){
		if(wallopRec!=null)	var wallopRecProm=$('#reklam-wallop').detach();	
		if(wallopSpin!=null) var wallopSpinProm=$('#spin-wallop').detach();	
		if(wallopCat!=null)	var wallopCatProm=$('#catalog-wallop').detach();	
		if(wallopPromo!=null)	var wallopPromoProm=$('#promo-wallop').detach();	

		$('#g'+activeGal).css('display','none');
		html=$('#g'+activeGal).html();
		$('#g'+activeGal).html('');
		$('#g'+activeGal).html(html);
		$('#d'+activeGal).css('display','none');
		activeGal=num;
		$('#g'+activeGal).css('display','block');
		$('#d'+activeGal).css('display','block');

		if(wallopRec!=null){
			wallopRecProm.appendTo($('.reklam-wallop-parent'));
		}else{
			wallopRec =document.querySelector('#reklam-wallop');
			sliderRec = new Wallop(wallopRec);
			sliderRec.on('change', function(event) {
				elem=event.detail.wallopEl.querySelector('.Wallop-item--current');
				$('#slide3 .reklam-description h3').html(elem.getAttribute('data-header'));
				$('#slide3 .reklam-description p').html(elem.getAttribute('data-text'));
  			});
		}
		if(wallopSpin!=null){
			wallopSpinProm.appendTo($('.spin-wallop-parent'));
		}else{
			wallopSpin =document.querySelector('#spin-wallop');
			sliderSpin = new Wallop(wallopSpin);
			sliderSpin.on('change', function(event) {
				elem=event.detail.wallopEl.querySelector('.Wallop-item--current');
				$('#slide3 .spin-description h3').html(elem.getAttribute('data-header'));
				$('#slide3 .spin-description p').html(elem.getAttribute('data-text'));
  			});
		}
		if(wallopCat!=null){
			wallopCatProm.appendTo($('.catalog-wallop-parent'));
		}else{
			wallopCat =document.querySelector('#catalog-wallop');
			sliderCat = new Wallop(wallopCat);
			sliderCat.on('change', function(event) {
				elem=event.detail.wallopEl.querySelector('.Wallop-item--current');
				$('#slide3 .catalog-description h3').html(elem.getAttribute('data-header'));
				$('#slide3 .catalog-description p').html(elem.getAttribute('data-text'));
  			});
		}
		if(wallopPromo!=null){
			wallopPromoProm.appendTo($('.promo-wallop-parent'));
		}else{
			wallopPromo =document.querySelector('#promo-wallop');
			sliderPromo = new Wallop(wallopPromo);
			sliderPromo.on('change', function(event) {
				htmlka=$('#promo-wallop .Wallop-item--hidePrevious').html();
				$('#promo-wallop .Wallop-item--hidePrevious').html('');
				$('#promo-wallop .Wallop-item--hidePrevious').html(htmlka);
				htmlka=$('#promo-wallop .Wallop-item--hideNext').html();
				$('#promo-wallop .Wallop-item--hideNext').html('');
				$('#promo-wallop .Wallop-item--hideNext').html(htmlka);
  			});
		}
	}
	galTo(activeGal);
	$('.close, #black').click(function () {
      $('#black,#mod').css({'display' : 'none'});
      
    });

    $('.dialog').click(function () {
      $('#black,#mod').css({'display' : 'block'});
      var id = '#' + this.id + ' .m';
      var ht = $(id).html();
      $('#modbox').html(ht);
      win_auto();
    });
    function win_auto()
    {
      var w = $('#mod').width();
      w1 = w/2-w;
      $('#mod').css({'margin-left' : w1});
      var h = $('#mod').height();
      h1 = h/2-h;
      $('#mod').css({'margin-top' : h1});
    }
  $('.dialog').click(function () {
    $('#black').fadeIn(200);
    $('#mod').fadeIn(200);

    var id = '#' + this.id + ' .m';
    var ht = $(id).html();
    $('#modbox').html(ht);

    var w = $('#mod').width();
    w1 = w/2-w;
    $('#mod').css({'margin-left' : w1});
    var h = $('#mod').height();
    h1 = h/2-h;
    $('#mod').css({'margin-top' : h1});
  });
  function mod_refresh() {
    var w = $('#mod').width();
    w1 = w/2-w;
    $('#mod').css({'margin-left' : w1});
    var h = $('#mod').height();
    h1 = h/2-h;
    $('#mod').css({'margin-top' : h1});
  }
 
$('#callback-header').click(function(){
	$('#1phone').mask("+7(999) 999-9999");
	$('#uid445').click(function(){
		i=1;
		var phone = $('#'+i+'phone').val();
		$('#'+i+'phone').css({'border' : '1px solid #CCC'});
		if(phone == '')
		{ 
		  if(phone == '') $('#'+i+'phone').css({'border' : '1px solid #f00'});
		  else $('#'+i+'phone').css({'border' : '1px solid #CCC'});
		}
		else
		{ 
		  $('#black,#mod').css({'display' : 'none'});
		  $.ajax({
		    type: 'POST',
		    url: 'ajax.php',
		    data: {
		            phone:phone,
		            send:'Обратный звонок(1 слайд)'
		          },
		    success: function(html) {
		    	 $('#black,#mod').show();
		    	 $('#modbox').html($('#popup-accept').html());
		    	 mod_refresh();
		    },
		  });
		}
	});	
});      

$('#callback-footer').click(function(){
	$('#2phone').mask("+7(999) 999-9999");
	$('#uid446').click(function(){
		i=2;
		var phone = $('#'+i+'phone').val();
		$('#'+i+'phone').css({'border' : '1px solid #CCC'});
		if(phone == '')
		{ 
		  if(phone == '') $('#'+i+'phone').css({'border' : '1px solid #f00'});
		  else $('#'+i+'phone').css({'border' : '1px solid #CCC'});
		}
		else
		{ 
		  $('#black,#mod').css({'display' : 'none'});
		  $.ajax({
		    type: 'POST',
		    url: 'ajax.php',
		    data: {
		            phone:phone,
		            send:'Обратный звонок(6 слайд)'
		          },
		    success: function(html) {

		    },
		  });
		}
	});	
}); 

$('#callback-price').click(function(){
	$('#3phone').mask("+7(999) 999-9999");
	price=Sum;
	nisha=Services.join(', ');
	if(nisha!='' && document.querySelector('.js-min-max-start').value!=4) nisha+=' '+slide4CountArr[document.querySelector('.js-min-max-start').value] + 'шт.';
	if(nisha!='' && document.querySelector('.js-min-max-start').value==4) nisha+=' >100шт.';
	$('#uid447').click(function(){
		i=3;
		var phone = $('#'+i+'phone').val();
		$('#'+i+'phone').css({'border' : '1px solid #CCC'});
		if(phone == '')
		{ 
		  if(phone == '') $('#'+i+'phone').css({'border' : '1px solid #f00'});
		  else $('#'+i+'phone').css({'border' : '1px solid #CCC'});
		}
		else
		{ 
		  $('#black,#mod').css({'display' : 'none'});
		  $.ajax({
		    type: 'POST',
		    url: 'ajax.php',
		    data: {
		            phone:phone,
		            price:price,
		            nisha:nisha,
		            send:'Заказать услугу'
		          },
		    success: function(html) {

		    },
		  });
		}
	});	
}); 
$('#callback-cv').click(function(){
	$('#4phone').mask("+7(999) 999-9999");

	nisha=$('#slide3 #d' + activeGal + ' h3').html();
	text=nisha;
	if(activeGal==1) text="поддержку мероприятий";
	if(activeGal==5) text="Spin-photo™";
	$('#slide3-modalheader').html("Заказать "+text);
	$('#uid448').click(function(){
		i=4;
		var phone = $('#'+i+'phone').val();
		$('#'+i+'phone').css({'border' : '1px solid #CCC'});
		if(phone == '')
		{ 
		  if(phone == '') $('#'+i+'phone').css({'border' : '1px solid #f00'});
		  else $('#'+i+'phone').css({'border' : '1px solid #CCC'});
		}
		else
		{ 
		  $('#black,#mod').css({'display' : 'none'});
		  $.ajax({
		    type: 'POST',
		    url: 'ajax.php',
		    data: {
		            phone:phone,
		            nisha:nisha,
		            send:'Заказать услугу(3слайд)'
		          },
		    success: function(html) {

		    },
		  });
		}
	});	
}); 
$('#scroll-preview-previous').click(function(){
	nextGalPreview('+');
})
$('#scroll-preview-next').click(function(){
	nextGalPreview('-');
})
function nextGalPreview(direction){
	$('#gal-preview-inner-inner').animate({left: direction+"=180"},500,function(){
		if(direction=='-'){
			var prom=$('.gal-preview-item').first().detach();
			$('#gal-preview-inner-inner').append(prom);
			$('#gal-preview-inner-inner').css('left',-180);	
		}
		if(direction=='+'){
			var prom=$('.gal-preview-item').last().detach();
			$('#gal-preview-inner-inner').prepend(prom);
			$('#gal-preview-inner-inner').css('left',-180);	
		}		
	})
}
$('#slide3 .preload-spin').click(function(){
	$(this).html('<iframe width="610" height="500" src="'+$(this).attr('data-iframe')+'" style="border:none;"></iframe>');	
	$(this).css('background','none');
	$(this).removeClass('preload-spin');
});

/*if(isSafari){
	alert(1);
	$('#gal1').html('<iframe width="674" height="379" src="https://www.youtube.com/embed/QQmzJnPTJyE?list=PLbRwo1TEkmRrEtP82-y2juoyPx4_fM0wU" frameborder="0" allowfullscreen></iframe>');
}*/