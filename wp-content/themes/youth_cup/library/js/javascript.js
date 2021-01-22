jQuery(document).ready(function($) {
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
  
  // Cache selectors
  const topMenu = $("header"),
  topMenuHeight = topMenu.outerHeight()+1,
  // All list items
  menuItems = $("#menu-torneo-desktop a"),
  menuItemsMob = $("#menu-torneo-mobile a"),
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

  menuItemsMob.click(function(e){
    const href = $(this).attr("href")
        offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight-45;
        console.log(href);
    $('html, body').stop().animate({
        scrollTop: offsetTop
    }, 850);
    e.preventDefault();
  });

  // Bind to scroll
  $(window).scroll(function(){
    // Get container scroll position
    const fromTop = $(this).scrollTop()+topMenuHeight+50;

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
    
    menuItemsMob.removeClass("active-mobile");
    $('#'+id+'-link-mobile').addClass('active-mobile');
    
  });
  
  });// cierra el ready