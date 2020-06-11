	</main>
	<div id="action_options" class="m_add_hidden">
	    <a href="/admin/add_user_ad"><i class="far fa-user-shield"></i> Add User</a>
	    <a href="/admin/add_student"><i class="far fa-user-tag"></i> Add Student</a>
	</div>
	<div id="add_record">
	    <p><i class="far fa-plus"></i></p>
	</div>
	<!-- <div id="sound"></div> -->
	<script src="/lib/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="/lib/js/push.min.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/admin_script.js"></script>
	<script src="/js/graph_representation.js"></script>
	<script src="/lib/js/moment.js"></script>
	<script src="/js/script.js"></script>
	<!-- <script src="https://cdn.tiny.cloud/1/hhu3aczt7p034dcjnizjwnns5faj5u4s14e894midesztea0/tinymce/5/tinymce.min.js"></script>  -->
	<script src="//unpkg.com/timeago.js"></script>
	<script>
var notif = new Audio('/media/audio/notif.mp3');
socket.emit("message", "Hello");
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
socket.on("new_login", function(data){
	notif.play();
})
	</script>
	</body>

	</html>