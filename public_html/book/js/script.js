$(function(){
  video = $("#video")[0];
  videoObj = { "video": true };
  errBack = function(error) {
    console.log("Ошибка видео захвата: ", error.code);
  };

  // Подключение потока
  if(navigator.getUserMedia) {
    navigator.getUserMedia(videoObj, function(stream) {
      //video.src = window.URL.createObjectURL(stream);
      video.src = stream;
      video.play();
    }, errBack);
  } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
    navigator.webkitGetUserMedia(videoObj, function(stream){
      video.src = window.webkitURL.createObjectURL(stream);
      video.play();
    }, errBack);
  }

  // Получение и отправка изображения
  var intervalID=setInterval(function(){getImg()},1000);
  var home=false;
  var homeCanvasContext=$("#home")[0].getContext("2d");
  var frameCanvasContext=$("#frame")[0].getContext("2d");
  function getImg(){
    if(!home){
      homeCanvasContext.drawImage(video, 0, 0, 320, 240);
    } 
    frameCanvasContext.drawImage(video, 0, 0, 320, 240);
  }
})

   