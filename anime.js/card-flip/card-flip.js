const card = document.querySelector('.card');
let flip = false;

card.addEventListener('click', function () {
  if (flip) {
    return;
  }
  flip = true;
  anime({
    targets: card,
    scale: [{ value: 1 }, { value: 1.4 }, { value: 1, delay: 250 }],
    rotateY: { value: '+=180', delay: 200 },
    easing: 'easeInOutSine',
    duration: 400,
    complete: function () {
      flip = false
    }
  })
})