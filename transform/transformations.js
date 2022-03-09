// SPIN DIV WITH SCROLL 
/* NOTE: script must be placed at the BOTTOM of the page  */

/* to use without adjusting for possible load stuttering:
    update args to match the ids or classes chosen in your html (for classes, each class must be unique) */

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

// CHANGE BACKGROUND when halfway down div
  //define div background to change
const changeBackgroundWithScroll = document.querySelector('.change-bg-image-container');
  //create a const for each background image (also add classes to empty divs in html, add bg images to each class in css)
const changeBGimage1 = document.querySelector('.changeBGimage1');
const changeBGimage2 = document.querySelector('.changeBGimage2');

window.addEventListener('scroll', (event) => {
  const { top } = changeBackgroundWithScroll.getBoundingClientRect();
  const bgScrollImageInView = (top - window.innerHeight) < (0-window.innerHeight/2);
  changeBGimage1.style.opacity = +!bgScrollImageInView;
  changeBGimage2.style.opacity = +bgScrollImageInView;
});

// MOVE DIV IN FROM SIDE WITH SCROLL
const moveInRight = document.querySelector('.move-in-with-scroll-inner-1');
const moveInLeft = document.querySelector('.move-in-with-scroll-inner-2');

window.addEventListener("scroll", function () {
  let moveInWithScrollRightDivVisible = moveInRight.getBoundingClientRect().top / moveInRight.getBoundingClientRect().height * 100 ;
  let moveInWithScrollLeftDivVisible = moveInLeft.getBoundingClientRect().top / moveInRight.getBoundingClientRect().height * 100 ;
  // add number (int as if percentage) to the end of the above variables to change when the div moves in
  moveInRight.style.transform = "translate(" + moveInWithScrollRightDivVisible + "vw)";
  moveInLeft.style.transform = "translate(-" + moveInWithScrollLeftDivVisible + "vw)";
  console.log('top: '+ moveInWithScrollDivVisible)
}
);