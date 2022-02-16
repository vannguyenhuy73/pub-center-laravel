@extends('newpub_layouts.main')
@section('title', 'Newpub Affiliate Adpia Minishop')
@section('newpub_style')
<link rel="stylesheet" href="{{ asset('css/newpub_minishop.css') }}">
@stop
@section('newpub_main_content')
<div class="wrapAll_frame_minishop">
	<div class="wrap_frame_minishop">
		<div class="frame_content_minishop">
			<!-- Begin introduce_minishop -->
			<div class="introduce_minishop">
				<div class="title_introduce"><span>MINISHOP - GIA TĂNG DOANH SỐ, THÚC ĐẨY HOA HỒNG</span></div>
				<div class="row_2">
					<div class="column-xl-5">
						<div class="left_block_introduce">
							<div class="wrap_big_title_introduce">
								<h3 class="h3_introduce">Sở hữu <span>Shop bán hàng</span></h3>
								<div class="online_text_introduce">Online</div>
								<h4 class="h4_introduce"><i>Ngay cả khi bạn</i> <span>không có Website</span></h4>   
							</div>

							<div class="wrap_advantage">
								<div class="wrap_line">
									<div class="left_line"><img src="{{ asset('images/minishop_icon_tick.png') }}" alt="" class="icon_tick"></div>    
									<div class="right_line"><p>Tạo Shop bán hàng Online trong 30s</p></div>    
								</div>
								<div class="wrap_line">
									<div class="left_line"><img src="{{ asset('images/minishop_icon_tick.png') }}" alt="" class="icon_tick"></div>    
									<div class="right_line"><p>Tự động tích hợp chương trình khuyến mại từ đối tác</p></div>    
								</div>
								<div class="wrap_line">
									<div class="left_line"><img src="{{ asset('images/minishop_icon_tick.png') }}" alt="" class="icon_tick"></div>    
									<div class="right_line"><p>Tự động cập nhập các sản phẩm hot theo ngành hàng</p></div>    
								</div>
								<div class="wrap_line">
									<div class="left_line"><img src="{{ asset('images/minishop_icon_tick.png') }}" alt="" class="icon_tick"></div>    
									<div class="right_line"><p>Kết nối trực tiếp với đối tác, không cần tư vấn khách hàng</p></div>    
								</div>                                                                  
							</div>     
						</div>    
					</div>    
					<div class="column-xl-7">
						<div class="right_block_introduce">
							<div class="wrap_button_introduce"><a href="" class="button_introduce">TẠO SHOP</a></div>
							<div class="wrap_slide_introduce">
								<img src="{{ asset('images/minishop_introduce_img.png') }}" alt="" class="introduce_img">    
							</div> 

						</div>
					</div>    
				</div>                                                                                      
			</div>  <!-- end introduce_minishop -->

			<!-- Begin Setting Minishop -->
			<div class="wrap_setting_minishop">
				<div class="wrap_b1">
					<h3 class="h3_setting">CÀI ĐẶT GẮN <span>MINI SHOP</span> LÊN WEBSITE</h3>
					<div class="wrap_support">
						<div class="row_2">
							<div class="column-xl-6">
								<div class="wrap_left_support">
									<div class="title_support">
										<div class="wrap_icon_stt"><div class="icon_stt">1</div></div>
										<div class="content_title"><span>Giao diện trải nghiệm</span></div>
									</div>
									<h5 class="h5_setting">Yêu cầu hỗ trợ cài đặt</h5>
									<p class="p1_setting">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>

									<div class="wrap_form_support">
										<form action="">
											<div class="line_form">
												<label for="" class="label_form">Chọn ngành hàng</label>
												<div class="custom-select" style="">
													<select name="" id="" class="form-control">
														<option value="0">...</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>    
												</div>                                                                                                             
											</div>
											<div class="line_form">
												<label for="" class="label_form">Link muốn đặt Minishop</label>
												<input type="text" class="control_form">                                                           
											</div>
											<div class="line_form">
												<label for="" class="label_form">Link Minishop dự định</label>
												<input type="text" class="control_form">                                                           
											</div>
											<div class="line_form">
												<label for="" class="label_form"></label>
												<a href="" class="button_form btn_registration">ĐĂNG KÝ</a>                                                           
											</div>
										</form> 
									</div>   
								</div>
							</div>
							<div class="column-xl-6">
								<div class="wrap_right_support">
									<div class="wrap_frames_video">
										<img src="{{ asset('images/minishop_frames_video2') }}.png" alt="" class="img_frames">
										<div class="wrap_bg_phone"><img src="{{ asset('images/minishop_bg_phone2.png') }}" alt="" class="bg_phone"></div>
										<div class="wrap_button_play"><a href="" class="button_play">XEM</a></div>      
									</div>   
								</div>
	
							</div>
						</div>
					</div>    
				</div>  <!-- end wrap_b1 -->

				<hr class="hr_1">

				<div class="wrap_b2">
					<div class="wrap_support">
						<div class="row_2">
							<div class="column-xl-6">
								<div class="wrap_left_support">
									<div class="title_support">
										<div class="wrap_icon_stt"><div class="icon_stt">2</div></div>
										<div class="content_title"><span>TẠO WEBSITE BÁN HÀNG DÀNH RIÊNG CHO MÌNH</span></div>
									</div>
									<h5 class="h5_setting">Tạo Shop</h5>
									<p class="p1_setting">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>

									<div class="wrap_form_support">
										<form action="">
											<div class="line_form">
												<label for="" class="label_form">Tên Shop bán hàng</label>
												<input type="text" class="control_form">                  
											</div>
											<div class="line_form">
												<label for="" class="label_form">Đối tác bạn muốn hợp tác</label>
												<input type="text" class="control_form">                                               
											</div>
											<div class="line_form">
												<label for="" class="label_form">Nhóm sản phẩm</label>
                                                <!-- <select name="" id="" class="control_form_select">
                                                    <option value="" disabled selected>...</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                </select> -->
                                                <div class="custom-select" style="">
                                                	<select name="" id="" class="form-control">
                                                		<option value="0">...</option>
                                                		<option value="1">1</option>
                                                		<option value="2">2</option>
                                                		<option value="3">3</option>
                                                		<option value="4">4</option>
                                                	</select>    
                                                </div>                                                             
                                            </div>
                                            <div class="line_form">
                                            	<label for="" class="label_form"></label>
                                            	<a href="" class="button_form btn_registration">TẠO SHOP</a>
                                            </div>
                                        </form> 
                                    </div>

                                    <div class="wrap_link_shop">
                                    	<form action="">
                                    		<div class="line_form">
                                    			<label for="" class="label_2">Link Shop</label>
                                    			<input type="text" class="control_form_2">
                                    		</div>
                                    		<div class="line_form">
                                    			<label for="" class="label_2">Link rút gọn</label>
                                    			<input type="text" class="control_form_2">
                                    		</div>   
                                    	</form>   
                                    </div> 
                                </div>
                            </div>
                            <div class="column-xl-6">
                            	<div class="wrap_right_support">
                            		<div class="wrap_frames_video">
                            			<img src="{{ asset('images/minishop_frames_video2') }}.png" alt="" class="img_frames">
                            			<div class="wrap_bg_phone"><img src="{{ asset('images/minishop_bg_phone2.png') }}" alt="" class="bg_phone"></div>
                            			<div class="wrap_button_play"><a href="" class="button_play">XEM</a></div>      
                            		</div>   
                            	</div>

                            </div>
                        </div>
                    </div>     
                </div>

            </div>                                  
            <!-- End Setting Minishop -->  

        </div>
    </div>    
</div>
@stop
@section('newpub_script')
@stop