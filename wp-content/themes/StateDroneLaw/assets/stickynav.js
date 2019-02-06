var navBar = document.querySelector("#navScrollWrapper");

window.addEventListener('scroll', function(e){

  if(this.scrollY >= 50){
    navBar.classList.add('navShrink');
  } else {
    navBar.classList.remove('navShrink');
  }
})
