	</main>	
	<div id="action_options" class="m_add_hidden">
		<a href="<?=URL_ROOT;?>/admin/add_user_ad"><i class="far fa-user-shield"></i> Add User</a>
		<a href="<?=URL_ROOT;?>/admin/add_student"><i class="far fa-user-tag"></i> Add Student</a>
	</div>
	<div id="add_record">
		<p><i class="far fa-plus"></i></p>
	</div>
	<!-- <div id="sound"></div> -->
	<script src="<?=URL_ROOT;?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/push.min.js"></script>
	<script src="<?=URL_ROOT;?>/js/main.js"></script>
	<script src="<?=URL_ROOT;?>/js/admin_script.js"></script>
	<script src="<?=URL_ROOT;?>/js/graph_representation.js"></script>
    <!-- socket -->
	<script src="<?=URL_ROOT;?>/js/socket.js"></script>
	<!-- <script src="https://cdn.tiny.cloud/1/hhu3aczt7p034dcjnizjwnns5faj5u4s14e894midesztea0/tinymce/5/tinymce.min.js"></script>  -->

    <!-- <script>
        var sock = new WebSocket("ws://192.168.0.28:5001");
        var log = document.getElementById('log');
        sock.onopen = function(event){
            console.log('Connected');
            setInterval(() => {
                sock.send("HEddllo");
                
            }, 1000);
        };

        // message gets back from the server and display as content of the DIV
        sock.onmessage = function(event){
            // console.log(event);
            log.innerHTML += event.data;
        }
        // message send to the server
        document.querySelector('button').onclick = function(){
            var msg = document.getElementById('msg').value;
            log.innerHTML += "YOU "+ msg + "<br />";
            sock.send(msg);
        };
     </script> -->
</body>
</html>