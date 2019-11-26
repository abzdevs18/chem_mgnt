	
	<!-- <div id="sound"></div> -->
	<script src="<?=URL_ROOT;?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/main.js"></script>
	<script src="<?=URL_ROOT;?>/js/animsiton.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/animation.js"></script>
	<!-- <script>
        var sock = new WebSocket("ws://192.168.0.28:5001");
        var log = document.getElementById('mCSB_1_container');
        sock.onopen = function(event){
            console.log('Connected');
            setInterval(() => {
                sock.send("HEddllo");
                
            }, 1000);
        };

        // message gets back from the server and display as content of the DIV
        sock.onmessage = function(event){
            // console.log(event);
            log.innerHTML += event.data + "<br/>";
        }
        // message send to the server
        document.querySelector('button').onclick = function(){
            var msg = document.getElementById('msg').value;
            log.innerHTML += "YOU "+ msg;
            sock.send(msg);
        };
     </script> -->
</body>
</html>