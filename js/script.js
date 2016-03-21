function sidenav () {
  $('#globalnav').toggleClass('gn-nav-open');
  $('.gn-content').toggleClass('gn-nav-show');
  $('#js-overlay-sidenav').fadeToggle(300);
  $('body').toggleClass('no-scroll');
  return false;
} 

$('.js-gn-menu').on('click', function() {
  sidenav();
  $('#js-overlay-sidenav').bind('touchmove', function(e){e.preventDefault();});
});

$('#js-overlay-sidenav').on('click', function() {
  sidenav();
  $('#js-overlay-sidenav').unbind('touchmove');
});

// Close drawer when navigation switches to desktop mode
$(window).resize(function() {
  if (window.innerWidth >= '1040') {
    $('#globalnav').removeClass('gn-nav-open');
    $('.gn-content').removeClass('gn-nav-show');
    $('#js-overlay-sidenav').fadeOut(300);
    $('body').removeClass('no-scroll');
  }
});

 

// open and close the search in the navigation bar

function search () {
  $('#globalnav').toggleClass('gn-search-open');
  $('.gn-content').toggleClass('gn-search-show');
  $('#js-overlay-search').fadeToggle(300);
  $('body').toggleClass('no-scroll');
  return false;
}

$('.js-gn-search').on('click', function() {
  search();
  $('#js-overlay-search').bind('touchmove', function(e){e.preventDefault();});
  $('#form1_q').focus();
});

$('.js-search-close').on('click', function() {
  search();
  $('#js-overlay-search').unbind('touchmove');
});

$('#js-overlay-search').on('click', function() {
  search();
  $('#js-overlay-search').unbind('touchmove');
});


document.addEventListener('keyup', function (e) {
  if ( e.keyCode == 27 )   {
    if ($(".gn-content").hasClass("gn-search-show")) {
      search();
      $('#js-overlay-search').unbind('touchmove');
    } else if ($(".gn-content").hasClass("gn-nav-show")) {
      sidenav();
      $('#js-overlay-sidenav').unbind('touchmove');
    }
  }
});



/* HEADROOM */

var myElement = document.querySelector("#globalnav");
// construct an instance of Headroom, passing the element
var headroom  = new Headroom(myElement, {
  offset: 60
});
// initialise
headroom.init();



/* SLIDERS */

if ($('.sliders')) {
  $('#slider-main').slick({
    dots: true,
    nextArrow: "<div class='slick-next'>",
    prevArrow: "<div class='slick-prev'>",
    appendArrows: '#slider-main.slick-slider',
    appendDots: '#slider-main.slick-slider',
    autoplay: true,
    touchThreshold: 7,
    autoplaySpeed: 4000,
    infinite: true,
  });
};



/* MATCH CARD HEIGHT */

if($('.cards')) {
  $('.cards .card-content').matchHeight();
  $('.cards .download-content').matchHeight();
};



/* GALLERY */
if ($('#js-gallery')) {
  $('#js-gallery').slickLightbox();
};

if ($('#article')) {
  $('.images').slickLightbox({
    caption: 'caption'
  });
};



/**
 * Created by Sallar Kaboli <sallar.kaboli@gmail.com>
 * @sallar
 * 
 * Released under the MIT License.
 * http://sallar.mit-license.org/
 * 
 * This document demonstrates three things:
 * 
 * - Creating a simple parallax effect on the content
 * - Creating a Medium.com-style blur on scroll image
 * - Getting scroll position using requestAnimationFrame for better performance
 */


/**
 * Cache
 */
var $content = $('header .hero-title-ctnr')
  // , $blur    = $('header .hero-overlay')
  , wHeight  = $(window).height();

$(window).on('resize', function(){
  wHeight = $(window).height();
});

/**
 * requestAnimationFrame Shim 
 */
window.requestAnimFrame = (function()
{
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

/**
 * Scroller
 */
function Scroller()
{
  this.latestKnownScrollY = 0;
  this.ticking            = false;
}

Scroller.prototype = {
  /**
   * Initialize
   */
  init: function() {
    window.addEventListener('scroll', this.onScroll.bind(this), false);
  },

  /**
   * Capture Scroll
   */
  onScroll: function() {
    this.latestKnownScrollY = window.scrollY;
    this.requestTick();
  },

  /**
   * Request a Tick
   */
  requestTick: function() {
    if( !this.ticking ) {
      window.requestAnimFrame(this.update.bind(this));
    }
    this.ticking = true;
  },

  /**
   * Update.
   */
  update: function() {
    var currentScrollY = this.latestKnownScrollY;
    this.ticking       = false;
    
    /**
     * Do The Dirty Work Here
     */
    var slowScroll = currentScrollY / 8;
      // , blurScroll = currentScrollY * 2;

    $content.css({
      'transform'         : 'translateY(-' + slowScroll + 'px)',
      '-moz-transform'    : 'translateY(-' + slowScroll + 'px)',
      '-webkit-transform' : 'translateY(-' + slowScroll + 'px)'
    });

    // $blur.css({
    //   'opacity' : blurScroll / wHeight
    // });
  }
};

/**
 * Attach!
 */
var scroller = new Scroller();  
scroller.init();