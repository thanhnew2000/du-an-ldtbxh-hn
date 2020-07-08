@extends('layouts.admin')
@section('title', "Chi tiết nghề của cơ sở đào tạo")
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
                        Danh sách nghề của địa điểm đào tạo
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="d-flex justify-content-between align-items-end">
                @if (isset($chiNhanh))
                <div class="m-portlet__head-title mb-3">
                    <h5 class="m-portlet__head-text">
                        Thông tin cơ sở
                    </h5>
                    <ul>
                        <li class="m-portlet__head-text"><b>{{ $chiNhanh[0]->ten_co_so }}</b></li>
                        <li class="m-portlet__head-text">Cơ sở: <b>{{ $chiNhanh[0]->dia_chi }}</b></li>
                    </ul>
                </div>
                @endif

                <div class="col-7 form-group m-form__group d-flex justify-content-end">
                    <label class="col-lg-2 col-form-label">Kích thước:</label>
                    <div class="col-lg-4">
                        <select class="form-control" id="page-size">
                            {{-- @foreach(config('common.paginate_size.list') as $size)
                            <option @if($params['page_size']==$size) selected @endif value="{{$size}}">{{$size}}
                            </option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div>
                    <button class="btn btn-success mb-3" type="button" data-toggle="modal" data-target="#m_modal_6">Bổ
                        sung nghề</button>

                    @if ($params['co_so_id'] > 0)
                    <input type="hidden" id="co-so-id-ajax" value="{{ $params['co_so_id'] }}">
                    <input type="hidden" id="chi-nhanh-id-ajax" value="{{ $params['chi_nhanh_id'] }}">
                    @endif

                    {{-- modal bổ sung nghề --}}
                    <div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Bổ sung nghề cho địa điểm đào tạo
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="">
                                        <div class="form-group col-lg-12">
                                            <label class="form-name" for="">Chọn giấy phép:</label>
                                            <select class="form-control" name="giay_phep_id" id="chon-giay-phep-ajax">
                                                <option selected>---------Chọn giấy phép---------</option>
                                                @forelse ($dsGiayPhep as $GP)
                                                <option value="{{ $GP->giay_phep_id }}">{{ $GP->ten_giay_phep }}
                                                </option>
                                                @empty

                                                @endforelse
                                            </select>
                                            <p class="text-danger" id="Err_loai_quyet_dinh"></p>
                                        </div>
                                    </form>
                                    <div id="select-nghe">
                                        <form method="post" action="">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <div class="form-group col-lg-12">
                                                <label class="form-name" for="">Chọn nghề cao đẳng</label>
                                                <select class="form-control" multiple name="nghe_cao_dang[]"
                                                    id="chon-nghe-cao-dang">
                                                </select>
                                                <p class="text-danger" id="Err_loai_quyet_dinh"></p>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label class="form-name" for="">Chọn nghề trung cấp</label>
                                                <select class="form-control" multiple name="nghe_trung_cap[]"
                                                    id="chon-nghe-trung-cap">
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="loading-select-nghe" id="loading-select-nghe">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="button" id="btn-summit-nghe-ajax"
                                        class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal bổ sung nghề --}}
                </div>
            </div>

            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Tên nghề</th>
                    <th>Mã Nghề</th>
                    <th>Bậc nghề</th>
                    <th>Quy mô tuyển sinh/năm</th>
                    <th>Quyết định số</th>
                    <th>Ngày ban hành</th>
                    <th>Ngày hết hạn</th>
                    <th>Trạng thái</th>
                    <th>Ảnh giấy phép</th>
                </thead>
                @php
                $i = 1;
                @endphp
                <tbody>
                    @forelse ($dsNgheChiNhanh as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->ten_nganh_nghe }}</td>
                        <td>{{$item->nghe_id}}</td>
                        <td>
                            @if($item->bac_nghe == 6)
                            Cao Đẳng
                            @elseif($item->bac_nghe == 5)
                            Trung Cấp
                            @endif
                        </td>
                        <td>
                            @if (isset($item->quy_mo_tuyen_sinh))
                            {{$item->quy_mo_tuyen_sinh}}
                            @else
                            <span class="text-danger">Chưa cập nhật</span>
                            @endif
                        </td>
                        <td>{{ $item->ten_giay_phep }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->ngay_ban_hanh)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->ngay_het_han)->format('d-m-Y') }}</td>
                        <td>
                            @if ($item->trang_thai == 1)
                            Hoạt động
                            @else
                            Đã thu hồi
                            @endif
                        </td>
                        <td><a href="{!! asset('storage/' . $item->anh_giay_phep) !!}" target="_blank"><i
                                    class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
        {{-- @if(!empty($dsNghe))
        <div class="m-portlet__foot d-flex justify-content-end">
            {{$dsNghe->links()}}
    </div>
    @endif --}}
</div>
{{-- @if($defaultCsdt['id'] > 0)
    <input type="hidden" name="" id="co_so_id" value="{{$defaultCsdt['id']}}">
@endif --}}
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function(){
        $('#chon-nghe-cao-dang').select2();
        $('#chon-nghe-trung-cap').select2();
        $('#chon-giay-phep-ajax').select2();
        $('#select-nghe').addClass('d-none');
        $('#loading-select-nghe').addClass('d-none');
    });

    $('#chon-giay-phep-ajax').change(function(){
        $(document).ajaxStart(function(){
        $('#select-nghe').addClass('d-none');
        $('#loading-select-nghe').removeClass('d-none');
        $('#loading-select-nghe').css('display', 'block')
        });

        $(document).ajaxComplete(function(){
            $('#loading-select-nghe').addClass('d-none');
            $('#select-nghe').removeClass('d-none');
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('chi-nhanh.get-nganh-nghe')}}",
            data: {
                co_so_id: $('#co-so-id-ajax').val(),
                giay_phep_id: $('#chon-giay-phep-ajax').val(),
                _token: '{{csrf_token()}}'
            },
            success: function(response) {
                $('#select-nghe').removeClass('d-none');
                var htmldata = null;
                response.ngheCD.forEach(element => {
                    htmldata += `<option value="${element.giay_chung_nhan_id}">${element.nghe_id} -
                        ${element.ten_nghe}</option>`
                });
                $('#chon-nghe-cao-dang').html(htmldata);

                var htmldata2 = null;
                response.ngheTC.forEach(element => {
                    htmldata2 += `<option value="${element.giay_chung_nhan_id}">${element.nghe_id} -
                        ${element.ten_nghe}</option>`
                });
                $('#chon-nghe-trung-cap').html(htmldata2);
                console.log(response.ngheCD, response.ngheTC);
            },
            error: function() {
                console.log('haha');
            }
        });
    });

    $('#btn-summit-nghe-ajax').click(function(event){
        event.preventDefault();
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: "{{route('chi-nhanh-luu-bo-sung-nghe')}}",
            data: {
                chi_nhanh_id: $('#chi-nhanh-id-ajax').val(),
                giay_phep_id: $('#chon-giay-phep-ajax').val(),
                nghe_cao_dang: $('#chon-nghe-cao-dang').val(),
                nghe_trung_cap: $('#chon-nghe-trung-cap').val(),
                _token: '{{csrf_token()}}'
            }
        })
    });
</script>


@endsection