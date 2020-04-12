console.log(moment("Sun Mar 28 2020 18:40:54 GMT+0800").fromNow());
$(document).ready(function () {
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

$(".req_logs_").click(function () {
	let rowId = $(this).attr("data-rowId");
	$(".collapse").css("display", "none");
	$(rowId).slideToggle("slow");
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
	console.log(value);
}
