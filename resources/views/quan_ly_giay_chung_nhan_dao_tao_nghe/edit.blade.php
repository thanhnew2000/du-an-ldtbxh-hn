@extends('layouts.admin')
@section('title', 'Cập nhật giấy phép')
@section('style')
<style>
    .modal-xl {
        max-width: 1140px;
    }

    .error {
        color: red;
        margin-top: 5px;
    }

    .note-editable {
        padding: 40px;
    }
</style>
<link href="{!! asset('css_loading/css_loading.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content container-fluid">
    <div id="preload" class="preload-container text-center" style="display: none">
        <img id="gif-load" src="{!! asset('images/loading1.gif') !!}" alt="">
    </div>
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Cập nhật giấy chứng nhận đào tạo nghề
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label">Tên cơ sở/Mã cơ sở</label>
                            <div class="col-lg-8">
                                <select onchange="setValueQuyetDinh(this)" class="form-control col-12" name="co_so_id"
                                    id="co_so_id">
                                    <option value="0" selected disabled>Chọn trường</option>
                                    @foreach ($co_so as $item)
                                    <option value="{{$item->id}}">{{$item->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label">Số quyết đinh</label>
                            <div class="col-lg-8">
                                <select disabled onchange="setValueQuyetDinh(this)" class="form-control col-12"
                                    name="so_quyet_dinh" id="so_quyet_dinh">
                                    <option value="0" selected disabled>Chọn quyết định</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-2">
                    <button id="cap_nhat" data-toggle="modal" disabled data-target="#myModalThemMoi"
                        class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalThemMoi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật giấy phép đào tạo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="myForm" enctype="multipart/form-data">
                    <div class="m-portlet">
                        <div class="m-portlet__body">
                            <form action="" name="yourformname" id="giay_chung_nhan" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="co_so_id">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-stretch">
                                        <div class="col-12">
                                            @if (isset($Csdt))
                                            <div class="form-group1 m-form__group mb-4">
                                                <label for="">Tên trường: <b></b></label>
                                            </div>
                                            @endif


                                            <div class="form-group m-form__group mb-4">
                                                <label>Số quyết định <span class="text-danger">(*)</span></label>
                                                <input type="text" name="so_quyet_dinh" value="{{old('ten_giay_phep')}}"
                                                    class="form-control m-input" placeholder="Nhập số quết định">
                                                <input type="hidden" name="get_giay_phep_id" id="get_giay_phep_id">
                                            </div>

                                            <span class="text-danger" id="so_quyet_dinh_error"></span>

                                            <div class="form-group m-form__group">
                                                <label for="exampleInputEmail1">Ảnh giấy phép <span
                                                        class="text-danger">(*)</span></label>
                                                <div class="custom-file">
                                                    <input type="file" value="{{old('anh-giay-phep')}}"
                                                        name="anh_giay_phep" class="custom-file-input"
                                                        onchange="showimages(this)" id="customFileGiayPhep">
                                                    <label class="custom-file-label" for="customFileGiayPhep">Choose
                                                        file</label>
                                                </div>
                                                <p class="text-danger text-small" id="anh_giay_phep_error">
                                                </p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-6">
                                        <div class="anh-giay-phep">
                                            <img src="" id="showimg" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-12 mt-3">
                                    <div class="col-4">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày ban hành <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input onchange="chuyenNgayHieuLuc(this)" type="text"
                                                    name="ngay_ban_hanh" value="{{old('ngay_ban_hanh')}}"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger text-small" id="ngay_ban_hanh_error">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày hiệu lực <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_hieu_luc" value="{{old('ngay_hieu_luc')}}"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger text-small" id="ngay_hieu_luc_error">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày hết hạn <span class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_het_han" value="{{old('ngay_het_han')}}"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger text-small" id="ngay_het_han_error">
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-12">
                                    <div class="col-12 form-group m-form__group">
                                        <label for="exampleTextarea">Mô tả quyết định</label>
                                        <textarea class="form-control m-input" id="summernote" name="mo_ta"
                                            placeholder="Mô tả ngắn gọn nội dung giấy phép hoặc ghi chú"
                                            rows="4"></textarea>
                                    </div>
                                </div>
                            </form>
                            <p><span class="text-danger">(*)</span> Mục không được để trống</p>
                        </div>

                    </div>
                </form>
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Cập nhật nghề cho cơ sở
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="danh_sach_co_so">

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                        <button type="button" onclick="addDuLieuGiayChungNhan()" class="btn btn-danger">Cập
                            nhật</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('script')
    <script>
        $('#co_so_id').select2()
     $('#so_quyet_dinh').select2()
     const getGiayPhepUrl = "{{route('giay-chung-nhan-dao-tao-nghe.get-giay-phep')}}"
     const capNhatGiayPhepUrl = "{{route('giay-chung-nhan-dao-tao-nghe.update')}}"
     const getGiayPhepIdUrl = "{{route('giay-chung-nhan-dao-tao-nghe.get-giay-phep-id')}}"
     const capNhatNgheUrl = "{{route('giay-chung-nhan-dao-tao-nghe.update-nghe')}}"
     const urlNganhNghe = "{{route('getNghe')}}";
     function setValueQuyetDinh(e) {
        if ($(e).attr('name') == 'co_so_id' ) 
        { $('input[name=co_so_id]').val($(e).val())
            getGiayPhep($(e).val())
            if ($(e).val()>0 ) 
            {
               
                $('#so_quyet_dinh').attr('disabled',false)
            }else{
                $('#so_quyet_dinh').attr('disabled',true)
            }      
        }else{
            getGIayPhepId($(e).val())
            $('#get_giay_phep_id').val($(e).val())
            if ($(e).val()>0 ) 
            {
                $('#cap_nhat').attr('disabled',false)
            }else{
                $('#cap_nhat').attr('disabled',true)
            }      
        }

    }


    let getGiayPhep = (id) =>{
        $("#preload").css("display", "block");
        axios.post(getGiayPhepUrl,{
                'id': id
            })
            .then(function (response) {
                   $("#preload").css("display", "none");
                let html = ' <option value="0" selected disabled>Chọn quyết định</option>'
                response.data.forEach(element => {
                    html+= ` <option value=${element.id} selected >${element.so_quyet_dinh}</option>`
                });

               $('#so_quyet_dinh').html(html)
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
    }

    let getGIayPhepId = (id) => {
        $("#preload").css("display", "block");
        let urlImg = "{!! asset('storage/') !!}"+"/"
        axios.post(getGiayPhepIdUrl,{
                'id': id
            })
            .then(function (response) {
                var get_ngay_het_han = ""
                $("#preload").css("display", "none");
                $('#get_giay_phep_id').val(response.data.giay_phep.id)
                $("[name=so_quyet_dinh]").val(response.data.giay_phep.so_quyet_dinh)
                $("#showimg").attr('src',urlImg+response.data.giay_phep.anh_quyet_dinh)
                $("[name=ngay_ban_hanh]").val(moment(response.data.giay_phep.ngay_ban_hanh).format('DD-MM-YYYY'))
                $("[name=ngay_hieu_luc]").val(moment(response.data.giay_phep.ngay_hieu_luc).format('DD-MM-YYYY'))
                // console.log(response.data.giay_phep.ngay_het_han)
                if(response.data.giay_phep.ngay_het_han != null){
                     get_ngay_het_han = moment(response.data.giay_phep.ngay_het_han).format('DD-MM-YYYY')
                }
                $("[name=ngay_het_han]").val(get_ngay_het_han)
                $("[name=mo_ta_giay_phep]").val(response.data.giay_phep.mo_ta)
                $(".note-editable").html(response.data.giay_phep.mo_ta)
                // console.log(response.data.chi_nhanh)
                showDataDiaDiem(response.data.chi_nhanh)
            })
            .catch(function (error) {
               
            })
            .then(function () {
                // always executed
            });
    }


$('#summernote').summernote({
            height: 150,
            toolbar: 
            [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen']],
            ]
        });
        $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });
    function showimages(element) {
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
       $(element).parents('.modal-body').find('#showimg').attr("src", reader.result);
    };
    reader.readAsDataURL(file);
}

chuyenNgayHieuLuc = (e) => {
    $("[name=ngay_hieu_luc_nganh_nghe]").val($(e).val())
}


function showDataDiaDiem(dataChiNhanh) {
    console.log(dataChiNhanh);
    var htmldata= '' 
    var configBacNghe = {!! json_encode($bac_nghe) !!}
  
    dataChiNhanh.forEach(element=>{
        console.log(element)
        htmlDataNghe = ''   
        element.data.forEach(element1=>{
            let htmlCapNghe = ''
        for (var property in configBacNghe) {
            // console.log(element1.ten_nghe.bac_nghe==configBacNghe[property].ma_bac);
            htmlCapNghe += `<option ${element1.ten_nghe.bac_nghe==configBacNghe[property].ma_bac?'selected':''} value=${configBacNghe[property].ma_bac}>${configBacNghe[property].ten_bac}</option>`;
        }
            htmlDataNghe+=      `<div class="row add_nghe_dia_chi mt-4">
                                    <div class="col-4">
                                        <select onchange="getNgheTheoCapBac(this)" class="form-control  m-input cap_nghe" >
                                            <option value="no">Chọn cấp nghề</option>
                                            ${htmlCapNghe}
                                        </select>
                                        <span class="messageNoTrinhDo"></span>

                                    </div>
                                    <div class="col-4">
                                        <select disabled class="form-control nganh_nghe  m-input " >
                                            <option value="${element1.nghe_id}">${element1.ten_nghe.ten_nganh_nghe}</option>
                                        </select>
                                        <span class="messageNoNghe"></span>
                                        <input type="hidden" value="${element1.id}" name='id_chi_tiet'>
                                          
                                    </div>
                                    <div class="col-3">
                                        <input type="text" value="${element1.quy_mo}"  class="form-control m-input m-input--square so_luong"
                                            placeholder="Nhập số lượng tuyển sinh">
                                    </div>
                                    <div class="col-1">
                                        <i onclick="deleteForm(this)" class="fa fa-times"></i>
                                    </div>
                                </div>`
        })
		htmldata+=	`  <div class="m-section__content chi_nhanh${element.id}" chi_nhanh='${element.id}'>
			<div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
				<div class="m-demo__preview m-demo__preview--btn">
					<span class="btn btn-brand">${element.dia_chi}</span> <i onclick="addForm(this)"
						class="fa fa-plus"></i>
                    <div class="form_add_nghe">
                        ${
                            htmlDataNghe                
                        }
					</div>
				</div>
			</div>
		</div>`
        })
        // console.log(htmldata)
		$('.danh_sach_co_so').html(htmldata)
}
let addForm = e => {
    var html = "";
    var configBacNghe = {!! json_encode($bac_nghe) !!}
    for (var property in configBacNghe) {
        html += `<option value=${configBacNghe[property].ma_bac}>${configBacNghe[property].ten_bac}</option>`;
    }
    var chi_nhanh_add_nghe = $(e)
        .parents(".m-section__content")
        .find(".form_add_nghe");
    $(chi_nhanh_add_nghe).append(
        ` <div class="row add_nghe_dia_chi mt-4">
				<div class="col-4">
					<select onchange="getNgheTheoCapBac(this)" class="form-control  m-input cap_nghe" >
						<option value="no">Chọn cấp nghề</option>
					${html}
                    </select>
                    <span style='color:red' class="messageNoTrinhDo"></span>

				</div>
				<div class="col-4">
					<select disabled class="form-control nganh_nghe  m-input " >
						<option value="no">Chọn nghề</option>
                    </select>
                    <span class="messageNoNghe"></span>
                    <input type="hidden" value="0" name='id_chi_tiet'>
                </div>
                
				<div class="col-3">
					<input type="text"  class="form-control m-input m-input--square so_luong"
						placeholder="Nhập số lượng tuyển sinh">
				</div>
				<div class="col-1">
					<i onclick="deleteForm(this)" class="fa fa-times"></i>
				</div>
			</div>`
    );
};
let deleteForm = e => {
    $(e)
        .parents(".add_nghe_dia_chi")
        .remove();
};
$("#chon-nghe-cao-dang").select2({
        placeholder: "Tìm kiếm ngành nghề"
    });

$("#chon-nghe-trung-cap").select2({
    placeholder: "Tìm kiếm ngành nghề"
});
function getNgheTheoCapBac(e) {
    $("#preload").css("display", "block");
    axios
        .post(urlNganhNghe, {
            id: $(e).val()
        })
        .then(function(response) {
            if ($(e).val() >= 5) {
                var htmldata = '<option value="no" selected  >Chọn nghề</option>';
                response.data.forEach(element => {
                    htmldata += `<option value="${element.id}">${element.id}-${element.ten_nganh_nghe}</option>`;
                });
                $(e)
                    .parents(".add_nghe_dia_chi")
                    .find(".nganh_nghe")
                    .select2();
            } else {
                var htmldata = '<option value="no" selected  >Chọn nghề</option>';
                response.data.forEach(element => {
                    htmldata += `<option value="${element.ten_nganh_nghe}">${element.ten_nganh_nghe}</option>`;
                });
                $(e)
                    .parents(".add_nghe_dia_chi")
                    .find(".nganh_nghe")
                    .select2({
                        tags: true
                    });
            }
            $(e)
                .parents(".add_nghe_dia_chi")
                .find(".nganh_nghe")
                .html(htmldata);
            $(e)
                .parents(".add_nghe_dia_chi")
                .find(".nganh_nghe")
                .attr("disabled", false);

            $("#preload").css("display", "none");
        })
        .catch(function(error) {
            console.log(error);
        });
}
var arrayAdd = {};
var ngheIdAdd = [];
function addDuLieuGiayChungNhan() {
    $("#preload").css("display", "block");
    var checkEmptySome=[];
    var file_data = $("#customFileGiayPhep").prop("files")[0];
    // data giấy chứng nhận
    let myForm = document.getElementById('myForm');
    var form_data = new FormData(myForm);
    // form_data.append("anh_quyet_dinh", file_data);
    // form_data.append("get_giay_phep_id", $('[name ="get_giay_phep_id"]').val());
    // form_data.append("so_quyet_dinh", $('[name ="so_quyet_dinh"]').val());
    // form_data.append("ngay_ban_hanh", $('[name ="ngay_ban_hanh"]').val());
    // form_data.append("ngay_hieu_luc", $('[name ="ngay_hieu_luc"]').val());
    // form_data.append("ngay_het_han", $('[name ="ngay_het_han"]').val());
    // form_data.append("mo_ta", $('[name ="mo_ta"]').val());
    // form_data.append("co_so_id", $('input[name=co_so_id]').val());

    //  get list chi nhánh
    var list = document.querySelectorAll(".m-section__content");
    var chi_nhanh = [];
    list.forEach(element => {
        chi_nhanh.push($(element).attr("chi_nhanh"));
    });
    //end list chi nhánh

    // start get data nghề theo địa điểm
    var soIndex = -1;
    chi_nhanh.forEach(element => {
        soIndex++;
        arrayAdd["diadiem" + element] = [];
        ngheIdAdd[soIndex]= [];
        var getChiNhanh = document.querySelectorAll(`.chi_nhanh${element}`);
        var getNghe = $(getChiNhanh).find(".add_nghe_dia_chi");
        // console.log('nghề'+getNghe.length)
        for (let index = 0; index < getNghe.length; index++) {
            var obj = {
                trinh_do: $(getNghe[index])
                    .find(".cap_nghe")
                    .val(),
                nghe_id: $(getNghe[index])
                    .find(".nganh_nghe")
                    .val(),
                quy_mo: $(getNghe[index])
                    .find(".so_luong")
                    .val(),
                id_chi_tiet: $(getNghe[index])
                    .find("[name=id_chi_tiet]")
                    .val()
            };


            arrayAdd["diadiem" + element].push(obj);
            var nghe_id_add =  $(getNghe[index]) .find(".nganh_nghe").val();
            var trinhdo_id_add =  $(getNghe[index]) .find(".cap_nghe").val();

            if(trinhdo_id_add == 'no'){
              $(getNghe[index]).find(".messageNoNghe").text('');
              $(getNghe[index]).find(".messageNoTrinhDo").text('Bạn chưa chọn trình độ');
              checkEmptySome.push(trinhdo_id_add);
            }else if(nghe_id_add == 'no'){
              $(getNghe[index]).find(".messageNoTrinhDo").text('');
              $(getNghe[index]).find(".messageNoNghe").text('Bạn chưa chọn chọn nghề');
              checkEmptySome.push(trinhdo_id_add);
            }else{
              $(getNghe[index]).find(".messageNoTrinhDo").text('');
              $(getNghe[index]).find(".messageNoNghe").text('');
            }

            ngheIdAdd[soIndex].push(nghe_id_add);
        }
    });
    var dataAddNghe = {
        co_so_id: $('input[name=co_so_id]').val(),
        data: arrayAdd
    };
   
    if(checkEmptySome.length <= 0){
        addGiayChungNhanNghe(dataAddNghe, form_data,ngheIdAdd);
    }else{
        $("#preload").css("display", "none");
        console.log('Lỗi rồi nhé')
    }
}
function hasDuplicates(arr) {
    var counts = [];
    for (var i = 0; i <= arr.length; i++) {
        if (counts[arr[i]] === undefined) {
            counts[arr[i]] = 1;
        } else {
            return true;
        }
    }
    return false;
}
function addGiayChungNhanNghe(dataAddNghe, form_data,ngheIdAdd) {
        console.log('hello soemthing');
        var resultCheckDuplicate = false;
        var checkD = false;
       
        ngheIdAdd.forEach((element)=>{
            resultCheckDuplicate = hasDuplicates(element); 
            if(resultCheckDuplicate){
                checkD = true;
            }
        })
      
        if(checkD){
            console.log('Have some duplicate');
            $('#error_duplicate_nghe_id').text('Lỗi có chi nhánh bị trùng nghề');
        }else{
            $('#error_duplicate_nghe_id').text('');
                axios
                .post(capNhatGiayPhepUrl, form_data)
                .then(function(response) {
                    if (response.data > 0) {
                        dataAddNghe.id_giay_chung_nhan = $("[name=get_giay_phep_id]").val();
                        capNhatNghe(dataAddNghe);
                        console.log(dataAddNghe);
                    }
                    $('#so_quyet_dinh_error').html('');
                    $('#anh_giay_phep_error').html('');
                    $('#ngay_ban_hanh_error').html('');
                    $('#ngay_hieu_luc_error').html('');
                    $('#ngay_het_han_error').html('');
                })
                .catch(function(error) {
                    $("#preload").css("display", "none");
                    // console.log(error.response.data);
                    $('#so_quyet_dinh_error').html('');
                    $('#anh_giay_phep_error').html('');
                    $('#ngay_ban_hanh_error').html('');
                    $('#ngay_hieu_luc_error').html('');
                    $('#ngay_het_han_error').html('');
                    $('#so_quyet_dinh_error').html(error.response.data.errors.so_quyet_dinh);
                    $('#anh_giay_phep_error').html(error.response.data.errors.anh_quyet_dinh);
                    $('#ngay_ban_hanh_error').html(error.response.data.errors.ngay_ban_hanh);
                    $('#ngay_hieu_luc_error').html(error.response.data.errors.ngay_hieu_luc);
                    $('#ngay_het_han_error').html(error.response.data.errors.ngay_het_han);
                });
            }

         
        }
    
  

function capNhatNghe(dataNghe) {
    axios
        .post(capNhatNgheUrl, dataNghe)
        .then(function(response) {
        console.log("thành công");
        $("#preload").css("display", "none");
        Swal.fire({
            title: 'Cập nhật thành công',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
            }).then(() => {
            location.reload();
        });

        })
        .catch(function(error) {
            console.log(error);
        });
}

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/af.min.js"></script>
    @endsection