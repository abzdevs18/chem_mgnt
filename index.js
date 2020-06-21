let express = require("express");

let fs = require("fs");
  
const sgMail = require('@sendgrid/mail');
sgMail.setApiKey("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");
const msg = {
  to: 'hiyaj39656@tywmp.com',
  from: 'devscare@noreply.com',
  subject: 'Sending with Twilio SendGrid is Fun',
  text: 'and easy to do anywhere, even with Node.js',
  html: '<strong>and easy to do anywhere, even with Node.js</strong>',
};
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



io.on("connection", function (socket) {

  console.log("connected");
  // sgMail.send(msg);
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