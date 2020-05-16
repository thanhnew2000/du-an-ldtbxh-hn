@extends('layouts.admin')
@section('title', "Đăng kí tài khoản")
@section('style')
<style type="text/css">
	.error{
		color: red;
	}
</style>
@endsection  
@section('content')
<div class="m-content">
	<div class="row">
		<div class="col-md-8 mx-auto">


								<!--begin::Portlet-->
								<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Đăng ký tài khoản mới
												</h3>
											</div>
										</div>
									</div>

									<!--begin::Form-->
									<form id="validate-dangky" method="post" action="{{ route('dangkytaikhoan') }}" class="m-form m-form--fit m-form--label-align-right"  enctype="multipart/form-data">
										{{ csrf_field() }} 
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Email</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" placeholder="Nhập email" id="example-text-input" name="email">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Số điện thoại</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" placeholder="Nhập số điện thoại" name="phone">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Họ và tên</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" placeholder="Vui lòng nhập họ tên" name="name">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-search-input" class="col-2 col-form-label">Mật khẩu</label>
												<div class="col-10">
													<input id="password" class="form-control m-input" type="password" placeholder="Nhập mật khẩu" name="password">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-email-input" class="col-2 col-form-label">Nhập lại mật khẩu</label>
												<div class="col-10">
													<input class="form-control m-input" type="password" placeholder="Nhập lại mật khẩu" name="password_confirm">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-url-input" class="col-2 col-form-label">Ảnh đại diên</label>
									<div class="col-10">
													<input type="file" name="image" class="form-control m-input" id="customFile">
												
												</div>
											</div>
											@if (session('thongbao'))
										<div class="thongbao" style="color: green; text-align: center;">
											{{session('thongbao')}}
										</div>
										@endif
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<div class="row">
													<div class="col-2">
													</div>
													<div class="col-10">
														<button type="submit" class="btn btn-success">Đăng ký tài khoản</button>
														<!-- <button type="reset" class="btn btn-secondary">Hủy</button> -->
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>

								<!--end::Portlet-->
							</div>
	</div>
</div>
@endsection
@section('script') 
<script type="text/javascript">
	$(document).ready(function() {
        $("#validate-dangky").validate({
            rules: {
                email: {
                	required: true,
      				email: true,
			    	remote: {
			    		headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    },
				        url: "{{ route('check-email') }}",
				        type: "post",
				        data: {
				        	_token: '{{csrf_token()}}',
				            name: function() {
				                return $( "input[name='email']" ).val();
				            }
				        }
				    }
                },
                phone:{
                	required: true,
      				number: true,
      				minlength:10,
      				maxlength:10,
  					remote: {
			    		headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    },
				        url: "{{ route('check-phone') }}",
				        type: "post",
				        data: {
				        	_token: '{{csrf_token()}}',
				            name: function() {
				                return $( "input[name='phone']" ).val();
				            }
				        }
				    }
                },
                name: {
                    required: true,
                    minlength: 6,
                    maxlength: 30
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 25
                },
                password_confirm: {
			      equalTo: "#password"
			    },
			    image: {
                    extension: "jpg|png|jpeg|gif"
                }
            },
            messages: {
                email: {
                	required: "Vui lòng nhập địa chỉ email",
                	email: "Vui lòng nhập đúng định dạng email",
                	remote: "Địa chỉ email đã tồn tại"
                },
                phone: {
                	required: "Vui lòng nhập số điện thoại",
                	number: "Vui lòng nhập số",
                	minlength: "Số điện thoại phải nhập 10 ký tự",
                    maxlength: "Số điện thoại phải nhập 10 ký tự",
                    remote: "Số điện thoại đã tồn tại"
                },
                name: {
                    required: "Vui lòng nhập họ tên",
                    minlength: "Họ tên ít nhất 6 ký tự",
                    maxlength: "Họ tên không được vượt quá 40 ký tự"
                },
                password: {
                    required: "Vui lòng nhập địa chỉ",
                    minlength: "Mật khẩu ít nhất 6 ký tự",
                    maxlength: "Mật khẩu không được lớn hơn 25 ký tự"
                },
                password_confirm: {
                	equalTo: "Mật khẩu bạn nhập lại không giống nhau"
                },
                 image: {
                    extension: "Hãy chọn file định dạng ảnh (jpg|png|jpeg|gif)"
                }
                
            }
        });
    });
</script>

@endsection   