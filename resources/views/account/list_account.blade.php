@extends('layouts.admin')
@section('title', "Danh sách tài khoản")
@section('style')
<link href="{!! asset('vendors/_customize/list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    {{-- <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator"></h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Base</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">Tables</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                        <i class="la la-plus m--hide"></i>
                        <i class="la la-ellipsis-h"></i>
                    </a>
                    <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">
                                        <li class="m-nav__section m-nav__section--first m--hide">
                                            <span class="m-nav__section-text">Quick Actions</span>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">Activity</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                <span class="m-nav__link-text">Messages</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                <span class="m-nav__link-text">FAQ</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                <span class="m-nav__link-text">Support</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__separator m-nav__separator--fit">
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- END: Subheader -->
    <div class="m-content">
                    

					<!-- begin- action -->
					{{--  <section class="action-nav d-flex align-items-center justify-content-between mt-4	">
						<div class="action-template col-3 d-flex justify-content-between">
							<a href="#"><i class="fa fa-download" aria-hidden="true"></i>
								Tải xuống
								biêu mẫu</a>
							<a href="#"><i class="fa fa-upload" aria-hidden="true"></i>
								Tải lên file Excel</a>
						</div>
						<div class="btn">
							<button class="btn btn-outline-primary">Thêm mới</button>
						</div>
					</section>  --}}
					<!-- end- action -->
        <div class="row">
 
					
			
            <div class="col-xl-12">
                

                <!--begin::Portlet-->
                <div class="m-portlet m-3">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Danh sách tài khoản
                                </h3>
                            </div>
                            
                        </div>
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                   <a href="{{ url('tao-tai-khoan') }}" class="btn btn-outline-success">Thêm</a>
                                </h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!-- begin- fillter -->
					<section class="fillter-area">
						<div class="fillter-title">
							<h4>Bộ lọc</h4>
						</div>

						<div class="fillter-form">
							<form action="">
								<div class="d-flex container pt-3">
                                    <div class="form-group col-6 d-flex justify-content-around align-items-center">
										<span for="" class="fillter-name">Trạng thái</span>
										<select class="form-control col-8" name="status" id="">
											<option value="" selected disabled>Enable</option>
											<option>Disable</option>
										
										</select>
									</div>
									<div class="form-group col-6 d-flex justify-content-around align-items-center">

										<input type="text" class="form-control">
                                        
									</div>

									
								</div>

								<div class="d-flex container pt-3">
									<div class="form-group col-6 d-flex justify-content-around align-items-center">
										<span for="" class="fillter-name">Rules</span>
										<select class="form-control col-8" name="" id="">
											<option value="" selected disabled>1</option>
                                            <option value="" >2</option>
                                            <option value="" >3</option>
										</select>
									</div>
								</div>

								<div class="d-flex justify-content-between container pt-3 mb-5 col-3">
									<button type="submit" class="btn btn-primary btn-fillter">Tìm kiếm</button>
								</div>

							</form>
						</div>
					</section>
					<!-- end- fillter -->

                        <!--begin::Section-->
                        <div class="m-section">
                            <div class="m-section__content">
                                <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Avatar</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created_At</th>
                                            <th>Update_At</th>
                                            <th>Enable</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                            @php
                                            $i = 1;
                                            @endphp

                                        @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            @php
                                            $i++;
                                            $c_at = date_create($user->created_at);
                                            $created_at = date_format($c_at, 'd-m-Y');
                                            $u_at = date_create($user->updated_at);
                                            $updated_at = date_format($u_at, 'd-m-Y');
                                            @endphp
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td><img width="100" src="{!! asset('storage/'.$user->avatar) !!}" alt="avatar"></td>
                                            <td>{{ $user->email }}</td>
                                            
                                            <td class="float-right">{{ $user->phone_number }}</td>
                                            <td>{{ $created_at }}</td>
                                            <td>{{ $updated_at }}</td>
                                        
                                            <td>
                                                <form class="m-form">
                                                  
                                                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                                    <label>
                                                                        <input type="checkbox" id="editStatus" onclick="editstatus({{ $user->id }})"  name="" @if ($user->status == 1)
                                                                        checked
                                                                      @endif>
                                                                        <span></span>
                                                        </label>
                                                        </span>
                                                
                                                </form>
                                            </td>
                                            {{-- <td><button  type="submit" onclick="destroyUser({{ $user->id }})" class="btn btn-outline-danger"><i class="flaticon-delete"></i></button>
                                                
                                            </td> --}}
                                            <td><a href="{{ url('account/edit/'.$user->id) }}">Sửa</a></td>
                                        </tr>
                                        @endforeach
                                        
                                    
                                    </tbody>

                                    
                               
                                </table>
                         
                                </div>
                                <div class="float-right">
                                    {!! $users->links() !!}
                                </div>
                            </div>
                        </div>

                        <!--end::Section-->

                    </div>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->

            </div>
        </div>
    </div>
</div>



@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

  
        

        function editstatus($id){
            console.log('Đang thay đổi status');

            axios.post('/account/edit-status', {
                id: $id
            })
            .then(function (response) {
                console.log(response);
                console.log('Thay đổi status THÀNH CÔNG');
            })
            .catch(function (error) {
                console.log(error);
            });
        }



        function destroyUser($id){

        axios.delete('account/destroy', {
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
        }

    


    

</script>
@endsection