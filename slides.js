$(document).ready(function(){
    $('.your-class').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
      /*dots: true,*/
      infinite: true,
      speed: 2000,
      fade: true,
      cssEase: 'linear',
      prevArrow: '#b',
      nextArrow: '#b1',
    });
   });