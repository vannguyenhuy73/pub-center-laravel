<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>
<body>
	<style>
		iframe{
			position: relative;

		}
		a{
			position: absolute;
			top: 75%;
			left: 10px;
		}
	</style>

	<iframe style="border:none; " src="{{ $data[0]->banner_url }}" width="{{ $w-10 }}" height="{{ $h-20 }}"></iframe>
	<a href="http://click.adpia.vn/tracking.php?m={{ $data[0]->merchant_id }}&a={{ $aff_id }}&l=0000" target="_blank" class="btn btn-warning text-secondary">Mua ngay</a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Thư viện popper đã nén phục vụ cho bootstrap.min.js -->
<!-- Bản js đã nén của bootstrap 4, đặt dưới cùng trước thẻ đóng body-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>
</html>