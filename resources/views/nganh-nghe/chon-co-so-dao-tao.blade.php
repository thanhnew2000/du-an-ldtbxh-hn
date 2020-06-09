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
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>Mã Nghề</th>
                    <th>Tên nghề</th>
                    <th>Bậc nghề</th>
                    <th>Quyết định số</th>
                    <th>Ngày ban hành</th>
                    <th>Trạng thái</th>
                    <th>
                        <button type="button" class="btn btn-success btn-sm" id="bo-sung-dang_ky" data-toggle="modal"
                            data-target="#m_modal_4">Bổ
                            sung</button>
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
                                    <h5>Tên cơ sở</h5>
                                    <form action="">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group col-6">
                                                <label class="form-name" for="">Giấy phép <span
                                                        class="text-danger">(*)</span></label>
                                                <select class="form-control" name="giay_phep" id="">
                                                    <option selected disabled>Chọn giấy phép</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-5">
                                                <label for="" class="form-name">Ảnh giấy phép <span
                                                        class="text-danger">(*)</span></label>
                                                <div class="custom-file form-control">
                                                    <input type="file" class="custom-file-input"
                                                        value="{{ old('upload_logo') }}" id="customFile"
                                                        name="upload_logo">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group col-4">
                                            <label for="example-date-input" class="col-form-label">Ngày ban hành
                                            </label>
                                            <div class="">
                                                <input class="form-control m-input" type="date" value="2011-08-19"
                                                    id="example-date-input">
                                            </div>
                                        </div>

                                        <div>
                                            <h5 for="" class="m-portlet__head-text">Chọn nghành nghề</h5>
                                            <div class="d-flex justify-content-start">
                                                <div class="m-portlet col-6 mr-3">
                                                    <div class="m-portlet__head">
                                                        <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">
                                                                    Default Scrollbar
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-portlet__body ">
                                                        <div class="m-scrollable" data-scrollable="true"
                                                            style="height: 200px">
                                                            <ul class="list-checkbox">
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="m-portlet col-6">
                                                    <div class="m-portlet__head">
                                                        <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h5 class="m-portlet__head-text">
                                                                    Nghề đã chọn
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-portlet__body p-3">
                                                        <div class="m-scrollable m-scroller ps ps--active-y"
                                                            data-scrollable="true"
                                                            style="height:180px; overflow: hidden;">
                                                            <ul class="list-checkbox">
                                                                <li>
                                                                    <label class="m-checkbox m-checkbox--bold">
                                                                        <input type="checkbox"> Default
                                                                        <span></span>
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
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

        });
</script>
@endsection