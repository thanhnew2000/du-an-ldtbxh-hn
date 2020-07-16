@extends('layouts.admin');
@section('title', 'Danh sách giấy phép')
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
                        Danh sách cơ sở đào tạo
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên cơ sở/Mã cơ sở</label>
                                <div class="col-lg-8">
                                    <input type="text" value="" name="ten_co_so" class="form-control m-input"
                                        placeholder="từ khóa tên cơ sở">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Số quyết đinh</label>
                                <div class="col-lg-8">
                                    <input type="text" name="so_quyet_dinh" value="" class="form-control m-input"
                                        placeholder="mã đơn vị">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body">


            <table class="table m-table m-table--head-bg-brand table-reponsive">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên giấy phép</th>
                        <th>Ngày ban hành</th>
                        <th>Ngày hiệu lực</th>
                        <th>Ngày hết hạn</th>
                        <th>Ảnh giấy phép</th>
                        <th>
                            <a href=""
            class="btn btn-success btn-sm">Thêm mới</a>
            </tr>
            </thead>
            {{-- <tbody>
                <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $item->ten_giay_phep }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->ngay_ban_hanh)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->ngay_hieu_luc)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->ngay_het_han)->format('d-m-Y') }}</td>
                    <td><a href="{!! asset('storage/' . $item->anh_giay_phep) !!}" target="_blank"><i
                                class="fas fa-eye"></i> xem ảnh</a></td>
                </tr>
       
                <tr>
                    <td colspan="8" class="text-center text-danger">Cơ sở hiện không có giấy phép nào</td>
                </tr>
         

            </tbody> --}}
            </table>
           
            <h5 class="text-center text-danger">Vui lòng chọn trường</h5>
          

        </div>
    </div>
</div>
@endsection
@section('script')

@endsection