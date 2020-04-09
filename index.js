var express = require("express");
var moment = require("moment");
var app = express();

var server = require("http").createServer(app);
var io = require("socket.io")(server);

server.listen(3000, function() {
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
