// Mobile Submenu
window.addEventListener('DOMContentLoaded', (event) => {
  var drops = document.querySelectorAll('ul#nv-primary-navigation-sidebar > li.menu-item > ul.sub-menu');
  var carets = document.querySelectorAll('ul#nv-primary-navigation-sidebar > li.menu-item > a > div.caret-wrap');
  var toggle = document.querySelector('.menu-mobile-toggle.item-button.navbar-toggle-wrapper');
  toggle.addEventListener('click', function() {
      for (var i = 0; i < drops.length; i = i + 1) {
          if (!drops[i].classList.contains("dropdown-open") && !carets[i].classList.contains("dropdown-open")) {
              drops[i].classList.toggle('dropdown-open');
              carets[i].classList.toggle('dropdown-open');
          }
      }
  });
});