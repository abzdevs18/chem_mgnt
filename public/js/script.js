var server = require("ws").Server;
var s = new server({
  port: 5001
});

s.on("connection", function(ws) {
  ws.on("message", function(message) {
    console.log("FRONT: " + message);
    ws.send("FROM the SERVER: " + message);
    s.clients.forEach(function e(client) {
      if (client != ws) client.send(message);
    });
  });

  ws.on("close", function() {
    console.log("Lost client");
  });
  console.log("Client is Connected");
});

// Time of logs

function setDate(date) {
  // Set the date we're counting down to
  var countDownDate = new Date(date).getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {
    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate + now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(
      (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    // + minutes + "m " + seconds + "s ";
    document.getElementById("days_counter").innerHTML = days;
    document.getElementById("hour_counter").innerHTML = hours;
    document.getElementById("min_counter").innerHTML = minutes;
    document.getElementById("seconds_counter").innerHTML = seconds;
    // If the count down is over, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
  }, 1000);
}
