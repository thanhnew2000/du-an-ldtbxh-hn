
@extends('layouts.admin')
@section('content')
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="m-menu__link-icon flaticon-web"></i>
                    </span>
                    <h5 class="m-portlet__head-text">
                        Xuất giấy phép
                    </h5>
                </div>
            </div>
        </div>
        <form action="" method="get" class="m-form">
            
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h5 class="m-form__heading-title">Bộ lọc:</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tên cơ sở:</label>
                                <div class="col-lg-8">
                                    <input type="text" value="" name="ten_co_so"
                                        class="form-control m-input" placeholder="từ khóa tên cơ sở">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Nghề đào tạo:</label>
                                <div class="col-lg-8">
                                    <select class="form-control nganh_nghe" 
                                        multiple="multiple" name="" id="">
                                        
                                        <option value="">Điêu Khắc</option>
                                        <option value="">Hội Họa</option>
                                       
                                        
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Trình độ:</label>
                                <div class="col-lg-8">
                                    <select name="loai_hinh_co_so" class="form-control ">
                                       <option value="">Cao Đẳng</option>
                                       <option value="">Trung Cấp</option>
                                       <option value="">Sơ Cấp</option>
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
    
</div>

<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="m-portlet__body">
            <h5>Địa điểm: Hàm Nghi</h5>
            <p class="ml-3">Nghề: Điêu khắc</p>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Giấy chứng nhận</th>
                    <th>Ảnh</th>
                    <th>Quy mô tuyển sinh</th>
                    <th>Ngày ban hành</th>
                    <th>Ngày hiệu lực</th>
                    <th>Ngày hết hạn</th>
                  
                    
                    
                </thead>
                <tbody>
                   
                    <tr>
                        <td>1</td>
                        <td>Giấy chứng nhận A</td>
                        <td><img class="img-size-70" src="https://lh3.googleusercontent.com/proxy/UG9ONmafcE3RnEmj0cmy4cUZjHYYgW5Y1I5o17GYGkcwkMgFZYmCB9T2KFL2Er0O0g2p0DhcF6h2nLEUgz3Zk5cDBFZAEC1HBXnWJ-s4p0pLhw2aHJVYUmwzeQ" alt=""></td>
                        <td>320</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Giấy chứng nhận A</td>
                        <td><img class="img-size-70" src="https://lh3.googleusercontent.com/proxy/81xigdijw1-xczqs3yh2yCP8BMsGHMPmAXhPeh0YxAE6Vuokn39T5kauEv1yaNm6HRjD4fKT_H6F7Q96_4dHXW-rsMfzoalzfzuN5-9BX0ydhexeObDEj5dKz5ddsNtBT7_gdQ" alt=""></td>
                        <td>320</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>
                            
                        </td>
                    </tr>
                    
                   
                </tbody>
            </table>
            <p class="ml-3">Nghề: Hội họa</p>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Giấy chứng nhận</th>
                    <th>Ảnh</th>
                    <th>Quy mô tuyển sinh</th>
                    <th>Ngày ban hành</th>
                    <th>Ngày hiệu lực</th>
                    <th>Ngày hết hạn</th>
                  
                    
                    
                </thead>
                <tbody>
                   
                    <tr>
                        <td>1</td>
                        <td>Giấy chứng nhận A</td>
                        <td><img class="img-size-70" src="https://lh3.googleusercontent.com/proxy/UG9ONmafcE3RnEmj0cmy4cUZjHYYgW5Y1I5o17GYGkcwkMgFZYmCB9T2KFL2Er0O0g2p0DhcF6h2nLEUgz3Zk5cDBFZAEC1HBXnWJ-s4p0pLhw2aHJVYUmwzeQ" alt=""></td>
                        <td>320</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Giấy phép A</td>
                        <td><img class="img-size-70" src="https://lh3.googleusercontent.com/proxy/81xigdijw1-xczqs3yh2yCP8BMsGHMPmAXhPeh0YxAE6Vuokn39T5kauEv1yaNm6HRjD4fKT_H6F7Q96_4dHXW-rsMfzoalzfzuN5-9BX0ydhexeObDEj5dKz5ddsNtBT7_gdQ" alt=""></td>
                        <td>320</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>
                            
                        </td>
                    </tr>
                    
                   
                </tbody>
            </table>
            <br>
            <h5>Địa điểm: Dịch Vọng Hậu</h5>
            <p class="ml-3">Nghề: Điêu khắc</p>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Giấy chứng nhận</th>
                    <th>Ảnh</th>
                    <th>Quy mô tuyển sinh</th>
                    <th>Ngày ban hành</th>
                    <th>Ngày hiệu lực</th>
                    <th>Ngày hết hạn</th>
                  
                    
                    
                </thead>
                <tbody>
                   
                    <tr>
                        <td>1</td>
                        <td>Giấy chứng nhận A</td>
                        <td><img class="img-size-70" src="https://lh3.googleusercontent.com/proxy/UG9ONmafcE3RnEmj0cmy4cUZjHYYgW5Y1I5o17GYGkcwkMgFZYmCB9T2KFL2Er0O0g2p0DhcF6h2nLEUgz3Zk5cDBFZAEC1HBXnWJ-s4p0pLhw2aHJVYUmwzeQ" alt=""></td>
                        <td>320</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Giấy chứng nhận A</td>
                        <td><img class="img-size-70" src="https://lh3.googleusercontent.com/proxy/81xigdijw1-xczqs3yh2yCP8BMsGHMPmAXhPeh0YxAE6Vuokn39T5kauEv1yaNm6HRjD4fKT_H6F7Q96_4dHXW-rsMfzoalzfzuN5-9BX0ydhexeObDEj5dKz5ddsNtBT7_gdQ" alt=""></td>
                        <td>320</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>
                            
                        </td>
                    </tr>
                    
                   
                </tbody>
            </table>
            <p class="ml-3">Nghề: Hội họa</p>
            <table class="table m-table m-table--head-bg-brand">
                <thead>
                    <th>STT</th>
                    <th>Giấy chứng nhận</th>
                    <th>Ảnh</th>
                    <th>Quy mô tuyển sinh</th>
                    <th>Ngày ban hành</th>
                    <th>Ngày hiệu lực</th>
                    <th>Ngày hết hạn</th>
                  
                    
                    
                </thead>
                <tbody>
                   
                    <tr>
                        <td>1</td>
                        <td>Giấy chứng nhận A</td>
                        <td><img class="img-size-70" src="https://lh3.googleusercontent.com/proxy/UG9ONmafcE3RnEmj0cmy4cUZjHYYgW5Y1I5o17GYGkcwkMgFZYmCB9T2KFL2Er0O0g2p0DhcF6h2nLEUgz3Zk5cDBFZAEC1HBXnWJ-s4p0pLhw2aHJVYUmwzeQ" alt=""></td>
                        <td>320</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Giấy chứng nhận A</td>
                        <td><img class="img-size-70" src="https://lh3.googleusercontent.com/proxy/81xigdijw1-xczqs3yh2yCP8BMsGHMPmAXhPeh0YxAE6Vuokn39T5kauEv1yaNm6HRjD4fKT_H6F7Q96_4dHXW-rsMfzoalzfzuN5-9BX0ydhexeObDEj5dKz5ddsNtBT7_gdQ" alt=""></td>
                        <td>320</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>7/14/2020</td>
                        <td>
                            
                        </td>
                    </tr>
                    
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection