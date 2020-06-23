
@extends('layouts.admin')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<h1>Biểu đồ sinh viên đang theo học</h1>
<div class="m-content container-fluid">
    <div class="m-portlet">
        <div class="col-md-6">
        <canvas id="pieChart" width="400" height="400"></canvas>
    </div>
    </div>
</div>
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
@endsection