let express = require("express");
let moment = require("moment");
let chalk = require("chalk");
let app = express();
const cors = require('cors');
// app.use(cors({
//   origin: 'http://chemlab.cf'
// }));
let port = 3000;

let server = require("http").createServer(app);
let io = require("socket.io")(server);
io.origins((origin, callback) => {
  if (origin !== 'http://chemlab.cf:3000') {
    return callback('origin not allowed', false);
  }
  callback(null, true);
});

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
