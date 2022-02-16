@extends('layouts.app')
@section('title','Tin khuyến mại')
@section('style')
<style>
 .list-event{
     border-bottom: 1px solid #dddddd!important;
     margin-top: 15px;
     /*height: 127px;*/
     overflow-y: hidden;
     /*padding-left: 30px;*/
     /*padding-right: 30px;*/
 }
 @media screen and (max-width: 768px){
    .img-event{
        height: 300px!important;
    }
}
</style>
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <i class="fa fa-th"></i> Tin Khuyến Mại
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(isset($boards))
                        @foreach($boards as $board)
                        <div class="col-sm-6 col-xs-12">
                            <div class="row list-event">
                                <div class="col-sm-3">
                                    <a href="{{ route('board.show', $board->article_id) }}">
                                        <img src="{{ $board->image == null ? 'https://adpia.vn/images/info/affiliate-marketing-notice.jpg' : $board->image }}"
                                        style="height: 115px;" alt="{{ $board->title }}" class="img-event">
                                    </a>
                                </div>
                                <div class="col-sm-9">
                                    <p style="    font-style: italic;
                                    font-weight: 600; color:red">{{strtoupper($board->merchant_id)}}</p>
                                    <h2>
                                        <a href="{{ route('board.show', $board->article_id)  }}">{{ str_limit(strip_tags($board->title),
                                        30, '...')}}</a>
                                    </h2>
                                    <div class="description">
                                        <p data-toggle="tooltip" title="{{$board->summary}}">{{ str_limit(strip_tags($board->summary),
                                        40, '...') }}</p>
                                    </div>
                                    <div>Ngày: <span class="text-danger">{{ date('d-m-Y', strtotime($board->cdate)) }}</span></div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row">
                            <div class="pull-right">
                                {{ $boards->links() }}
                            </div>
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
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
@endsection
