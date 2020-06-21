import { log, showAlertFloat, filterDropDown } from './modules.js';
(function(){
	// Firefox 1.0+
	var isFirefox = typeof InstallTrigger !== 'undefined';
	if(isFirefox){
		$(".ch-selection-item-action").css({
			"top":"0"
		});
	}
}());
$(".content").mCustomScrollbar({
  autoHideScrollbar: true
});
$(document).ready(function() {
	$(document).on('click', '.ch-selection-item-action', function(e) {
		e.stopPropagation();
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

$(".trash").click(function(e){
	e.stopPropagation();
	$("#cc-modal").show(50);
	$(".modal-notification").css({
		"margin-top":"100px",
	});
});

$(document).on('click','.notif-cc-close', function(){
	$("#cc-modal").hide(50);
	$(".modal-notification").css({
		"margin-top":"-100%",
	});
});

$('.note-path').click(function () {
	$('.notes_list').show(100);
})

$(document).on("click",".cusDrop",function(){	
	let field = $(this).attr("data-name");
	let metaName = $(this).attr("data-name");

	$(".wrapper-"+metaName).addClass('smart-drop-wrapper-show');
	$(".wrapper-"+field).slideDown();
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
$(document).on("click", ".edit-smart-option", function(e){	
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
	e.stopPropagation();
	// $(".options-wrapper").removeClass("smart-drop-wrapper-show")
	$(".meta-selected-category").attr("data-filled","true");
	let index = $(this).attr('data-id');
	let textValue = $(this).attr('data-name');

	let metaItem = $(this).attr('data-meta');

	$('.meta-selected-'+metaItem).attr('value',textValue);
	$('.meta-selected-'+metaItem).attr('data-index',index);
	$(".wrapper-"+metaItem).slideUp();
});
// $(document).on("click","html", function(e){
// 	e.stopPropagation();
// 	$(".options-wrapper").hide(100);
// });
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
			$.ajax({
				url:"/admin/ajaxAddCat",
				method: "POST",
				dataType: "json",
				success: function(data){
					let res="";
					for(let i = 0; i < data.length; i++){
						res += `<div class="options-item temp-remover" id="content-wrap-`+data[i]["id"]+`" data-meta="category" data-id="`+data[i]["id"]+`" data-name="`+data[i]["name"]+`">                                        
						<input type="text" name="" class="hidden-container" data-id="`+data[i]["id"]+`" value="`+data[i]["name"]+`" style="display:none;"/>
						<span class="smart-drop-add-btn remove-term" data-item="category" data-id="`+data[i]["id"]+`">Delete</span>
						<span class="brand-name" value="`+data[i]["id"]+`">`+data[i]["name"]+`  <i class="fas fa-pencil-alt edit-smart-option" data-id="`+data[i]["id"]+`"></i></span>
					</div>`;
					}
					$(".cc-ajax-wrap #mCSB_8_container").html(res);    
					(function($){
						// $(window).on("load",function(){
							$(".cc-ajax-wrap").mCustomScrollbar({								
								autoHideScrollbar: true,
								setTop: "-100%"
							});
						// });
					})(jQuery);
				}
			});
		},
		error: function (e) {
			console.log(e);
		}
	});
}

// User adding
$(".add-user-save-btn").click(function(){
	let context = $(this);
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
		beforeSend: function(){
			$(context).css({"color":"#00cc67 !important"});
		  $("#save-form").show(100);
		},
		success: function (data) {
			setTimeout(function(){
				//   window.location.href ="/admin/form"
				showAlertFloat("","Wrong");
				$(context).css({"color":"#fff !important"});
				$("#save-form").hide(100);
			}, 3000);
				log(1,"Add User",1)
			// window.location.href ="/admin/add_user_ad";
			// console.log(data);
		},
		error: function (e) {
			console.log(e);
		}
	});
});
$(".deleteUser").click(function(e){
	e.preventDefault();
	let context = $(this);
	let reason = $(".meta-selected-deleteUser").val();
	let user = $(".selected-user").val();
	let desc = $(".deleteDesc").text();

	$.ajax({
		url: "/admin/delUser",
		method: "POST",
		data: {
			reason:reason,
			desc:desc,
			user:user
		},
		beforeSend: function(){
			$(context).css({"color":"#d9534f !important"});
		  $("#save-form").show(100);
		},
		success: function (data) {
			setTimeout(function(){
				showAlertFloat("","User DELETED!"+data);
				$(context).css({"color":"#fff !important"});
				$("#save-form").hide(100);
			}, 3000);
			log(1,"Delted User", 1);
			console.log(data);
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
$(document).on("click","#add-note-modal", function(){
	let state = $(this).attr("data-click");
	if(state == "false"){
		$(".x-note-container").css({
			"left":"calc( -100% - 10px )",
			"box-shadow":"var(--box-shadow)"
		});
		$(".note-path").css({
			"left":"calc( -107% - 3px )",
			"display":"inline-block"
		});
		$("#icon-holder .caret-right").hide(50);
		$("#icon-holder .caret-left").show(100);
		$(this).attr("data-click","true");
		$(".cc-main-form").css({"z-index":"-2"});
	}else{
		$(".x-note-container").css({
			"left":"0",
			"box-shadow":"unset"
		});
		$(".note-path").css({
			"left":"-20px",
			"display":"none"
		});
		$("#icon-holder .caret-left").hide(50);
		$("#icon-holder .caret-right").show(100);
		$(this).attr("data-click","false");
		$(".cc-main-form").css({"z-index":"1"});
	}
});
let currentPage = window.location.pathname;
if(currentPage == '/admin/student'){
	filterDropDown("student-filter-table","3","student-filter-id","student-search-filter");
}else if(currentPage == '/admin/logs'){
	filterDropDown("log-filter-table","4","event-filter-id","event-search-filter");
}else if(currentPage == '/admin/chemical'){
	filterDropDown("chemical-filter-table","8","brand-filter-table","input-search-filter");
}
paginator({
    table: document.getElementsByClassName("cc_tbl_pagination")[0].getElementsByTagName("table")[0],
    box: document.getElementsByClassName("index_native")[0],
	active_class: "color_page",
	rows_per_page: document.getElementsByClassName("index_native")[0].getAttribute("data-rows")	
});