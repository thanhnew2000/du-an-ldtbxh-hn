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
                            <th rowspan="2">Năm</th>
                            <th rowspan="2">Đợt</th>
                            <th rowspan="2">Nghề</th>
                            <th rowspan="2">Kế hoạch tuyển sinh</th>
                            <th colspan="4">Kết quả tuyển sinh nữ</th>
                            <th colspan="4">Kết quả tuyển sinh <br> dân tộc thiểu số </th>
                            <th colspan="4">Kết quả tuyển sinh <br> hộ khẩu Hà Nội</th>
                            <th rowspan="2">Thao tác</th>
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
                        @php
                        $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1);
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                        <td>{{$i++}}</td>
                            <td>{{$item->ten}}</td>
                            <td>{{$item->loai_hinh_co_so}}</td>
                            <td>{{$item->nam}}</td>
                            <td>{{$item->dot}}</td>
                            <td>{{$item->nghe_id}}</td>
                            <td>{{$item->tong_so_tuyen_sinh}}</td>
                            <td>{{$item->so_luong_sv_nu_Cao_dang}}</td>
                            <td>{{$item->so_luong_sv_nu_Trung_cap}}</td>
                            <td>{{$item->so_luong_sv_nu_So_cap}}</td>
                            <td>{{$item->so_luong_sv_nu_khac}}</td>
                            <td>{{$item->so_luong_sv_dan_toc_Cao_dang}}</td>
                            <td>{{$item->so_luong_sv_dan_toc_Trung_cap}}</td>
                            <td>{{$item->so_luong_sv_dan_toc_So_cap}}</td>
                            <td>{{$item->so_luong_sv_dan_toc_khac}}</td>
                            <td>{{$item->so_luong_sv_ho_khau_HN_Cao_dang}}</td>
                            <td>{{$item->so_luong_sv_ho_khau_HN_Trung_cap}}</td>
                            <td>{{$item->so_luong_sv_ho_khau_HN_So_cap}}</td>
                            <td>{{$item->so_luong_sv_ho_khau_HN_khac}}</td>
                            <td>
                                @if ($item->trang_thai<3)
                                <a href="{{route('suasolieutuyensinh',['id'=>$item->id])}}">Sửa</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <div class="row phantrang">
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
