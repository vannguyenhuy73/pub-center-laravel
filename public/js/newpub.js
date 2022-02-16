$(function() {
	$('#datetimepicker1').datetimepicker({
		locale: 'en',
		format: 'DD/MM/YYYY'
	});
	$(".nav-am-contact").css({
		width: $(".nav-am-info").innerWidth() - 50,
		height: $(".nav-am-info").innerHeight()
	});
	$(".drop-content").css({
		width: $(".nav-show-drop").innerWidth(),
		top: $(".nav-show-drop").innerHeight()
	});

	$(".filter-commissipn-drop").css({
		width: $(".filter-commission-show").innerWidth(),
		top: $(".filter-commission-show").innerHeight()
	});

	$(".nav-right-noti-popup").css({
		width: $(".nav-right-box").innerWidth(),
		top: $(".nav-right-box").innerHeight()
	});

	if(window.innerWidth <= 550) {
		$(".newpub-nav-box").css('margin-top', $(".newpub-nav-top-bar").innerHeight());
	} else {
		$(".newpub-nav-box").css('margin-top', '0');
	}
	$(window).resize(function(event) {
		if(window.innerWidth <= 550) {
			$(".newpub-nav-box").css('margin-top', $(".newpub-nav-top-bar").innerHeight());
		} else {
			$(".newpub-nav-box").css('margin-top', '0');
		}
	});

	$(".newpub-nav-half-bg").css('height', ($(".newpub-nav-box").innerHeight() / 2));
});
$(".nav-am-info").hover(function() {
	$(".nav-am-contact").animate({
		left: $(".nav-am-info").innerWidth() - 50},
		500, function() {
			/* stuff to do after animation is complete */
		});
}, function() {
	$(".nav-am-contact").stop(true, true).animate({
		left: 0},
		500, function() {
			/* stuff to do after animation is complete */
		});
});

$(".nav-show-drop").click(function(event) {
	if($(".drop-content").hasClass('active'))
	{
		$(this).css('border-radius', '20px');
		$(".drop-content").removeClass('active');
		$(".drop-content").css('display', 'none');
	} else {
		$(this).css('border-radius', '13px 13px 0 0');
		$(".drop-content").addClass('active');
		$(".drop-content").css('display', 'block');
	}
});

$(".filter-commission-show").click(function(event) {
	if($(".filter-commissipn-drop").hasClass('active'))
	{
		$(this).css('border-radius', '5px');
		$(".filter-commissipn-drop").removeClass('active');
		$(".filter-commissipn-drop").css('display', 'none');
	} else {
		$(this).css('border-radius', '5px 5px 0 0');
		$(".filter-commissipn-drop").addClass('active');
		$(".filter-commissipn-drop").css('display', 'block');
	}
});

$(".filter-com-click").click(function(event) {
	$(".filter-commission-show").css('border-radius', '5px');
	$(".filter-commissipn-drop").removeClass('active');
	$(".filter-commissipn-drop").css('display', 'none');
	if($(this).attr('onclick') == 'getClick()') {
		$(this).attr('onclick', 'getRevenue()');
		$(this).children('.commissipn-drop-item').html('<span>HOA HỒNG TẠM DUYỆT</span>');
		$(".filter-commission-show").html('<span>CLICK PHÁT SINH</span><i class="fa fa-caret-down" aria-hidden="true"></i>');
	} else {
		$(this).attr('onclick', 'getClick()');
		$(this).children('.commissipn-drop-item').html('<span>CLICK PHÁT SINH</span>');
		$(".filter-commission-show").html('<span>HOA HỒNG TẠM DUYỆT</span><i class="fa fa-caret-down" aria-hidden="true"></i>');
	}
});