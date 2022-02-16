@extends('layouts.app')
@section('title', 'Email')
@section('style')
    <style>
        .mail-list li.active a {
            color: white;
	}

    </style>
@endsection
@section('content')
    <style>
        .border__top{
            position:relative;
            width: 100%;
        }
        .border__top:before{
            position:absolute;
            width: 100%;
            content: '';
            border-bottom: 2px solid #E6E9ED;
            /*top: 82px;*/
            left: 0;
        }
        .pt__20{
            padding-top: 20px !important;
            padding-bottom: 10px;
        }
        .pt__20 {
            font-size:14px;
            font-weight: 600;
        }
        .pt__20 p{margin: 0 !important; padding-left: 20px;}
        .paginate, .notice__links{
            display:flex;
            width: 68%;
            margin: auto;
            padding-top: 10px;
        }
        .paginate li, .notice__links li {list-style:none;padding-left: 20px;}
        .paginate li a, .notice__links li a {font-size:16px; font-weight:600; cursor:pointer}
        .x_panel{border-radius:30px; }
        .x_title{border:none !important;}
        .none__page{display: none}
        .active__page{display: block!important}
        .isDisabled {
            color: currentColor;
            cursor: not-allowed;
            opacity: 0.5;
            text-decoration: none;
            pointer-events: none;
        }
        @media (max-width: 768px) {
            .paginate, .notice__links{
                width: 100% !important;
            }
            .paginate li, .notice__links li{
                padding-left: 10px !important;
            }
        }
        .loading, .loading:before{
            background: none !important;
            position:absolute !important;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-6 col-xs-12 ">
                    <div class="loadings">
                        <div class="loading"></div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <p style="font-weight: 600;">Thông báo</p>
                        </div>
                        <div class="x_content">
                            <table class="notice__table" style="width: 100%;"></table>
                            <div class="col-sm-12 col-xs-12 ">
                                <ul class = "notice__links"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="loading__mail">
                        <div class="loading"></div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <p style="font-weight: 600;">Hộp Thư</p>
                        </div>
                        <div class="x_content">
                            <table class="mail__table" style="width: 100%;"></table>
                            <div class="col-sm-12 col-xs-12 ">
                                <ul class = "paginate"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
		$(document).ready(function (){
			getDataPage()
			clickPage()
		});
		function getDataPage(page = 1) {
			// page = 2;
			dataTable = '';
			paginate = '';
			readed = '';
			nextV = "";
			$.ajax({
				url: 'get-mail?page='+ page,
				success: function(data) {
					$('.loading__mail').hide();
					preV = '<li>'+
						'<a class="click__page" data = "1" id="start" >Đầu </a>'+
						'</li>';
					nextV = '<li>'+
						'<a class="click__page end" ' +
						'data="'+data['mail']['last_page']+'">Cuối</a>'+
						'</li>';
					// console.log(data['mail']['last_page']);
					
					for(i = 1; i <= data['mail']['last_page']; i++ ) {
						paginate += '<li class="none__page click__page" data="'+i+'" id = "'+i+'">'+
							'<a  class="">'+ i +'</a>'+
							'</li>';
					}

					// get data table
					for(i = 0; i < data['mail']['data'].length; i++) {
						a = new Date(data['mail']['data'][i]['send_date']);

						if(data['mail']['data'][i]['read_date'] != null) {
							readed = '<i class="fa fa-envelope-o" aria-hidden="true"></i>';
						} else {
							readed = '<i class="fa fa-envelope" aria-hidden="true"></i>';
						}

						dataTable += '<tr class="border__top">' +
							'<td style="width: 10%;" class="pt__20">' +
							readed +
							'</td>' +
							'<td  class="pt__20">' +
							'<p><a href="mail/view/'+data['mail']['data'][i]['mail_id']+'">'+data['mail']['data'][i]['title'].slice(0,39)+' ...</a></p>' +
							'<p style="font-weight: 100;line-height: 2;">'+data['mail']['data'][i]['sender_name']+'</p>' +
							'</td>' +
							'<td class="text-center pt__20">'+a.format("d/m/y")+'</td>' +
							'</tr>';

					}

					$('.paginate').html(preV+paginate+nextV);
					$('.mail__table').html(dataTable);
					clickPage(data['mail']['current_page']);

					if(data['mail']['current_page'] == 1) {
						$('#start').addClass('isDisabled');
					}

					if(data['mail']['current_page'] ==  data['mail']['last_page']) {
						$('.end').addClass('isDisabled');
					}
					
					if(data['mail']['current_page'] == 1) {
						for(i= 0; i<= 5; i++) {
							$('#'+i).addClass('active__page');
						}
					}else if(data['mail']['current_page'] ==2) {
						for(i= 1; i<= 5; i++) {
							$('#'+i).addClass('active__page');
						}
					}else if(data['mail']['current_page'] == data['mail']['last_page'] ) {
						for(i= data['mail']['last_page'] - 4; i<= data['mail']['last_page']; i++) {
							$('#'+i).addClass('active__page');
						}
					} else if(data['mail']['current_page'] == data['mail']['last_page'] - 1) {
						for(i= data['mail']['last_page'] -4 ; i<= data['mail']['last_page'] ; i++) {
							$('#'+i).addClass('active__page');
						}
					} else {
						for(i= data['mail']['current_page'] - 2 ; i<= data['mail']['current_page'] + 2; i++) {
							$('#'+i).addClass('active__page');
						}
					}

					$('#'+data['mail']['current_page']+'>a').css({'color':'red'});
				}
			});
		}

		function clickPage(pages)
		{
			$('.click__page').one("click",function() {
				prPage = $(this).attr('data');
				getDataPage(prPage);
				$('.loading__mail').show();
			});
		}

		// Notice

		$(document).ready( () => {
			getDataNotice();
			clickPageNotice();
		})

		function getDataNotice(page = 1) {
			// page = 2;
			dataTables = '';
			paginaten = '';
			readedn = '';
			nextVn = "";
			$.ajax({
				url: 'notice-list?page='+ page,
				success: function(data) {
					$('.loadings').hide();
					preVn = '<li>'+
						'<a class="click__pagen" data = "1" id="start__notice" >Đầu </a>'+
						'</li>';
					nextVn = '<li>'+
						'<a class="click__pagen end__notice" ' +
						'data="'+data['data']['last_page']+'">Cuối</a>'+
						'</li>';

					for(i = 1; i <= data['data']['last_page']; i++ ) {
						paginaten += '<li class="none__page click__pagen" data="'+i+'" id = "n'+i+'">'+
							'<a  class="">'+ i +'</a>'+
							'</li>';
					}

					// get data table
					for(i = 0; i < data['data']['data'].length; i++) {
						a = new Date(data['data']['data'][i]['create_time_stamp']);
						dataTables += '<tr class="border__top">' +
							'<td style="width: 15%;" class="pt__20">' +
							'<img style = "width:100%; height:46px; object-fit:cover" src= ' +
							''+data['data']['data'][i]['image']+' >'+
							'</td>' +
							'<td  class="pt__20">' +
							'<p><a href="'+data['data']['data'][i]['target_url']+'">'+data['data']['data'][i
								]['title'].slice(0,36)+' ...</a></p>' +
							'<p style="font-weight: 100;line-height: 2;">'+data['data']['data'][i]['writer']+'</p>' +
							'</td>' +
							'<td class="text-center pt__20">'+a.format("d/m/y")+'</td>' +
							'</tr>';
					}

					$('.notice__links').html(preVn+paginaten+nextVn);
					$('.notice__table').html(dataTables);
					clickPageNotice(data['data']['current_page']);

					if(data['data']['current_page'] == 1) {
						$('#start__notice').addClass('isDisabled');
					}

					if(data['data']['current_page'] ==  data['data']['last_page']) {
						$('.end__notice').addClass('isDisabled');
					}
					
					if(data['data']['current_page'] == 1) {
						for(i= 0; i<= 5; i++) {
							$('#n'+i).addClass('active__page');
						}
					}else if(data['data']['current_page'] ==2) {
						for(i= 1; i<= 5; i++) {
							$('#n'+i).addClass('active__page');
						}
					}else if(data['data']['current_page'] == data['data']['last_page'] ) {
						for(i= data['data']['last_page'] - 4; i<= data['data']['last_page']; i++) {
							$('#n'+i).addClass('active__page');
						}
					} else if(data['data']['current_page'] == data['data']['last_page'] - 1) {
						for(i= data['data']['last_page'] -4 ; i<= data['data']['last_page'] ; i++) {
							$('#n'+i).addClass('active__page');
						}
					} else {
						for(i= data['data']['current_page'] - 2 ; i<= data['data']['current_page'] + 2; i++) {
							$('#n'+i).addClass('active__page');
						}
					}

					$('#n'+data['data']['current_page']+'>a').css({'color':'red'});
				}
			});
		}

		function clickPageNotice(pages)
		{
			$('.click__pagen').one("click",function() {
				prPage = $(this).attr('data');
				getDataNotice(prPage);
				$('.loadings').show();
			});
		}
    </script>
@endsection
