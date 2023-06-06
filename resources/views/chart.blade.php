@extends('header.navbar')
@section('content')

<figure class="highcharts-figure">
<div id="container" style="margin-top: 10%;"></div>
</figure>

<script type="text/javascript">
    var mahasiswaData = <?php echo json_encode($mahasiswaData)?>;
    console.log(mahasiswaData);

    Highcharts.chart('container', {
        title: {
            text: 'Mahasiswa Baru 2023'
        },
        subtitle: {
            text: 'Universitas 17 Agustus 1945'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Banyaknya Mahasiswa Baru'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Mahasiswa',
            data: mahasiswaData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>


@endsection