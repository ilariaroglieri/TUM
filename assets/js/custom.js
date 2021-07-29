

//-----------DOCUMENT.READY----------------

jQuery(document).ready(function($) {

// --- header behaviour
	
  // scroll events
  var prevScrollPos = $(window).scrollTop();
  $(window).scroll(function() {

    var currentScrollPos = $(window).scrollTop();
    if (prevScrollPos > currentScrollPos && prevScrollPos > 0) {
	    $('#logo').addClass('visible')
	  } else {
	    $('#logo').removeClass('visible')
	  }

	  prevScrollPos = currentScrollPos;
  });


// setTimeout(function() {
//   $('.el').addClass('hidden');

// },1000);

// --- Hamburger menu
  $('.menu-toggle').click(function() {
    $(this).toggleClass('open');
    $('div[class*="menu-1"]').toggleClass('active');

    // if ($(this).hasClass('open') == true) {
    //   console.log('menu aperto');
    // 	$('#header').addClass('overflow-visible');
    // } else {
    //   console.log('menu chiuso');
    // 	setTimeout(function() {
    //     $('#header').removeClass('overflow-visible');
    //   }, 500);
    // }
  });

// --- slider init
  $('.slider').slick({
    arrows: false,
    dots: false,
    autoplay: true,
    infinite: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    autoplaySpeed: 3000,
    speed: 1000,
    cssEase: 'ease',
    useTransform: false
  });


//----------END JQUERY -----------
});
