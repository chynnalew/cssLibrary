
gsap.set('.fromLeft', {xPercent:-50, yPercent:-50})

let tl = gsap.timeline({

  scrollTrigger: {
    trigger: "#sec02",
    pin:true,
    start: "center center",
    end: "+=150%",
    scrub: 1,
    markers: true,
  },
  defaults:{duration:1, ease:'none'}
});
tl.from('.fromLeft',{ xPercent:-180})
tl.to('.fromLeft',{width:'100%', height: '100%'}, '+=1')
tl.to({},{duration:1})// an empty tween = a little pause ...