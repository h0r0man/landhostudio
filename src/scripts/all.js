//=include ../../src/scripts/modernizr.js
//=include ../../bower_components/jquery/dist/jquery.js
//=include ../../bower_components/flickity/dist/flickity.pkgd.js
//=include ../../bower_components/isotope/dist/isotope.pkgd.js
//=include ../../bower_components/vimeo-jquery-api/dist/jquery.vimeo.api.js
//=include ../../bower_components/fastclick/lib/fastclick.js
//=include ../../bower_components/viewport-units-buggyfill/viewport-units-buggyfill.js

$(function() {

  'use strict';

  var init = function() {
    initHeader();
    initFeatured();
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

  init();

});
