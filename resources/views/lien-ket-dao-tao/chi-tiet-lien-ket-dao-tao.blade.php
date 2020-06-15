
@extends('layouts.admin')
@section('style')
<style>
    th{
        border-top: 1px solid #ffffff !important;
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
                    Chi tiết liên kết đào tạo
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <h3>Cơ sở đào tạo: Vermont</h3>
            <p>
            Loại hình cơ sở: Cơ sở trung ương
            </p>
            <p>Địa chỉ: 74291 Abbott Isle Suite 370 South Nonafurt, AK 77849-1191</p>
            <p>Phường/Xã: Phường Phúc Xá</p>
            <p>Quận/Huyện: Quận Ba Đình</p>
        </div>
    </div>

    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                    <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">Bộ lọc</h3>
                </div>
            </div>
        </div>
        
        <div class="m-portlet__body">
            <form action="" method="get" class="m-form">
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Cơ sở đào tạo</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="nam" id="nam">
                                            <option value="" selected >Chọn</option>
                                            <option value=""> </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-lg-2 col-form-label">Tên nghề đào tạo</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="dot" id="dot">
                                            <option value="" >Chọn</option>
                                            <option value="" ></option>
                                            <option value="" ></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Năm`</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="nam" id="nam">
                                            <option value="" selected >Chọn</option>
                                            <option value=""> </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-lg-2 col-form-label">Đợt</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="dot" id="dot">
                                            <option value="" >Chọn</option>
                                            <option value="" ></option>
                                            <option value="" ></option>
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
        
        
    </div>

    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        
                        <option ></option>
                        
                    </select>
                </div>
            </div>
            <table class="table table-bordered m-table m-table--head-bg-primary table-responsive">
                <thead>
                    <tr class="text-center">
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Tên cơ sở đào tạo</th>
                        <th rowspan="2">Tên nghề đào tạo</th>
                        <th rowspan="2">Năm</th>
                        <th rowspan="2">Đợt</th>
                        <th colspan="5">Liên thông Cao đẳng lên Đại học</th>
                        <th colspan="5">Liên thông Trung cấp lên Đại học</th>
                    </tr>
                    <tr class="pt-3 row2">
                        <th>Chỉ tiêu được giao</th>
                        <th>Thực tuyển</th>
                        <th>Số học sinh tốt nghiệp</th>
                        <th>Đơn vị liên kết </th>
                        <th>Ghi chú</th>

                        <th>Chỉ tiêu được giao</th>
                        <th>Thực tuyển</th>
                        <th>Số học sinh tốt nghiệp</th>
                        <th>Đơn vị liên kết </th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    

                </tbody>
            </table>
        </div>
    </div>

    <form action="{{route('layformbieumausinhvien')}}" method="post">
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
                            
                            <option value=""></option>
                           
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

    <form action="" id="my_form_kqts_import" method="post"
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

    <form action="" id="" method="post" enctype="multipart/form-data">
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
                                <option value=""></option>
                                
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
</div>

@endsection