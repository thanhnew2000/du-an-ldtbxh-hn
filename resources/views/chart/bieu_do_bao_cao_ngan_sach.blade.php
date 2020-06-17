
@extends('layouts.admin')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<h1>Biểu đồ báo cáo ngân sách</h1>
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="row">
            <div class="col-md-1 p-5 ">
            </div>
            <div class="col-md-5 p-5 ">
                
        <h2 style="text-align:center">Biểu đồ số lượng sinh viên tốt nghiệp đạt khá giỏi các năm 2015-2020 </h2>
        <canvas id="barChart" width="400" height="400"></canvas>
        
        </div>
        <div class="col-md-5 p-5">
            
            <h2 style="text-align:center">Biểu đồ số lượng sinh viên tốt nghiệp đạt khá giỏi các năm 2015-2020 </h2>
        <canvas id="lineChart" width="400" height="400"></canvas>
            
        </div>
        </div>
        <div class="row">
            <div class="col-md-1 p-5 ">
            </div>
            <div class="col-md-5 p-5">
                <h2 style="text-align:center">Biểu đồ số lượng sinh viên tốt nghiệp đạt khá giỏi các năm 2015-2020 </h2>
                <canvas id="radarChart" width="400" height="400"></canvas>
                </div>
                <div class="col-md-5 p-5">
                    <h2 style="text-align:center">Biểu đồ số lượng sinh viên đang theo học </h2>
                <canvas id="pieChart" width="400" height="400"></canvas>
                </div>
        </div>
        <div class="row">
            <div class="col-md-1 p-5 ">
            </div>
            <div class="col-md-5 p-5">
                <h2 style="text-align:center">Biểu đồ kết quả tuyển sinh trường FPT Polytechnic </h2>
                <canvas id="horizontalBarChart" width="400" height="400"></canvas>
                </div>
                <div class="col-md-5 p-5">
                    <h2 style="text-align:center">Biểu đồ báo cáo ngân sách </h2>
                <canvas id="doughnutChart" width="400" height="400"></canvas>
                </div>
        </div>
    </div>
    
<script>
var ctx = document.getElementById('barChart');
var barChart = new Chart(ctx, {
    type: 'bar',
    data: 
    {
        labels: ['2015', '2016', '2017', '2018', '2019', '2020'],
        datasets: [{
            
            label: 'Tổng số sv',
            data: [595, 589, 468, 328, 550, 498],
            backgroundColor: 
            'rgba(75, 192, 192, 0.2)',
                
            
            borderColor: 
            'rgba(75, 192, 192, 0.2)',
            
        },{
            label:'Loại giỏi',
            data: [300,329,200,123,345,380],
            backgroundColor: 
                '#FF6A6A',
                    
                
                borderColor: 
                '#FF6A6A',
                borderWidth: 1,
                type: 'bar'
            },{
                label: 'Loại khá',
                data: [295,260,268,205,205,118],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor:  'rgba(255, 99, 132, 0.2)',
                borderWidth:1,
                type:'bar',
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById('lineChart');
var lineChart = new Chart(ctx, {
    type: 'line',
    data: 
    {
        labels: ['2015', '2016', '2017', '2018', '2019', '2020'],
        datasets: [{
            
            label: 'Tổng số sv',
            data: [595, 589, 468, 328, 550, 498],
            backgroundColor: 
            'rgba(75, 192, 192, 0.2)',
                
            
            borderColor: 
            'rgba(79, 148, 205)',
            borderWidth:2,
        },{
            label:'Loại giỏi',
            data: [300,329,200,123,345,380],
            backgroundColor: 
            'rgba(0, 205, 102, 0.2)',
                    
                
                borderColor: 
                'rgba(124 205 124)',
                borderWidth: 2,
                type: 'line'
            },{
                label: 'Loại khá',
                data: [295,260,268,205,205,118],
                backgroundColor: 'rgba(250, 128, 114, 0.2)',
                borderColor:  'rgba(250, 128, 114)',
                borderWidth:2,
                type:'line',
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
     var ctx = document.getElementById('radarChart');
var radarChart = new Chart(ctx, {
    type: 'radar',
    data: 
    {
        labels: ['2015', '2016', '2017', '2018', '2019', '2020'],
        datasets: [{
            
            label: 'Tổng số sv',
            data: [595, 589, 468, 328, 550, 498],
            backgroundColor: 
            'rgba(75, 192, 192, 0.2)',
                
            
            borderColor: 
            'rgba(79, 148, 205)',
            borderWidth:2,
        },{
            label:'Loại giỏi',
            data: [300,329,200,123,345,380],
            backgroundColor: 
            'rgba(0, 205, 102, 0.2)',
                    
                
                borderColor: 
                'rgba(124 205 124)',
                borderWidth: 2,
                type: 'radar'
            },{
                label: 'Loại khá',
                data: [295,260,268,205,205,118],
                backgroundColor: 'rgba(250, 128, 114, 0.2)',
                borderColor:  'rgba(250, 128, 114)',
                borderWidth:2,
                type:'radar',
            }]
        },
        options: {
            scales: {
                
                    ticks: {
                        beginAtZero: true
                    }
                
            }
        }
    });

</script>


<script>
var ctx = document.getElementById('pieChart');
var pieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Thiết kế web', 'Thiết kế đồ họa', 'Ứng dụng phần mềm', 'Quản trị doanh nghiệp', 'Du lịch', 'Lập trình mobie' , "Digital Marketing"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3,15],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(238, 180, 34, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(238, 180, 34,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            
                ticks: {
                    beginAtZero: true
                }
            
        }
    }
});
</script>
<script>
    new Chart(document.getElementById("horizontalBarChart"), {
    type: 'horizontalBar',
    data: {
      labels: ["Thiết kế web", "Ứng dụng phần mềm", "Thiết kế đồ họa", "Lập trình mobie", "Du lịch","Quản trị doanh nghiệp", "Digital Marketing"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#FFF68F","#97FFFF"],
          data: [476,245,434,284,433,230,433]
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

</script>
<script>
    new Chart(document.getElementById("doughnutChart"), {
    type: 'doughnut',
    data: {
      labels: ["Tổng thu", "Tổng chi", ],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [2478,5267]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
    
</script>

</div>
@endsection