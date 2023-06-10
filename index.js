function alertDate() {
    var currentDate = new Date();
    alert("Today's date is: " + currentDate.toDateString());
  }
  
  function alertTime() {
    var currentTime = new Date();
    alert("The current time is: " + currentTime.toLocaleTimeString());
  }