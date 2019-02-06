
var count = 0;
var target = 100;

var counter = document.querySelector('.countup');

console.log(counter);

counter.innerHTML = count;

window.setInterval(runCounter, 100);

function runCounter(){

  if(count < target){
    count++;
    counter.innerHTML = count;
  }

}
