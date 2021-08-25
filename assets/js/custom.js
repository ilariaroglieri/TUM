

//-----------DOCUMENT.READY----------------

jQuery(document).ready(function($) {

// --- header behaviour
	
  // scroll events
  var prevScrollPos = $(window).scrollTop();
  $(window).scroll(function() {

    var currentScrollPos = $(window).scrollTop();
    if (prevScrollPos > currentScrollPos && prevScrollPos > 0) {
	    $('#header').removeClass('compact');
      $('.content, div[class*="menu-1"]').removeClass('w-c-menu');

	  } else {
	    $('#header').addClass('compact');
      $('.content, div[class*="menu-1"]').addClass('w-c-menu');
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

  });

// --- slider init
  // $('.slider').slick({
  //   arrows: false,
  //   dots: false,
  //   autoplay: true,
  //   infinite: true,
  //   pauseOnHover: false,
  //   pauseOnFocus: false,
  //   autoplaySpeed: 3000,
  //   speed: 1000,
  //   cssEase: 'ease',
  //   useTransform: false
  // });

//--------- ANIME JS -----------

const shapes = document.querySelectorAll('svg.animated-shape');

Array.from(shapes).forEach((el, i) => {
  var path = el.querySelector('path').getTotalLength();
  var time = path/2500;
  el.style.setProperty('--total-length', path);
  el.style.setProperty('--animation-time', `${time}s`);
});

// anime({
//   targets: 'svg.animated path',
//   strokeDashoffset: [anime.setDashoffset, 0],
//   easing: 'linear',
//   duration: 1200,
//   // delay: function(el, i) { return i * 250 },
//   // direction: 'alternate',
//   loop: true
// });

//----------END JQUERY -----------
});
