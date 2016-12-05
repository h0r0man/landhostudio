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

      console.log('on settle!'); // good for use when slide is fired

      var flkty = $carousel.data('flickity'); // access properties
    
      if ($(flkty.selectedElement).hasClass('featured__slide--video')) {
        console.log('This slide has video!');
      }
    
    });

  };

  init();

});
