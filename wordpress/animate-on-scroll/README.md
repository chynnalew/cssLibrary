to use animate.css
- use class .animate__animated and .animate__yourAnimation
- view all animations/ documentation here: https://animate.style/
- add additional features(speed, delay, etc) with Utility Classes (starts 1/4 way down documentation)

to use WOW (delay animation till scroll)
- use class .wow and class .animate__yourAnimation
- animation list here: https://animate.style/

be sure to add the following to your theme css to prevent load stuttering:
.wow {
  visibility: hidden !important;
}
