var switcher = true;

(function () {
  $(".menu_anvorguesa").click(function () {
    $(this).toggleClass("cross");
	  $('#menu-container').toggleClass("open");
	  $('.overlay-black').toggle();
  });
}).call(this);


$('#menu-container li a').click(function(e){
  const href = $(this).attr("href"),
      offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight-5;
  $('html, body').stop().animate({
      scrollTop: offsetTop
  }, 850);
  $('.menu_anvorguesa').removeClass("cross");
  $('#menu-container').removeClass("open");
	$('.overlay-black').fadeOut();
  e.preventDefault();
});

// Cache selectors
const topMenu = $("header"),
 topMenuHeight = topMenu.outerHeight()+1,
 // All list items
 menuItems = $("#menu-torneo-desktop a"),
 // Anchors corresponding to menu items
 scrollItems = menuItems.map(function(){
   const item = $($(this).attr("href"));
    if (item.length) { return item; }
 });
 //console.log(menuItems);

// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.click(function(e){
  const href = $(this).attr("href")
      offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight-10;
      console.log(href);
  $('html, body').stop().animate({
      scrollTop: offsetTop
  }, 850);
  e.preventDefault();
});

// Bind to scroll
$(window).scroll(function(){
   // Get container scroll position
   const fromTop = $(this).scrollTop()+topMenuHeight+15;

   // Get id of current scroll item
   let cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   let id = cur && cur.length ? cur[0].id : "";
		
	// Set/remove active class
	console.log(id)
	menuItems.removeClass("active");
	$('#'+id+'-link').addClass('active');
	
});


$('.overlay-confirmacion, .modal .btn-morado, .cerrar-modal').on('click', function(){
	$('.overlay-confirmacion').fadeOut();
})

$('.modal').on('click', function(){
	return false;
})

function mensajeIntro(){
	setTimeout(function(){
		$('.overlay-confirmacion').fadeIn('slow');
	},1000)
}
//mensajeIntro();

$('#logo').on('click', function(){
	mensajeIntro();
})

