$(document).ready(function() {

  $(window).scroll(function() {

    if ($(window).scrollTop() > 500) {
      $('#btn-up').fadeIn(500);
    }
    if ($(window).scrollTop() < 500) {
      $('#btn-up').fadeOut(500);
    }
  });
});

$("#btn-up").click(function () {
    
    $("html, body").animate({scrollTop: 0}, 1000);
    });