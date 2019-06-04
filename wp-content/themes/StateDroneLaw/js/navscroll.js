// Sticky Nav: Resizes based on user scroll & mouse hover

// Select the navbar
const headerElement = document.querySelector('#masthead nav');

// nav_shrink class makes the height smaller and background slightly more opaque
window.onscroll = function () {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    headerElement.classList.add('nav_shrink');
  } else {
    headerElement.classList.remove('nav_shrink');
  }
}