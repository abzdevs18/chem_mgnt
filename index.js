let express = require("express");
// let moment = require("moment");
let chalk = require("chalk");
let app = express();
// const cors = require('cors');
// app.use(cors());

let port = process.env.PORT || 3389;

// let server = app.listen(port);
let http = require("http").createServer(app);
let io = require("socket.io")(http);
// let io = new server();

http.listen(port, function () {
  console.log(chalk.green("Server running on: " + port));
});
// express.get("/", (req, res) => {
//   res.send("Chat Server is running on port " + port);
// });
// server.listen(port, function() {
//   console.log("Chat Server is running on port " + port);
// });

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
