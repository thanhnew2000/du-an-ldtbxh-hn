
@extends('layouts.admin')
@section('title', "Tổng hợp số liệu học sinh")
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
                        Sinh Viên Đang Quản Lý <small>Danh sách</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="GET" class="m-form">
     
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại Hình Cơ Sở: </label>
                                <div class="col-lg-8">
                                    <select name="loai_hinh" class="form-control ">
                                        <option value="" >Chọn </option>
                                        @foreach($loaiHinh as $item)
                                        <option 
                                            @if(isset($params['loai_hinh']) && $params['loai_hinh'] == $item->id)
                                                selected
                                            @endif
                                        value="{{ $item->id }}">{{ $item->loai_hinh_co_so }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên Cơ Sở: </label>
                                <div class="col-lg-8">
                                    <select name="cs_id" class="form-control" id="co_so_id">
                                        <option value="" >Chọn </option>
                                        @foreach ($coso as $item)
                                        <option 
                                        @if(isset($params['cs_id']) && $params['cs_id'] == $item->id)
                                            selected
                                        @endif value="{{ $item->id }}">{{$item->ten}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Năm:  </label>
                            <div class="col-lg-8">
                                <select name="nam" class="form-control" id="nam">
                                    <option value="" >Chọn </option>
                                    @foreach (config('common.nam.list') as $item)
                                    <option 
                                    @if (isset($params['nam']))
                                            {{( $params['nam'] ==  $item ) ? 'selected' : ''}}  
                                            @endif
                                            value="{{$item}}"> {{$item}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Đợt: </label>
                            <div class="col-lg-8">
                                <select class="form-control" name="dot" id="dot">
                                    <option value="" >Chọn</option>
                                    <option
                                    @if (isset($params['dot']))
                                        {{( $params['dot'] ==  1 ) ? 'selected' : ''}}  
                                    @endif
                                    value="1" >Đợt 1</option>
                                    <option value="2"
                                    @if (isset($params['dot']))
                                    {{( $params['dot'] ==  2 ) ? 'selected' : ''}}  
                                    @endif
                                    >Đợt 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Ngành Nghề: </label>
                            <div class="col-lg-8">
                                <select name="nghe_id" class="form-control" id="nghe_id">
                                    <option value="" >Chọn </option>
                                    @foreach ($nganhNghe as $item)
                                    <option 
                                    @if(isset($params['nghe_id']) && $params['nghe_id'] == $item->id)
                                        selected
                                    @endif value="{{ $item->id }}">{{$item->id}} - {{$item->ten_nganh_nghe}}
                                    </option>
                                    @endforeach
                                </select>
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
            <a href="" data-toggle="modal"  data-target="#exampleModal-tbm">
                <i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống biểu mẫu
            </a>
        </div>
        <div class="col-lg-2">
            <a href="" data-toggle="modal" ><i
                    class="fa fa-upload" aria-hidden="true" data-target="#exampleModalImport"></i>
                Tải lên file Excel</a>
        </div>
        <div class="col-lg-2">
            <a href="" data-toggle="modal" data-target="#exampleModalExportData"><i class="fa fa-file-excel"
                aria-hidden="true"></i>
                Xuất dữ liệu ra Excel</a>
        </div>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                 <label class="col-lg-2 col-form-label">Kích thước:</label>
                 <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        @foreach(config('common.paginate_size.list') as $size)
                        <option 
                            @if (isset($params['page_size']) && $params['page_size'] ==  $size)
                                selected 
                            @endif value="{{$size}}">{{$size}}
                        </option>
                        @endforeach
                    </select>
                </div> 
            </div>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    @csrf
                    <th>STT</th>
                    <th>Tên Cơ Sở</th>
                    <th>Loại Hình Cơ Sở</th>
                    <th>Năm</th>
                    <th>Đợt</th>
                    <th>Tổng Số HS/SV <br> đang quản lý</th>
                    <th>Cao Đẳng</th>
                    <th>Trung Cấp </th>
                    <th>Sơ Cấp </th>
                    <th>Khác </th>
                    <th>
                        <a href="{{route('xuatbc.them-so-sv')}}" class="btn btn-success btn-sm">Thêm mới</a>
                    </th>
                </thead>

                @php($i=1)

                @forelse ($data as $qlsv)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$qlsv->ten}}</td>
                        <td>{{$qlsv->loai_hinh_co_so}}</td>
                        <td>{{$qlsv->nam}}</td>
                        <td>{{$qlsv->dot}}</td>
                        <td>{{$qlsv->tong_so_HSSV_co_mat}}</td>
                        <td>{{$qlsv->so_luong_cao_dang}}</td>
                        <td>{{$qlsv->so_luong_trung_cap}}</td>
                        <td>{{$qlsv->so_luong_so_cap}}</td>
                        <td>{{$qlsv->so_luong_He_khac}}</td>
                        <td>
                            <a href="{{ route('xuatbc.chi-tiet-so-lieu', ['co_so_id'=>$qlsv->cs_id]) }}" class="btn btn-info btn-sm">Chi tiết</a>

                        </td>
                    </tr>
                    @empty
                    @endforelse($item as $data )
                </tbody>
            </table>
        </div>
        <div class="m-portlet__foot d-flex justify-content-end">
            {{$data->links()}}
        </div>
    </div>
</div>

{{-- thanhnv form nhập xuất --}}

<form action="{{route('export.bieumau.hsdql')}}" method="post">
    @csrf
    <div class="modal fade" id="exampleModal-tbm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                       @foreach($coso as $csdt)
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

    <form action="{{route('import.error.hssv-ql')}}" id="my_form_hssv_import" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="modal fade " id="exampleModalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import file học sinh sinh viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                        <input type="file" id="file_import_id" name="file_import">
                        </div>
                        <div class="form-group">
                            <label for="">Chọn năm</label>
                            <select name="nam_import" id="nam_id" class="form-control">
                              <option value="2020">2020</option>
                              <option value="2019">2019</option>
                              <option value="2018">2018</option>
                              <option value="2017">2017</option>
                              <option value="2016">2016</option>
                            </select> 
                       </div>

                    <div class="form-group">
                      <label for="">Chọn đợt</label>
                      <select name="dot_import" id="dot_id" class="form-control">
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
                        <button  type="submit" hidden class="btn btn-primary" id="submitTaiok">Tải Error</a>
                      </div>
                    </div>
            </div>
            </div>
        </form>


        <form action="{{route('export.data.hsql')}}" method="post" enctype="multipart/form-data">
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
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
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
                              @foreach($coso as $csdt)
                               <option value="{{$csdt->id}}">{{$csdt->ten}}</option>
                              @endforeach
                            </select>
                        </div>

                        </div>
                        <div class="modal-footer">
                          <p class="pt-1" style="color:red;margin-right: 119px" id="echoLoiXuat">
                          </p>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                          {{-- <button type="button" class="btn btn-primary" id="clickXuatData">Tải</a> --}}
                          <button  type="submit" class="btn btn-primary" id="submitXuatData">Xuất</a>
                        </div>
                      </div>
              </div>
              </div>
          </form>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>
    
         $("#file_import_id").change(function() {
          var fileExtension = ['xlsx', 'xls'];
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
                
                if($("#file_import_id")[0].files.length === 0){
                   console.log('không có file');    
                 }else if($.inArray($('#file_import_id').val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                  console.log('chưa file không đúng định dạng');
                 }else{
                  $('#exampleModalImport').modal('hide');
                  $('.loading').css('display','block');
                  var formData = new FormData();
                  var fileExcel = document.querySelector('#file_import_id');
                  formData.append("file", fileExcel.files[0]);
                    formData.append("dot_import", $('#dot_id').val());
                    formData.append("nam_import", $('#nam_id').val());
                    axios.post("{{route('import.hssv.ql')}}", formData,{
                    headers: {
                          'Content-Type': 'multipart/form-data',
                        }
                        }).then(function (response) {
                            // console.log(response)
                            if(response.data == 'ok'){
                            $('.loading').css('display','none');
                              Swal.fire({
                              position: 'center',
                              icon: 'success',
                              title: 'Cập nhập thành công',
                              showConfirmButton: false,
                              timer: 1700
                            })
                            window.location.reload();
                            console.log('Đã insert vào database');
                            }else if(response.data == 'problem'){
                            $('.loading').css('display','none');
                            console.log('Có vấn đề về thông tin muốn nhập');
                            Swal.fire({
                                title: 'Có vấn đề về thông tin muốn nhập !',
                                // text: "You won't be able to revert this!",
                                icon: 'warning',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Xác nhận'
                                }).then((result) => {
                                if (result.value) {  
                                    window.location.reload();
                                }else{
                                    window.location.reload();
                                }
                                })
                            }else{
                              $('.loading').css('display','none');
                                $('#submitTaiok').trigger('click');
                                $('#my_form_hssv_import')[0].reset();
                            }
                       }).catch(function (error) {
                          $('.loading').css('display','none');
                          console.log(error);
                          Swal.fire({
                              title: 'Lỗi về file muốn nhập !',
                              // text: "You won't be able to revert this!",
                              icon: 'warning',
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: 'Xác nhận'
                              }).then((result) => {
                              if (result.value) {  
                                  window.location.reload();
                              }else{
                                  window.location.reload();
                              }
                            })
                      });
                }
                });

            function clickDownloadTemplate(){
               $('#exampleModal').modal('hide');
            }

</script>
<script>

    $(document).ready(function(){
        $('#co_so_id').select2();
        $('#devvn_quanhuyen').select2();
        $('#devvn_xaphuongthitran').select2();
        $('#nghe_id').select2();
        });
    
    
        $("#devvn_quanhuyen" ).change(function() {
    axios.post('/xuat-bao-cao/ket-qua-tuyen-sinh/xa-phuong-theo-quan-huyen', {
                id:  $("#devvn_quanhuyen").val(),
    })
    .then(function (response) {
        var htmldata = '<option value="" selected  >Chọn</option>'
            response.data.forEach(element => {
            htmldata+=`<option value="${element.xaid}" >${element.name}</option>`   
        });
        $('#devvn_xaphuongthitran').html(htmldata);
    })
    .catch(function (error) {
        console.log(error);
    });
});
    
    $("#page-size").change(function(){  
        var pageSize = $(this).val();
        
        var url = new URL(window.location.href);
        var search_params = url.searchParams;
        search_params.set('page_size', pageSize);
        url.search = search_params.toString();
        var new_url = url.toString();
        // console.log(new_url);
        window.location.href = new_url
      });
    </script>
@endsection
