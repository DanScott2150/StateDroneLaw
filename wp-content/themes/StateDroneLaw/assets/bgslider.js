var jumbotron = document.querySelector("#frontpage-jumbotron");

var slides = [
  {
    src: '/wp-content/uploads/2018/03/bg01.jpg',
    pos: 'right top'
  },
  {
    src: '/wp-content/uploads/2018/03/bg02.jpg',
    pos: 'left top'
  }
]

var counter = 0;

//Default should be set via CSS, not here
jumbotron.style.backgroundImage = "url('" + slides[counter].src +"')" ;



function changeSlide(){
  console.log(counter);

  jumbotron.style.backgroundImage = "url('" + slides[counter].src +"')";
  jumbotron.style.backgroundPosition = slides[counter].pos;

  counter++;
  if(counter >= slides.length){
    counter = 0;
  }

  // jumbotron.style.backgroundImage = "url('" + slide2 + "')";
}


setInterval(changeSlide, 3000);
