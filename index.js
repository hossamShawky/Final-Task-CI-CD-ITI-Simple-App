var dateBtn = document.getElementById("dateBtn");
var timeBtn = document.getElementById("timeBtn");
var display = document.getElementById("display");

dateBtn.addEventListener("click", function() {
  var currentDate = new Date();
  display.innerHTML = "Today's date is: " + currentDate.toDateString();
});

timeBtn.addEventListener("click", function() {
  var currentTime = new Date();
  display.innerHTML = "The current time is: " + currentTime.toLocaleTimeString();
});