console.log(moment("Sun Mar 28 2020 18:40:54 GMT+0800").fromNow());
$(document).ready(function(){
	$(document).on('click','.ch-checkbox-item', function(){
		$(".ch-selection-item-action").toggleClass("ch-selection-expanded");
		$(".ch-row-second").toggleClass("ch-second-col-expanded");

		let checked = $(this).attr("data-checked");
		if(checked == "true"){
			$(this).attr("data-checked",false);
			$(this).html("");
			// $(".ch-row-second").css("padding-left","15px");
			console.log("Yep");
		}else{
			$(this).attr("data-checked",true);
			$(this).addClass("ch-req-selected"a);
			$(this).html('<i class="fas fa-check"></i>');
			// $(".ch-row-second").css("padding-left","42px");
			console.log('Empty');
		}
		console.log('click');
	});
});