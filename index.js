var express = require("express")();
var moment = require("moment");
// var app = express();
// var allowedOrigins = "http://193.161.193.99:42733";
var server = require("http").createServer(express);
var io = require("socket.io")(server);
// io.set('origins', '*:*');
// app.use(express.static(__dirname + "public"));

// app.get("/", function(req, res, next) {
//   res.sendFile(__dirname + "/index.html");
// });
// express.get("/", (req, res) => {
//   res.send("Chat Server is running on porst 3001");
// });
server.listen(2999, function() {
  console.log("j");
});

io.on("connection", function(socket) {
  console.log("connected");

  socket.on("message", function(data) {
    console.log(data);
    io.emit("message", data);
  });

  socket.on("notif", function(data) {
    console.log(data);
    io.emit("notif", data);
  });
});
