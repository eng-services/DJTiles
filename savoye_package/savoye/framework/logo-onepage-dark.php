<?php

$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));



if ( file_exists( $root.'/wp-load.php' ) ) {

    require_once( $root.'/wp-load.php' );

} elseif ( file_exists( $root.'/wp-config.php' ) ) {

    require_once( $root.'/wp-config.php' );

}

header("Content-type: text/javascript");

global $savoye_redux_demo; 

$b=$savoye_redux_demo['main-color-1'];


?>

jQuery(function () {
  "use strict";
  
  // Preloader
  jQuery("#preloader").fadeOut(600);
  jQuery(".preloader-bg").delay(500).fadeOut(600);
  var wind = jQuery(window);
  
  // ScrollIt
  jQuery.scrollIt({
    upKey: 38, // key code to navigate to the next section
    downKey: 40, // key code to navigate to the previous section
    easing: 'swing', // the easing function for animation
    scrollTime: 600, // how long (in ms) the animation takes
    activeClass: 'active', // class given to the active nav element
    onPageChange: null, // function(pageIndex) that is called when page is changed
    topOffset: -70 // offste (in px) for fixed top navigation
  });
  
  // Navbar scrolling background
  wind.on("scroll", function () {
    var bodyScroll = wind.scrollTop()
      , navbar = jQuery(".navbar")
      , logo = jQuery(".navbar .logo> img");
    if (bodyScroll > 100) {
      navbar.addClass("nav-scroll");
      logo.attr('src', '<?php echo esc_url($savoye_redux_demo['logo_dark']['url']); ?>');
    }
    else {
      navbar.removeClass("nav-scroll");
      logo.attr('src', '<?php echo esc_url($savoye_redux_demo['logo_dark']['url']); ?>');
    }
  });
  // Close navbar-collapse when a  clicked
  jQuery(".navbar-nav .dropdown-item a").on('click', function () {
    jQuery(".navbar-collapse").removeClass("show");
  });
  
  // Sections background image from data background
  var pageSection = jQuery(".bg-img, section");
  pageSection.each(function (indx) {
    if (jQuery(this).attr("data-background")) {
      jQuery(this).css("background-image", "url(" + jQuery(this).data("background") + ")");
    }
  });
  
  // Isotope Active
  jQuery('.savoye-project-items').imagesLoaded(function () {
    // Add isotope on click filter function
    jQuery('.savoye-project-filter li').on('click', function () {
      jQuery(".savoye-project-filter li").removeClass("active");
      jQuery(this).addClass("active");
      var selector = jQuery(this).attr('data-filter');
      jQuery(".savoye-project-items").isotope({
        filter: selector
        , animationOptions: {
          duration: 750
          , easing: 'linear'
          , queue: false
        , }
      });
      return false;
    });
    jQuery(".savoye-project-items").isotope({
      itemSelector: '.single-item'
      , layoutMode: 'masonry'
    , });
  });
  
  // Animations
  var contentWayPoint = function () {
    var i = 0;
    jQuery('.animate-box').waypoint(function (direction) {
      if (direction === 'down' && !jQuery(this.element).hasClass('animated')) {
        i++;
        jQuery(this.element).addClass('item-animate');
        setTimeout(function () {
          jQuery('body .animate-box.item-animate').each(function (k) {
            var el = jQuery(this);
            setTimeout(function () {
              var effect = el.data('animate-effect');
              if (effect === 'fadeIn') {
                el.addClass('fadeIn animated');
              }
              else if (effect === 'fadeInLeft') {
                el.addClass('fadeInLeft animated');
              }
              else if (effect === 'fadeInRight') {
                el.addClass('fadeInRight animated');
              }
              else {
                el.addClass('fadeInUp animated');
              }
              el.removeClass('item-animate');
            }, k * 200, 'easeInOutExpo');
          });
        }, 100);
      }
    }, {
      offset: '85%'
    });
  };
  jQuery(function () {
    contentWayPoint();
  });
  
  //  YouTubePopUp
  jQuery("a.vid").YouTubePopUp();
  
  // Parallax Slider 
  jQuery(document).ready(function () {
    var owl = jQuery('.parallax-header .owl-carousel');
    // Parallax slider owlCarousel
    jQuery('.parallax-slider .owl-carousel').owlCarousel({
      items: 1
      , loop: true
      , dots: true
      , margin: 0
      , autoplay: true
      , slideSpeed: 100
      , autoplayTimeout: 4000
      , nav: false
      , navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>']
    });
    // Parallax slider-fade owlCarousel
    jQuery('.parallax-slider-fade .owl-carousel').owlCarousel({
      items: 1
      , loop: true
      , dots: true
      , margin: 0
      , autoplay: true
      , slideSpeed: 100
      , autoplayTimeout: 4000
      , animateOut: 'fadeOut'
      , nav: false
      , navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>']
    });
  });
    
    // Services owlCarousel
    jQuery('.services-feat .owl-carousel').owlCarousel({
        loop: true
        , margin: 30
        , mouseDrag: true
        , autoplay: false
        , dots: true
        , autoplayHoverPause:true
        , smartSpeed: 500
        , responsiveClass: true
        , responsive: {
            0: {
                items: 1
            , }
            , 600: {
                items: 2
            }
            , 1000: {
                items: 3
            }
        }
    });
  
  // Testimonials owlCarousel
    jQuery('.testimonials .owl-carousel').owlCarousel({
        loop:true,
        center: true,
        margin: 15,
        mouseDrag:false,
        autoplay:true,
        dots: true,
        smartSpeed: 1500,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                dots: false
            },
            700:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

  // Team owlCarousel
  jQuery('.team .owl-carousel').owlCarousel({
    loop: true
    , margin: 30
    , dots: true
    , mouseDrag: true
    , autoplay: false
    , responsiveClass: true
    , responsive: {
      0: {
        items: 1
      }
      , 600: {
        items: 2
      }
      , 1000: {
        items: 3
      }
    }
  });
  
  //  Scroll back to top
  var progressPath = document.querySelector('.progress-wrap path');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
  var updateProgress = function () {
    var scroll = jQuery(window).scrollTop();
    var height = jQuery(document).height() - jQuery(window).height();
    var progress = pathLength - (scroll * pathLength / height);
    progressPath.style.strokeDashoffset = progress;
  }
  updateProgress();
  jQuery(window).scroll(updateProgress);
  var offset = 150;
  var duration = 550;
  jQuery(window).on('scroll', function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.progress-wrap').addClass('active-progress');
    }
    else {
      jQuery('.progress-wrap').removeClass('active-progress');
    }
  });
  jQuery('.progress-wrap').on('click', function (event) {
      event.preventDefault();
      jQuery('html, body').animate({
        scrollTop: 0
      }, duration);
      return false;
    })
  
  // Slider 
  jQuery(document).ready(function () {
    var owl = jQuery('.header .owl-carousel');
    // Slider owlCarousel
    jQuery('.slider .owl-carousel').owlCarousel({
      items: 1
      , loop: true
      , dots: true
      , margin: 0
      , autoplay: true
      , autoplayTimeout: 6000
      , smartSpeed: 500
      , nav: false
      , navText: ['<i class="ti-arrow-left" aria-hidden="true"></i>', '<i class="ti-arrow-right" aria-hidden="true"></i>']
    });
    // Slider Fade owlCarousel
    jQuery('.slider-fade .owl-carousel').owlCarousel({
      items: 1
      , loop: true
      , dots: true
      , margin: 0
      , autoplay: true
      , autoplayTimeout: 6000
      , smartSpeed: 500
      , animateOut: 'fadeOut'
      , nav: false
      , navText: ['<i class="ti-arrow-left" aria-hidden="true"></i>', '<i class="ti-arrow-right" aria-hidden="true"></i>']
    });
    owl.on('changed.owl.carousel', function (event) {
      var item = event.item.index - 2; // Position of the current item
      jQuery('h6').removeClass('animated fadeInUp');
      jQuery('h1').removeClass('animated fadeInUp');
      jQuery('p').removeClass('animated fadeInUp');
      jQuery('.btn').removeClass('animated fadeInUp');
      jQuery('.owl-item').not('.cloned').eq(item).find('h6').addClass('animated fadeInUp');
      jQuery('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInUp');
      jQuery('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInUp');
      jQuery('.owl-item').not('.cloned').eq(item).find('.btn').addClass('animated fadeInUp');
    });
  });
  
  // Accordion Box
  if (jQuery(".accordion-box").length) {
    jQuery(".accordion-box").on("click", ".acc-btn", function () {
      var outerBox = jQuery(this).parents(".accordion-box");
      var target = jQuery(this).parents(".accordion");
      if (jQuery(this).next(".acc-content").is(":visible")) {
        //return false;
        jQuery(this).removeClass("active");
        jQuery(this).next(".acc-content").slideUp(300);
        jQuery(outerBox).children(".accordion").removeClass("active-block");
      }
      else {
        jQuery(outerBox).find(".accordion .acc-btn").removeClass("active");
        jQuery(this).addClass("active");
        jQuery(outerBox).children(".accordion").removeClass("active-block");
        jQuery(outerBox).find(".accordion").children(".acc-content").slideUp(300);
        target.addClass("active-block");
        jQuery(this).next(".acc-content").slideDown(300);
      }
    });
  }
});