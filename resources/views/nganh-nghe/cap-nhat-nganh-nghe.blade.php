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
                    <h3 class="m-portlet__head-text">
                        Ngành nghề <small>Cập nhật cơ sở đào tạo</small>
                    </h3>
                </div>
            </div>
        </div>
        <form action="">
            <div class="m-portlet">
                <div class="m-portlet__body">
                    <div class="col-12 form-group m-form__group">
                        <div class="col-12 d-flex">
                            <div class="form-group mr-4 col-6">
                                <label for="">Tên nghề:</label>
                                <select class="form-control" name="" id="">
                                <option>sd</option>
                                <option>sdf</option>
                                <option>dsf</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="">Mã nghề:</label>
                                <select class="form-control" name="" id="">
                                <option>sd</option>
                                <option>sdf</option>
                                <option>dsf</option>
                                </select>
                            </div>
                        </div>   
                        
                        <div class="col-12 d-flex">
                            <div class="form-group mr-4 col-6">
                                <label for="">Bậc nghề:</label>
                                <select class="form-control" name="" id="">
                                <option>sd</option>
                                <option>sdf</option>
                                <option>dsf</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label for="">Ngày ban hành:</label>
                                <select class="form-control" name="" id="">
                                <option>sd</option>
                                <option>sdf</option>
                                <option>dsf</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection