

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
    // check if it's on slider

    if ($(this).hasClass('open') == true) {
    	// $('.icon, .menu-toggle').removeClass('white');
    	$('#logo').addClass('visible');
    } else {
    	$('#logo').removeClass('visible');
    }
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