$(document).ready(function () {
	$(".sign_in").click(function () {
		$(".login").addClass("active");
		$(".welcome").addClass("active");
		$(".sign_in").addClass("active");
		$(".btn").addClass("active");
		$(".sign_up").addClass("active");
	});
	$(".btn").click(function () {
		$(".sign_up").removeClass("active");
		$(".login").removeClass("active");
		$(".welcome").removeClass("active");
		$(".sign_up").removeClass("active");
		$(".btn").removeClass("active");
		$(".sign_in").removeClass("active");
	});
});
