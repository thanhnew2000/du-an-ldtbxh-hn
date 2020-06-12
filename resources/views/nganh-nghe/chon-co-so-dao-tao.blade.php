@extends('layouts.admin')
@section('title', "Chi tiết nghề của cơ sở đào tạo")
@section('content')
<style>
    #chon-nghe-cao-dang+.select2-container {
        width: 100% !important;
    }
</style>
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Ngành nghề <small>Chi tiết nghề của cơ sở đào tạo</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            {{--<input type="hidden" name="page_size" value="{{$params['page_size']}}">--}}
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label text-right">Cơ sở đào tạo:</label>
                                <div class="col-lg-8">
                                    <select id="chon-co-so-ajax" class="form-control">
                                        @if(!empty($defaultCsdt))
                                        <option value="{{$defaultCsdt['id']}}" selected="selected">
                                            {{$defaultCsdt['text']}}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        @foreach(config('common.paginate_size.list') as $size)
                        <option @if($params['page_size']==$size) selected @endif value="{{$size}}">{{$size}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if (\Session::has('mess'))
            <div class="alert alert-success" role="alert">
                <strong>{!! \Session::get('mess') !!}</strong>
            </div>
            @endif
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>Mã Nghề</th>
                    <th>Tên nghề</th>
                    <th>Bậc nghề</th>
                    <th>Quyết định số</th>
                    <th>Ngày ban hành</th>
                    <th>Trạng thái</th>
                    <th>
                        @if(empty($defaultCsdt) == false)
                        <button type="button" class="btn btn-success btn-sm" id="bo-sung-dang_ky" data-toggle="modal"
                            data-target="#m_modal_4">Bổ
                            sung</button>
                        @endif
                    </th>
                    {{-- begin modal --}}
                    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="m-portlet__head-text" id="exampleModalLabel">Bổ sung nghành
                                        nghề</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <h5 class="m-portlet__head-text">Mã+tên cơ sở: &nbsp;
                                            <b>{{$defaultCsdt['text']}}</b>
                                        </h5>
                                    </div>
                                    <form action="{{ route('nghe.bo-sung-vao-co-so') }}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="co_so_id" value="{{ $defaultCsdt['id'] }}"
                                            id="co-so-id">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group col-6">
                                                <label class="form-name" for="">Giấy phép <span
                                                        class="text-danger">(*)</span></label>
                                                <input type="text" class="form-control" value="" name="ten_quyet_dinh"
                                                    id="ten-quyet-dinh">
                                                <span class="text-danger" id="Err-ten_quyet_dinh"></span>
                                            </div>

                                            <div class="form-group col-lg-5">
                                                <label for="" class="form-name">Ảnh giấy phép <span
                                                        class="text-danger">(*)</span></label>
                                                <div class="custom-file form-control">
                                                    <input type="file" name="anh_giay_phep" class="custom-file-input"
                                                        id="customFile" name="upload_logo">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                                <span class="text-danger" id="Err-anh_giay_phep"></span>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group col-4">
                                            <label for="example-date-input" class="col-form-label">Ngày ban hành <span
                                                    class="text-danger">(*)</span>
                                            </label>
                                            <div class="">
                                                <input class="form-control m-input" name="ngay_ban_hanh" type="date"
                                                    value="2011-08-19" id="ngay-ban-hanh">
                                            </div>
                                            <span class="text-danger" id="Err-ngay_ban_hanh"></span>
                                        </div>

                                        <div class="form-group mb-5">
                                            <label class="col-form-label">Chọn nghề Cao Đẳng</label>
                                            <div class="">
                                                <select id="chon-nghe-cao-dang" multiple name="nghe_cao_dang[]"
                                                    class="form-control">
                                                    @foreach ($allNgheCD as $ngheCD)
                                                    <option value="{{ $ngheCD->id }}">{{ $ngheCD->id }} -
                                                        {{ $ngheCD->ten_nganh_nghe }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="text-danger" id="Err-chon_nghe_cao_dang"></span>
                                        </div>

                                        <div class="form-group mb-5">
                                            <label class="col-form-label">Chọn nghề Trung Cấp</label>
                                            <div class="">
                                                <select id="chon-nghe-trung-cap" multiple name="nghe_trung_cap[]"
                                                    class="form-control">
                                                    @foreach ($allNgheTC as $ngheTC)
                                                    <option value="{{ $ngheTC->id }}">{{ $ngheTC->id }} -
                                                        {{ $ngheTC->ten_nganh_nghe }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger" id="Err-chon_nghe_trung_cap"></span>
                                            </div>
                                        </div>

                                        <div class="form-group d-flex justify-content-end mb-5">
                                            <button type="button" class="btn btn-secondary mr-4"
                                                data-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal --}}
                </thead>
                <tbody>
                    @forelse($dsNghe as $cursor)
                    <tr>
                        <td>{{$cursor->nghe_id}}</td>
                        <td>{{$cursor->ten_nganh_nghe}}</td>
                        <td>
                            @if(config('common.bac_nghe.trung_cap.ma_bac') == $cursor->bac_nghe)
                            {{config('common.bac_nghe.trung_cap.ten_bac')}}
                            @else
                            {{config('common.bac_nghe.cao_dang.ten_bac')}}
                            @endif
                        </td>
                        <td>{{$cursor->ten_quyet_dinh}}</td>
                        <td>{{$cursor->ngay_ban_hanh}}</td>
                        <td>@if(config('common.trang_thai_nghe.hoat_dong') == $cursor->trang_thai)
                            Hoạt động
                            @else
                            Tạm dừng
                            @endif
                        </td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">Cập nhật</a>
                            <a href="" class="btn btn-danger btn-sm">Thu hồi</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Chưa có dữ liệu</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(!empty($dsNghe))
        <div class="m-portlet__foot d-flex justify-content-end">
            {{$dsNghe->links()}}
        </div>
        @endif
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // const html = `<li>${text}</li>`;
    // $("#list").append(html);
    var currentUrl = '{{route($route_name)}}';
        $(document).ready(function(){
            $('#chon-co-so-ajax').select2({
                ajax: {
                    url: '{{route('co-so-dao-tao.api-search-co-so-dao-tao')}}',
                    method: 'POST',
                    data: function(params){
                        var query = {
                            keyword: params.term || '',
                            page: params.page || 1
                        }
                        return query;
                    },
                    cache: true,
                    dataType: 'json',
                    processResults: function (data, params) {

                        return {
                            results: data.results,
                            pagination: {
                                more: data.pagination.more
                            }
                        };
                    }
                }
            });
            $('#chon-co-so-ajax').on('change', function(){
                var csdtId = $(this).val();
                window.location.href = `${currentUrl}/${csdtId}`;
            });
            $('#page-size').change(function(){
                var csdtId = $('#chon-co-so-ajax').val();
                var page_size = $(this).val();
                var reloadUrl = `${currentUrl}/${csdtId}?page_size=${page_size}`;
                window.location.href = reloadUrl;
            });

            $('#chon-nghe-cao-dang').select2({
                placeholder: "Tìm kiếm ngành nghề",
            })

            $('#chon-nghe-trung-cap').select2({
                placeholder: "Tìm kiếm ngành nghề",
            })
        });
</script>


@endsection