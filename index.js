let express = require("express")();
// let moment = require("moment");
let chalk = require("chalk");
// let app = express();
// const cors = require('cors');
// app.use(cors({
//   origin: 'http://chemlab.cf'
// }));
let port = process.env.PORT || 3000;

let server = require("http").createServer(express);
let io = require("socket.io")(server);

// server.listen(port, function () {
//   console.log(chalk.green("Server running on: " + port));
// });
express.get("/", (req, res) => {
  res.send("Chat Server is running on port " + port);
});
server.listen(port, function() {
  console.log("Chat Server is running on port " + port);
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
