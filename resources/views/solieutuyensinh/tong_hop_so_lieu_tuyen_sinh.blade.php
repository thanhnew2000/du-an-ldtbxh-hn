@extends('layouts.admin')
@section('title', "Tổng hợp số liệu tuyển sinh")
@section('style')
<link href="{!! asset('styletuyensinh/showtuyensinh.css') !!}" rel="stylesheet" type="text/css" />
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
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <label for="" class="fillter-name col-4">Tên cơ sở</label>
                        <select class="form-control col-8" name="" id="">
                            <option value="" selected disabled>Chọn cơ sở</option>
                            <option>FPT Polytecnic</option>
                            <option>Cao Đẳng du lịch</option>
                            <option>Cao đẳng bách khoa</option>
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
                <th scope="col">Kết quả tuyển sinh <br> Sơ đẳng</th>
                <th scope="col">Kết quả tuyển sinh <br> Khác</th>
                <th scope="col">Kết quả tuyển sinh</th>
                <th scope="col">Kế hoạch tuyển sinh</th>
                <th scope="col">Chỉnh sửa</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
            @php
                if (!isset($_GET['page'])) {
                  $i=1;
                }else {
                    $i = $limit*($_GET['page']-1)+1;
                }
             
            @endphp
                @foreach ($data as $item)               
                <tr>
                    <td>{{$i++}}</td>
                <td>{{$item->ten}}</td>
                    <td>{{$item->loai_hinh_co_so}}</td>
                    <td>{{$item->so_luong_sv_Cao_dang}}</td>
                    <td>{{$item->so_luong_sv_Trung_cap}}</td>
                    <td>{{$item->so_luong_sv_So_cap}}</td>
                <td>{{$item->so_luong_sv_he_khac}}</td>
                    <td>{{$item->ketquatuyensinh}}</td>
                    <td>{{$item->tong_so_tuyen_sinh}}</td>
                    <td><a href="{{route('suasolieutuyensinh',['id'=>$item->id])}}">Sửa</a></td>
                    <td><a href="{{route('chitietsolieutuyensinh',['id'=>$item->id])}}">Chi tiết</a></td>
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
                           @foreach($co_so_dao_tao as $csdt)
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
                        <input type="file" id="file_import_id" name="file_import">
                      </div>
                      <div class="modal-footer">
                        <p class="pt-1" style="color:red;margin-right: 119px" id="echoLoi">
                        </p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" id="submitTai">Tảii</a>
                        <button style="display:none" type="submit" class="btn btn-primary" id="submitTaiok">Tải ok</a>
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

   				// 	 });
				
					$("#submitTai").click(function(event){
						var fileExtension = ['xlsx', 'xls'];
						if(	$('#echoLoi').text() != ''){
							console.log('abc');
						}
						else{
							// document.querySelector('.loading').style.display='block';
							$('#exampleModalImport').modal('hide');
							var formData = new FormData();
							var fileExcel = document.querySelector('#file_import_id');
							formData.append("file", fileExcel.files[0]);

							axios.post("{{route('import.ket-qua-ts')}}", formData,{
								headers: {
             						   'Content-Type': 'multipart/form-data',
           					     }
							}).then(function (response) {
										if(response.data == 'ok'){
											window.location.reload();
											console.log('Ahihi');
										}else{
											$('#submitTaiok').trigger('click');
											// document.querySelector('.loading').style.display='none';
											$('#my_form_kqts_import')[0].reset();
										}
								}).catch(function (error) {
									// window.location.reload();
									console.log(error);
								});
						}
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

             function clickDownloadTemplate(){
                $('#exampleModal').modal('hide');
             }
 </script>
@endsection

