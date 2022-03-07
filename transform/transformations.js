//1. SPIN DIV WITH SCROLL 
/* NOTE: script must be placed at the BOTTOM of the page */

/* to use without adjusting for possible load stuttering:
    update args to match the ids chosen in your html */
console.log('testing!');
const rotateClockwise = document.getElementById('id1');
const rotateCounterClockwise = document.getElementById('id2');
/* add code to watch for scroll */
window.addEventListener("scroll", function() {
  rotateClockwise.style.transform = "rotate("+window.pageYOffset+"deg)";
  rotateCounterClockwise.style.transform = "rotate(-"+window.pageYOffset+"deg)"
});

/* to use adjusted for load stuttering 
    update args to match the ids chosen in your html */
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

var clockwise = document.getElementById("id3"),
counterClockwise = document.getElementById("id4");

window.addEventListener("optimizedScroll", function() {
  clockwise.style.transform = "rotate("+window.pageYOffset+"deg)";
  counterClockwise.style.transform = "rotate(-"+window.pageYOffset+"deg)";
});
