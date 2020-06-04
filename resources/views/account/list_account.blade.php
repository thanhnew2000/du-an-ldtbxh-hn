@extends('layouts.admin')
@section('title', "Danh sách tài khoản")
@section('style')
<link href="{!! asset('vendors/_customize/list.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<style>
    .active-purple-4 input[type=text]:focus:not([readonly]) {
  border: 1px solid #ce93d8;
  box-shadow: 0 0 0 1px #ce93d8;
}
.active-purple-3 input[type=text] {
  border: 1px solid #ce93d8;
  box-shadow: 0 0 0 1px #ce93d8;
}
table{
    width: 100% !important;
}
.th-bg{
    background: #1F3247;
    color: #ffffff;
}
</style>
    
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">           

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
                                   <a href="{{ route('account.tao-tk') }}" class="btn btn-outline-success btn-sm">Thêm</a>
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

						<div class="fillter-form" style="padding-bottom:1rem;">
							<form method="GET"  >
                               
                                
								<div class="d-flex container pt-3 ">
                                    <div class=" form-group col-6 d-flex justify-content-around align-items-center">
										<span for="" class="fillter-name">Trạng thái</span>
										<select class="form-control col-8" name="status" id="status">
                                            <option value=""  selected >All</option>
											<option value="1" @if($status==1) selected @endif >Kích hoạt</option>
											<option value="2" @if($status==2) selected @endif>Khóa</option>
										
										</select>
									</div>
									
                                    <div class=" form-group col-6 d-flex justify-content-around align-items-center">
										<span for="" class="fillter-name">Quyền hạn</span>
										<select class="form-control col-8" name="role" id="role">
											<option value=""  selected >All</option>
                                            <option value="1" @if($role==1) selected @endif>Actor1</option>
                                            <option value="2" @if($role==2) selected @endif>Actor2</option>
                                            <option value="3" @if($role==3) selected @endif>Actor3</option>
                                            <option value="4" @if($role==4) selected @endif>Actor4</option>
                                            
										</select>
									</div>

									
                                </div>
                                 <div class="d-flex container pt-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $keyword }}" name="keyword" placeholder="Search term..." id="keyword">
                                        <span class="input-group-btn">
                                            <button class="btn btn-outline-drak border btn-sm"   type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
								</div>

								

							

                            </form>
                            
						</div>
					</section>
					<!-- end- fillter -->

                        <!--begin::Section-->
                        <div class="m-section" style="padding-top: 30px">
                            <div class="m-section__content">
                                <div class="table-responsive">
                                <table class="table m-table  table-striped ">
                                    <thead  class="th-bg">
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ và Tên</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Cơ sở đào tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                            @php
                                            $i = 1;
                                            function displayAvatar($avatarImg) 
                                                {                                  
                                                    if($avatarImg != null) {
                                                        return asset('storage/'.$avatarImg);
                                                    }
                                                    return asset('images/avatardefault.jpg');
                                                }
                                            @endphp

                                        @foreach ($users as $user)
                                    
                                        
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            @php
                                            $i++;
                                            @endphp
                                            <td>{{ $user->name }}</td>
                                             <td><img width="60" id="showavatar" src="{!! displayAvatar($user->avatar) !!}" alt="avatar"></td>
                                            <td>{{ $user->email }}</td>
                                            
                                            <td class="float-right">{{ $user->phone_number }}</td>
                                            <td>{{ $user->ten }}</td>
                                        
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
                                            
                                            
                                            {{-- <td><a href="{{ url('account/edit/'.$user->id) }}">Sửa</a></td> --}}
                                            <td><a href="{{ route('account.edit',['id'=>$user->id]) }}">Sửa</a></td>
                                        </tr>
                                        @endforeach
                                        
                                    
                                    </tbody>

                                    
                               
                                </table>
                                <div>
                        
                                    @if ($thongbao)
                                    <div class="thongbao border" style="color: red; text-align: center;">
                                         
                                        <h4 class="m-portlet__head-text ">
                                            {{$thongbao}}
                                        </h4>
                                    </div>
                                    @endif
                                 
                                </div>
                         
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

            function showimages(element) {
                
            var file = element.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#showavatar').attr('src', reader.result);
                    // console.log('RESULT', reader.result)
                }
                reader.readAsDataURL(file);

                $('#showavatar').attr('src', reader.result);
            }

           

  
        

        function editstatus($id){
            console.log('Đang thay đổi status');
            console.log($id);

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



     

    


    

</script>
@endsection