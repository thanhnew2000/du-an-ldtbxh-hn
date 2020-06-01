@extends('layouts.admin')
@section('title', "Chi tiết số liệu tuyển sinh")
@section('style')
<link href="{!! asset('tuyensinh/css/chitiettuyensinh.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content">
<div class="row">
    <h2>Chi tiết tuyển sinh</h2>
</div>
    <div class="row">
    <div class="col-md-12 pt-3 ">
        <div class="m-section ">
            <div class="m-section__content " style="overflow-x:auto" ;>
                <table class="table table-bordered thead-bluedark ">
                    <thead>
                        <tr class=" text-center ">
                            <th rowspan="2">STT</th>
                            <th rowspan="2">Tên cơ sở đào tạo</th>
                            <th rowspan="2">Loại hình cơ sở</th>
                            <th rowspan="2">Kế hoạch tuyển sinh</th>
                            <th colspan="4">Kết quả tuyển sinh nữ</th>
                            <th colspan="4">Kết quả tuyển sinh <br> dân tộc thiểu số </th>
                            <th colspan="4">Kết quả tuyển sinh <br> hộ khẩu Hà Nội</th>
                        </tr>
                        <tr class="pt-3 row2">
                            <th>CĐ</th>
                            <th>TC</th>
                            <th>SC</th>
                            <th>Khác</th>
                            <th>CĐ</th>
                            <th>TC</th>
                            <th>SC</th>
                            <th>Khác</th>
                            <th>CĐ</th>
                            <th>TC</th>
                            <th>SC</th>
                            <th>Khác</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{$data->ten}}</td>
                            <td>{{$data->loai_hinh_co_so}}</td>
                            <td>{{$data->tong_so_tuyen_sinh}}</td>
                            <td>{{$data->so_luong_sv_nu_Cao_dang}}</td>
                            <td>{{$data->so_luong_sv_nu_Trung_cap}}</td>
                            <td>{{$data->so_luong_sv_nu_So_cap}}</td>
                            <td>{{$data->so_luong_sv_nu_khac}}</td>
                            <td>{{$data->so_luong_sv_dan_toc_Cao_dang}}</td>
                            <td>{{$data->so_luong_sv_dan_toc_Trung_cap}}</td>
                            <td>{{$data->so_luong_sv_dan_toc_So_cap}}</td>
                            <td>{{$data->so_luong_sv_dan_toc_khac}}</td>
                            <td>{{$data->so_luong_sv_ho_khau_HN_Cao_dang}}</td>
                            <td>{{$data->so_luong_sv_ho_khau_HN_Trung_cap}}</td>
                            <td>{{$data->so_luong_sv_ho_khau_HN_So_cap}}</td>
                            <td>{{$data->so_luong_sv_ho_khau_HN_khac}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
