(function () {
  $(".menu_anvorguesa").click(function () {
    $(this).toggleClass("cross");
	  $('#menu-container').toggleClass("open");
	  $('.overlay-black').toggle();
  });
}).call(this);

$('.overlay-confirmacion, .modal .btn-morado, .cerrar-modal').on('click', function(){
	$('.overlay-confirmacion').fadeOut();
})

$('.modal').on('click', function(){
	return false;
})

function mensajeIntro(){
		$('.overlay-confirmacion').fadeIn('slow');
}
setTimeout(
  function(){
  //mensajeIntro()
  }, 500
)

$('#overlay-video, #overlay-video .cerrar-modal').on('click', function(){
  $('#overlay-video').fadeOut();
  $('#iframe-yc').each(function(index) {
    $(this).attr('src', $(this).attr('src'));
    return false;
  });
})

$('.modal-video').on('click', function(){
  return false;
})


$("#abrir-modal") .click(function(e){
  $('#overlay-video') .fadeIn(1000);
  let altura = $('.modal-video').outerWidth();  
  $('#iframe-yc').height(altura * .55);
});
