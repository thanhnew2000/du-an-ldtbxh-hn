
@extends('layouts.admin')
@section('title', "Tổng hợp số liệu học sinh")
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
                        Sinh Viên Đang Quản Lý <small>Danh sách</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="" method="GET" class="m-form">
            {{-- <input type="hidden" name="page_size" value="{{$params['page_size']}}"> --}}
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Loại Hình Cơ Sở: </label>
                                <div class="col-lg-8">
                                    <select name="loai_hinh" class="form-control ">
                                        <option value="" >Chọn cơ sở</option>
                                        @foreach($loaiHinh as $item)
                                        <option value="{{ $item->id }}">{{ $item->loai_hinh_co_so }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên Cơ Sở: </label>
                                <div class="col-lg-8">
                                    <select name="co_so_id" class="form-control ">
                                        @foreach ($coso as $item)
                                        <option value="{{ $item->id }}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
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
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                {{-- <label class="col-lg-2 col-form-label">Kích thước:</label> --}}
                {{-- <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        @foreach(config('common.paginate_size.list') as $size)
                            <option
                                    @if($params['page_size'] == $size)
                                        selected
                                    @endif
                                    value="{{$size}}">{{$size}}</option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    @csrf
                    <th>STT</th>
                    <th>Tên Cơ Sở</th>
                    <th>Loại Hình Cơ Sở</th>
                    <th>Năm</th>
                    <th>Đợt</th>
                    <th>Tổng Số HS/SV <br> đang quản lý</th>
                    <th>Cao Đẳng</th>
                    <th>Trung Cấp </th>
                    <th>Sơ Cấp </th>
                    <th>Khác </th>
                    <th>
                        <a href="{{route('xuatbc.them-so-sv')}}" class="btn btn-success btn-sm">Thêm mới</a>
                    </th>
                </thead>
                
                @php($i=1)
                
                @forelse ($data as $qlsv)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$qlsv->cs_ten}}</td>
                        <td>{{$qlsv->loai_hinh_co_so}}</td>
                        <td>{{$qlsv->nam}}</td>
                        <td>{{$qlsv->dot}}</td>
                        <td>{{$qlsv->tong_so_HSSV_co_mat_cac_trinh_do}}</td>
                        <td>{{$qlsv->so_luong_sv_Cao_dang}}</td>
                        <td>{{$qlsv->so_luong_sv_Trung_cap}}</td>
                        <td>{{$qlsv->so_luong_sv_So_cap}}</td>
                        <td>{{$qlsv->so_luong_sv_he_khac}}</td>
                        <td>
                            <a href="{{ route('xuatbc.chi-tiet-so-lieu', ['co_so_id'=>$qlsv->cs_id]) }}" class="btn btn-info btn-sm">Chi tiết</a>

                        </td>
                    </tr>
                    @empty
                    @endforelse($item as $data )
                </tbody>
            </table>
        </div>
        <div class="m-portlet__foot d-flex justify-content-end">
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection
