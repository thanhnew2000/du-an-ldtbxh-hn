
@extends('layouts.admin')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<h1>Biểu đồ hợp tác quốc tế</h1>
<div class="m-content container-fluid">
    <div class="m-portlet">
      <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon">
                      <i class="m-menu__link-icon flaticon-network"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                      Biểu đồ 
                  </h3>
              </div>
          </div>
      </div>
      <form action="" method="get" class="m-form">
          <input type="hidden" name="page_size" value="">
          <div class="m-portlet__body">
              <div class="m-form__section m-form__section--first">
                  <div class="m-form__heading">
                      <h3 class="m-form__heading-title">Bộ lọc:</h3>
                  </div>
                  <div class="row">
                      <div class="col-md-6 p-2">
                          <div class="form-group m-form__group row ">
                              <label class="col-lg-2 col-form-label">Năm:</label>
                              <div class="col-lg-8">
                                  <select name="status" id="status" class="form-control ">
                                      <option value="" selected>2018</option>
                                      <option value="1"  selected>2019</option>
                                      <option value="2"  selected >2020</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      
                      <div class="col-md-6 p-2">
                          <div class="form-group m-form__group row">
                              <label class="col-lg-2 col-form-label">Quyền hạn:</label>
                              <div class="col-lg-8">
                                  <select name="role" id="role" class="form-control ">
                                      <option value="" selected>All</option>
                                      <option value="1" >Actor1</option>
                                      <option value="2" >Actor2</option>
                                      <option value="3" >Actor3</option>
                                      <option value="4">Actor4</option>
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
          <div class="col-md-6">
          <canvas id="horizontalBarChart" width="400" height="400"></canvas>
      </div>
      </div>
  </div>
  <script>
    axios
    .get("{{ route('lay-du-lieu-kq-ts')}}")
    .then(function(res){
      console.log(res.data)
      // 
      new Chart(document.getElementById("horizontalBarChart"), {
        type: 'pie',
        data: {
          labels: ["Thiết kế web", "Ứng dụng phần mềm", "Thiết kế đồ họa", "Lập trình mobie", "Du lịch","Quản trị doanh nghiệp", "Digital Marketing"],
          datasets: [
            {
              label: "Population (millions)",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#FFF68F","#97FFFF"],
              data: [12,121,22,34,3,21,22]
            }
          ]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            
          }
        }
      });
    });
  
  </script>
@endsection