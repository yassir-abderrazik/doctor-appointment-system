@extends('layouts.admin')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="row">
        <div class="col-md-6">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="specChart"></canvas>
        </div>
    </div>



    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var cData = JSON.parse(`<?php echo $data; ?>`);
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['admins', 'doctors', 'patient'],
                datasets: [{
                    label: '# of Votes',
                    data: cData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',

                    ],
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Users'
                    }
                }
            }
        });
        var ctx = document.getElementById('specChart').getContext('2d');

        var specData = JSON.parse(`<?php echo $doctors['chart_data']; ?>`);
        console.log(specData);
        var specChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: specData.label,
                datasets: [{
                    label: '# of Votes',
                    data: specData.data,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'


                    ],
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'les spécialités des docteurs'
                    }
                }
            }
        });

    </script>
@endsection
