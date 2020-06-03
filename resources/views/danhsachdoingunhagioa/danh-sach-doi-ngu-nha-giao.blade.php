@extends('layouts.admin')
@section('title', "Danh sách đội ngủ giáo")
@section('style')
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<link href="{!! asset('danhsachdoingunhagiao/css/showDanhSach.css') !!}" rel="stylesheet" type="text/css" />
@endsection 
@section('content')
<div class="m-content">
    <section class="fillter-area  mb-5">
        <div class="fillter-title">
            <h4>Bộ lọc</h4>
        </div>
        <div class="fillter-form">
            <form action="http://127.0.0.1:8000/xuat-bao-cao/ket-qua-tuyen-sinh/tong-hop-so-lieu-tuyen-sinh" method="get">
                <div class="d-flex container pt-3">
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <label for="" class="fillter-name col-4">Tên cơ sở</label>
                        
                        <select class="form-control col-8 js-example-basic-single" name="co_so_id" id="co_so_id">
                            <option value="" selected=""></option>
                                                            <option value="1">Vermont</option>
                                                            <option value="6">Missouri</option>
                                                            <option value="11">Cao đẳng Du Lịch</option>
                                                    </select>
                    </div>

                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Loại hình cơ sở</span>
                        <select class="form-control col-8" name="loai_hinh" id="loai_hinh">
                            <option value="0" selected="">Chọn loại hình cơ sở</option>
                                                            <option value="4">Tư thục</option>
                                                            <option value="9">Cơ sở tư thục</option>
                                                            <option value="14">Cơ sở có vốn đầu tư nước ngoài</option>
                                                            <option value="15">Cơ sở địa phương</option>
                                                    </select>
                    </div>
                </div>

                <div class="d-flex container pt-3">
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Cơ quan chủ quản</span>
                        <select class="form-control col-8" name="nam" id="nam">
                            <option value="" selected="" disabled="">Chọn</option>
                            <option value="2020">FPT</option>
                            <option value="2019">Fpoly</option>
                            <option value="2018">FFT</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Tên ngành</span>
                        <select class="form-control col-8" name="dot" id="dot">
                            <option value="" selected="" disabled="">Chọn</option>
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
        <a href="http://127.0.0.1:8000/xuat-bao-cao/ket-qua-tuyen-sinh/them-so-lieu-tuyen-sinh"><button type="button" class="btn btn-secondary">Thêm mới</button></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 scoll-x">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên cơ sở </th>
                <th scope="col">Loại hình cơ sở</th>
                <th scope="col">Tổng số </th>
                <th colspan="2">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                                           
                <tr>
                    <th>1</th>
                    <th>FPT Polytechnic</th>
                    <th>Tư thục</th>
                    <th>159</th>
                    <th>13</th>
                    <th>13</th>
                  </tr>
                               
                <tr>
                    <th>2</th>
                    <th>FPT Polytechnic</th>
                    <th>Tư thục</th>
                    <th>162</th>
                    <th>13</th>
                    <th>13</th>
                <tr>
                    <th>3</th>
                    <th>FPT Polytechnic</th>
                    <th>Tư thục</th>
                    <th >170</th>
                    <th>373</th>
                    <th>13</th>
                  </tr>
                  <tr>
                    <th>4</th>
                    <th>FPT Polytechnic</th>
                    <th>Tư thục</th>
                    <th >178</th>
                    <th>377</th>
                    <th>15</th>
                  </tr>
                             
      
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection @section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/so_lieu_tuyen_sinh/tong_hop_so_lieu.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#co_so_id").select2();
    });
    $("#loai_hinh").change(function () {
        axios
            .post("/xuat-bao-cao/ket-qua-tuyen-sinh/co-so-tuyen-sinh-theo-loai-hinh", {
                id: $("#loai_hinh").val(),
            })
            .then(function (response) {
                var htmldata = '<option value="">Chọn cơ sở</option>';
                response.data.forEach((element) => {
                    htmldata += `<option value="${element.id}" >${element.ten}</option>`;
                });
                $("#co_so_id").html(htmldata);
            })
            .catch(function (error) {
                console.log(error);
            });
    });
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@endsection
