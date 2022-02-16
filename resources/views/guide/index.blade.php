@extends('layouts.app')
@section('css')

@endsection
@section('content')
<style>
	.row{
		margin: 0;
		padding: 0;
	}
	.title__guide{
		color: #FE3000;
		border-bottom: 1px solid #e6e9ed;
		padding-bottom: 10px;
		font-size: 28px !important;
	}
	.bg-fff{
		background-color: #fff;
		border: 1px solid #e6e9ed;
		margin-top: 15px;
		margin-bottom: 10px;
		padding-top: 10px;
		padding-bottom: 20px;
		border-radius: 25px;
	}
	.list__guide{
		list-style-type: none;
		padding-left: 25px;
		padding-right: 15px;
		padding-top: 10px;
	}
	.list__guide li{
		padding: 10px 0 10px 0;
		border-bottom: 1px dotted #ccc;
	}
	.list__guide a{
		font-size: 16px;

		font-weight: 600;
	}
	.col-md-5,.col-md-12 {
		padding-left: 0;
	}
	.content__guide{
		padding-left: 15px;
		padding-top: 20px;
		width: 100% !important;
	}
	.content__guide img{
		width: 55% !important;
		height: auto !important;
	}
	.click__guide, .click__guide__video{
		cursor: pointer;
	}
	.active__click{
		color: red;
  		pointer-events: none;
	}
	.click__guide:hover{
		color: red
	}

</style>
<div class="right_col" role="main">
    <div class="">
		<div class="row">
			<div class="col-md-5 ">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12 bg-fff">
							<h4 class="text-center">Bài viết hướng dẫn</h4>
							<ul class="list__guide">
								@foreach ($listGuide as $key => $list)
								<li><a id="{{ $key }}"  data_content="{{ $list->content_id}}" data-title="{{ $list->title }}" class="click__guide active__click"><span class="active__span"> >> </span>{{ $list->title }}</a></li>
								@endforeach
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-7 bg-fff ">
				<h4 class="text-center">Video hướng dẫn</h4>
				<ul class="list__guide">
					<li><a class="click__guide__video" data-toggle="modal" data-target="#myModal" data-video="https://www.youtube.com/embed/TCM74ILsL_U">
						<i style="color: red; font-size: 26px; margin-right: 15px" class="fa fa-youtube-play" aria-hidden="true"></i> Hướng dẫn đăng ký  và sử dụng giao diện hệ thống của Adpia</a>
					</li>
					<li><a class="click__guide__video" data-toggle="modal" data-target="#myModal" data-video="https://www.youtube.com/embed/elXAtcfWci8">
						<i style="color: red; font-size: 26px; margin-right: 15px" class="fa fa-youtube-play" aria-hidden="true"></i> Hướng dẫn làm Affiliate marketing trên nền tảng mạng xã hội Facebook</a>
					</li>
					<li><a class="click__guide__video" data-toggle="modal" data-target="#myModal" data-video="https://www.youtube.com/embed/CkAEIA3iwR4">
						<i style="color: red; font-size: 26px; margin-right: 15px" class="fa fa-youtube-play" aria-hidden="true"></i> Hướng dẫn tạo Fanpage và chạy quảng cáo Facebook để làm Affiliate Marketing</a>
					</li>
					<li><a class="click__guide__video" data-toggle="modal" data-target="#myModal" data-video="https://www.youtube.com/embed/dlbXT4SaKlE">
						<i style="color: red; font-size: 26px; margin-right: 15px" class="fa fa-youtube-play" aria-hidden="true"></i> Hướng dẫn tạo Blog bán hàng miễn phí trên Wordpress để làm Affiliate Marketing</a>
					</li>
					
				</ul>
			</div>
		</div>
		<div class="content__guide bg-fff col-md-12">
    		<h2 class="title__guide">{{ $data['title'] }}</h2>
    		<div class="guide__content__detail">
				<?= $content ?>
    		</div>
		</div>	
			
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <img src="https://adpia.vn/images/logo-1.png" alt="">
	      	</div>
	      	<div class="modal-body">
	        	
	      	</div>
	     	
	    </div>
  	</div>
</div>
@endsection
@section('script')
	<script>
		$('.active__span').hide()
		$('a.click__guide').removeClass("active__click")
		$('#0 .active__span').show()
		$('#0').addClass("active__click")
		$('a.click__guide').click(function() {
			$('.active__span').hide()

			content_id = $(this).attr('data_content');
			id = $(this).attr('id');
			title = $(this).attr('data-title');

			$('a.click__guide').removeClass("active__click")
			
			showLoading()

			$.ajax({
				url: '{{ route('huong-dan') }}'+'/'+content_id,
				method: 'get',
				success: function(data) {
					$('.guide__content__detail').html(data);
					$('.title__guide').html(title);
					hideLoading();
					$('#'+id+' .active__span').show()
					$('#'+id).addClass("active__click")
				},
				error: function() {
					toastr.error("Đã có lỗi xảy ra!");
				}
			});
		})

		// render video
		$('a.click__guide__video').click(function() {
			video = $(this).attr('data-video');

			data = '<iframe width="100%" height="400" src="'+video+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			$('.modal-body').html(data);
		})
	</script>
@endsection