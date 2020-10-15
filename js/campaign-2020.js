function startImgRotator() {
  // var imgs = document.querySelectorAll('.rotate-wrap img');
  var rotateTL = gsap.timeline({ repeat: -1});

  rotateTL.to('.r-0', {opacity: 0, duration: .75}, 3.25)
  rotateTL.to('.r-1', {opacity: 1, duration: .75}, 3.25)

  rotateTL.to('.r-1', {opacity: 0, duration: .75}, 6.5)
  rotateTL.to('.r-2', {opacity: 1, duration: .75}, 6.5)

  rotateTL.to('.r-2', {opacity: 0, duration: .75}, 9.75)
  rotateTL.to('.r-3', {opacity: 1, duration: .75}, 9.75)

  rotateTL.to('.r-3', {opacity: 0, duration: .75}, 13)
  rotateTL.to('.r-4', {opacity: 1, duration: .75}, 13)

  rotateTL.to('.r-4', {opacity: 0, duration: .75}, 16.25)
  rotateTL.to('.r-5', {opacity: 1, duration: .75}, 16.25)

  rotateTL.to('.r-5', {opacity: 0, duration: .75}, 19.50)
  rotateTL.to('.r-0', {opacity: 1, duration: .75}, 19.50)

}

var bodyClass = document.querySelector('body');

if(bodyClass.classList.contains('page-id-33014')) {
  startImgRotator();
}
