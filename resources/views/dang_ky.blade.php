@extends('layouts.admin')
@section('title', "Đăng kí tài khoản")
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
									<form class="m-form m-form--fit m-form--label-align-right">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Email</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" placeholder="Nhập email" id="example-text-input">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Số điện thoại</label>
												<div class="col-10">
													<input class="form-control m-input" type="text" placeholder="Nhập số điện thoại" id="example-text-input">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-search-input" class="col-2 col-form-label">Mật khẩu</label>
												<div class="col-10">
													<input class="form-control m-input" type="password" placeholder="Nhập mật khẩu" id="example-search-input">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-email-input" class="col-2 col-form-label">Nhập lại mật khẩu</label>
												<div class="col-10">
													<input class="form-control m-input" type="password" placeholder="Nhập lại mật khẩu" id="example-email-input">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-url-input" class="col-2 col-form-label">Ảnh đại diên</label>
									<div class="col-10">
													<input type="file" class="form-control m-input" id="customFile">
												
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<div class="row">
													<div class="col-2">
													</div>
													<div class="col-10">
														<button type="reset" class="btn btn-success">Đăng ký tài khoản</button>
														<button type="reset" class="btn btn-secondary">Hủy</button>
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