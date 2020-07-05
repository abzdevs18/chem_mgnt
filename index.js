require('dotenv').config();

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

// let http = require("https").createServer(server);
let http = require("https").createServer(credentials,server);
let io = require("socket.io")(http);

// let io = new server();


http.listen(port, function () {
  console.log(chalk.green("Server running on: " + port));
});

    // console.log(data);
    let sgMail = require('@sendgrid/mail');
    sgMail.setApiKey(process.env.SENDGRID_API_KEY);
    
    const msg = {
      to: 'abz.devs@gmail.com',
      from: 'ChemlabMgnt@noredply.com',
      subject: 'Chemlab Mgnt. System account confirmation',
      text: 'Chemlab Mgnt. System account confirmation',
      html: 'Chemlab Mgnt. System account confirmation',
    };
    // sgMail.send(msg);
// console.log(process.env.SENDGRID_API_KEY)

io.on("connection", function (socket) {
  // console.log("connected");
  socket.on("message", function (data) {
    // console.log(data);
    // sgMail.setApiKey(process.env.SENDGRID_API_KEY);
    io.emit("message", data);
  });
  socket.on("notif", function (data) {;
    io.emit("notif", data);
  });
  socket.on("new_login", function (data) {
    io.emit("new_login", data);
    // console.log(data);
  });
  socket.on("req_approve", function (data) {
    io.emit("req_approve", data);
    // console.log(data);
  });
  socket.on("new_req", function (data) {
    io.emit("new_req", data);
    // console.log(data);
  });
  socket.on("userNotification", function(data){
    console.log(data);

  });
});