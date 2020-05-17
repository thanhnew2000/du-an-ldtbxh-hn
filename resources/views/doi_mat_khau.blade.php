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
													Đổi mật khẩu
												</h3>
											</div>
										</div>
									</div>

									<!--begin::Form-->
									<form id="validate-dangky" method="post" action="{{ route('doimatkhau') }}" class="m-form m-form--fit m-form--label-align-right"  enctype="multipart/form-data">
										{{ csrf_field() }} 
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Email</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" placeholder="Nhập email" id="example-text-input" disabled name="email" value="{{$email}}">
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
														<button type="submit" class="btn btn-success">Đổi mật khẩu</button>
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

                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 25
                },
                password_confirm: {
			      equalTo: "#password"
			    }
            },
            messages: {
                password: {
                    required: "Vui lòng nhập địa chỉ",
                    minlength: "Mật khẩu ít nhất 6 ký tự",
                    maxlength: "Mật khẩu không được lớn hơn 25 ký tự"
                },
                password_confirm: {
                	equalTo: "Mật khẩu bạn nhập lại không giống nhau"
                }
                
            }
        });
    });
</script>

@endsection   