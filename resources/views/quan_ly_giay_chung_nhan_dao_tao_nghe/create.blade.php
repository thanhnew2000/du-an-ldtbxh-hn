@extends('layouts.admin')
@section('title', 'Thêm mới giấy phép')
@section('style')
<style>
    .modal-xl {
        max-width: 1140px;
    }
    .error{
        color: red;
        margin-top: 5px !important;
    }
    .name_address{
        font-size: 15px;
        color: #df3333
    }
    .fa-plus:before,.fa-times{
        color: blue;
        cursor: pointer;
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
                        Bổ sung giấy phép hoạt động của cơ sở
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
                                    <option @if (isset($params['co_so_id']))
                                        {{ $params['co_so_id'] ==$item->id? 'selected' : '' }} @endif
                                        value="{{$item->id}}">{{$item->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group m-form__group row">
                            <button id="bo_sung" data-toggle="modal" data-target="#myModalThemMoi" disabled
                                class="btn btn-primary">Bổ sung</button>

                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="row justify-content-center">
                    <div class="col-lg-2">
                        <button  data-toggle="modal" data-target="#myModalThemMoi" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div> --}}
        </div>
    </div>
</div>


<div class="modal fade" id="myModalThemMoi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm mới giấy phép đào tạo</h4>
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
                                                <label>Số quyết định <span
                                                        class="text-danger">(*)</span></label>
                                                <input type="text" name="so_quyet_dinh_giay_phep"
                                                    value="{{old('ten_giay_phep')}}"
                                                    class="form-control m-input"
                                                    placeholder="Nhập số quết định">
                                            </div>

                                            <span class="text-danger" id="so_quyet_dinh_error"></span>

                                            <div class="form-group m-form__group">
                                                <label for="exampleInputEmail1">Ảnh giấy phép <span
                                                        class="text-danger">(*)</span></label>
                                                <div class="custom-file">
                                                    <input type="file" value="{{old('anh-giay-phep')}}"
                                                        name="anh_giay_phep" class="custom-file-input"
                                                        onchange="showimages(this)"
                                                        id="customFileGiayPhep">
                                                    <label class="custom-file-label"
                                                        for="customFileGiayPhep">Choose file</label>
                                                </div>
                                                <p class="text-danger text-small"
                                                    id="anh_giay_phep_error">
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
                                            <label>Ngày ban hành <span
                                                    class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input  onchange="chuyenNgayHieuLuc(this)" type="text" name="ngay_ban_hanh_giay_phep"
                                                    value="{{old('ngay_ban_hanh')}}"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger text-small"
                                                id="ngay_ban_hanh_giay_phep_error">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày hiệu lực <span
                                                    class="text-danger">(*)</span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text" name="ngay_hieu_luc_giay_phep"
                                                    value="{{old('ngay_hieu_luc')}}"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger text-small"
                                                id="ngay_hieu_luc_giay_phep_error">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group m-form__group mb-4">
                                            <label>Ngày hết hạn <span
                                                    class="text-danger"></span></label>
                                            <div class="input-group date datepicker">
                                                <input type="text"  name="ngay_het_han_giay_phep"
                                                    value="{{old('ngay_het_han')}}"
                                                    placeholder="Ngày-tháng-năm" class="form-control">
                                                <div
                                                    class="input-group-addon form-control col-2 d-flex justify-content-center align-items-center">
                                                    <span><i class="flaticon-calendar-2"></i></span>
                                                </div>
                                            </div>
                                            <p class="text-danger text-small"
                                                id="ngay_het_han_giay_phep_error">
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-12">
                                    <div class="col-12 form-group m-form__group">
                                        <label for="exampleTextarea">Mô tả quyết định</label>
                                        <textarea class="form-control m-input" id="summernote"
                                            name="mo_ta"
                                            placeholder="Mô tả ngắn gọn nội dung giấy phép hoặc ghi chú"
                                            rows="4"></textarea>
                                    </div>
                                </div>
                            </form>
                            <p><span class="text-danger">(*)</span> Mục không được để trống</p>
                        </div>

                    </div>
                    <div class="m-portlet m-portlet--tab">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <span class="m-portlet__head-icon m--hide">
                                        <i class="la la-gear"></i>
                                    </span>
                                    <h3 class="m-portlet__head-text">
                                        Thêm nghề cho cơ sở
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="danh_sach_co_so">

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                        <button type="button" onclick="addDuLieuGiayChungNhan()" class="btn btn-danger">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $('#co_so_id').select2()
    async function setValueQuyetDinh(e) {
        if ($(e).val()>0) {
            $('input[name=co_so_id]').val($(e).val())
             getDataDiaDiemChon($(e).val())
            console.log(2)
            $('#bo_sung').attr('disabled',false)
        }else{
            $('#bo_sung').attr('disabled',true)
        }
       
    }
var getDiaChiCoSo = "{{route('getDiaChiCoSo')}}";
var storeUrl = "{{route('store-nganh-nghe')}}";
var addGiayChungNhan = "{{route('addGiayChungNhan')}}";
var urlNganhNghe = "{{route('getNghe')}}";
async function getDataDiaDiemChon(id_co_so) {
    $("#preload").css("display", "block"); 
	let htmldata= ''
   axios
	.post(getDiaChiCoSo, {
		id : id_co_so
	})
	.then(function(response) {
		// console.log(response.data)
     response.data.forEach(element=>{
		htmldata+=	`  <div class="m-section__content chi_nhanh${element.id}" chi_nhanh='${element.id}'>
			<div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
				<div class="m-demo__preview m-demo__preview--btn">
					<span class="name_address mr-3">${element.dia_chi}</span> <i onclick="addForm(this)"
						class="fa fa-plus"></i>
					<div class="form_add_nghe">
					</div>
				</div>
			</div>
		</div>`
		})
        $('.danh_sach_co_so').html(htmldata)
        $("#preload").css("display", "none");
        console.log(1)
	})
	.catch(function(error) {
		console.log(error);
	});
}
var config = <?php echo json_encode(config('common.bac_nghe')) ?>;
</script>
<script src="{!! asset('add_giay_chung_nhan_nghe/add_giay_chung_nhan_nghe.js') !!}"></script>

@endsection