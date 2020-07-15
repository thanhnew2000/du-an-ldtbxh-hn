

function getDataDiaDiem(id_co_so) {
	let htmldata= ''
	axios
	.post(getDiaChiCoSo, {
		id : id_co_so
	})
	.then(function(response) {
		console.log(response.data)
		response.data.forEach(element=>{
		htmldata+=	`  <div class="m-section__content chi_nhanh${element.id}" chi_nhanh='${element.id}'>
			<div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
				<div class="m-demo__preview m-demo__preview--btn">
					<span class="btn btn-brand">${element.dia_chi}</span> <i onclick="addForm(this)"
						class="fa fa-plus"></i>
					<div class="form_add_nghe">
					</div>
				</div>
			</div>
		</div>`
		})
		$('.danh_sach_co_so').html(htmldata)
	})
	.catch(function(error) {
		console.log(error);
	});
}


var arrayAdd = {};
var ngheIdAdd = [];

function addDuLieuGiayChungNhan() {
    var file_data = $("#customFileGiayPhep").prop("files")[0];

    // data giấy chứng nhận
    var form_data = new FormData();
    form_data.append("anh_quyet_dinh", file_data);
    form_data.append("so_quyet_dinh", $('[name ="so_quyet_dinh"]').val());
    form_data.append("ngay_ban_hanh", $('[name ="ngay_ban_hanh_giay_phep"]').val());
    form_data.append("ngay_hieu_luc", $('[name ="ngay_hieu_luc_giay_phep"]').val());
    form_data.append("ngay_het_han", $('[name ="ngay_het_han_giay_phep"]').val());
    form_data.append("mo_ta", $('[name ="mo_ta"]').val());
    form_data.append("co_so_id", 12);
    console.log(Array.from(form_data));

    //  get list chi nhánh
    var list = document.querySelectorAll(".m-section__content");
    var chi_nhanh = [];
    list.forEach(element => {
        chi_nhanh.push($(element).attr("chi_nhanh"));
    });
    //end list chi nhánh

    // start get data nghề theo địa điểm
    chi_nhanh.forEach(element => {
        arrayAdd["diadiem" + element] = [];
        ngheIdAdd["diadiem" + element]= [];
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
                quy_mo_tuyen_sinh: $(getNghe[index])
                    .find(".so_luong")
                    .val()
            };
            arrayAdd["diadiem" + element].push(obj);
            var nghe_id_add =  $(getNghe[index]) .find(".nganh_nghe") .val();
            ngheIdAdd["diadiem" + element].push(nghe_id_add);
        }
    });
    var dataAddNghe = {
        co_so_id: 12,
        data: arrayAdd
    };
    addGiayChungNhanNghe(dataAddNghe, form_data);
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
function addGiayChungNhanNghe(dataAddNghe, form_data) {
    // var resultCheckDuplicate = false;
    // var checkD = false;
    // ngheIdAdd.forEach(e => {
    //       resultCheckDuplicate = hasDuplicates(e);
    //       if(resultCheckDuplicate == true){
    //             checkD = true;
    //       }
    //       console.log(e);
    // })
    // console.log(ngheIdAdd);
    // if(checkD){
    //     alert('Have some duplicate');
    // }else{
    //     alert('No duplicate');
    // }
    
    axios
        .post(addGiayChungNhan, form_data)
        .then(function(response) {
            if (response.data > 0) {
                dataAddNghe.id_giay_chung_nhan = response.data;
                addNghe(dataAddNghe);
                console.log(dataAddNghe);
       
            }
            $('#so_quyet_dinh_error').html('');
            $('#anh_giay_phep_error').html('');
            $('#ngay_ban_hanh_giay_phep_error').html('');
            $('#ngay_hieu_luc_giay_phep_error').html('');
            $('#ngay_het_han_giay_phep_error').html('');
        })
        .catch(function(error) {
            // error.response.data
            console.log(error.response.data);
            $('#so_quyet_dinh_error').html('');
            $('#anh_giay_phep_error').html('');
            $('#ngay_ban_hanh_giay_phep_error').html('');
            $('#ngay_hieu_luc_giay_phep_error').html('');
            $('#ngay_het_han_giay_phep_error').html('');
            $('#so_quyet_dinh_error').html(error.response.data.errors.so_quyet_dinh);
            $('#anh_giay_phep_error').html(error.response.data.errors.anh_quyet_dinh);
            $('#ngay_ban_hanh_giay_phep_error').html(error.response.data.errors.ngay_ban_hanh);
            $('#ngay_hieu_luc_giay_phep_error').html(error.response.data.errors.ngay_hieu_luc);
            $('#ngay_het_han_giay_phep_error').html(error.response.data.errors.ngay_het_han);
        });
}

function addNghe(dataNghe) {
    axios
        .post(storeUrl, dataNghe)
        .then(function(response) {
            console.log("thành công");
        })
        .catch(function(error) {
            console.log(error);
        });
}

// // end mang nghe chi nhanh

let addForm = e => {
    var html = "";
    for (var property in config) {
        html += `<option value=${config[property].ma_bac}>${config[property].ten_bac}</option>`;
    }
    var chi_nhanh_add_nghe = $(e)
        .parents(".m-section__content")
        .find(".form_add_nghe");
    $(chi_nhanh_add_nghe).append(
        ` <div class="row add_nghe_dia_chi mt-4">
				<div class="col-4">
					<select onchange="getNgheTheoCapBac(this)" class="form-control  m-input cap_nghe" >
						<option>Chọn cấp nghề</option>
					${html}
					</select>
				</div>
				<div class="col-4">
					<select disabled class="form-control nganh_nghe  m-input " >
						<option>Chọn nghề</option>
					</select>
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

function getNgheTheoCapBac(e) {
    $("#preload").css("display", "block");
    axios
        .post(urlNganhNghe, {
            id: $(e).val()
        })
        .then(function(response) {
            if ($(e).val() >= 5) {
                var htmldata = '<option value="" selected  >Chọn nghề</option>';
                response.data.forEach(element => {
                    htmldata += `<option value="${element.id}">${element.id}-${element.ten_nganh_nghe}</option>`;
                });
                $(e)
                    .parents(".add_nghe_dia_chi")
                    .find(".nganh_nghe")
                    .select2();
            } else {
                var htmldata = '<option value="" selected  >Chọn nghề</option>';
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

let deleteForm = e => {
    $(e)
        .parents(".add_nghe_dia_chi")
        .remove();
};
function showimages(element) {
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        $("#showimg").attr("src", reader.result);
        // console.log('RESULT', reader.result)
    };
    reader.readAsDataURL(file);
}

$(document).ready(function() {
    $("#co-so-id-js").select2();

    $(".form-control").attr("autocomplete", "off");

    $("#summernote").summernote({
        height: 150,
        toolbar: [
            ["style", ["bold", "italic", "underline", "clear"]],
            ["fontname", ["fontname"]],
            ["fontsize", ["fontsize"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["table", ["table"]],
            ["insert", ["link"]],
            ["view", ["fullscreen"]]
        ]
    });

    $("#chon-nghe-cao-dang").select2({
        placeholder: "Tìm kiếm ngành nghề"
    });

    $("#chon-nghe-trung-cap").select2({
        placeholder: "Tìm kiếm ngành nghề"
    });
});

$(".datepicker").datepicker({
    format: "dd-mm-yyyy",
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
    }
});
