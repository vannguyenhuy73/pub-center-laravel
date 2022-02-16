$(document).ready(function () {
	if($(window).width() > 550) {
		$(".guide-newbie-dark-layer").css('display', 'block');
		$(".newpub-left-bar").css({zIndex: 'unset'});
		$(window).scrollTop($(".step_1_head").offset().top - 10);

		$(".step_1_head").css({
			position: 'relative',
			zIndex: 99999
		});

		$(".step_1_detail").css('display', 'flex');

		$(".btn-guide-next").click(function(event) {
			event.preventDefault();
			event.stopPropagation();
			var step = $(this).attr('data-step');
			var pre_step = parseInt(step) - 1;

			$(".step_" + pre_step + "_head").css({
				position: 'unset',
				zIndex: 'unset',
				pointerEvents: 'unset'
			});

			if(step == 6) {
				$(".step_" + step + "_detail").css('align-items', 'start');
				if($(window).innerWidth() <= 750) {
					$(".step_" + step + "_detail").removeClass('left-guide').addClass('top-guide');
					$(window).scrollTop($(".step_" + step + "_head").offset().top - 160);
				}
			}

			if(pre_step == 8) {
				$(".step_" + pre_step + "_head").css({
					position: 'relative',
					zIndex: '9999'
				});
			}
			$(".step_" + pre_step + "_detail").css('display', 'none');

			$(".step_" + step + "_head").css({
				position: 'relative',
				zIndex: 99999,
				pointerEvents: 'none'
			});

			if(pre_step == 7) {
				$(".step_" + pre_step + "_head").css({
					position: 'relative',
					zIndex: '101'
				});
			}

			if(step >= 8 && step <= 16) {
				$(".newpub-left-bar").css({zIndex: '99999', pointerEvents: 'none'});
				if($(window).innerWidth() <= 750) {
					$(".newpub-left-bar").css({left: '0'});
				}

				if(step > 8 && step < 14) {
					$(".newpub-menu-area").css('overflow', 'unset');
					$(".step_" + step + "_head > i, .step_" + step + "_head > span").css('cssText', 'color: #ffffff !important;');
					$(".step_" + step + "_head").css({ 
						margin: '0 -10px 0 -25px',
						padding: '8px 10px 8px 25px'
					});
				}

				$(".step_" + step + "_head").css({ border: '2px dashed #fff' });

				$(".step_" + pre_step + "_head").css({ border: 'none' });

				if(step > 9 && step <= 14) {
					$(".step_" + pre_step + "_head > i, .step_" + pre_step + "_head > span").css('cssText', 'color: #7d8293');
					$(".step_" + pre_step + "_head").css({ 
						margin: 'unset',
						padding: '8px 0'
					});
				}

				if(step == 8) {
					$(".newpub-menu-area").css({overflowX: 'hidden', overflowY: 'auto'});
					$(".newpub-menu-area").scrollTop($(".newpub-menu-area").height());
				}

				if(step >= 14) {
					$(".newpub-menu-area").css({overflowX: 'hidden', overflowY: 'auto'});
					$(".newpub-menu-area").scrollTop((50*(step - 14)) + 200);
				}
			}

			if (step > 16) {
				$(".newpub-left-bar").css({zIndex: 'unset', pointerEvents: 'auto'});
				if($(window).innerWidth() <= 750) {
					$(".newpub-left-bar").css({left: '-210px'});
				}
			}

			$(".step_" + step + "_detail").css({display: 'flex', pointerEvents: 'auto'});

			if($(".step_" + step + "_detail").attr('class').indexOf('bottom-guide') != -1 || $(".step_" + step + "_detail").attr('class').indexOf('left-guide') != -1) {
				$(window).scrollTop($(".step_" + step + "_head").offset().top - 10);
			}

			if(step == 17) {
				$(".step_" + pre_step + "_head").css({ border: 'none' });
				$(window).scrollTop($(".step_" + step + "_head").offset().top - 160);
			}
		});

		$(".btn-guide-skip").click(function(event) {
			event.preventDefault();
			event.stopPropagation();
			var detail = $(this).parent().parent();
			var head = $(this).parent().parent().parent();
			var step = $(this).siblings('.btn-guide-next').attr('data-step');
			var pre_step = parseInt(step) - 1;

			detail.css('display', 'none');

			head.css({
				position: 'unset',
				zIndex: 'unset',
				pointerEvents: 'auto'
			});

			if(step == 9) {
				head.css({
					position: 'relative',
					zIndex: '2'
				});
			}

			$(".step_" + pre_step + "_head").css({ border: 'none' });

			if(step > 9 && step <= 14) {
				$(".step_" + pre_step + "_head > i, .step_" + pre_step + "_head > span").css('cssText', 'color: #7d8293');
				$(".step_" + pre_step + "_head").css({ 
					margin: 'unset',
					padding: '8px 0'
				});
			}

			if($(window).innerWidth() > 550 && $(window).innerWidth() <= 750) {
				$(".newpub-left-bar").css({left: '-210px'});
			}

			$(".newpub-left-bar").css({zIndex: '999999', pointerEvents: 'auto'});

			$(".guide-newbie-dark-layer").css('display', 'none');

			$(window).scrollTop(0);
		});
	}

	if($(window).innerWidth() <= 550) {
		$(".guide-newbie-mobile").css('height', '100%');
		$(".guide-newbie-mobile").animate({
			opacity: 1
		}, 500);
		$("body").css("overflow", "hidden");
		$('*').bind('touchmove', false);
	}

	$(".guide-newbie-mobile-slide .owl-carousel").on('change.owl.carousel', function(e) {
		if (e.namespace && e.property.name === 'position' && e.relatedTarget.relative(e.property.value) === e.relatedTarget.items().length - 1) {
			$(".slide-skip-btn").html('ĐÃ HIỂU');
			$(".slide-skip-btn").css('background-color', 'rgb(252, 101, 0)');
			$(".slide-next-btn").css('display', 'none');
		} else {
			$(".slide-skip-btn").html('BỎ QUA');
			$(".slide-skip-btn").css('background-color', 'rgb(41, 41, 41)');
			$(".slide-next-btn").css('display', 'block');
		}
	});

	$(".slide-next-btn").click(function() {
		$(".guide-newbie-mobile-slide .owl-carousel").trigger('next.owl.carousel');
	});

	$(".slide-skip-btn").click(function(event) {
		$(".guide-newbie-mobile").animate({
			opacity: 0,
			overflow: 'hidden'
		}, 500, function() {
			$(".guide-newbie-mobile").css('height', 0);
			$("body").css("overflow", "auto");
			$('*').unbind('touchmove');
		});
	});
});