
// Set the date we're counting down
//var countDownDate = new Date(document.getElementById("Date"));
var countDownDate = new Date("30 Mar 2023 GMT+8")
var targetDate = countDownDate.getTime();

// Update the count down every 1 second
var x = setInterval(function(){

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = targetDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    if (days > 0){ hours = hours + (days * 24); }
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    var countDownText = pad(hours) + "h " + pad(minutes) + "m " + pad(seconds) + "s";
    var countdownTimer = document.getElementsByClassName("tournament-Countdown")[0];
    countdownTimer.innerHTML = countDownText;

  }, 1000);
  
  function pad(n) {
    return n < 10 ? "0" + n : n;
  }