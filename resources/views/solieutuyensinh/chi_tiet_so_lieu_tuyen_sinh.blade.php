@extends('layouts.admin')
@section('title', "Chi tiết số liệu tuyển sinh")
@section('style')
<link href="{!! asset('styletuyensinh/chitiettuyensinh.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content">
    <section class="fillter-area  mb-5">
        <div class="fillter-title">
            <h4>Bộ lọc</h4>
        </div>
        <div class="fillter-form">
            <form action="">
                <div class="d-flex container pt-3">
                    <div class="form-group col-6 d-flex justify-content-around align-items-center">
                        <label for="" class="fillter-name col-4">Tên cơ sở</label>
                        <select class="form-control col-8" name="" id="">
                            <option value="" selected disabled>Chọn cơ sở</option>
                            <option>FPT Polytecnic</option>
                            <option>Cao Đẳng du lịch</option>
                            <option>Cao đẳng bách khoa</option>
                        </select>
                    </div>

                    <div class="form-group col-6 d-flex justify-content-around align-items-center">
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
                    <div class="form-group col-6 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Mã ngành nghề</span>
                        <select class="form-control col-8" name="" id="">
                            <option value="" selected disabled>Mã đơn vị</option>
                            <option>Công lập</option>
                            <option>Có vốn đầu tư nước ngoài</option>
                            <option>Tư thục</option>
                        </select>
                    </div>
                </div>
       

                <div class="d-flex justify-content-between container pt-3 mb-5 col-3">
                    <button type="submit" class="btn btn-primary btn-fillter">Tìm kiếm</button>
                    <button type="submit" class="btn btn-danger btn-fillter">Hủy</button>
                </div>

            </form>
        </div>
    </section>
    <div class="row mb-5 bieumau">
        <div class="col-lg-2">
            <a href=""><i class="la la-download">Tải xuống biểu mẫu</i></a>
        </div>
        <div class="col-lg-2">
            <a href=""><i class="la la-upload">Tải lên file excel</i></a>
        </div>
        <div class="col-lg-8 " style="text-align: right">
        <a href="{{route('themsolieutuyensinh')}}"><button type="button" class="btn btn-secondary">Thêm mới</button></a> 
        </div>
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
