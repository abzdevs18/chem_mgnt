let express = require("express");

let fs = require("fs");

// let moment = require("moment");

let chalk = require("chalk");

let server = express();



let port = process.env.PORT || 3389;



const privateKey = fs.readFileSync('/etc/letsencrypt/live/chemlab.cf/privkey.pem');

const certificate = fs.readFileSync('/etc/letsencrypt/live/chemlab.cf/cert.pem');

const credentials = {

    key: privateKey, 

    cert: certificate

}

// let server = app.listen(port);

let http = require("https").createServer(credentials, server);

let io = require("socket.io")(http);

// let io = new server();

http.get('*', function(req, res) {  
  res.redirect('https://' + req.headers.host + req.url);

  // Or, if you don't want to automatically detect the domain name from the request header, you can hard code it:
  // res.redirect('https://example.com' + req.url);
})


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



  socket.on("new_login", function (data) {

    io.emit("new_login", data);

    console.log(data);

  });

});