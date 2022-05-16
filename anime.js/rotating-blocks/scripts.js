const playPause = anime({
  targets: 'div.box',
  translateY: [
    { value: 200, duration: 500 },
    {value: 0, duration: 800}
  ],
  rotate: {
    value: '1turn',
    easing: 'easeInOutSine'
  },
  delay: function(element, iteration, length) {
    return iteration * 1000
  },
  autoplay: false
})

document.querySelector('.play').onclick = playPause.play;
document.querySelector('.pause').onclick =playPause.pause;