var app = require('express')();
var http = require('http').createServer(app);

app.get('/', (req, res) => {
  res.send('<h1>Hello world</h1>');
});

http.listen(3389, () => {
  console.log('listening on *:3000');
});

// io.on("connection", function (socket) {
//   console.log("connected");

//   socket.on("message", function (data) {
//     console.log(data);
//     io.emit("message", data);
//   });

//   socket.on("notif", function (data) {
//     console.log(data);
//     io.emit("notif", data);
//   });
// });
