
	$(document).ready(function() {
    $('.select2').select2();	

});
var storeUrl = "{{route('store')}}"
var addGiayChungNhan = "{{route('addGiayChungNhan')}}"
var arrayAdd ={}

function addDuLieuGiayChungNhan() {
	var file_data = $('#customFile').prop('files')[0];
	
	// data giấy chứng nhận
	var form_data = new FormData();
	form_data.append('anh_quyet_dinh', file_data);
	form_data.append('so_quyet_dinh', $('[name ="so_quyet_dinh"]').val());
	form_data.append('ngay_ban_hanh', $('[name ="ngay_ban_hanh"]').val());
	form_data.append('ngay_hieu_luc', $('[name ="ngay_hieu_luc"]').val());
	form_data.append('ngay_het_han', $('[name ="ngay_het_han"]').val());
	form_data.append('mo_ta', $('[name ="mo_ta"]').val());
	form_data.append('co_so_id', 12);
	console.log(Array.from(form_data))

	//  get list chi nhánh
	var list = document.querySelectorAll('.m-section__content')
    var chi_nhanh = []
    list.forEach(element => {
        chi_nhanh.push($(element).attr('chi_nhanh'));
    });
    //end list chi nhánh

	// start get data nghề theo địa điểm
    chi_nhanh.forEach(element=>{
		arrayAdd['diadiem'+element] = [];
		var getChiNhanh = document.querySelectorAll(`.chi_nhanh${element}`);
		var getNghe  = $(getChiNhanh).find('.add_nghe_dia_chi');
		// console.log('nghề'+getNghe.length)
		for (let index = 0; index < getNghe.length; index++) {
			var obj = {
				trinh_do: $(getNghe[index]).find('.cap_nghe').val(),
				nghe_id: $(getNghe[index]).find('.nganh_nghe').val(),
				quy_mo_tuyen_sinh: $(getNghe[index]).find('.so_luong').val()
			}			
			arrayAdd['diadiem'+element].push(obj)	

		}
		
	})
	var dataAddNghe ={
		co_so_id:12,
		data: arrayAdd
	}
	addGiayChungNhanNghe(dataAddNghe,form_data)
	

}

function addGiayChungNhanNghe(dataAddNghe,form_data) {
	console.log(dataAddNghe.data)
	axios.post(addGiayChungNhan,form_data)
	.then(function (response) {
		if(response.data>0){
			dataAddNghe.id_giay_chung_nhan = response.data
			addNghe(dataAddNghe)
			console.log(dataAddNghe)
		}
	})
	.catch(function (error) {
		console.log(error);
	});
}



function addNghe(dataNghe) {
	axios.post(storeUrl,dataNghe)
	.then(function (response) {
		console.log('thành công');
	})
	.catch(function (error) {
		console.log(error);
	});
}

   
    // // end mang nghe chi nhanh 
	var config = <?php echo json_encode(config('common.bac_nghe')) ?>;
    let addForm =(e)=>{
       	var html= ''
        for (var property in config) {
            html += `<option value=${config[property].ma_bac}>${config[property].ten_bac}</option>`
        }
		var chi_nhanh_add_nghe =  $(e).parents('.m-section__content').find('.form_add_nghe')
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
      )
	}
	var urlNganhNghe = "{{route('getNghe')}}"
		function getNgheTheoCapBac(e){
			$('#preload').css('display','block')
			axios.post(urlNganhNghe, {
				id:  $(e).val(),
			})
			.then(function (response) {
				if( $(e).val()>=5){
					var htmldata = '<option value="" selected  >Chọn nghề</option>'
						response.data.forEach(element => {
							htmldata+=`<option value="${element.id}">${element.id}-${element.ten_nganh_nghe}</option>`
					});
					$(e).parents('.add_nghe_dia_chi').find('.nganh_nghe').select2()
				}else{
					var htmldata = '<option value="" selected  >Chọn nghề</option>'
						response.data.forEach(element => {
							htmldata+=`<option value="${element.ten_nganh_nghe}">${element.ten_nganh_nghe}</option>`
					});
					$(e).parents('.add_nghe_dia_chi').find('.nganh_nghe').select2({
						tags: true
					});
					
				}
				$(e).parents('.add_nghe_dia_chi').find('.nganh_nghe').html(htmldata)
				$(e).parents('.add_nghe_dia_chi').find('.nganh_nghe').attr('disabled',false)
				
				$('#preload').css('display','none')
				
			})
			.catch(function (error) {
				console.log(error);
			})
		}

    let deleteForm = (e) =>{
        $(e).parents('.add_nghe_dia_chi').remove()
    }
	function showimages(element) {
            var file = element.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#showimg').attr('src', reader.result);
                    // console.log('RESULT', reader.result)
                }
                reader.readAsDataURL(file);
            }

	$(document).ready(function () {
        $('#co-so-id-js').select2();

        $('.form-control').attr('autocomplete', 'off');

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

        $('#chon-nghe-cao-dang').select2({
            placeholder: "Tìm kiếm ngành nghề",
        })

        $('#chon-nghe-trung-cap').select2({
            placeholder: "Tìm kiếm ngành nghề",
        })
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
