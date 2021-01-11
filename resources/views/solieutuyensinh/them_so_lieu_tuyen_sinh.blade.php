@extends('layouts.admin');
@section('title', 'Danh sách cơ sở đào tạo')
@section('style')
<style>
    .chonDot{
        display: none
    }
</style>
@endsection
@section('content')
<div class="m-content container-fluid">
    <div class="m-portlet">

    <form id="formAddTuyenSinh">

        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Tuyển sinh
                    </h3>
                </div>
            </div>
        </div>
        {{-- <form action="" method="get" class="m-form"> --}}
        {{-- @csrf --}}
            <input type="hidden" name="page_size" value="">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Cơ sở đào tạo:</label>
                                <div class="col-lg-8">
                                    <select name="co_so_id" id='co_so_id' onchange="getdatacheck(this)" class="form-control ">
                                        <option selected value="">Chọn cơ sở</option>
                                        @foreach ($co_so as $item)
                                            <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <span class="text-danger" id="co_so_id_error"></span>

                        </div>
                        <div class="col-md-2 chonDot">
                            <select name="year" id="yearChon" onchange="getdatacheck(this)" class="form-control">
                                <option value="" selected >Chọn năm</option>
                                @foreach (getCurrentYear(1) as $item)
                                   <option value="{{$item}}">{{$item}}</option>
                                @endforeach 
                                {{-- <option value="2020" >2020</option>
                                <option value="2021" >2021</option> --}}
                            </select>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group m-form__group row chonDot" >
                                <div class="row ml-1 mb-2 mr-2 pt-2 pl-2">
                                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand" >
                                           <input type="radio"  onclick="getdatacheck(this)" value='1'   name="dot"> 6 Tháng đầu năm
                                            <span></span>
                                   </label>
                                </div>
                                <div class="row ml-1 mb-2 mr-2 pt-2 pl-2">
                                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand" >
                                           <input type="radio"  onclick="getdatacheck(this)" value='2'   name="dot"> 6 Tháng cuối năm
                                            <span></span>
                                   </label>
                                </div>
                            </div>

                        </div>

                  
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Danh sách ngành nghề:</label>
                                
                            </div>
                            <div class="col-lg-12">
                                <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                                    <thead>
                                      <tr>
                                        <th scope="col">Cao Đẳng</th>
                                        <th scope="col">Trung Cấp</th>
                                        <th scope="col">Sơ Cấp</th>
                                        <th scope="col">Khác</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td class="m-scrollable" data-scrollable="true" style="height: 200px;width:300px;" >
                                            <div class="m-scrollable" data-scrollable="true" style="height: 200px"> 
                                                <div id="show_nghe_cao_dang" class="m-checkbox-inline" >
                              
                                                </div>
                                                
                                            </div>
                                        </td>
                                        <td class="m-scrollable" data-scrollable="true" style="height: 200px;width:300px;" >
                                            <div class="m-scrollable" data-scrollable="true" style="height: 200px"> 
                                                <div  id="show_nghe_trung_cap" class="m-checkbox-inline">
                                       
                                                </div>
                                            </div>
                                        </td>
                                        <td class="m-scrollable" data-scrollable="true" style="height: 200px;width:300px;" >
                                            <div class="m-scrollable" data-scrollable="true" style="height: 200px"> 
                                                <div id="show_nghe_so_cap" class="m-checkbox-inline">
                                           
                                                   
                                                </div>
                                            </div>
                                        </td>
                                        <td class="m-scrollable" data-scrollable="true" style="height: 200px;width:300px;" >
                                            <div class="m-scrollable" data-scrollable="true" style="height: 200px"> 
                                                <div id="show_nghe_khac" class="m-checkbox-inline">

                                                </div>
                                            </div>
                                        </td>
                                      </tr>


                                    </tbody>
                                  </table>
                                  <span class="text-danger" id="nghe_id_error"></span>
                                  <br/>
                                  <span class="text-danger" id="dot_error"></span>


                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="row justify-content-center">
                    <div class="col-lg-2">
                        <button type="button" id="sreachBoLoc"class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div> --}}
            </div>
        {{-- </form> --}}
    </div>
    
    <div class="m-portlet">
    <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  Kế hoạch tuyển sinh
                </h3>
              </div>
            </div>
          </div>
      
          <div class="m-portlet__body">
            <div class="tab-content">
              <table class="table m-table m-table--head-bg-brand">
                <thead>
                  <tr>
                    <th scope="col">Cao Đẳng</th>
                    <th scope="col">Trung Cấp</th>
                    <th scope="col">Sơ Cấp</th>
                    <th scope="col">Đào tạo nghề nghiệp khác</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                    <td>
                    <input type="number"  value="" name="ke_hoach_tuyen_sinh_cao_dang" id="ke_hoach_tuyen_sinh_cao_dang" class="form-control m-input">
                            <span class="text-danger" id="ke_hoach_tuyen_sinh_cao_dang_error"></span>
                    </td>
                    <td>
                    <input type="number"  value="" name="ke_hoach_tuyen_sinh_trung_cap" id="ke_hoach_tuyen_sinh_trung_cap" class="form-control m-input">
                    <span class="text-danger" id="ke_hoach_tuyen_sinh_trung_cap_error"></span>
                      </td>
           
                    <td>
                        <input type="number"  value="" name="ke_hoach_tuyen_sinh_so_cap" id="ke_hoach_tuyen_sinh_so_cap" class="form-control m-input">
                        <span class="text-danger" id="ke_hoach_tuyen_sinh_so_cap_error"></span>

                      </td>
                    <td>
                        <input type="number"  value="" name="ke_hoach_tuyen_sinh_khac" id="ke_hoach_tuyen_sinh_khac"  class="form-control m-input">
                        <span class="text-danger" id="ke_hoach_tuyen_sinh_khac_error"></span>

                      </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><label id="ke_hoach_tuyen_sinh_cao_dang-error" class="error" for="ke_hoach_tuyen_sinh_cao_dang" style=""></label></td>
                    <td><label id="ke_hoach_tuyen_sinh_trung_cap-error" class="error" for="ke_hoach_tuyen_sinh_trung_cap" style=""></label></td>
                    <td><label id="ke_hoach_tuyen_sinh_so_cap-error" class="error" for="ke_hoach_tuyen_sinh_so_cap" style=""></label></td>
                    <td><label id="ke_hoach_tuyen_sinh_khac-error" class="error" for="ke_hoach_tuyen_sinh_khac" style=""></label></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        
    </div>
    <div class="row">
    <div class="col-lg-6">
    <div class="m-portlet m-portlet--full-height ">
       
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  Kết quả tuyển sinh Cao Đẳng
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tổng sinh viên </label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="" name="so_luong_sv_Cao_dang" id="so_luong_sv_Cao_dang" class="form-control m-input">
                            <span class="text-danger" id="so_luong_sv_Cao_dang_error"></span>

                        </div>
                    </div>
        

                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Nữ</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="" name="so_luong_sv_nu_Cao_dang" id="so_luong_sv_nu_Cao_dang" class="form-control m-input">
                            <span class="text-danger" id="so_luong_sv_nu_Cao_dang_error"></span>
                        </div>
                    </div>
            
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Dân tộc thiểu số, ít người:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="" name="so_luong_sv_dan_toc_Cao_dang" id="so_luong_sv_dan_toc_Cao_dang" class="form-control m-input">
                        </div>
                        <span class="text-danger" id="so_luong_sv_dan_toc_Cao_dang_error"></span>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Hộ khẩu Hà Nội:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="" name="so_luong_sv_ho_khau_HN_Cao_dang" id="so_luong_sv_ho_khau_HN_Cao_dang" class="form-control m-input">
                        </div>
                        <span class="text-danger" id="so_luong_sv_ho_khau_HN_Cao_dang_error"></span>
                    </div>
                
 
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tuyển mới:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="" name="so_tuyen_moi_Cao_dang" id="so_tuyen_moi_Cao_dang" class="form-control m-input">
                        </div>
                        <span class="text-danger" id="so_tuyen_moi_Cao_dang_error"></span>
                    </div>
                
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Liên thông:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="" name="so_lien_thong_Cao_dang" id="so_lien_thong_Cao_dang" class="form-control m-input">
                        </div>
                        <span class="text-danger" id="so_lien_thong_Cao_dang_error"></span>
                    </div>
                
                
                    
            </div>
          </div>
        
    </div>
    </div>
<div class="col-lg-6">
    <div class="m-portlet m-portlet--full-height ">
       
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  Kết quả tuyển sinh Trung Cấp
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tổng sinh viên </label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="" name="so_luong_sv_Trung_cap" id="so_luong_sv_Trung_cap" class="form-control m-input">
                            <span class="text-danger" id="so_luong_sv_Trung_cap_error"></span>
                        </div>
                    </div>
                    
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Nữ</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="" name="so_luong_sv_nu_Trung_cap" id="so_luong_sv_nu_Trung_cap" class="form-control m-input">
                        </div>
                        <span class="text-danger" id="so_luong_sv_nu_Trung_cap_error"></span>
                    </div>
          
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Dân tộc thiểu số, ít người:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="" name="so_luong_sv_dan_toc_Trung_cap" id="so_luong_sv_dan_toc_Trung_cap" class="form-control m-input">
                        </div>
                        <span class="text-danger" id="so_luong_sv_dan_toc_Trung_cap_error"></span>
                    </div>
                    
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tổng số có hộ khẩu Hà Nội</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="" name="so_luong_sv_ho_khau_HN_Trung_cap" id="so_luong_sv_ho_khau_HN_Trung_cap" class="form-control m-input">
                        </div>
                        <span class="text-danger" id="so_luong_sv_ho_khau_HN_Trung_cap_error"></span>
                    </div>
                
                
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Hộ khẩu Hà Nội thuộc đối tượng tốt nghiệp THCS</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="" name="ho_khau_HN_THCS_Trung_cap" id="ho_khau_HN_THCS_Trung_cap" class="form-control m-input">
                        </div>
                        <span class="text-danger" id="ho_khau_HN_THCS_Trung_cap_error"></span>
                    </div>
                
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tốt nghiệp THCS
                        </label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="" name="so_Tot_nghiep_THCS"  id="so_Tot_nghiep_THCS"  class="form-control m-input">
                        </div>
                        <span class="text-danger" id="so_Tot_nghiep_THCS_error"></span>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tốt nghiệp THPT
                        </label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="" name="so_Tot_nghiep_THPT" id="so_Tot_nghiep_THPT" class="form-control m-input">
                        </div>
                        <span class="text-danger" id="so_Tot_nghiep_THPT_error"></span>
                    </div>
                    
                
                
                    
            </div>
          </div>
        
    </div>
</div>
    </div>
    <div class="row">
      <div class="col-lg-6">
            <div class="m-portlet m-portlet--full-height ">
        
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                        Kết quả tuyển sinh Sơ Cấp
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">

                        <div class="form-group m-form__group row">
                            <label class="col-lg-6 col-form-label">Tổng sinh viên</label>
                            <div class="col-xl-12 col-lg-12">
                                <input type="number" value="" name="so_luong_sv_So_cap" id="so_luong_sv_So_cap" class="form-control m-input">
                            </div>
                            <span class="text-danger" id="so_luong_sv_So_cap_error"></span>
                        </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Nữ</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number" value="" name="so_luong_sv_nu_So_cap" id="so_luong_sv_nu_So_cap" class="form-control m-input">
                                </div>
                                <span class="text-danger" id="so_luong_sv_nu_So_cap_error"></span>
                            </div>
                          
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Dân tộc thiểu số, ít người:</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number"  value="" name="so_luong_sv_dan_toc_So_cap" id="so_luong_sv_dan_toc_So_cap" class="form-control m-input">
                                </div>
                                <span class="text-danger" id="so_luong_sv_dan_toc_So_cap_error"></span>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Hộ khẩu Hà Nội:</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number"  value="" name="so_luong_sv_ho_khau_HN_So_cap" id="so_luong_sv_ho_khau_HN_So_cap" class="form-control m-input">
                                </div>
                                <span class="text-danger" id="so_luong_sv_ho_khau_HN_So_cap_error"></span>
                            </div>
                            
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-6">
            <div class="m-portlet m-portlet--full-height ">
        
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                        Kết quả tuyển sinh hệ khác
                        </h3>
                    </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        
                        
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Tổng sinh viên</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number" value="" name="so_luong_sv_he_khac" id="so_luong_sv_he_khac" class="form-control m-input">
                                </div>
                                <span class="text-danger" id="so_luong_sv_he_khac_error"></span>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Nữ</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number"  value="" name="so_luong_sv_nu_khac" id="so_luong_sv_nu_khac" class="form-control m-input" digits|require>
                                </div>
                                <span class="text-danger" id="so_luong_sv_nu_khac_error"></span>
                            </div>
                        
                        
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Dân tộc thiểu số, ít người:</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number"  value="" name="so_luong_sv_dan_toc_khac" id="so_luong_sv_dan_toc_khac" class="form-control m-input">
                                </div>
                                <span class="text-danger" id="so_luong_sv_dan_toc_khac_error"></span>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Hộ khẩu Hà Nội:</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number" value="" name="so_luong_sv_ho_khau_HN_khac" id="so_luong_sv_ho_khau_HN_khac" class="form-control m-input">
                                </div>
                                <span class="text-danger" id="so_luong_sv_ho_khau_HN_khac_error"></span>
                            </div>


                            {{-- <input type="number" hidden id="nghe_them_id" value="" name="nghe_id" class="form-control m-input"> --}}
                            {{-- <input type="number" hidden id="id_co_so_dao_tao" value="" name="id_co_so_dao_tao" class="form-control m-input"> --}}
                            <input type="number" hidden id="check_have_bieu_mau" value="1" name="check_have_bieu_mau" class="form-control m-input">

                    </div>
                </div>
                
            </div>
            </div>
            <div class="row">
                <div class="col m--align-left m--valign-middle"></div>
                <div class="col m--align-right">
                    <span  class="btn btn-primary" id="submitAdd">
                        Cập nhật
                    </span>

                </div>
            </div>

    </div>
    <form>

    
@endsection
@section('script')
<script>
    var url_get_nganh_nghe_co_so = "{{route('get-nganh-nghe-phan-loai-co-so')}}";
    var url_check_co_so_co_nganh_nghe = "{{route('get-nghe-da-nhap-cua-co-so')}}";
    var url_one_nghe_co_so_co_nganh_nghe = "{{route('get-one-nghe-tuyen-sinh')}}";
    var url_submit_tuyen_sinh = "{{route('tao-one-tuyen-sinh')}}";
</script>
<script src="{!! asset('tuyensinh/js/tuyensinh2.js') !!}"></script>
@endsection

