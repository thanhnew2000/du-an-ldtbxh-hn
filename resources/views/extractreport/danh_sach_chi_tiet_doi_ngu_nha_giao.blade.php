@extends('layouts.admin')
@section('title', "Chi tiết số liệu đội ngũ đào tạo")
@section('style')
{{-- <link href="{!! asset('tuyensinh/css/chitiettuyensinh.css') !!}" rel="stylesheet" type="text/css" /> --}}
<style>
    .m-table.m-table--border-danger, .m-table.m-table--border-danger th, .m-table.m-table--border-danger td{
        border-color: #bcb1b1 ;
    } 
    table thead th[colspan="4"],th[colspan="5"]{
        border-bottom-width:1px;
        border-bottom: 1px solid #bcb1b1 !important;
    }
</style>
@endsection
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
                        Chi tiết <small>Thông tin đội ngũ đào tạo</small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
       
            <h3>Cơ sở đào tạo: {{$thongtincoso[0]->ten}}</h3>
            <p>Loại hình cơ sở: {{$thongtincoso[0]->loai_hinh_co_so}}</p>
            <p>Địa chỉ: {{$thongtincoso[0]->dia_chi}}</p>
            <p>Phường/Xã: {{$thongtincoso[0]->tenxaphuong}}</p>
            <p>Quận/Huyện: {{$thongtincoso[0]->tenquanhuyen}}</p>
      
          

        </div>
    </div>

    <div class="m-portlet">
        <form action="" method="get" class="m-form">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Bộ lọc:</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Năm</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="nam" id="nam">
                                        <option value="" selected >-----Chọn năm-----</option>
                               
                                        <option 
                                        @if (isset($params['nam']))
                                        {{( $params['nam'] ==  $yearTime ) ? 'selected' : ''}}  
                                        @endif
                                        value="{{$yearTime}}">{{$yearTime}}</option>

                                        <option 
                                        @if (isset($params['nam']))
                                        {{( $params['nam'] ==  $yearTime-1 ) ? 'selected' : ''}}  
                                        @endif
                                        value="{{$yearTime-1}}">{{$yearTime-1}}</option>

                                        <option 
                                        @if (isset($params['nam']))
                                        {{( $params['nam'] ==  $yearTime-2 ) ? 'selected' : ''}}  
                                        @endif
                                        value="{{$yearTime-2}}">{{$yearTime-2}}</option>
                                
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-lg-2 col-form-label">Đợt</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="dot" id="dot">
                                        <option value="" >-----Chọn đợt-----</option>
                                        <option
                                        @if (isset($params['dot']))
                                            {{( $params['dot'] ==  1 ) ? 'selected' : ''}}  
                                        @endif
                                        value="1" >Đợt 1</option>
                                        <option value="2"
                                        @if (isset($params['dot']))
                                        {{( $params['dot'] ==  2 ) ? 'selected' : ''}}  
                                        @endif
                                        >Đợt 2</option>
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
                <label class="col-lg-2 col-form-label">Kích thước:</label>
                <div class="col-lg-2">
                    <select class="form-control" id="page-size">
                        @foreach(config('common.paginate_size.list') as $size)
                        <option @if($params['page_size'] == $size) selected @endif value="{{$size}}">{{$size}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <table class="table table-bordered m-table m-table--border-danger m-table--head-bg-primary table-responsive border">
                <thead class="border">
                    <tr class=" text-center border">
                        <th rowspan="2">STT</th>
                        <th rowspan="2">Năm</th>
                        <th rowspan="2">Đợt</th>
                        <th rowspan="2">Mã nghề</th>
                        <th rowspan="2">Tên nghề</th>
                        <th rowspan="2">Tổng sô</th>
                        <th colspan="7">Trong đó</th>
                        <th colspan="2">Chia theo cư hữu</th>
                        <th colspan="6">Chia theo trình độ chuyên môn</th>
                        <th colspan="6">Chia theo trình độ ngoại ngữ</th>
                        <th colspan="2">Chia theo trình độ tin học</th>
                        <th colspan="3">Chia theo trình độ kỹ năng nghề</th>
                        <th colspan="3">Chia theo trình độ nghiệp vụ sư phạm</th>
                        <th rowspan="2">Số nhà giáo tham gia đào tạo, bồi dưỡng trong năm</th>
                        <th rowspan="2">Tác vụ</th>
                    </tr>
                    <tr class="pt-3 row2 border">
                        <th>Nữ</th>
                        <th>Dân tộc ít người</th>
                        <th>Giáo sư</th>
                        <th>Phó giáo sư</th>
                        <th>Nhà giáo nhân dân, nghệ sĩ nhân dân, nghệ nhân nhân dân, thầy thuốc nhân dân</th>
                        <th>Nhà giáo ưu tú, nghệ sĩ ưu tú, nghệ nhân ưu tú, thầy thuốc ưu tú</th>
                        <th>Nhà giáo giảng dạy môn học chung</th>
                        <th>Biên chế</th>
                        <th>Hợp đồng (từ 1 năm trở lên)</th>
                        <th>Tiến sỹ</th>
                        <th>Thạc sỹ</th>
                        <th>Đạt học</th>
                        <th>Cao đẳng</th>
                        <th>Trung cấp</th>
                        <th>Trình độ khác</th>
                        <th>Bậc 1</th>
                        <th>Bậc 2</th>
                        <th>Bậc 3</th>
                        <th>Bậc 4</th>
                        <th>Bậc 5</th>
                        <th>Bậc 6</th>
                        <th>Cơ bản</th>
                        <th>Nâng cao</th>

                        <th>Chính chỉ KNN quốc gia bậc 1 (tương đương)</th>
                        <th>Chính chỉ KNN quốc gia bậc 2 (tương đương)</th>
                        <th>Chính chỉ KNN quốc gia bậc 3 (tương đương)</th>

                        
                        <th>Chính chỉ sư phạm dạy trình độ CĐ</th> 
                        <th>Chính chỉ sư phạm dạy trình độ TC</th>
                        <th>Chính chỉ sư phạm dạy trình độ SC</th>

                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                    $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1);
                    @endphp --}}
                    @foreach ($data as $item)
                    <tr>
                        {{-- <td>{{$i++}}</td> --}}
                        <td>1</td>
                        <td>{{$item->nam}}</td>
                        <td>{{$item->dot}}</td>
                        <td>{{$item->nghe_id}}</td>
                        <td>{{$item->ten_nghe}}</td>
                        <td>{{$item->tong_so_can_bo}}</td>
                        <td>{{$item->so_luong_nu}}</td>
                        <td>{{$item->dan_toc_it_nguoi}}</td>
                        <td>{{$item->giao_su}}</td>
                        <td>{{$item->pho_giao_su}}</td>
                        <td>{{$item->NGND_NSND_NNND_TTND}}</td>
                        <td>{{$item->NGUT_NSUT_NNUT_TTUT}}</td>
                        <td>{{$item->nha_giao_giang_day_mon_hoc_chung}}</td>
                        <td>{{$item->bien_che}}</td>
                        <td>{{$item->hop_dong_1_nam_tro_len}}</td>
                        <td>{{$item->so_tien_sy}}</td>
                        <td>{{$item->so_thac_si}}</td>
                        <td>{{$item->so_dai_hoc}}</td>
                        <td>{{$item->so_cao_dang}}</td>
                        <td>{{$item->so_trung_cap}}</td>
                        <td>{{$item->so_khac}}</td>
                        <td>{{$item->bac1}}</td>
                        <td>{{$item->bac2}}</td>
                        <td>{{$item->bac3}}</td>
                        <td>{{$item->bac4}}</td>
                        <td>{{$item->bac5}}</td>
                        <td>{{$item->bac6}}</td>

                        <td>{{$item->trinh_do_tin_hoc_co_ban}}</td>
                        <td>{{$item->trinh_do_tin_hoc_nang_cao}}</td>

                        <td>{{$item->chung_chi_KNN_quoc_gia_bac_1}}</td>
                        <td>{{$item->chung_chi_KNN_quoc_gia_bac_2}}</td>
                        <td>{{$item->chung_chi_KNN_quoc_gia_bac_3}}</td>

                        <td>{{$item->chung_chi_su_pham_day_trinh_do_CD}}</td>
                        <td>{{$item->chung_chi_su_pham_day_trinh_do_TC}}</td>
                        <td>{{$item->chung_chi_su_pham_day_trinh_do_SC}}</td>

                        <td>{{$item->so_nha_giao_tham_gia_dao_tao}}</td>



                        <td>
                            <a href="{{route('xuatbc.sua-ds-nha-giao',['id'=>$item->id])}}">
                                Sửa</a>
                           
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div>
            @if ($thongbao)
            <div class="thongbao border" style="color: red; text-align: center;">
                <h4 class="m-portlet__head-text ">
                    {{$thongbao}}
                </h4>
            </div>
            @endif
        </div>
        <div class="m-portlet__foot d-flex justify-content-end">
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var currentUrl = `{{route($route_name,['co_so_id'=>$thongtincoso[0]->id])}}`;
    $(document).ready(function () {
        $('#page-size').change(function () {
            var dot = $('[name="dot"]').val();
            var nam = $('[name="nam"]').val();
            var page_size = $(this).val();
            var reloadUrl = `${currentUrl}?dot=${dot}&nam=${nam}&page_size=${page_size}`;
            window.location.href = reloadUrl;
        });

    });

</script>
@endsection