let express = require("express");
let fs = require("fs");
// let moment = require("moment");
let chalk = require("chalk");
let server = express();

let port = process.env.PORT || 3389;

const privateKey = fs.readFileSync(process.env.PRIVATE_KEY, 'utf8')
const certificate = fs.readFileSync(process.env.CERTIFICATE, 'utf8')
const credentials = {
    key: privateKey, 
    cert: certificate, 
    passphrase: process.env.PASSPHRASE
}
// let server = app.listen(port);
let http = require("https").createServer(credentials, server);
let io = require("socket.io")(http);
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
