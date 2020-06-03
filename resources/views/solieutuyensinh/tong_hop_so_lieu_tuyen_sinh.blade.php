@extends('layouts.admin')
@section('title', "Tổng hợp số liệu tuyển sinh")
@section('style')
<link href="{!! asset('/css/main.css') !!}" rel="stylesheet" type="text/css" />
<style>
    .m-table.m-table--border-danger, .m-table.m-table--border-danger th, .m-table.m-table--border-danger td{
        border-color: #bcb1b1 ;
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
                        Tuyển Sinh <small>Danh sách</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            <input type="hidden" name="page_size" value="80">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại hình cơ sở</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="loai_hinh" id="loai_hinh">
                                        <option value="0" selected>Chọn loại hình cơ sở</option>
                                        @foreach($loaiHinh as $item)
                                        <option value="{{ $item->id }}">{{ $item->loai_hinh_co_so }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-lg-2 col-form-label">Tên cơ sở</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="co_so_id" id="co_so_id">
                                        <option value="" >Chọn cơ sở</option>
                                        @foreach ($coso as $item)
                                        <option value="{{ $item->id }}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="nam" id="nam">
                                        <option value="" selected disabled>Chọn</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="dot" id="dot">
                                        <option value="" selected disabled>Chọn</option>
                                        <option value="1">Đợt 1</option>
                                        <option value="2">Đợt 2</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Quận\Huyện</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="devvn_quanhuyen" id="devvn_quanhuyen">
                                        <option value="" selected>Chọn</option>
                                        @foreach ($quanhuyen as $item)
                                        <option value="{{$item->maqh}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-lg-2 col-form-label">Xã\Phường</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="devvn_xaphuongthitran"
                                        id="devvn_xaphuongthitran">
                                        <option value="" selected>Chọn</option>
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
    <div class="row mb-5 bieumau">
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-download" aria-hidden="true"></i>
              Tải xuống biểu mẫu
            </a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" id="upImport-file" data-target="#exampleModalImport"><i class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excel</a>
        </div>
        <div class="col-lg-8 " style="text-align: right">
            <a href="{{route('themsolieutuyensinh')}}"><button type="button" class="btn btn-secondary">Thêm
                    mới</button></a>
        </div>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option selected="" value="80">80</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <table class="table table-bordered m-table m-table--border-danger m-table--head-bg-primary">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên cơ sở đào tạo</th>
                        <th scope="col">Loại hình cơ sở</th>
                        <th scope="col">Quận Huyện</th>
                        <th scope="col">Xã Phường Thị Trấn</th>
                        <th scope="col">Kết quả tuyển sinh <br> Cao Đẳng</th>
                        <th scope="col">Kết quả tuyển sinh <br> Trung Cấp</th>
                        <th scope="col">Kết quả tuyển sinh <br> Sơ Cấp</th>
                        <th scope="col">Kết quả tuyển sinh <br> Khác</th>
                        <th scope="col">Kết quả tuyển sinh</th>
                        <th scope="col">Kế hoạch tuyển sinh</th>
                        <th scope="col">Trạng thái</th>
                        <!-- <th scope="col">Chỉnh sửa</th> -->
                        <th scope="col">Thao tác</th>
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
                        <td>{{$item->quan_huyen}}</td>
                        <td>{{$item->xa_phuong}}</td>
                        <td>{{$item->so_luong_sv_Cao_dang}}</td>
                        <td>{{$item->so_luong_sv_Trung_cap}}</td>
                        <td>{{$item->so_luong_sv_So_cap}}</td>
                        <td>{{$item->so_luong_sv_he_khac}}</td>
                        <td>{{$item->tong_so_tuyen_sinh_cac_trinh_do}}</td>
                        <td>{{$item->tong_so_tuyen_sinh}}</td>
                        <td>{{$item->trang_thai}}</td>
                        <td>
                            <a href="{{route('chitietsolieutuyensinh',[
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
<form action="{{route('layformbieumausinhvien')}}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hãy chọn trường</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <select name="id_cs" class="form-control">
                           @foreach($data_co_so as $csdt)
                           <option value="{{$csdt->id}}">{{$csdt->ten}}</option>
                           @endforeach
                       </select>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" onclick="clickDownloadTemplate()" class="btn btn-primary">Tải</a>
                      </div>
                    </div>
            </div>
        </div>
    </form>

    <form action="{{route('import.error.ket-qua-ts')}}" id="my_form_kqts_import" method="post" enctype="multipart/form-data" onsubmit="return validateMyForm();">
        @csrf
        <div class="modal fade " id="exampleModalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import file</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                        <input type="file" id="file_import_id" name="file_import">
                        </div>
                        <div class="form-group">
                            <label for="">Chọn năm xuất</label>
                            <select name="nam" id="nam_id" class="form-control">
                              <option value="2020">2020</option>
                              <option value="2019">2019</option>
                              <option value="2017">2017</option>
                            </select> 
                       </div>

                    <div class="form-group">
                      <label for="">Chọn đợt xuất</label>
                      <select name="dot" id="dot_id" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                      </select>
                </div>
                        
                      </div>
                      <div class="modal-footer">
                        <p class="pt-1" style="color:red;margin-right: 119px" id="echoLoi">
                        </p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" id="submitTai">Tải</a>
                        <button  type="submit" hidden class="btn btn-primary" id="submitTaiok">Tải ok</a>
                      </div>
                    </div>
            </div>
            </div>
        </form>

      <form action="{{route('exportdatatuyensinh')}}" id="" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal fade " id="exampleModalExportData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Xuất dữ liệu</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="">Chọn năm xuất</label>
                              <select name="nam_muon_xuat" id="nam_id_xuat" class="form-control">
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2017">2017</option>
                              </select>
                        </div> 
                        <div class="form-group">
                                <label for="">Chọn đợt xuất</label>
                                <select name="dot_muon_xuat" id="dot_id_xuat" class="form-control">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                </select>
                          </div>
                        <div class="form-group">
                            <label for="">Chọn Trường</label>
                            <select name="truong_id" id="truong_id_xuat" class="form-control">
                              @foreach($co_so_dao_tao as $csdt)
                               <option value="{{$csdt->id}}">{{$csdt->ten}}</option>
                              @endforeach
                            </select>
                        </div>

                        </div>
                        <div class="modal-footer">
                          <p class="pt-1" style="color:red;margin-right: 119px" id="echoLoiXuat">
                          </p>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                          <button type="button" class="btn btn-primary" id="clickXuatData">Tải</a>
                          <button style="display:none" type="submit" class="btn btn-primary" id="submitXuatData">Tải ok</a>
                        </div>
                      </div>
              </div>
              </div>
          </form>
</div>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $("#file_import_id").change(function() {
            var fileExtension = ['xlsx'];
            if($("#file_import_id")[0].files.length === 0){
                $('#echoLoi').text('Hãy nhập file excel');
            }else if($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $message = "Hãy nhập file excel : "+fileExtension.join(', ');
                $('#echoLoi').text($message);
                return false;
            }else{
                $('#echoLoi').text('');
    }
    });

    
    $("#submitTai").click(function(event){
        var fileExtension = ['xlsx', 'xls'];
        // if($('#echoLoi').text() != ' '){
        // 		console.log('abc');
        // }
        // else{
        // document.querySelector('.loading').style.display='block';
        $('#exampleModalImport').modal('hide');
        var formData = new FormData();
        var fileExcel = document.querySelector('#file_import_id');
        formData.append("file", fileExcel.files[0]);
        formData.append("dot", $('#dot_id').val());
        formData.append("nam", $('#nam_id').val());


        axios.post("{{route('import.ket-qua-ts')}}", formData,{
            headers: {
                    'Content-Type': 'multipart/form-data',
                }
        }).then(function (response) {
            // console.log(response)
            if(response.data == 'ok'){
            window.location.reload();
            console.log('Ahihi');
            }else{
            $('#submitTaiok').trigger('click');
            // document.querySelector('.loading').style.display='none';
            $('#my_form_kqts_import')[0].reset();
            }
        }).catch(function (error) {
        console.log(error);
        });
            // }
    });

    function validateMyForm(){
        if($("#file_import_id")[0].files.length === 0){
            $('#echoLoi').text('Hãy nhập file excel');
            return false;
        }else{
            // document.querySelector('.loading').style.display='block';
            $('#exampleModalImport').modal('hide');
            return true;
        }						
    }

    //  Xuất dữ liệu data
    $('#clickXuatData').click(function(){
        $('#submitXuatData').trigger('click');
    })
    function clickDownloadTemplate(){
            $('#exampleModal').modal('hide');
    }
 </script>
@endsection
