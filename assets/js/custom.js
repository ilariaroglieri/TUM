//-----------DOCUMENT.READY----------------

jQuery(document).ready(function($) {

// --- header behaviour
	
  // scroll events
  var prevScrollPos = $(window).scrollTop();
  $(window).scroll(function() {

    var currentScrollPos = $(window).scrollTop();
    if (currentScrollPos <= 0) {
	    $('#header').removeClass('compact');
      $('.content, #header div[class*="menu-1"]').removeClass('w-c-menu');

	  } else {
	    $('#header').addClass('compact');
      $('.content, #header div[class*="menu-1"]').addClass('w-c-menu');
	  }
  });

  var currentScrollPos = $(window).scrollTop();
  if (currentScrollPos <= 0) {
    $('#header').removeClass('compact');
    $('.content, #header div[class*="menu-1"]').removeClass('w-c-menu');

  } else {
    $('#header').addClass('compact');
    $('.content, #header div[class*="menu-1"]').addClass('w-c-menu');
  }


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

$('.accordion-btn').each(function(i, el) {
  var text = $(this).find($('.btn')).html();
  $(el).click(function() {
    var content = $(this).next($('.accordion-content'));
    content.toggleClass('active');

    if (content.hasClass('active')) {
      $(this).find($('.btn')).html('Chiudi');
    } else {
      $(this).find($('.btn')).html(text);
    }
  });
});

//--------- SVG SNAP JS -----------

function animateSVG() {
  const shapes = document.querySelectorAll('.animated-shape svg');

  Array.from(shapes).forEach((el, i) => {
    var path = el.querySelector('path').getTotalLength();
    var time = path/1500;
    el.style.setProperty('--total-length', path);
    el.style.setProperty('--animation-time', `${time}s`);
  });
}

animateSVG();


//logo svg animation
var bodyCol = $('body').data('color');

const line = 'M520.5 81.6 515.6 81.6 510.8 81.6 506 81.6 501.2 81.6 496.3 81.6 491.5 81.6 486.7 81.6 481.8 81.6 477 81.6 472.2 81.6 467.3 81.6 462.5 81.6 457.7 81.6 452.8 81.6 448 81.6 443.2 81.6 438.3 81.6 433.5 81.6 428.7 81.6 423.8 81.6 419 81.6 414.2 81.6 409.3 81.6 404.5 81.6 399.7 81.6 394.8 81.6 390 81.6 385.2 81.6 380.4 81.6 375.5 81.6 370.7 81.6 365.9 81.6 361 81.6 356.2 81.6 351.4 81.6 346.5 81.6 341.7 81.6 336.9 81.6 332 81.6 327.2 81.6 322.4 81.6 317.5 81.6 312.7 81.6 307.9 81.6 303 81.6 298.2 81.6 293.3 81.6 288.5 81.6 283.6 81.6 278.7 81.6';

var strokes = {
  blue: [
    'M520.5,62.5c-2.4,0.2-3.9,3.7-5.1,7.8c-1.1,4.1-5,23-5.5,24.8c-1.2,4-2.8,6-4.5,6c-1.6,0-3.3-2-4.5-6   c-0.6-1.8-4.4-20.6-5.5-24.8s-2.7-7.7-5.1-7.8c-2.4,0.2-3.9,3.7-5.1,7.8s-4.9,23-5.5,24.8c-1.2,4-2.8,6-4.5,6c-1.6,0-3.3-2-4.5-6  c-0.6-1.8-4.4-20.5-5.5-24.7c-1.1-4.2-2.7-7.8-5.1-7.9v0c-2.4,0.2-3.9,3.7-5.1,7.8s-5,23-5.5,24.8c-1.2,4-2.9,6-4.5,6s-3.3-2-4.5-6  c-0.6-1.8-4.4-20.6-5.5-24.8c-1.1-4.1-2.7-7.7-5.1-7.8c-2.4,0.2-3.9,3.7-5.1,7.8s-5,23-5.5,24.8c-1.2,4-2.8,6-4.5,6  c-1.6,0-3.3-2-4.5-6c-0.6-1.8-4.4-20.6-5.5-24.8s-2.7-7.7-5.1-7.8c-2.4,0.2-3.9,3.7-5.1,7.8c-1.1,4.1-4.9,23-5.5,24.8  c-1.2,4-2.8,6-4.5,6s-3.3-2-4.5-6c-0.6-1.8-4.4-20.5-5.5-24.7c-1.1-4.2-2.7-7.8-5.1-7.9v0c-2.4,0.2-3.9,3.7-5.1,7.8  c-1.1,4.1-5,23-5.5,24.8c-1.2,4-2.9,6-4.5,6s-3.3-2-4.5-6c-0.6-1.8-4.4-20.6-5.5-24.8c-1.1-4.1-2.7-7.7-5.1-7.8  c-2.4,0.2-3.9,3.7-5.1,7.8c-1.1,4.1-5,23-5.5,24.8c-1.2,4-2.8,6-4.5,6c-1.6,0-3.3-2-4.5-6c-0.6-1.8-4.4-20.6-5.5-24.8  c-1.1-4.1-2.7-7.7-5.1-7.8c-2.4,0.2-3.9,3.7-5.1,7.8s-4.9,23-5.5,24.8c-1.2,4-2.8,6-4.5,6c-1.6,0-3.3-2-4.5-6  c-0.6-1.8-4.4-20.5-5.5-24.7c-1.1-4.2-2.7-7.8-5.1-7.9',
    'M762.9,62.5c-2.4,0.2-3.9,3.7-5.1,7.8s-5,23-5.5,24.8c-1.2,4-2.8,6-4.5,6c-1.6,0-3.3-2-4.5-6 c-0.6-1.8-4.4-20.6-5.5-24.8s-2.7-7.7-5.1-7.8c-2.4,0.2-3.9,3.7-5.1,7.8c-1.1,4.1-4.9,23-5.5,24.8c-1.2,4-2.8,6-4.5,6s-3.3-2-4.5-6  c-0.6-1.8-4.4-20.5-5.5-24.7c-1.1-4.2-2.7-7.8-5.1-7.9v0c-2.4,0.2-3.9,3.7-5.1,7.8s-5,23-5.5,24.8c-1.2,4-2.9,6-4.5,6s-3.3-2-4.5-6  c-0.6-1.8-4.4-20.6-5.5-24.8s-2.7-7.7-5.1-7.8c-2.4,0.2-3.9,3.7-5.1,7.8c-1.1,4.1-5,23-5.5,24.8c-1.2,4-2.8,6-4.5,6s-3.3-2-4.5-6  c-0.6-1.8-4.4-20.6-5.5-24.8s-2.7-7.7-5.1-7.8c-2.4,0.2-3.9,3.7-5.1,7.8c-1.1,4.1-4.9,23-5.5,24.8c-1.2,4-2.8,6-4.5,6s-3.3-2-4.5-6  c-0.6-1.8-4.4-20.5-5.5-24.7c-1.1-4.2-2.7-7.8-5.1-7.9v0c-2.4,0.2-3.9,3.7-5.1,7.8c-1.1,4.1-5,23-5.5,24.8c-1.2,4-2.9,6-4.5,6  s-3.3-2-4.5-6c-0.6-1.8-4.4-20.6-5.5-24.8c-1.1-4.1-2.7-7.7-5.1-7.8c-2.4,0.2-3.9,3.7-5.1,7.8c-1.1,4.1-5,23-5.5,24.8  c-1.2,4-2.8,6-4.5,6s-3.3-2-4.5-6c-0.6-1.8-4.4-20.6-5.5-24.8s-2.7-7.7-5.1-7.8c-2.4,0.2-3.9,3.7-5.1,7.8c-1.1,4.1-4.9,23-5.5,24.8  c-1.2,4-2.8,6-4.5,6c-1.6,0-3.3-2-4.5-6c-0.6-1.8-4.4-20.5-5.5-24.7c-1.1-4.2-2.7-7.8-5.1-7.9',
      'panel', '#3f89ff'
    ],
  green: [
    'M520.5,101.2 520.5,62.5 510.8,62.5 510.8,72.2 501.1,72.2 501.1,81.8 491.5,81.8 491.5,91.5   481.8,91.5 481.8,101.2 472.1,101.2 472.1,62.5 462.5,62.5 462.5,72.2 452.8,72.2 452.8,81.8 443.1,81.8 443.1,91.5 433.4,91.5   433.4,101.2 423.8,101.2 423.8,62.5 414.1,62.5 414.1,72.2 404.4,72.2 404.4,81.8 394.8,81.8 394.8,91.5 385.1,91.5 385.1,101.2  375.4,101.2 375.4,62.5 365.8,62.5 365.8,72.2 356.1,72.2 356.1,81.8 346.4,81.8 346.4,91.5 336.7,91.5 336.7,101.2 327.1,101.2   327.1,62.5 317.4,62.5 317.4,72.2 307.7,72.2 307.7,81.8 298.1,81.8 298.1,91.5 288.4,91.5 288.4,101.2 278.7,101.2',
    'M762.2,103.5 762.2,62.5 752.5,62.5 752.5,72.2 742.9,72.2 742.9,81.8 733.2,81.8 733.2,91.5   723.5,91.5 723.5,101.2 713.9,101.2 713.9,62.5 704.2,62.5 704.2,72.2 694.5,72.2 694.5,81.8 684.9,81.8 684.9,91.5 675.2,91.5   675.2,101.2 665.5,101.2 665.5,62.5 655.8,62.5 655.8,72.2 646.2,72.2 646.2,81.8 636.5,81.8 636.5,91.5 626.8,91.5 626.8,101.2  617.2,101.2 617.2,62.5 607.5,62.5 607.5,72.2 597.8,72.2 597.8,81.8 588.2,81.8 588.2,91.5 578.5,91.5 578.5,101.2 568.8,101.2   568.8,62.5 559.2,62.5 559.2,72.2 549.5,72.2 549.5,81.8 539.8,81.8 539.8,91.5 530.1,91.5 530.1,101.2 520.5,101.2',
    'film','#b5d300'
    ],
  red: [
    'M520.5,62.5c-1.8,0-3.7,0.6-5.5,1.7c-1.7,1.1-3.5,2.5-5.1,4.3c-3.3,3.6-6.2,8.5-8.3,13.3   c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6   c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6   c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3  c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3    c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3  c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3  c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6  c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6  c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3  c-1.6-1.8-3.3-3.3-5-4.4c-1.7-1.1-3.5-1.7-5.3-1.7',
    'M762.2,62.5c-1.8,0-3.7,0.6-5.5,1.7c-1.7,1.1-3.5,2.5-5.1,4.3c-3.3,3.6-6.2,8.5-8.3,13.3   c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6  c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6  c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3  c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3  c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3  c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3  c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6c-3.6,0-7.3,2.4-10.6,6  c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3c-3.2-3.6-6.7-6-10.3-6  c-3.6,0-7.3,2.4-10.6,6c-3.3,3.6-6.2,8.5-8.3,13.3c-4,9.4-2.7,19.3,2.9,19.3c6.7,0,7.4-10,3.7-19.3c-1.9-4.8-4.5-9.7-7.7-13.3  c-1.6-1.8-3.3-3.3-5-4.4c-1.7-1.1-3.5-1.7-5.3-1.7',
    'workshop','#ff4c44'
    ],
  yellow: [
    'M520.5,101.2 516.8,101.2 513.2,101.2 503.6,62.5 499.9,62.5 496.3,62.5 492.7,62.5 489,62.5 479.4,101.2 475.8,101.2 472.1,101.2 468.5,101.2 464.9,101.2 455.2,62.5 451.6,62.5 448,62.5 444.3,62.5 440.7,62.5 431.1,101.2   427.4,101.2 423.8,101.2 420.1,101.2 416.5,101.2 406.9,62.5 403.3,62.5 399.6,62.5 396,62.5 392.3,62.5 382.7,101.2 379.1,101.2   375.4,101.2 371.8,101.2 368.2,101.2 358.5,62.5 354.9,62.5 351.3,62.5 347.6,62.5 344,62.5 334.4,101.2 330.7,101.2 327.1,101.2   323.4,101.2 319.8,101.2 310.2,62.5 306.6,62.5 302.9,62.5 299.3,62.5 295.6,62.5 286,101.2 282.4,101.2 278.7,101.2',
    'M762.2,101.2 758.6,101.2 754.9,101.2 745.3,62.5 741.7,62.5 738,62.5 734.4,62.5 730.8,62.5   721.2,101.2 717.5,101.2 713.9,101.2 710.2,101.2 706.6,101.2 697,62.5 693.3,62.5 689.7,62.5 686.1,62.5 682.4,62.5 672.8,101.2   669.2,101.2 665.5,101.2 661.9,101.2 658.2,101.2 648.6,62.5 645,62.5 641.4,62.5 637.7,62.5 634.1,62.5 624.5,101.2 620.8,101.2   617.2,101.2 613.5,101.2 609.9,101.2 600.3,62.5 596.6,62.5 593,62.5 589.4,62.5 585.7,62.5 576.1,101.2 572.5,101.2 568.8,101.2   565.2,101.2 561.6,101.2 551.9,62.5 548.3,62.5 544.7,62.5 541,62.5 537.4,62.5 527.8,101.2 524.1,101.2 520.5,101.2',
    'tour','#fed100'
    ]
  };

// site state
var state = {
  "activeItem": undefined
};



function animateLogo(i) {
  var lineSVG = Snap.select('#line');
  var seclineSVG = Snap.select('#secondLine');

  if (i != undefined) {
    var event = $('.event');
    var currCat = $(event[i]).attr('data-type');

    for (var path in strokes) {
      var cat = strokes[path][2];
      if (cat == currCat) {
        var path1 = strokes[path][0];
        var path2 = strokes[path][1];

        lineSVG.attr('data-color', path);
        seclineSVG.attr('data-color', path);
        lineSVG.animate({ d: path1 }, 250, mina.backout);
        seclineSVG.animate({ d: path2 }, 250, mina.backout);

        $('#header .menu-toggle span').css({'background-color':strokes[path][3]});

        $('#header div[class*="menu-1"] ul li a').mouseenter(function() {
          $(this).css({'color':strokes[path][3]})
        }).mouseleave(function() {
          $(this).css({'color': '#43454a'});
        });
      }
    }
    
  } else {

    for (var path in strokes) {
      if (path == bodyCol) {
        var path1 = strokes[path][0];
        var path2 = strokes[path][1];

        setTimeout(function() {
          lineSVG.attr('data-color', bodyCol);
          seclineSVG.attr('data-color', bodyCol);
          lineSVG.animate({ d: path1 }, 250, mina.backout);
          seclineSVG.animate({ d: path2 }, 250, mina.backout);
        }, 300)

        $('#header .menu-toggle span').css({'background-color':strokes[path][3]});

        $('#header div[class*="menu-1"] ul li a').mouseenter(function() {
          $(this).css({'color':strokes[path][3]})
          .mouseleave(function() {
            $(this).css({'color': '#43454a'});
          })
        });
      }
    }
  }
}

var scrollTop = Math.round( $(document).scrollTop() );
updateActive( scrollTop );
animateLogo(state.activeItem);

$(window).on('scroll', function() {
  var scrollTop = Math.round( $(document).scrollTop() );
  updateActive( scrollTop );
});



function updateActive(scroll) {
  var vh = window.innerHeight;
  var header = $('#header').height();

  var events = $('.event');
  var newActiveItem = undefined;

  events.each(function(i, el) {
    var event = $(el);
    if (scroll > event.offset().top - header) {
      newActiveItem = i;
    }
  });

  if (newActiveItem != state.activeItem) {
    state.activeItem = newActiveItem;

    animateLogo(state.activeItem);
  }
}

$(document).on('click', '#cat-select .filter-container, #venue-select .filter-container, #date-select .filter-container', function(ev) {
  ev.preventDefault();

  var currFilter = $(this).find('.filter-element').attr('data-type');

  $('.filter-element[data-type='+currFilter+']').parent().removeClass('active');
  $(this).addClass('active');


  var category = $('#cat-select').attr('data-name');
  var catTerm = $('#cat-select .filter-container.active .filter-element').attr('id');

  var venue = $('#venue-select').attr('data-name');
  var venueTerm = $('#venue-select .filter-container.active .filter-element').attr('id');
  
  var date =  $('#date-select .filter-container.active .filter-element').attr('id');

  $.ajax({
    url: wpAjax.ajaxUrl,
    data: {action: 'filterCat', catTerm: catTerm, category: category, venueTerm: venueTerm, venue: venue, date: date},
    type: 'post',
    beforeSend: function() {
      $('#events-calendar').css({'opacity':'.5'});
    },
    success: function(results) {
      $('#events-calendar').css({'opacity':'1'}).html(results);
      animateSVG();
    },
    error: function(results) {
      console.log(results);
    }
  })
});

$(document).on('click', '.reset-filter', function(ev) {
  location.reload();
});

//----------END JQUERY -----------
});
