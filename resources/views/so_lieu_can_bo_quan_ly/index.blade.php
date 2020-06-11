@extends('layouts.admin')

@section('content')
<div class="m-content">
    @include('layouts.partials.filter', [
        'config' => $filterConfig,
    ])

    <div class="row mb-5 bieumau">
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống biểu mẫu
            </a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" id="upImport-file" data-target="#exampleModalImport"><i
                class="fa fa-upload" aria-hidden="true"></i>
            Tải lên file Excel</a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#exampleModalExportData"><i class="fa fa-upload"
                    aria-hidden="true"></i>
                Xuất dữ liệu ra Excel</a>
        </div>
        <div class="col-lg-6" style="text-align: right">
        <a href="{{ route('so-lieu-can-bo-quan-ly.create') }}"><button type="button" class="btn btn-secondary">Thêm mới</button></a>
        </div>
    </div>

    @include('layouts.partials.table', [
        'titles' => $titles,
        'data' => $data
    ])
</div>

{{-- thanhnv form import export --}}
<form action="{{route('layformbieumau.solieucanbo.quanly')}}" method="post">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

<form action="{{route('import-error-so-lieu-quan-ly')}}" id="my_form_sl_ql_canbo_import" method="post"
    enctype="multipart/form-data">
    @csrf
    <div class="modal fade " id="exampleModalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                        <label for="">Chọn năm</label>
                        <select name="nam" id="nam_id" class="form-control">
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                        </select> 
                   </div>

                    <div class="form-group">
                        <label for="">Chọn đợt</label>
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
                        <button type="submit" hidden class="btn btn-primary" id="submitTaiok">Tải ok</a>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{route('exportdata.solieucanbo.quanly')}}" id="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade " id="exampleModalExportData" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="submit" class="btn btn-primary" id="submitXuatData">Tải</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('title', "Số liệu cán bộ quản lý")

@section('style')
<link href="{!! asset('css/main.css') !!}" rel="stylesheet" type="text/css" />
<style>
    table.table-responsive {
        display: table;
    }
</style>
@endsection

@section('script')
<script src="{{ asset('js/common/index_table.js') }}"></script>
<script src="{{ asset('js/common/filter.js') }}"></script>

<script>
    $("#file_import_id").change(function() {
    var fileExtension = ['xlsx','xls'];
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
    formData.append("dot", $('#dot_id').val());
    formData.append("nam", $('#nam_id').val());

    axios.post("{{route('import-so-lieu-quan-ly')}}", formData,{
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
                $('#my_form_sl_ql_canbo_import')[0].reset();
            }

        }).catch(function (error) {
          console.log(error);
          $('.loading').css('display','none');
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

@endsection
