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
        <form action="{{ route('account.sua-quyen',['id'=>$role->id]) }}" method="POST">
            @csrf
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên vai trò:</label>
                                <div class="col-lg-12">
                                    <input type="text" value="{{ $role->name }}" class="form-control m-input"
                                        placeholder="Tên vai trò..." name="name">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="m-portlet">
                <div class="m-portlet__body">

                    <h4>Quản lý tài khoản</h4>
                    <button class="btn btn-info ">Chọn tất cả</button>
                    <button class="btn btn-danger ">Hủy tất cả</button>
                </div>
                <div class="m-portlet__body">
                    <h5>Quản lý tài khoản</h5>
                </div>
                <div class=" d-flex justify-content-around">
                    @foreach (config('permissions_setting.quan_ly_tai_khoan') as $key=> $item)
                    <div class="p-2 bd-highlight">
                        <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                            <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                                @endforeach value="{{$key}}" name="permissions[]">
                            {{$item}}
                            <span></span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="m-portlet__body">
                <h4>Quản lý cơ sở đào tạo</h4>
                <button class="btn btn-info ">Chọn tất cả</button>
                <button class="btn btn-danger ">Hủy tất cả</button>
            </div>

            <div class="m-portlet__body">
                <h5>Danh sách cơ sở đào tạo</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_co_so_dao_tao') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h5>Danh sách địa điểm đào tạo</h5>
            </div>

            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_dia_diem_dao_tao') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>
            <div class="m-portlet__body">

                <h4>Quản lý ngành nghề</h4>
                <button class="btn btn-info ">Chọn tất cả</button>
                <button class="btn btn-danger ">Hủy tất cả</button>
            </div>

            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_nganh_nghe') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý nhân sự</h4>
                <button class="btn btn-info ">Chọn tất cả</button>
                <button class="btn btn-danger ">Hủy tất cả</button>
            </div>
            <div class="m-portlet__body">
                <h5>Quản lý giáo viên</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_giao_vien') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h5>Danh sách đội ngũ nhà giáo</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_doi_ngu_nha_giao') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h5>Danh sách đội ngũ quản lý</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.doi_ngu_quan_ly') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý sinh viên đang theo học</h4>
                <button class="btn btn-info ">Chọn tất cả</button>
                <button class="btn btn-danger ">Hủy tất cả</button>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp sinh viên đang theo học</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_sv_dang_theo_hoc') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý chính sách</h4>
                <button class="btn btn-info ">Chọn tất cả</button>
                <button class="btn btn-danger ">Hủy tất cả</button>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp chính sách cho sinh viên</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_tong_hop_chinh_sach') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý kết quả tuyển sinh</h4>
                <button class="btn btn-info ">Chọn tất cả</button>
                <button class="btn btn-danger" value="" name="">Hủy tất cả</button>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp kết quả tuyển sinh</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_tuyen_sinh') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý kết quả tốt nghiệp</h4>
                <button class="btn btn-info ">Chọn tất cả</button>
                <button class="btn btn-danger ">Hủy tất cả</button>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp kết quả tốt nghiệp</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_tot_nghiep') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" @foreach ($dataRole as $item1) {{$item1==$key ?  'checked': ''}}
                            @endforeach value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__foot d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Lưu thông tin</button>
                <button type="submit" class="btn btn-danger mx-2">Hủy bỏ</button>
            </div>
    </div>
    </form>
</div>
@endsection