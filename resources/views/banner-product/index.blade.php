<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quảng cáo sản phầm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>
<body>
	<div class="col-sm-12 list row" >
		<div class="col-sm-12 tittle">
			<a target= "_blank" href="{{ !empty($url)?$url:"#" }}"  class="text-center {{ !empty($url)?'':"isDisabled" }}">Truy cập cửa hàng</a>
		</div>
		<div class="col-md-12 tittles">
			<a target="_blank" class="head {{ !empty($url)?'':"isDisabled" }}" href="{{ !empty($url)?$url:"#" }}" >
				<span>Truy cập vào trang bán</span>
			</a>	
		</div>
		@foreach($data as $key => $vl)
			<div class="col-sm-{{ 12/$count }} pro">
				<a target="_blank" href="https://click.adpia.vn/click.php?m={{ strtolower($vl->merchant_id) }}&a={{$aff_id}}&l=9999&l_cd1=3&l_cd2=0&tu={{ urlencode($vl->link)}}">
					<div class="logo">
						<img src="{{ $vl->banner_url }}" alt="">
					</div>
					<div class="product">
						<img src="{{ $vl->image}}" alt="">
					</div>
					<div class="footer text-center">
						<p style="margin-bottom: 0;color: white; margin-top: 10px; font-weight: 600;"><span style="color: red">Giá sốc: </span>{{ number_format($vl->discount) }} VNĐ </p>
						<p style="color: white;width: 100%; font-weight: 400;margin-bottom: 0;font-size: 14px;">{{ Illuminate\Support\Str::limit($vl->title,45) }} </p>
					</div>
				</a>
			</div>
		@endforeach
	</div>
	<img src="https://img.adpia.vn/apshow.php?m_id={{ $data[0]->merchant_id }}&a_id={{ $aff_id }}&p_id=0000&l_id=0050&l_cd1=G&l_cd2=2" width="1" height="1" border="0" nosave style="display:none">
		<!-- /.col-md-12 -->
	<style>
		.isDisabled {
		  pointer-events: none;
		}
		.footer{
			height: 85px;
			width: 100%;
			background-color: rgba(14, 10, 10, 0.8);
			position: absolute;
			bottom: 0;
			left: 0;
			overflow: hidden;
		}
		.logo{
			width: 45%;
		}
		.product{
			background-color: white;
			padding-top: 15px;
			/*height: 275px;*/
		}
		.list{
			box-shadow: 0px 2px 3px rgba(0,0,0,0.2);
			position: relative;
			margin: 0;
			padding: 0;
		}
		body{
			position: relative;
			overflow: hidden;
			text-align: center;
		}
		img{
			width: 100%;
		}
		a>span{
			color:#464242;
			font-size:11px;
			text-decoration: none ;
			font-weight: 550;
		}
		.col-md-12>a.head{
			z-index: 10;
			background: url(https://tpc.googlesyndication.com/pagead/images/abg/icon.png) no-repeat  left;
			padding: 0px 0px 0px 24px;
			position: absolute;
			top: -6px;
    		right: -122px;
			transition: right ease-in-out .5s;
		}
		.col-md-12>a.head:hover{
			right: 1px;
			text-decoration: none;
			background-color: white;
		}
		a{text-decoration: none}
		.col-md-12>a>img{
			width: 100%;
		}
		.tittle{
			margin-top: 10px;
			margin-bottom: 10px;
		}
		.tittle:after {
		    width: 14%;
		    border-bottom: 1px solid #a50a0a;
		    content: " ";
		    display: block;
		    position: absolute;
		    top: 13px;
		    left: 0;	
		}
		.tittle:before {
		    width: 14%;
		    border-bottom: 1px solid #a50a0a;
		    content: " ";
		    display: block;
		    position: absolute;
		    top: 13px;	
		    right: 0px;
		}
		.list a{
			/*color: #820d14;*/
			font-weight: 800;
			/*margin-top: 20px;*/
		}
		.list a{text-decoration: none}
		.pro {
			border: 2px solid transparent;
			position: relative;
			transition: 0.5s linear
		}
		.pro:hover {
			border: 2px solid red;
			position: relative
		}
		@-webkit-keyframes my {
	 		0% { color: #820d14; } 
	 		50% { color: #c60;  } 
	 		75% { color: #069;  }
	 		100% { color: #093;  } 
	 	}
	 	@-moz-keyframes my { 
		 	0% { color: #820d14;  } 
		 	50% { color: #c60;  }
		 	75% { color: #069;  }
		 	100% { color: #093;  } 
	 	}
	 	@-o-keyframes my { 
		 	0% { color: #820d14; } 
		 	50% { color: #c60; } 
		 	75% { color: #069;  }
		 	100% { color: #093;  } 
	 	}
	 	@keyframes my { 
		 	0% { color: #820d14;  } 
		 	50% { color: #c60;  }
		 	75% { color: #069;  }
		 	100% { color: #093;  } 
	 	} 
	 	.list a {
		 	-webkit-animation: my 1000ms infinite;
		 	-moz-animation: my 1000ms infinite; 
		 	-o-animation: my 1000ms infinite; 
		 	animation: my 1000ms infinite;
		}
		.tittle{display: none}
		@media screen and (max-width: 700px) {
			
			.footer{
				height: 67px;
			}
			.footer p{
				font-size: 13px !important;
			}
			.tittle a{font-size: 18px !important;}
		}
		@media screen and (max-width: 575px) {
			
			.tittle{display: block}
			.tittles{display: none}
		}
		@media screen and (max-width: 200px) {
			.footer{
				height: 69px;
			}
			.footer p{
				font-size: 12px
			}
			.tittle a{font-size: 13px;}
		}
		@media screen and (max-width: 150px) {
			.footer{
				height: 45px;
			}
			.footer p{
				font-size: 10px
			}
			.tittle a{font-size: 9px;}
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>
</html>