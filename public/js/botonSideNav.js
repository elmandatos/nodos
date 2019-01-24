$(document).ready(function(){
	$(".sidenav.hid").hide();
	$(".sidenav.show").hover(function() {
		if (!$("#sidegrande").hasClass('sidenav fixed')) {
		$(".sidenav.show").hide(300);
		$(".sidenav.hid").show();
			}
	});
	$(".sidenav.hid").mouseleave(function(){
	if (!$("#sidegrande").hasClass('sidenav fixed')) {
		$(".sidenav.show").show(300);
		$(".sidenav.hid").hide(300);
	}
	});

	$("#radioloco").click(function() {
	if (!$("#sidegrande").hasClass('sidenav fixed')) {
		$("#sidegrande").removeClass('sidenav hid');
		$("#sidegrande").addClass('sidenav fixed');
		$("#main").addClass('ajuste');
		$('#radioloco').empty();
		$('#radioloco').html("radio_button_unchecked");
	}
	else {
		$("#sidegrande").removeClass('sidenav fixed');
		$("#sidegrande").addClass('sidenav hid');
		$('.sidenav.hid').hide();
		$("#main").removeClass('ajuste');
		$('#radioloco').empty();
		$('#radioloco').html("radio_button_checked");			
	}

	});
});

