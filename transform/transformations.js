//1. SPIN DIV WITH SCROLL 
/* NOTE: script must be placed at the BOTTOM of the page  */

/* to use without adjusting for possible load stuttering:
    update args to match the ids or classes chosen in your html (for classes, each class must be unique) */
console.log('testing!');
const rotateClockwise = document.querySelector('#rotateClockwise');
const rotateCounterClockwise = document.querySelector('#rotateCounterClockwise');
/* add code to watch for scroll */
window.addEventListener("scroll", function() {
  rotateClockwise.style.transform = "rotate("+window.pageYOffset+"deg)";
  rotateCounterClockwise.style.transform = "rotate(-"+window.pageYOffset+"deg)"
});

/* to use adjusted for load stuttering 
    update args to match the ids or classes chosen in your html */
;(function() {
  var throttle = function(type, name, obj) {
      var obj = obj || window;
      var running = false;
      var func = function() {
          if (running) { return; }
          running = true;
          requestAnimationFrame(function() {
              obj.dispatchEvent(new CustomEvent(name));
              running = false;
          });
      };
      obj.addEventListener(type, func);
  };
  throttle ("scroll", "optimizedScroll");
})();

var clockwise = document.querySelector("#clockwise"),
counterClockwise = document.querySelector("#counterClockwise");

window.addEventListener("optimizedScroll", function() {
  clockwise.style.transform = "rotate("+window.pageYOffset+"deg)";
  counterClockwise.style.transform = "rotate(-"+window.pageYOffset+"deg)";
});
