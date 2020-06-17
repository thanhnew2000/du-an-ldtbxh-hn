@extends('layouts.admin')
@section('content')
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-layers"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Thêm vai trò
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            <input type="hidden" name="page_size" value="">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên vai trò:</label>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control m-input" placeholder="Tên vai trò..."
                                        name="keyword">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </form>
    </div>

    <div class="m-portlet">
        <div class="m-portlet__body">

            <h4>Quản lý tài khoản</h4>
            <button class="btn btn-info ">Chọn tất cả</button>
            <button class="btn btn-danger ">Hủy tất cả</button>
        </div>

        <div class=" d-flex justify-content-around">

            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Thêm tài khoản
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Sửa tài khoản
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Vô hiệu tài khoản
                    <span></span>
                </label>
            </div>


        </div>
        <div class="m-portlet__body">

            <h4>Quản lý cơ sở đào tạo</h4>
            <button class="btn btn-info ">Chọn tất cả</button>
            <button class="btn btn-danger ">Hủy tất cả</button>
        </div>

        <div class=" d-flex justify-content-around">

            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Thêm mới cơ sở
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Chi tiết cơ sở
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Cập nhập cơ sở
                    <span></span>
                </label>
            </div>


        </div>
        <div class=" d-flex justify-content-around">

            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Thêm mới chi nhánh
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Cập nhật chi nhánh
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Xóa chi nhánh
                    <span></span>
                </label>
            </div>


        </div>
        <div class="m-portlet__body">

            <h4>Quản lý ngành nghề</h4>
            <button class="btn btn-info ">Chọn tất cả</button>
            <button class="btn btn-danger ">Hủy tất cả</button>
        </div>

        <div class=" d-flex justify-content-around">

            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Brand state
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Brand state
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Brand state
                    <span></span>
                </label>
            </div>


        </div>
        <div class=" d-flex justify-content-around">

            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Brand state
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Brand state
                    <span></span>
                </label>
            </div>
            <div class="p-2 bd-highlight">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                    <input type="checkbox"> Brand state
                    <span></span>
                </label>
            </div>


        </div>
        <div class="m-portlet__foot d-flex justify-content-end">
            <button class="btn btn-success">Lưu thông tin</button>
            <button class="btn btn-danger mx-2">Hủy bỏ</button>
        </div>
    </div>
</div>
@endsection