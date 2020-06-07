let express = require("express");
// let moment = require("moment");
let chalk = require("chalk");
let server = express();

let port = process.env.PORT || 3389;

// let server = app.listen(port);
let https = require("https").createServer(server, { origins: '*:*'});
let io = require("socket.io")(https);
// let io = new server();

http.listen(port, function () {
  console.log(chalk.green("Server running on: " + port));
});

io.on("connection", function (socket) {
  console.log("connected");

  socket.on("message", function (data) {
    console.log(data);
    io.emit("message", data);
  });

  socket.on("notif", function (data) {
    console.log(data);
    io.emit("notif", data);
  });
});
