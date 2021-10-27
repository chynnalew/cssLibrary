//js for back to top button, css(1) - css(14)
$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop()) {
      $('#backToTop').fadeIn();
    } else {
      $('#backToTop').fadeOut();
    }
  });
  $('#backToTop').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 300);
  });
});