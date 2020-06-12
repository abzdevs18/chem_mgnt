// console.log(moment("Sun Mar 28 2020 18:40:54 GMT+0800").fromNow());
(function(){
	// Firefox 1.0+
	var isFirefox = typeof InstallTrigger !== 'undefined';
	if(isFirefox){
		$(".ch-selection-item-action").css({
			"top":"0"
		});
	}
}());
$(document).ready(function (e) {
	e.stopPropagation();
	$(document).on('click', '.ch-checkbox-item', function () {
		$(".ch-selection-item-action").toggleClass("ch-selection-expanded");
		$(".ch-row-second").toggleClass("ch-second-col-expanded");

		let checked = $(this).attr("data-checked");
		if (checked == "true") {
			$(this).attr("data-checked", false);
			$(this).html("");
			// $(".ch-row-second").css("padding-left","15px");
			console.log("Yep");
		} else {
			$(this).attr("data-checked", true);
			$(this).addClass("ch-req-selected");
			$(this).html('<i class="fas fa-check"></i>');
			// $(".ch-row-second").css("padding-left","42px");
			console.log('Empty');
		}
		console.log('click');
	});
});

$(".req_logs_").click(function(e) {
	e.stopPropagation();
	let rowId = $(this).attr("data-rowId");
	$(rowId).slideToggle("slow");
	$(".containerCollapse").not(rowId).slideUp("slow");
});

$(".eye").click(function(e){
	e.stopPropagation();
	console.log("COnsole");
});

$('.note-path').click(function () {
	$('.notes_list').show(100);
})

$(".cusDrop").focus(function () {
	let metaName = $(this).attr("data-name");

	$(".wrapper-"+metaName).addClass('smart-drop-wrapper-show');
});
$(".smart-drop-add > input").focus(function () {
	$(".add-term").addClass('smart-drop-wrapper-show');
});

$(document).on('click', '.add-term', function () {
	let metaText = $(this).attr("data-item");
	let index = $('.add-meta-value-'+metaText).val();

	chemMeta('add',metaText, index);
});

let contentId = null;
$(".edit-smart-option").click(function (e) {
	e.stopPropagation();
	$('.temp-remover').removeClass('smart-drop-add');
	$('.hidden-container').hide(50);
	$('.remove-term').hide(50);
	$('.brand-name').show(100);


	contentId = $(this).attr("data-id");
	let itemId = "#content-wrap-" + contentId;

	$(itemId).addClass('smart-drop-add');
	$(itemId + " > .brand-name").hide(50);
	$(itemId + " > .hidden-container").show(100);
	$(itemId + " > .remove-term").show(100);
	$('.hidden-container').focus();

});

$(document).on('focusout','.hidden-container',function(e){
	e.stopPropagation();

	// let contentId = $(this).attr("data-id");
	let itemId = "#content-wrap-" + contentId;

	$(itemId).removeClass('smart-drop-add');
	$(itemId + " > .brand-name").show(100);
	$(itemId + " > .hidden-container").hide(50);
	$(itemId + " > .remove-term").hide(50);
});

$(document).on('click','.options-item', function(e){
	let index = $(this).attr('data-id');
	let textValue = $(this).attr('data-name');

	let metaItem = $(this).attr('data-meta');

	$('.meta-selected-'+metaItem).attr('value',textValue);
	$('.meta-selected-'+metaItem).attr('data-index',index);


});
// $('.form-holder').click(function(e){
// 	e.stopPropagation();
// 	$(".options-wrapper").removeClass('smart-drop-wrapper-show');
// });

$(document).on('click','.remove-term', function(){
	let index = $(this).attr('data-id');
	let metaText = $(this).attr('data-item');
	chemMeta('remove',metaText,index);

	console.log(index +":"+metaText);
	let contentId = '#content-wrap-'+index;

	$(contentId).hide("slow", function(){
		contentId.remove();
	});
});


function chemMeta(action,name, value) {
	$.ajax({
		url: "/admin/chemMeta",
		method: "POST",
		data: {
			action,
			name,
			value
		},
		success: function (data) {
			console.log(data);
		},
		error: function (e) {
			console.log(e);
		}
	});
}

// User adding
$(".add-user-save-btn").click(function(){
	let gender = $("#add-user-gender").val();
	let type = $("#add-user-type").val();
	let uname = $("#add-user-uname").val();
	let email = $("#add-user-email").val();
	let name = $("#add-user-name").val();
	let phone = $("#add-user-phone").val();
	let photo = $("#user-photo").prop('files')[0];

	let fd = new FormData();
	fd.append('gender',gender);
	fd.append('type',type);
	fd.append('uname',uname);
	fd.append('email',email);
	fd.append('name',name);
	fd.append('phone',phone);
	fd.append('photo',photo);

	$.ajax({
		url: "/admin/userAdminAdd",
		method: "POST",
		processData: false, // important
		contentType: false, // important
		data: fd,
		success: function (data) {
			window.location.href ="/admin/add_user_ad";
			// console.log(data);
		},
		error: function (e) {
			console.log(e);
		}
	});
});

// Savving student
$(".student-save").click(function(){
	let name = $("#student-name").val();
	let studId = $("#student-id").val();
	let gender = $("#student-gender").val();
	let department = $("#student-department").attr("data-index");
	let birth = $("#student-birth").val();

	$.ajax({
		url: "/admin/userStudentAdd",
		method: "POST",
		data: {name,studId,gender,department,birth},
		success: function (data) {
			window.location.href ="/admin/add_student";
			// console.log(data);
		},
		error: function (e) {
			console.log(e);
		}
	});

})

	// Multiple images preview in browser
	function read(input) {

		if (input.files && input.files[0]) {

			var reader = new FileReader();
	
			reader.onload = function(e) {
				$('#profContainer').attr(
				  "style",
				  "background-image: url(" +
					e.target.result +
					");margin-bottom:0px;background-position: center;background-size: cover;background-repeat: no-repeat;border: none;box-shadow: var(--box-shadow);width: 50%;border-radius: 50%;margin: 20px auto 0px;"
				);
			}
	
			reader.readAsDataURL(input.files[0]);
		}
	}
  
	$("#user-photo").on("change", function() {
	  $(".new_user_photo_set").show(100);
	  read(this);
	});