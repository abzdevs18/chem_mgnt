	</main>
	<div id="action_options" class="m_add_hidden">
		<?php if($data['user'][0]->user_type == 1):?>
	    	<a href="/admin/add_user_ad" style="background-color:var(--biohazard-label);"><i class="far fa-user-shield"></i> Add User</a>
	    	<a href="/admin/add_student" class="things-notdone"><i class="far fa-user-tag"></i> Add Student</a>
		<?php elseif($data['config'][5]->config_value == 1 && $data['user'][0]->user_type == 0):?>
	    	<a href="/admin/add_student" class="things-notdone"><i class="far fa-user-tag"></i> Add Student</a>
        <?php endif;?>
	</div>
	<?php if($data['user'][0]->user_type == 1 || $data['config'][5]->config_value == 1):?>
		<div id="add_record" data-intro='To add <em>New user</em> or <em>Student</em> click here.' data-step="4">
			<p><i class="far fa-plus"></i></p>
		</div>
	<?php endif;?>
	<!-- <div id="sound"></div> -->
	<script src="/lib/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="/lib/js/push.min.js"></script>
	<script type="module" src="/js/main.js"></script>
	<script src="/js/admin_script.js"></script>
	<script src="/js/graph_representation.js"></script>
	<script src="/lib/js/moment.js"></script>
	<script type="module" src="/js/script.js"></script>
	<!-- <script src="https://cdn.tiny.cloud/1/hhu3aczt7p034dcjnizjwnns5faj5u4s14e894midesztea0/tinymce/5/tinymce.min.js"></script>  -->
	<script src="//unpkg.com/timeago.js"></script>
	<script>  
		var notif = new Audio('/media/audio/notif.mp3');
		socket.on("new_req",function(data){
    					notif.play();
						demo();
			let id = data['stud_id'];
			$.ajax({
				url: URL_ROOT + "/Admin/newRequest",
				type: "POST",
				data: {
					usr_id:id
				},
				dataType:'json',
				success: function(data) {
					if(data.status == '1'){
						// console.log(data['req_usr_id']['chem']);
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
			console.log(data);
		});
		
	function demo() {
		Push.create("New request received!", {
		    body: "You have a new request from your Users!",
		    icon: URL_ROOT + "/img/logo_icon/lab.ico",
		    link: "/#",
			// timeout: 4000,
			requireInteraction: true,
			onClick: function () {
			console.log("Fired!");
			window.focus();
			this.close();
			},
			vibrate: [200, 100, 200, 100, 200, 100, 200]
		});
	}
	// Start the intro
	let host = "https://192.168.0.11";
	if(window.location.href == host+'/admin'){		  
		introJs().setOption(
			"showStepNumbers", false,"showBullets",false,'doneLabel', 'Next page').start().oncomplete(function() {
          window.location.href = '/admin/profile';
		});
	}else if (window.location.href == host+'/admin/profile') {
		var intro = introJs();
		intro.setOptions({
			showStepNumbers: false,
			doneLabel: "Next page",
			steps: [
			{
				element: '#prof1',
				intro: "Update you <em>profile photo</em>."
			},
			{
				element: '#prof2',
				intro: "Update you <em>personal information</em>.",
				position: 'bottom'
			},
			{
				element: '#prof3',
				intro: "Update you <em>Account password</em>.",
				position: 'bottom'
			},

			]
		});
		intro.start().oncomplete(function() {
			window.location.href = '/admin/request';
		});
      }else if (window.location.href == host+'/admin/request'){
		var req = introJs();
		req.setOptions({
			doneLabel: "Next page",
			steps: [
			{
				intro: "This are the list of the <em>Pending request</em>."
			},
			// {
			// 	element: '#pending1',
			// 	intro: "List categories.",
			// 	position: 'bottom'
			// },
			{
				element: '#pending2',
				intro: "<em>Sort </em> or <em>Search</em> list items.",
				position: 'bottom'
			},
			{
				element: '#filter-job-container',
				intro: "Click to see <em>more details</em> of the request",
				position: 'bottom'
			},
			{
				element: '#pending4',
				intro: "List pagination.",
				position: 'bottom'
			},

			]
		});
		req.start().oncomplete(function() {
			window.location.href = '/admin/chemical';
		});
	  }else if (window.location.href == host+'/admin/chemical'){
		var ch = introJs();
		ch.setOptions({
			doneLabel: "Next page",
			steps: [
			{
				element: '#pending2',
				intro: "Search chemical in the search input field.",
				position: 'bottom'
			},
			{
				element: '#pending3',
				intro: "This the chemical stored in database.",
				position: 'bottom'
			},
			{
				element: '#pending4',
				intro: "List pagination.",
				position: 'bottom'
			},

			]
		});
		ch.start().oncomplete(function() {
			window.location.href = '/admin/logs';
		});
	  }else if (window.location.href == host+'/admin/logs'){
		var ch = introJs();
		ch.setOptions({
			doneLabel: "Next page",
			steps: [
			{
				element: '#pending2',
				intro: "Search chemical in the search input field.",
				position: 'bottom'
			},
			{
				element: '#pending3',
				intro: "This are just system logs about system activities.",
				position: 'bottom'
			},
			{
				element: '#pending4',
				intro: "Your humble pagination!.",
				position: 'bottom'
			}

			]
		});
		ch.start().oncomplete(function() {
			window.location.href = '/admin/request';
		});
	  }

socket.emit("message", "Hello");
socket.emit("new_login", "Someone login as admin");
socket.on("notif", function(data) {
    $("#notif-counter").text(data);
    notif.play();
    $.ajax({
        url: "/admin/notification",
        success: function(data) {
            $(".notif-holder > div > div:first-child").append(data);
            console.log(data);
        },
        error: function(err) {
            console.log(err);
        }
    });
    let date = moment.utc().format();
   	console.log(date + "=>" + moment(date).fromNow());
   	console.log(timeago().format('2016-06-12', 'en_US'));
});
// socket.on("new_login", function(data){
// 	notif.play();
// })
	</script>
	</body>

	</html>