// Countup function for front page
// Starts at zero and then quickly counts up to taget value
// Used for: States (50), Current Laws (variable), Pending Laws (variable), Other Laws (variable)
// Variable numbers passed in via PHP to html tag via data- attribute

let count_states = 0;
let trigger = false;
const counter_states = document.querySelector('#countup-states');
let target_states = counter_states.dataset.target;

window.onscroll = function () {
  if (document.documentElement.scrollTop > 100 && trigger === false) {
    trigger = true;
    runAllCounters();
  }
}

function runAllCounters(){
  counter_states.innerHTML = count_states;
  window.setInterval(runCounter_states, 70);
  function runCounter_states(){
    if(count_states < target_states){
      count_states++;
      counter_states.innerHTML = count_states;
    }
  }

  let count_current = 0;
  const counter_current = document.querySelector('#countup-current');
  let target_current = counter_current.dataset.target;

  counter_current.innerHTML = count_current;
  window.setInterval(runCounter_current, 50);
  function runCounter_current() {
    if (count_current < target_current) {
      count_current++;
      counter_current.innerHTML = count_current;
    }
  }

  let count_pending = 0;
  const counter_pending = document.querySelector('#countup-pending');
  let target_pending = counter_pending.dataset.target;

  counter_pending.innerHTML = count_pending;
  window.setInterval(runCounter_pending, 30);
  function runCounter_pending() {
    if (count_pending < target_pending) {
      count_pending++;
      counter_pending.innerHTML = count_pending;
    }
  }

  let count_municipal = 0;
  const counter_municipal = document.querySelector('#countup-municipal');
  let target_municipal = counter_municipal.dataset.target;

  counter_municipal.innerHTML = count_municipal;
  window.setInterval(runCounter_municipal, 40);
  function runCounter_municipal() {
    if (count_municipal < target_municipal) {
      count_municipal++;
      counter_municipal.innerHTML = count_municipal;
    }
  }
}