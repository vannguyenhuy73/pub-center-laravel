<!DOCTYPE html>
<html>
<head>
	<title>Adpia Newpub Affiliate Minishop Preview</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
	html {
		height: 100%;
	}
	body {
		margin: 0;
		padding: 0;
		height: 100%;
	}
	.minishop-preview-wrapper {
		height: 100%;
	}
	.minishop-preview-wrapper-box {
		height: 100%;
	}
	.minishop-preview-head-box {
		background-color: #32343e;
		padding: 8px 0;
	}
	.minishop-preview-device-btn {
		display: flex;
		justify-content: center;
	}
	.mobile-device-btn {
		height: 20px;
		width: 14px;
		text-align: center;
		padding: 10px 13px;
		margin: 0 4px;
		border-radius: 4px;
	}
	.pc-device-btn {
		height: 17px;
		width: 20px;
		text-align: center;
		padding: 11.5px 10px;
		margin: 0 4px;
		border-radius: 4px;
	}
	.mobile-device-btn:hover, .pc-device-btn:hover {
		cursor: pointer;
		background-color: #191a1f;
	}
	.mobile-device-btn.active, .pc-device-btn.active {
		background-color: #191a1f;
	}
	.mobile-device-btn img, .pc-device-btn img {
		width: 100%;
	}
	.minishop-preview-content {
		height: calc(100% - 56px);
		background-color: #d1d1d1;
	}
	.mobile-view .minishop-pewview-content-box {
		max-width: 375px;
		max-height: 624px;
		height: 100%;
		margin: auto;
		padding-top: 20px;
		transition: all 0.5s ease;
	}
	.pc-view .minishop-pewview-content-box {
		max-width: 100%;
		max-height: 100%;
		height: 100%;
		transition: all 0.5s ease;
		margin: auto;
	}
	iframe {
		width: 100%;
		height: 100%;
	}
	@media (max-width: 767px) {
		.minishop-preview-device-btn {
			display: none;
		}
		.minishop-preview-head-box {
			padding: 18px 0;
		}
		.minishop-pewview-content-box {
			height: 100%;
			width: 100%;
		}
	}
</style>
<body>
	<div class="minishop-preview-wrapper">
		<div class="minishop-preview-wrapper-box">
			<div class="minishop-preview-head">
				<div class="minishop-preview-head-box">
					<div class="minishop-preview-device-btn">
						<div class="mobile-device-btn">
							<img src="http://img.echosting.cafe24.com/api/store/images/ico_frame_mobile.png" alt="">
						</div>
						<div class="pc-device-btn active">
							<img src="http://img.echosting.cafe24.com/api/store/images/ico_frame_desktop.png" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="minishop-preview-content pc-view">
				<div class="minishop-pewview-content-box">
					<iframe src="{{ config('const.minishop.pub_url') }}/example-shop/store" frameborder="0" scrolling="yes"></iframe>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
	<script>
		$(".mobile-device-btn").click(function(event) {
			$(".pc-device-btn").removeClass('active');
			$(this).addClass('active');
			$(".minishop-preview-content").removeClass('pc-view');
			$(".minishop-preview-content").addClass('mobile-view');
		});
		$(".pc-device-btn").click(function(event) {
			$(".mobile-device-btn").removeClass('active');
			$(this).addClass('active');
			$(".minishop-preview-content").removeClass('mobile-view');
			$(".minishop-preview-content").addClass('pc-view');
		});

		$(function() {
			if(getUrlVars()['screen']) {
				if(getUrlVars()['screen'] == 'pc') {
					$(".pc-device-btn").click();
				} else if(getUrlVars()['screen'] == 'mobile') {
					$(".mobile-device-btn").click();
				}
			}
		});

		function getUrlVars()
		{
			var vars = [], hash;
			var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for(var i = 0; i < hashes.length; i++)
			{
				hash = hashes[i].split('=');
				vars.push(hash[0]);
				vars[hash[0]] = hash[1];
			}
			return vars;
		}
	</script>
</body>
</html>