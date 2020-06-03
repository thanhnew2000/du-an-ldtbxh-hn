@extends('layouts.admin')
@section('style')
<link href="{!! asset('tuyensinh/css/chitiettuyensinh.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content">
<div class="row">
    <h2>Tổng hợp sinh viên đang theo học</h2>
</div>
    <div class="row">
    <div class="col-md-12 pt-3 pr-0 pl-0">
        <div class="fillter-title">
            <h4>Bộ lọc</h4>
        </div>
        <div class="fillter-form">
            <form action="{{route('searchCoSoTongHopSoLieuTuyenSinh')}}" method="get">
                <div class="d-flex container pt-3">
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <label for="" class="fillter-name col-4">Tên cơ sở</label>
                        <select class="form-control col-8" name="co_so_id" id="">
                            <option value="" selected disabled>Chọn cơ sở</option>
                                {{-- @foreach ($data_co_so as $item)
                                    <option value="{{$item->id}}" >{{$item->ten}}</option>
                                @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Loại hình cơ sở</span>
                        <select class="form-control col-8" name="" id="">
                            <option value="" selected disabled>Chọn loại hình cơ sở</option>
                            <option>Công lập</option>
                            <option>Có vốn đầu tư nước ngoài</option>
                            <option>Tư thục</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex container pt-3">
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Năm</span>
                        <select class="form-control col-8" name="" id="">
                            <option value="" selected>Chọn</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Đợt</span>
                        <select class="form-control col-8" name="" id="">
                            <option value="" selected>Chọn</option>
                            <option value="1">Đợt 1</option>
                            <option value="2">Đợt 2</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between container pt-3 mb-5 col-3">
                    <button type="submit" class="btn btn-primary btn-fillter">Tìm kiếm</button>
                    <button type="submit" class="btn btn-danger btn-fillter">Hủy</button>
                </div>

            </form>
        </div>
        <div class="m-section ">
            <div class="m-section__content " style="overflow-x:auto" ;>
                <table class="table table-bordered thead-bluedark ">
                    <thead>
                        <tr class=" text-center ">
                            @csrf
                            <th rowspan="2">STT</th>
                            <th rowspan="2">Tên cơ sở đào tạo</th>
                            <th rowspan="2">Mã ngành nghề</th>
                            <th rowspan="2">Loại hình cơ sở</th>
                            <th colspan="3">Cao Đẳng</th>
                            <th colspan="3">Trung Cấp</th>
                            <th colspan="3">Sơ Cấp</th>
                            <th colspan="3">Khác</th>
                        </tr>
                        <tr class="pt-3 row2">
                            <th>Nữ</th>
                            <th>Hộ khẩu Hà Nội</th>
                            <th>Dân tộc thiểu số</th>
                            <th>Nữ</th>
                            <th>Hộ khẩu Hà Nội</>
                            <th>Dân tộc thiểu số</th>
                            <th>Nữ</th>
                            <th>Hộ khẩu Hà Nội</th>
                            <th>Dân tộc thiểu số</th>
                            <th>Nữ</th>
                            <th>Hộ khẩu Hà Nội</th>
                            <th>Dân tộc thiểu số</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($data as $item => $qlsv)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$qlsv->ten}}</td>
                            <td>{{$qlsv->nghe_id}}</td>
                            <td>{{$qlsv->loai_hinh_co_so}}</td>
                            <td>{{$qlsv->so_luong_sv_nu_Cao_dang}}</td>
                            <td>{{$qlsv->so_luong_sv_ho_khau_HN_Cao_dang}}</td>
                            <td>{{$qlsv->so_luong_sv_dan_toc_Cao_dang}}</td>
                            <td>{{$qlsv->so_luong_sv_nu_Trung_cap}}</td>
                            <td>{{$qlsv->so_luong_sv_ho_khau_HN_Trung_cap}}</td>
                            <td>{{$qlsv->so_luong_sv_dan_toc_Trung_cap}}</td>
                            <td>{{$qlsv->so_luong_sv_nu_So_cap}}</td>
                            <td>{{$qlsv->so_luong_sv_ho_khau_HN_So_cap}}</td>
                            <td>{{$qlsv->so_luong_sv_dan_toc_So_cap}}</td>
                            <td>{{$qlsv->so_luong_sv_nu_khac}}</td>
                            <td>{{$qlsv->so_luong_sv_ho_khau_HN_khac}}</td>
                            <td>{{$qlsv->so_luong_sv_dan_toc_khac}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <ul>
                    <li>{{ $data->links()}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
