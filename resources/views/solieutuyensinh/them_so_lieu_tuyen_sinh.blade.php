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
<form id="formAddTuyenSinh" action="{{route('tao-one-tuyen-sinh')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="m-content container-fluid">
    <div class="m-portlet">
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
                @if (session('thongbao'))
                <div class="alert alert-success text-center ml-5 mt-1">
                    {{session('thongbao')}}
                </div>
                @endif
            </div>
        </div>
        {{-- <form action="" method="get" class="m-form"> --}}
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
                                    <select name="co_so_id" id='co_so_id' class="form-control ">
                                        <option selected value="">Chọn cơ sở</option>
                                        @foreach ($co_so as $item)
                                            <option  {{(old('co_so_id')==$item->id) ? 'selected': '' }} value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('co_so_id')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror


                        </div>
                        <div class="col-md-2 chonDot">
                            <select name="year" id="yearChon" class="form-control">
                                <option value="2020" {{(old('year')==2020) ? 'selected': '' }} >2020</option>
                                <option value="2021" {{(old('year')==2021) ? 'selected': '' }} >2021</option>
                            </select>
                            @error('year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group m-form__group row chonDot" >
                                <div class="row ml-1 mb-2 mr-2 pt-2 pl-2">
                                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand" >
                                           <input type="radio" value='1' {{(old('dot')==1) ? 'checked': '' }}  name="dot"> 6 Tháng đầu năm
                                            <span></span>
                                   </label>
                                </div>
                                <div class="row ml-1 mb-2 mr-2 pt-2 pl-2">
                                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand" >
                                           <input type="radio" value='2'  {{(old('dot')==2) ? 'checked': '' }}  name="dot"> 6 Tháng cuối năm
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

                                  @error('nghe_id')
                                            <div class="text-danger">{{ $message }}</div>
                                  @enderror


                            </div>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-2">
                        <span type="button" id="sreachBoLoc"class="btn btn-primary">Tìm kiếm</span>
                    </div>
                </div>
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
                    <input type="number"  value="{{old('ke_hoach_tuyen_sinh_cao_dang')}}" name="ke_hoach_tuyen_sinh_cao_dang" id="ke_hoach_tuyen_sinh_cao_dang" class="form-control m-input">
                    @error('ke_hoach_tuyen_sinh_cao_dang')
                            <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </td>
                    <td>
                     <input type="number"  value="{{old('ke_hoach_tuyen_sinh_trung_cap')}}" name="ke_hoach_tuyen_sinh_trung_cap" id="ke_hoach_tuyen_sinh_trung_cap" class="form-control m-input">
                        @error('ke_hoach_tuyen_sinh_trung_cap')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
           
                    <td>
                        <input type="number"  value="{{old('ke_hoach_tuyen_sinh_so_cap')}}" name="ke_hoach_tuyen_sinh_so_cap" id="ke_hoach_tuyen_sinh_so_cap" class="form-control m-input">
                            @error('ke_hoach_tuyen_sinh_so_cap')
                              <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </td>
                    <td>
                        <input type="number"  value="{{old('ke_hoach_tuyen_sinh_khac')}}" name="ke_hoach_tuyen_sinh_khac" id="ke_hoach_tuyen_sinh_khac"  class="form-control m-input">
                            @error('ke_hoach_tuyen_sinh_khac')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                        <label class="col-lg-6 col-form-label">Nữ</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="{{old('so_luong_sv_nu_Cao_dang')}}" name="so_luong_sv_nu_Cao_dang" id="so_luong_sv_nu_Cao_dang" class="form-control m-input">
                             @error('so_luong_sv_nu_Cao_dang')
                                <div class="text-danger">{{ $message }}</div>
                             @enderror
                        </div>
                    </div>
            
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Dân tộc thiểu số, ít người:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="{{old('so_luong_sv_dan_toc_Cao_dang')}}" name="so_luong_sv_dan_toc_Cao_dang" id="so_luong_sv_dan_toc_Cao_dang" class="form-control m-input">
                        </div>
                         @error('so_luong_sv_dan_toc_Cao_dang')
                                <div class="text-danger">{{ $message }}</div>
                         @enderror

                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Hộ khẩu Hà Nội:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="{{old('so_luong_sv_ho_khau_HN_Cao_dang')}}" name="so_luong_sv_ho_khau_HN_Cao_dang" id="so_luong_sv_ho_khau_HN_Cao_dang" class="form-control m-input">
                                
                        </div>
                        @error('so_luong_sv_ho_khau_HN_Cao_dang')
                                <div class="text-danger">{{ $message }}</div>
                         @enderror

                    </div>
                
 
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tuyển mới:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="{{old('so_tuyen_moi_Cao_dang')}}" name="so_tuyen_moi_Cao_dang" id="so_tuyen_moi_Cao_dang" class="form-control m-input">
                        </div>
                        @error('so_tuyen_moi_Cao_dang')
                                <div class="text-danger">{{ $message }}</div>
                         @enderror

                    </div>
                
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Liên thông:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="{{old('so_lien_thong_Cao_dang')}}" name="so_lien_thong_Cao_dang" id="so_lien_thong_Cao_dang" class="form-control m-input">
                        </div>
                            @error('so_lien_thong_Cao_dang')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

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
                        <label class="col-lg-6 col-form-label">Nữ</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="{{old('so_luong_sv_nu_Trung_cap')}}" name="so_luong_sv_nu_Trung_cap" id="so_luong_sv_nu_Trung_cap" class="form-control m-input">
                                
                        </div>
                            @error('so_luong_sv_nu_Trung_cap')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                    </div>
          
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Dân tộc thiểu số, ít người:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="{{old('so_luong_sv_nu_Trung_cap')}}" name="so_luong_sv_dan_toc_Trung_cap" id="so_luong_sv_dan_toc_Trung_cap" class="form-control m-input">
                        </div>
                             @error('so_luong_sv_dan_toc_Trung_cap')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tổng số có hộ khẩu Hà Nội</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="{{old('so_luong_sv_ho_khau_HN_Trung_cap')}}" name="so_luong_sv_ho_khau_HN_Trung_cap" id="so_luong_sv_ho_khau_HN_Trung_cap" class="form-control m-input">
                                
                        </div>
                        @error('so_luong_sv_ho_khau_HN_Trung_cap')
                            <div class="text-danger">{{ $message }}</div>
                       @enderror

                    </div>
                
                
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Hộ khẩu Hà Nội thuộc đối tượng tốt nghiệp THCS</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="{{old('ho_khau_HN_THCS_Trung_cap')}}" name="ho_khau_HN_THCS_Trung_cap" id="ho_khau_HN_THCS_Trung_cap" class="form-control m-input">
                        </div>
                        @error('ho_khau_HN_THCS_Trung_cap')
                             <div class="text-danger">{{ $message }}</div>
                          @enderror

                    </div>
                
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tốt nghiệp THCS
                        </label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="{{old('so_Tot_nghiep_THCS')}}" name="so_Tot_nghiep_THCS"  id="so_Tot_nghiep_THCS"  class="form-control m-input">
                                
                        </div>
                        @error('so_Tot_nghiep_THCS')
                             <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tốt nghiệp THPT
                        </label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number" value="{{old('so_Tot_nghiep_THPT')}}" name="so_Tot_nghiep_THPT" id="so_Tot_nghiep_THPT" class="form-control m-input">
                                
                        </div>
                        @error('so_Tot_nghiep_THPT')
                             <div class="text-danger">{{ $message }}</div>
                        @enderror

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
                                <label class="col-lg-6 col-form-label">Nữ</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number" value="{{old('so_luong_sv_nu_So_cap')}}" name="so_luong_sv_nu_So_cap" id="so_luong_sv_nu_So_cap" class="form-control m-input">
                                        
                                </div>
                                @error('so_luong_sv_nu_So_cap')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                          
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Dân tộc thiểu số, ít người:</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number"  value="{{old('so_luong_sv_dan_toc_So_cap')}}" name="so_luong_sv_dan_toc_So_cap" id="so_luong_sv_dan_toc_So_cap" class="form-control m-input">
                                </div>
                                @error('so_luong_sv_dan_toc_So_cap')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Hộ khẩu Hà Nội:</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number"  value="{{old('so_luong_sv_ho_khau_HN_So_cap')}}" name="so_luong_sv_ho_khau_HN_So_cap" id="so_luong_sv_ho_khau_HN_So_cap" class="form-control m-input">
                                        
                                </div>
                                @error('so_luong_sv_ho_khau_HN_So_cap')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

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
                                <label class="col-lg-6 col-form-label">Nữ</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number"   value="{{old('so_luong_sv_nu_khac')}}" name="so_luong_sv_nu_khac" id="so_luong_sv_nu_khac" class="form-control m-input" digits|require>
                                        
                                </div>
                                @error('so_luong_sv_nu_khac')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        
                        
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Dân tộc thiểu số, ít người:</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number"  value="{{old('so_luong_sv_dan_toc_khac')}}" name="so_luong_sv_dan_toc_khac" id="so_luong_sv_dan_toc_khac" class="form-control m-input">
                                </div>
                                @error('so_luong_sv_dan_toc_khac')
                                      <div class="text-danger">{{ $message }}</div>
                               @enderror

                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-6 col-form-label">Hộ khẩu Hà Nội:</label>
                                <div class="col-xl-12 col-lg-12">
                                    <input type="number" value="{{old('so_luong_sv_ho_khau_HN_khac')}}"  name="so_luong_sv_ho_khau_HN_khac" id="so_luong_sv_ho_khau_HN_khac" class="form-control m-input">
                                </div>
                                @error('so_luong_sv_ho_khau_HN_khac')
                                   <div class="text-danger">{{ $message }}</div>
                                @enderror
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
                    <button type="submit" class="btn btn-primary" id="submitAdd">
                        Cập nhật
                    </button>

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


    // var url_submit_tuyen_sinh = "{{route('tao-one-tuyen-sinh')}}";
    if($("#co_so_id").val() != ''){
        $(".chonDot").css("display", "block");
    }

    let nodeList = document.querySelectorAll(".m-input");
    const listField = [];
    nodeList.forEach((element) => {
        listField.push(element.getAttribute("name"));
    });

    listField.splice(-2);
    console.log(listField);

    function showOneNgheEdit(ngheDaCo){

     $('input:radio[name="nghe_id"]').change(function(){


        let arrayNghe = [];
        ngheDaCo.forEach(element =>{
            arrayNghe.push(element.nghe_id);
        })
        console.log(arrayNghe);
        let nghe_id_chon = $("input[name='nghe_id']:checked").val();
        nghe_id_chon = parseInt(nghe_id_chon);

        if(arrayNghe.includes(nghe_id_chon)){
         $(".loading").css("display", "block");
                axios.post(url_one_nghe_co_so_co_nganh_nghe
                    , {
                        id_nghe_chon:   $("input[name='nghe_id']:checked").val(),
                        id:  $("#co_so_id").val(),
                        dot: $("input[name='dot']:checked").val(),
                        year: $("#yearChon").val(),
                    }
                    )
                    .then(function (response) {
                        $(".loading").css("display", "none");
                        // console.log(response.data[0]);
                        for (const key in response.data[0]) {
                            $('#'+key).val(response.data[0][key]);
                        }
                    })
                    .catch(function (error) {
                         console.log(error);
                         $(".loading").css("display", "none");
                    });
            }else if(!arrayNghe.includes(nghe_id_chon)){
                    $(".loading").css("display", "none");
                    // console.log(listField);
                    listField.forEach(element => {
                        $('#'+element).val('');
                        console.log(element);
                    });
            }

      });
    }

    //  $('#submitAdd').click(function(){
    //     // $(".chonDot").css("display", "block");
    //     // $id_nghe_chon =  $("input[name='nghe_id']:checked").val();
    //     // $('#nghe_them_id').val($id_nghe_chon);
    //  })

    $('#sreachBoLoc').click(function(){
        $(".loading").css("display", "block");
         axios.post(url_get_nganh_nghe_co_so,{
            id:  $("#co_so_id").val(),
            })
            .then(function (response) {
                var htmlCaoDang =``;
                var htmlTrungCap =``;
                var htmlSoCo =``;
                var htmlDuoi3Thang =``;

                console.log(response.data['cao_dang']);

                response.data['cao_dang'].forEach(element => {
                    htmlCaoDang+=`<div class="row ml-1 mb-2 mr-2 pt-2 pl-2"  id="colorBorder${element.id}">
                             <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                                    <input type="radio" id="${element.id}" value="${element.id}" name="nghe_id">${element.id} - ${element.ten_nganh_nghe}
                                    <span></span>
                            </label>
                            </div>`
                });

                response.data['trung_cap'].forEach(element => {
                    htmlTrungCap+=`<div class="row ml-1 mb-2 mr-2 pt-2 pl-2"  id="colorBorder${element.id}">
                         <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                                    <input type="radio"  id="${element.id}" value="${element.id}" name="nghe_id" >${element.id} - ${element.ten_nganh_nghe}
                                    <span></span>
                            </label>
                        </div>`
                });

                response.data['so_cap'].forEach(element => {
                    htmlSoCo+=`<div class="row ml-1 mb-2 mr-2 pt-2 pl-2" id="colorBorder${element.id}">
                         <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                                    <input type="radio"   id="${element.id}" value="${element.id}" name="nghe_id">${element.id} - ${element.ten_nganh_nghe}
                                    <span></span>
                            </label>
                        </div>`
                });

                response.data['nghe_duoi_3_thang'].forEach(element => {
                    htmlDuoi3Thang+=`
                         <div class="row ml-1 mb-2 mr-2 pt-2 pl-2"  id="colorBorder${element.id}">
                         <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                                    <input type="radio"  id="${element.id}" value="${element.id}" name="nghe_id">${element.id} - ${element.ten_nganh_nghe}
                                    <span></span>
                            </label>
                        </div>`
                });
          
                $('#show_nghe_cao_dang').html(htmlCaoDang);
                $('#show_nghe_trung_cap').html(htmlTrungCap);
                $('#show_nghe_so_cap').html(htmlSoCo);
                $('#show_nghe_khac').html(htmlDuoi3Thang);

                axios.post(url_check_co_so_co_nganh_nghe
                , {
                    id:  $("#co_so_id").val(),
                    dot: $("input[name='dot']:checked").val(),
                    year: $("#yearChon").val(),
                }
                )
                .then(function (response) {
                   showOneNgheEdit(response.data);
                    console.log(response.data);
                    response.data.forEach(element => {
                        $('#colorBorder'+element.nghe_id).css("background","rgba(135, 206, 250, 0.5)");
                        console.log(element.nghe_id);
                    });
                    $(".loading").css("display", "none");
                })
                .catch(function (error) {
                    $(".loading").css("display", "none");
                    $('#check_have_bieu_mau').val(0);
                    console.log(error);
                });
            })
            .catch(function (error) {
                console.log(error);
            });
     });


    $('#co_so_id').change(function(){
          $(".chonDot").css("display", "block");
    })


</script>
@endsection

