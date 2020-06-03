@extends('layouts.admin')
@section('title', "Tổng hợp kết quả tốt nghiệp")
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
            <form action="" method="get">
                <div class="d-flex container pt-3">
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <label for="" class="fillter-name col-4">Tên cơ sở</label>
                        
                        <select class="form-control col-8" name="co_so_id" id="co_so_id">
                            <option value="" selected>Chọn cơ sở</option>
                           
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Loại hình cơ sở</span>
                        <select class="form-control col-8" name="loai_hinh" id="loai_hinh">
                            <option value="0" selected>Chọn loại hình cơ sở</option>
                            
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
        <a href="#"><button type="button" class="btn btn-secondary">Thêm mới</button></a> 
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
                <th scope="col">Mã ngành nghề</th>
                <th scope="col">Hệ đào tạo</th>
                <th scope="col">Tổng số sinh viên tốt nghiệp</th>
               
                <th scope="col">Trạng thái</th>
                <!-- <th scope="col">Chỉnh sửa</th> -->
                <th scope="col" colspan="2">Thao tác</th>
              </tr>
            </thead>
            <tbody>
           
                          
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                   
                    <td> 
                            <a href="{{ route('xuatbc.sua-tong-hop') }}">Sửa</a>
                           
                    </td>
                    <td>
                        <a href="{{ route('xuatbc.chi-tiet-tong-hop') }}">Chi tiết</a>
                    </td>
                  </tr>
               
             
      
            </tbody>
          </table>
        </div>
    </div>
    {{-- <div class="row phantrang">
        {{$data->links()}}
    </div> --}}
    
</div>
@endsection

{{-- @section('script')
<script src="{{ asset('js/so_lieu_tuyen_sinh/tong_hop_so_lieu.js') }}"></script>
@endsection --}}
