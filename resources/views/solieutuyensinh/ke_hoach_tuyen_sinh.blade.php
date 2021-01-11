@extends('layouts.admin')
@section('title', 'Kế hoạch tuyển sinh')
@section('content')
<form id="formAddKeHoachTuyenSinh">

<div class="m-content container-fluid">
    <div class="m-portlet">
        @csrf
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                       Kế hoạch tuyển sinh
                    </h3>
                </div>
            </div>
        </div>
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
                                    <select name="co_so_id" id="co_so_id" class="form-control ">
                                        <option selected value="">Chọn cơ sở</option>
                                        @foreach ($co_so as $item)
                                            <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <span class="text-danger" id="co_so_id_error"></span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm:</label>
                                <div class="col-lg-2">
                                <input type="text" disabled value="{{$yearNow}}" id="year" name="year"
                                        class="form-control" > 
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label"> Tên ngành nghề:</label>
                                
                                <div class="d-flex bd-highlight col-lg-8">
                                    <div class=" w-100 bd-highlight">
                                        <input type="text"  value="" id="name_nganh_nghe" disabled
                                        class="form-control" placeholder="Tên ngành nghề">
                                    </div>
                                    <div class="ml-1 flex-shrink-1 bd-highlight">
                                        <span class="btn btn-outline-primary" onclick="addSubmitNghe()" id="SubmitaddNghe">Nhập</span>
                                    </div>
                                  </div>
                                
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-group m-form__group row ">
                                <div class="col-lg-12 mt-5 ">
                                    <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                                        <thead>
                                          <tr>
                                            <th scope="col-1"></th>
                                            <th scope="col-1"></th>
                                            <th scope="col-1"></th>
                                            <th scope="col-1"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td class="m-scrollable" data-scrollable="true" style="height: 200px;width:300px;" >
                                                <div class="m-scrollable" data-scrollable="true" style="height: 200px" > 
                                                    <div class="m-radio-inline" id="fillCotOne">
                                                      
                                                    </div>
                                            </td>
                                            <td class="m-scrollable" data-scrollable="true" style="height: 200px;width:300px;" id="fillNgheTwo">
                                                <div class="m-scrollable" data-scrollable="true" style="height: 200px" > 
                                                    <div class="m-radio-inline" id="fillCotTwo">
                                                      
                                                    </div>
                                                
                                            </td>
                                            <td class="m-scrollable" data-scrollable="true" style="height: 200px;width:300px;" id="fillNgheThree" >
                                                <div class="m-scrollable" data-scrollable="true" style="height: 200px" > 
                                                    <div class="m-radio-inline" id="fillCotThree">
                                                      
                                                    </div>
                                            </td>
                                            <td class="m-scrollable" data-scrollable="true" style="height: 200px;width:300px;" id="fillNgheFour">
                                                <div class="m-scrollable" data-scrollable="true" style="height: 200px" > 
                                                    <div class="m-radio-inline" id="fillCotFour">
                                                      
                                                    </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                           
                        </div>
                    </div>

                </div>
                
            </div>
    </div>
    
    <div class="m-portlet">
        
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  Tổng kế hoạch tuyển sinh dự kiến
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
                    
                    <td><input type="number"   value="" name="ke_hoach_tuyen_sinh_cao_dang"  id="ke_hoach_tuyen_sinh_cao_dang" class="form-control m-input">
                    </td>
                    <td><input type="number"   value="" name="ke_hoach_tuyen_sinh_trung_cap" id="ke_hoach_tuyen_sinh_trung_cap" class="form-control m-input">
                      </td>
                    <td><input type="number"   value="" name="ke_hoach_tuyen_sinh_so_cap" id="ke_hoach_tuyen_sinh_so_cap" class="form-control m-input">
                      </td>
                    <td><input type="number"   value="" name="ke_hoach_tuyen_sinh_khac"  id="ke_hoach_tuyen_sinh_khac" class="form-control m-input">
                      </td>
                  </tr>
                  <tr>
                    <td><label id="ke_hoach_tuyen_sinh_cao_dang_error"  class="text-danger" for="ke_hoach_tuyen_sinh_cao_dang" ></label></td>
                    <td><label id="ke_hoach_tuyen_sinh_trung_cap_error"  class="text-danger" for="ke_hoach_tuyen_sinh_trung_cap" ></label></td>
                    <td><label id="ke_hoach_tuyen_sinh_so_cap_error" class="text-danger" for="ke_hoach_tuyen_sinh_so_cap" ></label></td>
                    <td><label id="ke_hoach_tuyen_sinh_khac_error"  class="text-danger" for="ke_hoach_tuyen_sinh_khac" ></label></td>
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
                    Dự kiến kế hoạch tuyển sinh Cao Đẳng
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tổng Cao Đẳng:</label>
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
                    Dự kiến kế hoạch tuyển sinh Trung Cấp
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="form-group m-form__group row">
                    <label class="col-lg-6 col-form-label">Tổng Trung Cấp </label>
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


                    {{-- <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tổng Trung Cấp:</label>
                        <div class="col-xl-12 col-lg-12">
                            <input type="number"  value="" name="" class="form-control m-input">
                        </div>
                    </div> --}}
                
                
                    
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
                        Dự kiến kế hoạch tuyển sinh Sơ Cấp
                    </h3>
                  </div>
                </div>
              </div>
              <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tổng sơ cấp</label>
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
                        Dự kiến kế hoạch tuyển sinh hệ khác
                    </h3>
                  </div>
                </div>
              </div>
              <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-6 col-form-label">Tổng hệ khác</label>
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
                        
                       

                </div>
              </div>
        </div>
    </div>
    
    </div>
    <div class="row">
        <div class="col m--align-left m--valign-middle"></div>
        <div class="col m--align-right">
            {{-- <button class="btn btn-secondary mr-1">Hủy</button> --}}
            <span class="btn btn-primary" id="submitAdd">
                Thêm
            </span>
            
        </div>
    </div>
</form>

@endsection
@section('script')
<script>

    var url_get_ke_hoach_co_so = "{{route('getKeHoachTuyenSinhTheoCs')}}";
    var url_get_one_nghe = "{{route('getOneNgheKeHoachTuyenSinh')}}";
    var url_store_update= "{{route('store.update.kehoachtuyensinh')}}";
    
    
    let nodeList = document.querySelectorAll(".m-input");
    const listField = [];
    nodeList.forEach((element) => {
        listField.push(element.getAttribute("name"));
    });
    console.log(listField)
    let indexNumber = 0;

    function addSubmitNghe(){
                indexNumber++;
                var d = new Date();
                var n = d.getTime();
                var name_Add = $('#name_nganh_nghe').val();
                var co_so = $('#co_so_id').val();
                if(name_Add !== "" && co_so !== ''){
                var idFill = 'fillCotOne';
                if(indexNumber <= 5){
                    idFill = 'fillCotOne';
                }else if(indexNumber > 5 && indexNumber <= 10){
                    idFill = 'fillCotTwo';
                }else if(indexNumber > 10 && indexNumber <= 15){
                    idFill = 'fillCotThree';
                }else {
                    idFill = 'fillCotFour';
                }
                $( "#"+idFill).append(`<div class="row ml-1 mb-2 mr-2 pt-2 pl-2"  id="${n}">
                    <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                            <input type="radio" onchange="clickChecked(this)" setId="${n}"  value="${name_Add}" name="nghe_id"> ${name_Add}
                            <span></span>
                    </label>
                </div>`);
            }
    }

    function clickChecked(e){
            $(".loading").css("display", "block");
                console.log(listField);
                listField.forEach(element => {
                    $('#'+element).val('');
                });
                listField.forEach(element => {
                    $('#'+element+'_error').html('');
                });
                axios.post(url_get_one_nghe, {
                    id:  $(e).val(),
                })
                .then(function (response) {
                    console.log(response.data)
                    for (const key in response.data) {
                        $('#'+key).val(response.data[key]);
                    }
                $(".loading").css("display", "none");
                })
                .catch(function (error) {
                $(".loading").css("display", "none");
                    console.log(error);
                });
    }


    $('#submitAdd').click(function(){
        var value_checked = $("input[name='nghe_id']:checked").val();
        if(isNaN(value_checked)){
            var check_nghe = $("input[name='nghe_id']:checked").attr('setId');
        }

        var formData = document.getElementById('formAddKeHoachTuyenSinh');
        var form_data = new FormData(formData); 
        axios.post(url_store_update,form_data)
        .then(function (response) {
            console.log(response);
            if(response.data !== 'update'){
                $("input[name='nghe_id']:checked").val(response.data);
                $("input[name='nghe_id']:checked").removeAttr('setId');
                $("input[name='nghe_id']:checked").attr('id',response.data)
            }

            $('#'+check_nghe).css("background","rgba(135, 206, 250, 0.5)");
            // showOneNgheEdit();
            Swal.fire({
            title: 'Cập nhật thành công',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000
            });
            listField.forEach(element => {
                                $('#'+element+"_error").text('');
            });
        })
        .catch(function (error) {
            console.log(error);
            listField.forEach(element => {
                            $('#'+element+'_error').html('');
            });
            for (const key in error.response.data.errors) {
                            console.log(error.response.data.errors[key]);
                            $('#'+key+'_error').html(error.response.data.errors[key]);
            }
        });
     })

    $('#co_so_id').change(function (){
        $('#name_nganh_nghe').prop('disabled', false);
        if($('#co_so_id').val() == ''){
            $("#name_nganh_nghe").prop('disabled', true);
        }
        indexNumber = 0 ;
        axios.post(url_get_ke_hoach_co_so, {
            id:  $("#co_so_id").val(),
            year:  $("#year").val(),
        })
        .then(function (response) {
            console.log(response.data);
            var cotOne =``;
            var cotTwo =``;
            var cotThree =``;
            var cotFour =``;

            var valueAppen = ``;
            console.log(response.data)
            if(response.data !== 'No'){
                response.data.map((element,index) => {
                indexNumber++;
                valueAppen = `<div class="row ml-1 mb-2 mr-2 pt-2 pl-2"  id="colorBorder${element.id}" style="background:rgba(135, 206, 250, 0.5)" >
                            <label class="m-checkbox m-checkbox--air m-checkbox--state-brand">
                                <input type="radio" id="${element.id}" onchange="clickChecked(this)" value="${element.id}" name="nghe_id"> ${element.nghe}
                                <span></span>
                        </label>
                        </div>`;
                if(indexNumber <= 5){
                     cotOne += valueAppen ;
                }else if(indexNumber > 5 && indexNumber <= 10){
                    cotTwo += valueAppen ;
                }else if(indexNumber > 10 && indexNumber <= 15){
                    cotThree += valueAppen ;
                }else {
                    cotFour += valueAppen ;
                }
            });
            }
            $('#fillCotOne').html(cotOne);    
            $('#fillCotTwo').html(cotTwo);    
            $('#fillCotThree').html(cotThree);    
            $('#fillCotFour').html(cotFour);    
        })
        .catch(function (error) {
            console.log(error);
        });
    })

    </script>
@endsection