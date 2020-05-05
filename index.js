let express = require("express");
let moment = require("moment");
let chalk = require("chalk");
let app = express();
let port = 80;

let server = require("http").createServer(app);
let io = require("socket.io")(server);

server.listen(port, function () {
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
