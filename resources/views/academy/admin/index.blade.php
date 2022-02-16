@extends('newpub_layouts.main')
@section('title','Academy Admin')
@section('newpub_style')
<style>
  .grid-container-admincp {
    display: grid;
    grid-template-columns: 25% 25% 25% 25%;
    background-color: #2196F3;
    padding: 10px;
  }
  .grid-item-admincp {
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid rgba(0, 0, 0, 0.8);
    padding: 5px;
    font-size: 30px;
    text-align: center;
  }
  .menu-admin-item {
    border-radius: 5px;
    padding: 10px;
  }
  .bgr-red {
    background-color: red;
  }
  .bgr-orange {
    background-color: orange;
  }
  .bgr-green {
    background-color: green;
  }
  .bgr-blue {
    background-color: blue;
  }
  .bgr-purple {
    background-color: indigo;
  }
  .bgr-brown {
    background-color: saddlebrown;
  }
  .bgr-teal {
    background-color: teal;
  }
  .bgr-black {
    background-color: grey;
  }
  .bgr-red:hover {
    background-color: tomato;
    cursor: pointer;
  }
  .bgr-orange:hover {
    background-color: gold;
    cursor: pointer;
  }
  .bgr-green:hover {
    background-color: limegreen;
    cursor: pointer;
  }
  .bgr-blue:hover {
    background-color: royalblue;
    cursor: pointer;
  }
  .bgr-purple:hover {
    background-color: blueviolet;
    cursor: pointer;
  }
  .bgr-brown:hover {
    background-color: sienna;
    cursor: pointer;
  }
  .bgr-teal:hover {
    background-color: lightseagreen;
    cursor: pointer;
  }
  .bgr-black:hover {
    background-color: darkgrey;
    cursor: pointer;
  }
  .menu-admin-item span {
    color: #fff;
  }
  .menu-admin-title {
    margin-bottom: 20px;
  }
  .menu-admin-icon {
    width: 50%;
    margin: auto;
  }
  .menu-admin-icon img {
    width: 100%;
  }
  .last-menu-item-img {
    background-image: url('/uploads/academy/nancy-avatar.jpg');
    background-repeat: no-repeat;
    height: 100%;
    background-size: cover;
  }
  .right_col {
    margin: 0 10px;
  }
</style>
@endsection
@section('newpub_main_content')
<div class="right_col" role="main">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>
						<i class="fa fa-graduation-cap"></i>
						ACADEMY ADMIN
					</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<h4><i class="fa fa-list-ul" aria-hidden="true"></i> DANH SÁCH MODULE CỦA ACADEMY</h4>
          <div class="grid-container-admincp">
            <div class="grid-item-admincp">
              <a href="/academy/admincp/academy-rank">
                <div class="menu-admin-item bgr-red">
                  <div class="menu-admin-title"><span>THỨ HẠNG</span></div>
                  <div class="menu-admin-icon"><img src="/uploads/academy/rank-menu-icon.png" alt=""></div>
                </div>
              </a>
            </div>
            <div class="grid-item-admincp">
              <a href="/academy/admincp/academy-offline-event">
                <div class="menu-admin-item bgr-orange">
                  <div class="menu-admin-title"><span>SỰ KIỆN OFFLINE</span></div>
                  <div class="menu-admin-icon"><img src="/uploads/academy/offline-event-menu-icon.png" alt=""></div>
                </div>
              </a>
            </div>
            <div class="grid-item-admincp">
              <div class="last-menu-item-img"></div>
            </div>
            <div class="grid-item-admincp">
              <a href="/academy/admincp/academy-online-event">
                <div class="menu-admin-item bgr-green">
                  <div class="menu-admin-title"><span>SỰ KIỆN ONLINE</span></div>
                  <div class="menu-admin-icon"><img src="/uploads/academy/online-event-menu-icon.png" alt=""></div>
                </div>
              </a>
            </div>
            <div class="grid-item-admincp">
              <a href="/academy/admincp/academy-section">
                <div class="menu-admin-item bgr-blue">
                  <div class="menu-admin-title"><span>BÀI HỌC</span></div>
                  <div class="menu-admin-icon"><img src="/uploads/academy/section-menu-icon.png" alt=""></div>
                </div>
              </a>
            </div>
            <div class="grid-item-admincp">
              <div class="last-menu-item-img"></div>
            </div>
            <div class="grid-item-admincp">
              <a href="/academy/admincp/academy-qa">
                <div class="menu-admin-item bgr-purple">
                  <div class="menu-admin-title"><span>HỎI & ĐÁP</span></div>
                  <div class="menu-admin-icon"><img src="/uploads/academy/qa-menu-icon.png" alt=""></div>
                </div>
              </a>
            </div>
            <div class="grid-item-admincp">
              <a href="/academy/admincp/academy-incentive">
                <div class="menu-admin-item bgr-brown">
                  <div class="menu-admin-title"><span>ƯU ĐÃI</span></div>
                  <div class="menu-admin-icon"><img src="/uploads/academy/incentive-menu-icon.png" alt=""></div>
                </div>
              </a>
            </div>
            <div class="grid-item-admincp">
              <div class="last-menu-item-img"></div>
            </div>
            <div class="grid-item-admincp">
              <a href="/academy/admincp/academy-right">
                <div class="menu-admin-item bgr-teal">
                  <div class="menu-admin-title"><span>PHÂN QUYỀN</span></div>
                  <div class="menu-admin-icon"><img src="/uploads/academy/bonus-menu-icon.png" alt=""></div>
                </div>
              </a>
            </div>
            <div class="grid-item-admincp">
              <a href="/academy/admincp/academy-bonus">
                <div class="menu-admin-item bgr-black">
                  <div class="menu-admin-title"><span>QUYỀN LỢI</span></div>
                  <div class="menu-admin-icon"><img src="/uploads/academy/right-menu-icon.png" alt=""></div>
                </div>
              </a>
            </div>
            <div class="grid-item-admincp">
              <div class="last-menu-item-img"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('newpub_script')
<script>
</script>
@endsection