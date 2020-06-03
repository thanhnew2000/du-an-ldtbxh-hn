@extends('layouts.admin')
@section('title', "Thêm mới dánh sách đỗi ngủ nhà giáo")
@section('style')
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<link href="{!! asset('danhsachdoingunhagiao/css/showDanhSach.css') !!}" rel="stylesheet" type="text/css" />
@endsection 
@section('content')
<div class="m-content">
    <div class="m-portlet__head-title">
        <h3 class="m-portlet__head-text">
           Thêm mới danh sách đội ngũ nhà giáo
        </h3>
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
                    <span for="" class="fillter-name col-4">Năm</span>
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
                    <span for="" class="fillter-name col-4">Loại hình cơ sở</span>
                    <select class="form-control col-8" name="nam" id="nam">
                        <option value="" selected="" disabled="">Chọn</option>
                        <option value="2020">FPT</option>
                        <option value="2019">Fpoly</option>
                        <option value="2018">FFT</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                    <span for="" class="fillter-name col-4">Đợt</span>
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
    <section class="fillter-area  mb-5" data-select2-id="6">
        <div class="fillter-title">
            <h4>Cơ bản</h4>
        </div>
        <div class="fillter-form" data-select2-id="5">
            <form action="http://127.0.0.1:8000/xuat-bao-cao/ket-qua-tuyen-sinh/tong-hop-so-lieu-tuyen-sinh" method="get" data-select2-id="4">
                <div class="d-flex container pt-3">
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Biên chế</span>
                        <div class="col-8">
                            <input type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                          </div>
                    </div>
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">Hợp đồng (từ 1 năm chở lên)</span>
                        <div class="col-8">
                            <input type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                          </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="row">
        <section class="fillter-area  mb-5 col-sm-6" data-select2-id="6">
            <div class="fillter-title">
                <h4>Cơ bản</h4>
            </div>
            <div class="fillter-form" data-select2-id="5">
                <form action="http://127.0.0.1:8000/xuat-bao-cao/ket-qua-tuyen-sinh/tong-hop-so-lieu-tuyen-sinh" method="get" data-select2-id="4">
                    <div class="d-flex container pt-3">
                        <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                            <span for="" class="fillter-name col-1">Biên chế</span>
                            <div class="col-11">
                                <input type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                              </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="fillter-area  mb-5 col-sm-6" data-select2-id="6">
            <div class="fillter-title">
                <h4>Cơ bản</h4>
            </div>
            <div class="fillter-form" data-select2-id="5">
                <form action="http://127.0.0.1:8000/xuat-bao-cao/ket-qua-tuyen-sinh/tong-hop-so-lieu-tuyen-sinh" method="get" data-select2-id="4">
                    <div class="d-flex container pt-3">
                        <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                            <span for="" class="fillter-name col-1">Biên chế</span>
                            <div class="col-11">
                                <input type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                              </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
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
