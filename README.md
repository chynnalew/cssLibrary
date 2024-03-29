# Useful CSS and JS front end code! 
### By: Chynna Lew

<hr/>

## TABLE OF CONTENTS:
### ANIME.JS:
1. Card flip
  - flash card flip animation
2. Card Slide Up Reveal (WIP)
  - div slides up to reveal image on hover
3. Rotating Blocks
  - blocks rotate and move with play/pause buttons
### BUTTONS:
1. Return to top of page
  - buttons.css 1-14
  - buttons.js 1-13
2. Basic JS accordion
  - buttons/accordion.html
3. Accordion using js class (from w3 schools)
  - buttons/expand-faq.html
### BORDERS:
1. Quote boarder with half circles and quotation marks
  - ./borders/half-circle-border-quote.html
  - directions and example included in the html
2. Border with text using fieldset
  - borders/text-border.html
### Images / SVG:
1. draw SVG path with scroll
  - images-and-svg/svg-animated-with-scroll.html
2. Wave SVG
  - images-and-svg/wave.html
3. Animated SVG triangles 
  - images-and-svg/triangle-animation.html
4. SVG text path animation on scroll
  - images-and-svg/text-scroll-svg.html
### SPACING:
1. bootstrap like margins and padding
  - wp-spacing.css
### TRANSFORM:
#### Static
1. Flip div horizontally 
  - transformations.css 1-7
#### Dynamic
1. Rotate div on scroll (clockwise or counterclockwise) 
  - transformations.js 1-40
  - to add to wordpress: create a hook element in generate press (wp_footer) - place code between script tags
2. Change Background (fade to new background) halfway down div
  - transformations.css 9-29
  - transformations.js 42-54
3. MOVE DIV IN FROM SIDE WITH SCROLL
  - transformations.css 31-41
  - transformations.js 56-67
4. MOVE DIV IN AND ZOOM IN WITH SCROLL
  - transformations.js 69-81
  - transformations.css 43-52
5. WIP MOVE DIV IN FROM SIDE WITH SCROLL - start after div is fully in view
  - transformations.css 43-
  - transformations.js 69-
6. Expanding circle sticky hero
  - (image fades in and expands to cover the screen with scroll)
  - transform/expanding-circle-sticky.html
7. Underline text on hover
  - (underline comes in from left to right, then exits right onblur)
  - transform/underline.html
8. Show images / text on hover 
  - (the images focus and text slides in on hover)
  - transform/li-light-images-on-hover.html
9. Show images on hover
  - (two images animate out from behind the main image on hover)
  - transform/show-3-img-on-hover.html
10. Dropdown Checkboxes 
  - (Console logs results)
  - /transform/dropdownCheckboxes.html
11. Trigger animations
  - trigger animations when element comes into viewport
  - /transform.animationOnViewportEntry.js
### Wordpress Specific:
1. Display different logos for mobile navbar and sticky mobile navbar
  - wordpress/mobile-sticky-nav-logo.html
  - PHP and CSS included in the html file with instructions
<hr/>

## Helpful Scroll Indicators:
### 1. Get scroll position (relative to the entire page):
```
window.scrollY
```
- top of the page: 0
- bottom of the page: some obnoxiously large number

track with the following js code:
```
window.addEventListener("scroll", (event) => {
  let scrollY = this.scrollY;
  console.log("scroll:" + scrollY);
});
```
### 2. Get scroll position relative to your div
```
yourDIV.getBoundingClientRect().top / yourDIV.getBoundingClientRect().height * 100
```
- value = 100 when the top of the div first appears on the screen
- value = 0 when the top of the div hits the top of the viewport
- getBoundingClientRect() can also be followed by .bottom, .right, .left
track with the following js code:
```
const yourDIV = document.querySelector('.yourDiv');
window.addEventListener("scroll", (event) => {
  console.log("top:" + yourDIV.getBoundingClientRect().top / yourDIV.getBoundingClientRect().height * 100 );
});
```

