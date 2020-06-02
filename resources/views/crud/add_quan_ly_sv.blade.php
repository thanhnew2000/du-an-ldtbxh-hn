@extends('layouts.admin')
@section('content')
@section('style')
@endsection
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="title mb-4">
            <h4>Thêm Mới Số Liệu Sinh Viên</h4>
        </div>

    <div class="fillter-form">
        <form method="POST" action="{{route('xuatbc.them-so-sv')}}">
                <div class="d-flex container pt-3">
                    <div class="form-group col-6 d-flex justify-content-around align-items-center">
                        <label for="" class="fillter-name col-3">Tên Cơ Sở</label>
                        <select  class="form-control col-7" name="co_so_id" id="">
                            <option selected >Chọn cơ sở</option>
                            <option value="4">Mississippi</option>
                            <option value="2">Indiana</option>
                            <option value="8">Minnesota</option>
                        </select>
                    </div>

                    <div class="form-group col-6 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-3">Nghề</span>
                        <select class=" form-control col-7 " name="nghe_id" id="">
                            <option value=" " selected>Chọn loại hình cơ sở</option>
                            <option value="5210101">Kỹ thuật điêu khắc gỗ</option>
                            <option value="5210102">Điêu khắc</option>
                            <option value="5210103">Hội họa</option>
                        </select>
                    </div>
                </div>
            </div>
          
        <section class="container pt-3 ">
            <div class="m-section ">
                <div class="m-section__content ">
                    <table class="table table-bordered thead-bluedark " style="width: 100%; ">
                        @csrf
                        <thead>
                            <tr class=" text-center ">
                                <th>#</th>
                                <th>Cao Đẳng</th>
                                <th>Trung Cấp</th>
                                <th>Sơ Cấp</th>
                                <th>Khác</th>
                                </tr>
                            </thead>
                        <tbody>
                            <tr>
                                <td>Tổng số nữ</td>
                                <td><input required min="0" step="1" name="so_luong_sv_nu_Cao_dang" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_nu_Trung_cap" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_nu_So_cap" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_nu_khac" type="number"></td>
                            </tr>
                            <tr>
                                <td>Tổng số dân tộc thiểu số ít người</td>
                                <td><input required min="0" step="1" name="so_luong_sv_dan_toc_Cao_dang" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_dan_toc_Trung_cap" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_dan_toc_So_cap" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_dan_toc_khac" type="number"></td>
                            </tr>
                            <tr>
                                <td>Tổng số hộ khẩu Hà Nội</td>
                                <td><input required min="0" step="1" name="so_luong_sv_ho_khau_HN_Cao_dang" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_ho_khau_HN_Trung_cap" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_ho_khau_HN_So_cap" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_ho_khau_HN_khac" type="number"></td>
                            </tr>
                            <tr>
                                <td>Tổng số</td>
                                <td><input required min="0" step="1" name="so_luong_sv_Cao_dang" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_Trung_cap" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_So_cap" type="number"></td>
                                <td><input required min="0" step="1" name="so_luong_sv_he_khac" type="number"></td>
                            </tr>
                        </tbody>
                    </table>
                <div class="d-flex justify-content-center mr-5 ">
                    <button type="submit" class="btn btn-danger btn-fillter ml-5">Hủy</button>
                    <button type="submit" class="btn btn-primary btn-fillter ml-5">Thêm</button>
                </div>
            </div>
        </div>
    </section>
        </form>
    </div>
</div>
@endsection
