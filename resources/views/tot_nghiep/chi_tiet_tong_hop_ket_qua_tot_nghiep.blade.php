@extends('layouts.admin')
@section('title', "Tổng hợp kết quả tốt nghiệp")
@section('style')
<link href="{!! asset('tuyensinh/css/showtuyensinh.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content">
    <div class="row">
        <h2>Tổng hợp kết quả tốt nghiệp</h2>
    </div>
        <div class="row">
        <div class="col-md-12 pt-3 ">
            <div class="m-section ">
                <div class="m-section__content " style="overflow-x:auto" ;>
                    <table class="table table-bordered thead-bluedark ">
                        <thead>
                            <tr class=" text-center ">
                                <th rowspan="2" >STT</th>
                                <th rowspan="2" >Tên cơ sở đào tạo</th>
                                <th rowspan="2" >Mã ngành nghề</th>
                                <th rowspan="2" >Loại hình cơ sở</th>
                                <th rowspan="2" >Tổng số sinh viên tốt nghiệp</th>
                                <th colspan="3" >Trong đó</th>
                                <th rowspan="2" >Số sinh viên nhập học đầu khóa</th>
                                <th rowspan="2" >Số sinh viên đủ điều kiện thi/ xét tốt nghiệp</th>
                                <th colspan="2" >Kết quả giải quyết việc làm</th>
                                
                            </tr>
                            <tr class="pt-3 row2">
                                <th>Nữ</th>
                                <th>Dân tộc thiểu số</th>
                                <th>Hộ khẩu Hà Nội</th>
                                
                                <th>Số sinh viên có việc làm ngay sau khi tốt nghiệp</th>
                                <th>Mức lương trung bình</th>
                               
                                {{-- <th>CĐ</th>
                                <th>TC</th>
                                <th>SC</th>
                                
                                <th>CĐ</th>
                                <th>TC</th>
                                <th>SC</th>  --}}
                               
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
