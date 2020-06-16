
@extends('layouts.admin')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<h1>Biểu đồ báo cáo ngân sách</h1>
<div class="m-content container-fluid">
    <div class="m-portlet">
        <h2 style="text-align:center">Biểu đồ số lượng sinh viên tốt nghiệp đạt khá giỏi các năm 2015-2020 </h2>
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
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
</div>
@endsection