@extends('layouts.admin')
@section('title', "Chi tiết số liệu tuyển sinh")
@section('style')
{{-- <link href="{!! asset('tuyensinh/css/chitiettuyensinh.css') !!}" rel="stylesheet" type="text/css" /> --}}
<style>
    .m-table.m-table--border-danger, .m-table.m-table--border-danger th, .m-table.m-table--border-danger td{
        border-color: #bcb1b1 ;
    } 
    table thead th[colspan="2"],th[colspan="3"],th[colspan="4"],th[colspan="5"]
    ,th[colspan="6"],th[colspan="7"],th[colspan="8"]{
        border-bottom-width:1px;
        border-bottom: 1px solid #bcb1b1 !important;
    }
</style>
@endsection
@section('content')
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Chi tiết <small>Thông tin tuyển sinh</small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <h3>Cơ sở đào tạo: {{$thongtincoso->ten}}</h3>
            <p>Loại hình cơ sở: {{$thongtincoso->loai_hinh_co_so}}</p>
            <p>Địa chỉ: {{$thongtincoso->dia_chi}}</p>
            <p>Phường/Xã: {{$thongtincoso->ten_xa_phuong}}</p>
            <p>Quận/Huyện: {{$thongtincoso->ten_quan_huyen}}</p>
        </div>
    </div>

    <div class="m-portlet">
        <form action="" method="get" class="m-form">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="nam" id="nam">
                                        <option value="" selected >Chọn</option>
                                        @foreach (config('common.nam_tuyen_sinh.list') as $item)
                                        <option 
                                        @if (isset($params['nam']))
                                                {{( $params['nam'] ==  $item ) ? 'selected' : ''}}  
                                                @endif
                                                value="{{$item}}"> {{$item}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="dot" id="dot">
                                        <option value="" >Chọn</option>
                                        <option
                                        @if (isset($params['dot']))
                                            {{( $params['dot'] ==  1 ) ? 'selected' : ''}}  
                                        @endif
                                        value="1" >Đợt 1</option>
                                        <option value="2"
                                        @if (isset($params['dot']))
                                        {{( $params['dot'] ==  2 ) ? 'selected' : ''}}  
                                        @endif
                                        >Đợt 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body " style="overflow-x:auto;">
            <table style="width: 280%;" class="table table-bordered m-table m-table--border-danger m-table--head-bg-primary table-responsive">
                <thead>
                    <tr class=" text-center ">
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Năm</th>
                        <th rowspan="2">Đợt</th>
                        <th rowspan="2">Mã nghề</th>
                        <th rowspan="2">Tên nghề</th>
                        <th colspan="3">Trong đó</th>
                        <th colspan="7">Trình độ Cao đẳng</th>
                        <th colspan="2">Số người có việc làm <br> ngay sau khi tốt nghiệp </th>
                        <th colspan="2">Mức lương trung bình</th>
                        <th colspan="8">Trình độ trung cấp</th>
                        <th colspan="3">Số người có việc làm <br> ngay sau khi tốt nghiệp</th>
                        <th colspan="2">Mức lương trung bình</th>
                        <th colspan="6">Trình độ sơ cấp</th>
                        <th colspan="2">Số người có việc làm <br> ngay sau khi tốt nghiệp</th>
                        <th colspan="2">Mức lương trung bình</th>
                        <th colspan="6">Trình độ đào tạo khác</th>
                        <th colspan="2">Số người có việc làm <br> ngay sau khi tốt nghiệp</th>
                        <th colspan="2">Mức lương trung bình</th>  
                        <th rowspan="2">Thao tác</th>    
                    </tr>
                    <tr class="pt-3 row2">
                        {{-- start trong đó --}}
                        <th>Nữ</th>
                        <th>Dân tộc thiểu số ít người</th>
                        <th>Hộ khẩu Hà Nội</th>
                        {{-- end trong đó --}}

                         {{-- start trình độ cao đẳng --}}
                        <th>Số SV nhập học đầu khóa</th>
                        <th>Số SV đủ điều kiện thi xét TN</th>
                        <th>Số SV tốt nghiệp</th>
                        <th>Nữ</th>
                        <th>Dân tộc thiểu số ít người</th>
                        <th>Hộ khẩu Hà Nội</th>
                        <th>Số HSSV tốt nghiệp khá giỏi</th>
                         {{-- end trình độ cao đẳng --}}

                         {{-- start việc làm tốt nghiệp --}}
                        <th>Tổng số</th>
                        <th>Hộ khẩu Hà Nội</th>
                        {{-- end việc làm tốt nghiệp --}}

                         {{-- start mức lương tb --}}
                         <th>Tổng số</th>
                         <th>Hộ khẩu Hà Nội</th>
                         {{-- end mức lương tb --}}

                         {{-- start Trình độ trung cấp --}}
                         <th>Số SV nhập học đầu khóa</th>
                         <th>Số SV đủ điều kiện thi xét TN</th>
                         <th>Số SV tốt nghiệp</th>
                         <th>Nữ</th>
                         <th>Dân tộc thiểu số ít người</th>
                         <th>Hộ khẩu Hà Nội</th>
                         <th>Hộ khẩu HN thuộc đối tượng tốt nghiệp THCS</th>
                         <th>Số HSSV tốt nghiệp khá giỏi</th>
                         {{-- end Trình độ trung cấp --}}

                         {{-- start việc làm tốt nghiệp --}}
                        <th>Tổng số</th>
                        <th>Tổng số hộ khẩu HN trình độ TC</th>
                        <th>Hộ khẩu HN thuộc đối tượng tốt nghiệp THCS</th>
                        {{-- end việc làm tốt nghiệp --}}

                        {{-- start mức lương tb --}}
                        <th>Tổng số</th>
                        <th>Hộ khẩu Hà Nội</th>
                        {{-- end mức lương tb --}}

                         {{-- start Trình độ sơ cấp --}}
                         <th>Số SV nhập học đầu khóa</th>
                         <th>Số SV đủ điều kiện thi xét TN</th>
                         <th>Số SV tốt nghiệp</th>
                         <th>Nữ</th>
                         <th>Dân tộc thiểu số ít người</th>
                         <th>Hộ khẩu Hà Nội</th>
                         {{-- end Trình độ sơ cấp --}}

                         {{-- start việc làm tốt nghiệp --}}
                        <th>Tổng số</th>
                        <th>Hộ khẩu Hà Nội</th>
                        {{-- end việc làm tốt nghiệp --}}

                         {{-- start mức lương tb --}}
                         <th>Tổng số</th>
                         <th>Hộ khẩu Hà Nội</th>
                         {{-- end mức lương tb --}}

                         {{-- start Trình độ sơ cấp --}}
                         <th>Số SV nhập học đầu khóa</th>
                         <th>Số SV đủ điều kiện thi xét TN</th>
                         <th>Số SV tốt nghiệp</th>
                         <th>Nữ</th>
                         <th>Dân tộc thiểu số ít người</th>
                         <th>Hộ khẩu Hà Nội</th>
                         {{-- end Trình độ sơ cấp --}}

                           {{-- start việc làm tốt nghiệp --}}
                        <th>Tổng số</th>
                        <th>Hộ khẩu Hà Nội</th>
                        {{-- end việc làm tốt nghiệp --}}

                         {{-- start mức lương tb --}}
                         <th>Tổng số</th>
                         <th>Hộ khẩu Hà Nội</th>
                         {{-- end mức lương tb --}}



                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1);
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->nam}}</td>
                        <td>{{$item->dot}}</td>
                        <td>{{$item->nghe_id}}</td>
                        <td>{{$item->ten_nganh_nghe}}</td>
                        <td>{{$item->NU_SV_TN}}</td>
                        <td>{{$item->DanToc_ThieuSo_ItNguoi}}</td>
                        <td>{{$item->HoKhauHN}}</td>
                        <td>{{$item->SoSV_NhapHoc_DauKhoa_TrinhDoCD}}</td>
                        <td>{{$item->SoSV_Du_DieuKienThi_XetTN_TrinhDoCD}}</td>
                        <td>{{$item->SoSV_TN_TrinhDoCD}}</td>
                        <td>{{$item->SoLuong_Nu_SV_CD}}</td>
                        <td>{{$item->DanToc_ThieuSo_ItNguoi_CD}}</td>
                        <td>{{$item->SoSV_HoKhauHN_CD}}</td>
                        <td>{{$item->SoLuong_HSSV_TN_Kha_Gioi_CD}}</td>
                        <td>{{$item->SoNguoi_CoViecLamNgay_SauKhi_TN_CD}}</td>
                        <td>{{$item->CoViecLam_HoKhauHN_TrinhDoCD}}</td>
                        <td>{{$item->MucLuong_TB_CD}}</td>
                        <td>{{$item->MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoCD}}</td>
                        <td>{{$item->SoSV_NhapHoc_DauKhoa_TrinhDoTC}}</td>
                        <td>{{$item->SoSV_Du_DieuKienTHhi_XetTN_TrinhDoTC}}</td>
                        <td>{{$item->SoSV_TN_TrinhDoTC}}</td>
                        <td>{{$item->SoLuong_Nu_SV_TC}}</td>
                        <td>{{$item->DanToc_ThieuSo_ItNguoi_TC}}</td>
                        <td>{{$item->SoSV_HoKhauHN_TC}}</td>
                        <td>{{$item->HoKhau_HN_Thuoc_DoiTuong_TN_TC}}</td>
                        <td>{{$item->SoLuong_HSSV_TN_Kha_Gioi_TC}}</td>
                        <td>{{$item->SoNguoiHoc_CoViecLamNgay_SauKhi_TN_TrinhDoTC}}</td>
                        <td>{{$item->CoViecLam_HoKhauHN_TrinhDo_TC}}</td>
                        <td>{{$item->SV_CoViecLam_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoTC}}</td>
                        <td>{{$item->MucLuong_TB_TC}}</td>
                        <td>{{$item->MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoTC}}</td>
                        <td>{{$item->SoSV_NhapHoc_DauKhoa_TrinhDoSC}}</td>
                        <td>{{$item->SoSV_Du_DieuKienThi_XetTN_TrinhDoSC}}</td>
                        <td>{{$item->SoSV_TN_TrinhDoSC}}</td>
                        <td>{{$item->SoLuong_Nu_SV_SC}}</td>
                        <td>{{$item->DanToc_ThieuSo_ItNguoi_TC}}</td>
                        <td>{{$item->SoSV_HoKhauHN_SC}}</td>
                        <td>{{$item->SoNguoiHoc_CoViecLamNgay_SauKhi_TN_TrinhDoSC}}</td>
                        <td>{{$item->SoLuong_HoKhauHN_TrinhDoSC}}</td>
                        <td>{{$item->MucLuong_TB_SC}}</td>
                        <td>{{$item->MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoSC}}</td>
                        <td>{{$item->SoSV_NhapHoc_DauKhoa_NgheKhac}}</td>
                        <td>{{$item->SoSV_DuKienThi_XetTN_NgheKhac}}</td>
                        <td>{{$item->SoSV_TN_NgheKhac}}</td>
                        <td>{{$item->SoLuong_Nu_SV_NgheKhac}}</td>
                        <td>{{$item->DanToc_ThieuSo_ItNguoi_NgheKhac}}</td>
                        <td>{{$item->SoNguoi_HoKhauHN_NgheKhac}}</td>
                        <td>{{$item->SoNguoiHoc_CoViecLamNgay_SauKhi_TN_DaoTao_NgheKhac}}</td>
                        <td>{{$item->SoNguoi_HoKhauHN_TrinhDo_DaoTao_NgheKhac}}</td>
                        <td>{{$item->MucLuong_TB_NgheKhac}}</td>
                        <td>{{$item->MucLuong_TB_HoKhauHN_TrinhDoTC_ThuocDT_TN_THCS_TrinhDoNgheKhac}}</td>
                        <td>
                            @if ($item->trang_thai<3) <a href="{{route('suasolieutuyensinh',['id'=>$item->id])}}">
                                Sửa</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                  
                    </tr> 
                </tbody>
            </table>
        </div>
        @if (session('thongbao'))
        <div class="thongbao" style="color: green; text-align: center;">
          {{session('thongbao')}}
        </div>
        @endif
        <div class="m-portlet__foot d-flex justify-content-end">
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection