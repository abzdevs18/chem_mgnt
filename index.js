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


http.listen(port, function () {
  console.log(chalk.green("Server running on: " + port));
});




let sgMail = require('@sendgrid/mail');
sgMail.setApiKey("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");
io.on("connection", function (socket) {

  const msg = {
    to: 'pelox67642@vewku.com',
    from: 'tedsst@example.com',
    subject: 'Sending with Twilio SendGrid is Fun',
    text: 'and easy to do anywhere, even with Node.js',
    html: '<strong>and easy to do anywhere, even with Node.js</strong>',
  };
  sgMail.send(msg);
  // console.log("connected");
  socket.on("message", function (data) {
    // console.log(data);
    io.emit("message", data);
  });
  socket.on("notif", function (data) {
    // console.log(data);
    io.emit("notif", data);
  });
  socket.on("new_login", function (data) {
    io.emit("new_login", data);
    // console.log(data);
  });
  socket.on("userNotification", function(data){
    console.log(data['secure_pass_temp']);
  })
});