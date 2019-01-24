$(document).ready(function(){
	$(".sidenav.hid").hide();
	$(".sidenav.show").hover(function() {
		$(".sidenav.show").hide(300);
		$(".sidenav.hid").show();
	});
	$(".sidenav.hid").mouseleave(function(){
		$(".sidenav.show").show(300);
		$(".sidenav.hid").hide(300);
	});
});

