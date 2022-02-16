$(window).on('beforeunload', function(){
	$(window).scrollTop(0);
});

function formatNumber(num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

$(document).ready(function() {
	$('.slide-smaller .owl-carousel').owlCarousel({
		loop:true,
		items:1,
		autoplay:true,
		autoplayTimeout:3000,
		animateOut: 'fadeOut',
	});

	$('.free-lession-video .owl-carousel').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:3000,
		dots: false,
		margin:20,
		autoplayHoverPause:true,
		nav: false,
		responsive:{
			0:{
				items:2
			},
			600:{
				items:3
			},
			1000:{
				items:3
			}
		}
	});

	$('.offline-event-bottom-list .owl-carousel').owlCarousel({
		loop:false,
		dots: false,
		margin:20,
		mouseDrag: false,
		responsive:{
			0:{
				items:2
			},
			600:{
				items:3
			},
			1000:{
				items:4
			}
		}
	});

	$('.offline-event-content-mb .owl-carousel').owlCarousel({
		loop:true,
		dots: false,
		mouseDrag: false,
		autoplay:true,
		autoplayTimeout:6000,
		items:1
	});

	$(".offline-event-description .owl-carousel").owlCarousel({
		loop:true,
		dots: true,
		autoplay:true,
		autoplayTimeout:6000,
		items:1
	});

	var shineTl = new TimelineMax();
	var shineT2 = new TimelineMax();
	var shineT3 = new TimelineMax();
	var shineT4 = new TimelineMax({repeat: -1, repeatDelay: 1});
	shineTl.to("#shine", 25, {rotation: "+=360", transformOrigin:"50% 50%", repeat: -1, ease:Linear.easeNone});
	shineT3.set("#shine2", {rotation: 10, transformOrigin:"50% 50%"});
	shineT3.to("#shine2", 25, {rotation: "+=360", transformOrigin:"50% 50%", repeat: -1, ease:Linear.easeNone});
	shineT2.set(".shiny", {opacity: 1});

	shineT2.to(".shiny", 2, {
		x:'+=250', repeat: -1, repeatDelay: 1, opacity: 1, ease: "slow(0.7, 0.7, false)"
	});
	shineT4.to("#rank, #rank-background", 3, {scale: 1.1, transformOrigin: "50% 50%"});
	shineT4.to("#rank, #rank-background", 3, {scale: 1, transformOrigin: "50% 50%"});

	var startRank = $(".begin-point span").html();

	startRank = parseInt(startRank.replace(".", ""));

	var endRank = $(".end-point span").html();

	endRank = parseInt(endRank.replace(".", ""));

	var totalPoint = endRank - startRank;

	var nowPoint = $(".info-user-point span").html();

	nowPoint = parseInt(nowPoint.replace(".", ""));

	var maxPoint;

	if(nowPoint >= endRank) {
		maxPoint = endRank;
	} else {
		maxPoint = nowPoint;
	}

	var lessPoint = endRank - maxPoint;

	var barLength = $(".point-line").width();

	var flagLocation = ((maxPoint - startRank) * 100 / totalPoint) * barLength / 100;

	$(".flag-point span").html(formatNumber(nowPoint));

	// $(".info-user-point span").html(formatNumber(nowPoint));

	var tempPoint = 0;

	var inc = Math.floor(lessPoint/200);

	var m = setInterval(function(){
		if(tempPoint >= lessPoint) {
			clearInterval(m);
			$(".point-to-grow-up").html(formatNumber(lessPoint));
		} else {
			tempPoint += inc;
			$(".point-to-grow-up").html(formatNumber(tempPoint));
		}
	}, 1);

	if(inc == 0) {
		$(".info-user-to-grow-up").html("Bạn đã đạt tới thứ hạng tối đa!");
	}

	$(".point-flag").animate({
		marginLeft: flagLocation + "px"
	}, 1000);
});

window.addEventListener("scroll", function(){
	var h = $(".slide-smaller > div").outerHeight() + 60;
	if(window.innerWidth > 1240) {
		if(this.scrollY >= 65) {
			var w = $(".academy-flex-item").eq(3).width();
			$(".slide-smaller .owl-carousel").css({position: "fixed", width: w, marginTop: -65});
			$(".top-ranking").css({position: "fixed", width: w, top: h});
		} else {
			$(".slide-smaller .owl-carousel").css({position: "unset", marginTop: 0});
			$(".top-ranking").css({position: "unset"});
		}
	} else if(window.innerWidth <= 1240 && window.innerWidth > 768) {
		if(this.scrollY >= 265) {
			var w = $(".academy-flex-item").eq(3).width();
			$(".top-ranking").css({position: "fixed", width: w, top: 15});
		} else {
			$(".slide-smaller .owl-carousel").css({position: "unset", marginTop: 0});
			$(".top-ranking").css({position: "unset"});
		}
	}
});

$(function() {
	$(".nth-ranking").css("display", "none");
	$(".question-box").css("display", "none");
	$(".fb-comments-area").css("display", "none");
	for(var m = 2; m < $(".row-nth-ranking").length; m++) {
		$(".row-nth-ranking").eq(m).children().eq(2).children('img').css("filter", "brightness(0.5)");
		$(".row-nth-ranking").eq(m).children().eq(3).children('img').css("filter", "brightness(0.5)");
	}
});

function showQL() {
	if(window.innerWidth > 1150) {
		$("html").animate({ scrollTop: "720" }, 1000);
	} else if(window.innerWidth <= 1150 && window.innerWidth > 768) {
		$("html").animate({ scrollTop: "700" }, 1000);
	} else if(window.innerWidth <= 768 && window.innerWidth > 414) {
		$("html").animate({ scrollTop: "778" }, 1000);
	} else if(window.innerWidth <= 414 && window.innerWidth > 375) {
		$("html").animate({ scrollTop: "1015" }, 1000);
	} else {
		$("html").animate({ scrollTop: "975" }, 1000);
	}

	$(".ql-ranking").css("display", "block");
	$(".free-100-lession").css("display", "block");
	$(".offline-event-box").css("display", "block");
	$(".campaign-box").css("display", "block");

	$(".nth-ranking").css("display", "none");
	$(".question-box").css("display", "none");
	$(".fb-comments-area").css("display", "none");

	$(".btn-nth").css("filter", "brightness(0.5)");
	$(".btn-ql").css("filter", "brightness(1)");
}

function showNTH() {
	if(window.innerWidth > 1150) {
		$("html").animate({ scrollTop: "740" }, 1000);
	} else if(window.innerWidth <= 1150 && window.innerWidth > 768) {
		$("html").animate({ scrollTop: "700" }, 1000);
	} else if(window.innerWidth <= 768 && window.innerWidth > 414) {
		$("html").animate({ scrollTop: "778" }, 1000);
	} else if(window.innerWidth <= 414 && window.innerWidth > 375) {
		$("html").animate({ scrollTop: "1020" }, 1000);
	} else {
		$("html").animate({ scrollTop: "980" }, 1000);
	}

	$(".ql-ranking").css("display", "none");
	$(".free-100-lession").css("display", "none");
	$(".offline-event-box").css("display", "none");
	$(".campaign-box").css("display", "none");

	$(".nth-ranking").css("display", "block");
	$(".question-box").css("display", "block");
	$(".fb-comments-area").css("display", "block");

	$(".btn-nth").css("filter", "brightness(1)");
	$(".btn-ql").css("filter", "brightness(0.5)");

	var rankIndex = $(".rank-item.active").prevAll().length;

	$(".nth-ranking .tabs a").eq(rankIndex).click();
}

var arrLessionFinish = {};

function addTick(obj) {
	var tick = document.createElement("img");
	tick.src = window.location.origin + "/images/academy/v-icon.png";
	tick.style.width = "20px";
	tick.style.float = "right";
	tick.style.marginRight = "5px";
	obj.parentElement.parentElement.children[0].prepend(tick);
}

function showVideo(obj, video) {
	var index = obj.parentElement.parentElement.getAttribute("data-less");
	if(typeof arrLessionFinish[index] == "undefined"){
		arrLessionFinish[index] = {"video": true};
	} else if(typeof arrLessionFinish[index] != "undefined" && typeof arrLessionFinish[index]["video"] == "undefined"){
		arrLessionFinish[index]["video"] = true;
		if(typeof arrLessionFinish[index]["pdf"] != "undefined" && typeof arrLessionFinish[index]["ppt"] != "undefined") {
			addTick(obj);
		}
	}
	if(video.length > 0) {
		window.open(video);
	} else {
		alert("Video sắp tới sẽ được cập nhật, xin vui lòng quay lại sau bạn nhé!");
	}
}

function downloadPDF(obj, pdf) {
	if(pdf.length == 0) {
		alert('Tài liệu này đang được cập nhật, xin vui lòng trở lại sau!');
		return;
	}
	var index = obj.parentElement.parentElement.getAttribute("data-less");
	if(typeof arrLessionFinish[index] == "undefined"){
		arrLessionFinish[index] = {"pdf": true};
	} else if(typeof arrLessionFinish[index] != "undefined" && typeof arrLessionFinish[index]["pdf"] == "undefined"){
		arrLessionFinish[index]["pdf"] = true;
		if(typeof arrLessionFinish[index]["ppt"] != "undefined" && typeof arrLessionFinish[index]["video"] != "undefined") {
			addTick(obj);
		}
	}
	window.open(pdf);
}

function downloadPPT(obj, ppt) {
	if(ppt.length == 0) {
		alert('Tài liệu này đang được cập nhật, xin vui lòng trở lại sau!');
		return;
	}
	var index = obj.parentElement.parentElement.getAttribute("data-less");
	if(typeof arrLessionFinish[index] == "undefined"){
		arrLessionFinish[index] = {"ppt": true};
	} else if(typeof arrLessionFinish[index] != "undefined" && typeof arrLessionFinish[index]["ppt"] == "undefined"){
		arrLessionFinish[index]["ppt"] = true;
		if(typeof arrLessionFinish[index]["pdf"] != "undefined" && typeof arrLessionFinish[index]["video"] != "undefined") {
			addTick(obj);
		}
	}
	window.open(ppt);
}

function showVideoModal(link) {
	$(".modal-video-content iframe").attr("src", link);
	$("#modal-video-box").css("display", "block");
	$(".newpub-container").css("filter", "brightness(0.5)");
}

$(window).click(function(event) {
	if (event.target == document.getElementById("modal-video-box")) {
		$("#modal-video-box").css("display", "none");
		$(".newpub-container").css("filter", "brightness(1)");
		$(".modal-video-content iframe").attr("src", "");
	}
});

$(function() {
	$(".btn-nth").css("filter", "brightness(0.5)");
	$(".tbl-lession").css("display", "none");
	$(".qa-group").css("display", "none");

	for(var t = 0; t < $(".row-ql-ranking").eq(0).children('td').length; t++){
		if($(".row-ql-ranking").eq(0).children('td').eq(t).html() == $(".rank-item.active").children('.rank-name').children('span').html()) {
			$(".row-ql-ranking td:nth-child("+(parseInt(t) + 1)+")").css({
				backgroundColor: "rgb(246, 148 ,21)",
				borderBottom: "1px solid rgba(255, 255, 255, 0.5)"
			});

			$(".row-ql-ranking:nth-child(1) td:nth-child("+(parseInt(t) + 1)+")").css('color', '#000');

			$(".row-ql-ranking td:nth-child("+(parseInt(t) + 1)+") img").attr("src", window.location.origin + "/images/academy/tick.png");
		}
	}
});