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
        <form action="{{ route('account.them-quyen') }}" method="POST">
            @csrf
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên vai trò:</label>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control m-input" placeholder="Tên vai trò..."
                                        name="name">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

                <div class="m-portlet__body">
                    <h4>Quản lý tài khoản</h4>
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                        <input
                            type="checkbox"
                            onclick="checkbox([{!! implode(',', array_keys(config('permissions_setting.quan_ly_tai_khoan'))) !!}], this)"
                            id="ql_tk_check_all">Chọn/Hủy tất cả
                        <span></span>
                    </label>
                </div>
                <div class="m-portlet__body">
                    <h5>Quản lý tài khoản</h5>
                </div>
                <div class=" d-flex justify-content-around">
                    @foreach (config('permissions_setting.quan_ly_tai_khoan') as $key=> $item)
                    <div class="p-2 bd-highlight">
                        <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                            <input
                                type="checkbox"
                                class="chkboxname"
                                value="{{ $key }}"
                                id="cb_permission_{{ $key }}"
                                name="permissions[]">{{$item}}
                            <span></span>
                        </label>
                    </div>
                    @endforeach
                </div>
            
            <div class="m-portlet__body">
                <h4>Quản lý cơ sở đào tạo</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll1">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>

            <div class="m-portlet__body">
                <h5>Danh sách cơ sở đào tạo</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_co_so_dao_tao') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class="chkboxname" value="{{$key}}" name="permissions[]">{{$item}}
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
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>
            <div class="m-portlet__body">

                <h4>Quản lý ngành nghề</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>

            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_nganh_nghe') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý nhân sự</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Quản lý giáo viên</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_giao_vien') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
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
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
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
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý sinh viên đang theo học</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp sinh viên đang theo học</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_sv_dang_theo_hoc') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý chính sách</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp chính sách cho sinh viên</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_tong_hop_chinh_sach') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý kết quả tuyển sinh</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp kết quả tuyển sinh</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_tuyen_sinh') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý kết quả tốt nghiệp</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp kết quả tốt nghiệp</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_tot_nghiep') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp đăng ký chỉ tiêu tuyển sinh</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_dang_ky_chi_tieu') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý xây dựng chương trình giáo trình</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp xây dựng chương trình giáo trình</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_xay_dung_chuong_trinh_giao_trinh') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý đào tạo nghề</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Đào tạo nghề cho người khuyết tật</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_dao_tao_nghe_cho_nguoi_khuyet_tat') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h5>Đào tạo nghề cho thanh niên</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.quan_ly_dao_tao_nghe_cho_thanh_nien') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span class=" d-flex justify-start-around"></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h5>Kết quả tốt nghiệp đào tạo nghề <br> gắn với doanh nghiệp</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.ket_qua_tot_nghiep_dao_tao_nghe_voi_doanh_nghiep') as $key=>
                $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span class=" d-flex justify-content-around"></span>
                    </label>
                </div>
                @endforeach
            </div>

            
            <div class="m-portlet__body">
                <h5>Kết quả tuyển sinh, đào tạo nghề <br> gắn với doanh nghiệp</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.ket_qua_tot_nghiep_dao_tao_nghe_voi_doanh_nghiep') as $key=>
                $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span class=" d-flex justify-content-around"></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý liên kết</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp liên kết liên thông trình độ</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.tong_hop_lien_ket_lien_thong') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h5>Liên kết liên thông trình độ Cao Đẳng lên Đại Học</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.lien_ket_lien_thong_cao_dang_len_dai_hoc') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h5>Liên kết liên thông trình độ Trung Cấp lên Đại Học</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.lien_ket_lien_thong_trung_cap_len_dai_hoc') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý giáo dục nghề nghiệp</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp giáo dục nghề nghiệp</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.tong_hop_giao_duc_nghe_nghiep') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
                        <span></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="m-portlet__body">
                <h4>Quản lý tổng hợp, hợp tác quốc tế</h4>
                <label class="m-checkbox m-checkbox--air m-checkbox--state-brand mt-4">
                    <input type="checkbox" id="checkboxAll">Chọn/Hủy tất cả
                    <span></span>
                </label>
            </div>
            <div class="m-portlet__body">
                <h5>Tổng hợp, hợp tác quốc tế</h5>
            </div>
            <div class=" d-flex justify-content-around">
                @foreach (config('permissions_setting.tong_hop_hop_tac_quoc_te') as $key=> $item)
                <div class="p-2 bd-highlight">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                        <input type="checkbox" class='chkboxname' value="{{$key}}" name="permissions[]">{{$item}}
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
@section('script')
    <script src="jquery.min.js"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script> --}}

    <script type="text/javascript">
    //    $("#checkboxAll").change(function(){
    //        $(".chkboxname").prop("checked", $(this).prop("checked"))
    //    })
    //    $(".chkboxname").change(function(){
    //        if($(this).prop("checked")==false){
    //            $("#checkboxAll").prop("checked", false)
    //        }
    //        if($(".chkboxname:checked").length == $(".chkboxname").length){
    //            $("#checkboxAll").prop("checked", true)
    //        }
    //    })
        function checkbox(listId, element) {
            const isCheck = $(element).prop("checked");
            listId.forEach(element => {
                if (isCheck) {
                    $("#cb_permission_" + element).attr('checked', isCheck);
                } else {
                    $("#cb_permission_" + element).removeAttr('checked').trigger('change');
                }
            })
        }
    </script>
@endsection