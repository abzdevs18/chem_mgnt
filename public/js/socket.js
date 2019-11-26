var URL = "";

var sock = new WebSocket("wss://chemlab.cf/js/socket.js:5001");
// var log = document.getElementById("log");
sock.onopen = function(event) {
  //   console.log("Connected");
  setInterval(() => {
    sock.send("HEddllo");
  }, 1000);
};

// message gets back from the server and display as content of the DIV
sock.onmessage = function(event) {
  // console.log(event);
  //   log.innerHTML += event.data;
};
// message send to the server
// $(document).on('click','.login-admin',function(){
// 	$.ajax({
// 		url: URL_ROOT + '/admin/add',
// 		type: 'POST',
// 		data: $.param(data),
// 		success: function(e){
// 			console.log(e);
// 		},
// 		error: function(_e){
// 			console.log('l');
// 		}

// 	});
// });
// document.querySelector("button").onclick = function() {
//   var msg = document.getElementById("msg").value;
//   log.innerHTML += "YOU " + msg + "<br />";
//   sock.send(msg);
// };
