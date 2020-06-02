@extends('layouts.admin')
@section('title', "Tổng hợp số liệu tuyển sinh")
@section('style')
<link href="{!! asset('tuyensinh/css/showtuyensinh.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content">
    <section class="fillter-area  mb-5">
        <div class="fillter-title">
            <h4>Bộ lọc</h4>
        </div>
        <div class="fillter-form">
            <form action="{{route('solieutuyensinh')}}" method="get">
                <div class="d-flex container pt-3">
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <label for="" class="fillter-name col-4">Tên cơ sở</label>
                        
                        <select class="form-control col-8" name="co_so_id" id="co_so_id">
                            <option value="" selected>Chọn cơ sở</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}" >{{$item->ten}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Loại hình cơ sở</span>
                        <select class="form-control col-8" name="loai_hinh" id="loai_hinh">
                            <option value="0" selected>Chọn loại hình cơ sở</option>
                            @foreach($loaiHinh as $item)
                                <option value="{{ $item->id }}">{{ $item->loai_hinh_co_so }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex container pt-3">
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Năm</span>
                        <select class="form-control col-8" name="nam" id="nam">
                            <option value="" selected disabled>Chọn</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Đợt</span>
                        <select class="form-control col-8" name="dot" id="dot">
                            <option value="" selected disabled>Chọn</option>
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
        <div class="col-lg-12 scoll-x">
        <table class="table">
            <thead >
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên cơ sở đào tạo</th>
                <th scope="col">Loại hình cơ sở</th>
                <th scope="col">Kết quả tuyển sinh <br> Cao Đẳng</th>
                <th scope="col">Kết quả tuyển sinh <br> Trung Cấp</th>
                <th scope="col">Kết quả tuyển sinh <br> Sơ Cấp</th>
                <th scope="col">Kết quả tuyển sinh <br> Khác</th>
                <th scope="col">Kết quả tuyển sinh</th>
                <th scope="col">Kế hoạch tuyển sinh</th>
                <th scope="col">Trạng thái</th>
                <!-- <th scope="col">Chỉnh sửa</th> -->
                <th scope="col" colspan="2">Thao tác</th>
              </tr>
            </thead>
            <tbody>
            @php
            $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1);
            @endphp
                @foreach ($data as $item)               
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$item->ten}}</td>
                    <td>{{$item->loai_hinh_co_so}}</td>
                    <td>{{$item->so_luong_sv_Cao_dang}}</td>
                    <td>{{$item->so_luong_sv_Trung_cap}}</td>
                    <td>{{$item->so_luong_sv_So_cap}}</td>
                    <td>{{$item->so_luong_sv_he_khac}}</td>
                    <td>{{$item->ketquatuyensinh}}</td>
                    <td>{{$item->tong_so_tuyen_sinh}}</td>
                    <td>{{$item->trang_thai}}</td>
                    <td> 
                        @if ($item->trang_thai_id < 3)
                            <a href="{{route('suasolieutuyensinh',['id'=>$item->id])}}">Sửa</a>
                        @endif               
                    </td>
                    <td>
                        <a href="{{route('chitietsolieutuyensinh',[
                            'nam' => request()->get('nam'),
                            'dot' => request()->get('dot'),
                            'co_so_id' => $item->id,
                        ])}}">Chi tiết</a>
                    </td>
                  </tr>
                @endforeach
             
      
            </tbody>
          </table>
        </div>
    </div>
    <div class="row phantrang">
        {{$data->links()}}
    </div>
    
</div>
@endsection

@section('script')
<script src="{{ asset('js/so_lieu_tuyen_sinh/tong_hop_so_lieu.js') }}"></script>
@endsection
