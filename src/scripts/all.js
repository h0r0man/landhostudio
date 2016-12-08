//=include ../../src/scripts/modernizr.js
//=include ../../bower_components/jquery/dist/jquery.js
//=include ../../bower_components/flickity/dist/flickity.pkgd.js
//=include ../../bower_components/masonry/dist/masonry.pkgd.js
//=include ../../bower_components/vimeo-jquery-api/dist/jquery.vimeo.api.js
//=include ../../bower_components/fastclick/lib/fastclick.js
//=include ../../bower_components/viewport-units-buggyfill/viewport-units-buggyfill.js

$(function() {

  'use strict';

  var init = function() {
    initHeader();
    initFeatured();
    initGrid();
    initGridVideo();
    initGridContent();
    initSingleHero();
    initSingleContent();
    initTestimonials();
  };

  function initHeader() {

    $('.header__item--work button').click(function (event) {
      event.preventDefault();
      $('.header').toggleClass('header--work');
      return false;
    });
    
    $('.header__item--menu button').click(function (event) {
      event.preventDefault();
      $('.header').toggleClass('header--menu');
      $('body').toggleClass('no-scroll');
      return false;
    });

  };

  function initFeatured() {

    var $carousel = $('.featured__slides').flickity({
      contain: false,
      autoPlay: 7500,
      pauseAutoPlayOnHover: false,
      percentPosition: true,
      prevNextButtons: false,
      pageDots: false,
      resize: false, // false if carousel uses per.height
      setGallerySize: false, // false if carousel uses per.height
      wrapAround: true // infinite loop
    }).flickity('select', 0); // selecting first items will help to fire settle event when flickity is runned;
        
    $carousel.on('settle.flickity', function () {
      
      var flkty = $carousel.data('flickity'); // access properties
      
      if ($(flkty.selectedElement).hasClass('featured__slide--video')) {
        
        $(flkty.selectedElement).find('video').get(0).currentTime = 0;
        $(flkty.selectedElement).find('video').get(0).play();
        $(flkty.selectedElement).addClass('featured__slide--video-play');
      
      }
      
      if (!$(flkty.selectedElement).hasClass('featured__slide--video')) {

        $('.featured__slide').removeClass('featured__slide--video-play');

      }
    
    });

  };

  function initGrid() {

    var $grid = $('.grid__items').masonry({
      containerStyle: null,
      columnWidth: '.grid__sizer',
      gutter: '.grid__gutter',
      itemSelector: '.grid__item',
      percentPosition: true,
      initLayout: false
    });

    $grid.on('layoutComplete', function(event, items) {
      $(this).addClass('grid__items--loaded');
    });
    
    $grid.masonry();

  }

  function initGridVideo() {

    $('.grid__item--video').hover(playVideo, stopVideo);
    
    function playVideo() {
      $('video', this).get(0).currentTime = 0;
      $('video', this).get(0).play();
    }
    
    function stopVideo() {
      $('video', this).get(0).pause();
    };

  }

  function initGridContent() {

    $('.grid__item-link--enabled').hover(mouseEnter, mouseLeave);
    
    var titleBackup       = $('.header__item--head-description h2').text(),
        descriptionBackup = $('.header__item--head-description span').text();
    
    function mouseEnter(event) {
      
      var title = $('.grid__item-content h2', this).text(),
          description = $('.grid__item-content p', this).text();
      
      $('.header__item--head-description h2').text(title);
      $('.header__item--head-description span').text(description);
      $('.header__item--head-description').addClass('header__item--head-description--changed');
      
    };
    
    function mouseLeave(event) {

      $('.header__item--head-description h2').text(titleBackup);
      $('.header__item--head-description span').text(descriptionBackup);
      $('.header__item--head-description').removeClass('header__item--head-description--changed');

    };
    
  };

  function initSingleHero() {

    $('.single__hero-play button').click(function (event) {
      event.preventDefault();
      $('.single__hero').addClass('single__hero--playing');
      $('.single__hero-iframe iframe').vimeo('play');
      return false;
    });

    $('.single__hero-iframe iframe').on('pause', function() {
      $('.single__hero').removeClass('single__hero--playing');
      $(this).vimeo('seekTo', 0);
    });

    $('.single__hero-iframe iframe').on('finish', function() {
      $('.single__hero').removeClass('single__hero--playing');
    });

  };

  function initSingleContent() {

    $('.single__content-body-more').click(function (event) {
      event.preventDefault();
      $('.single__content').toggleClass('single__content--opened');
      return false;
    });

  };

  function initTestimonials() {

    var $carousel2 = $('.testimonials__slides').flickity({
      contain: false,
      autoPlay: 7500,
      pauseAutoPlayOnHover: false,
      percentPosition: true,
      prevNextButtons: false,
      pageDots: true,
      resize: false, // false if carousel uses per.height
      setGallerySize: false, // false if carousel uses per.height
      wrapAround: true // infinite loop
    });

  };

  init();

});
