<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'People'],
            ['1', '{{$lineChartData[0]}}' * 100 / 100],
            ['2', '{{$lineChartData[1]}}' * 100 / 100],
            ['3', '{{$lineChartData[2]}}' * 100 / 100],
            ['4', '{{$lineChartData[3]}}' * 100 / 100],
            ['5', '{{$lineChartData[4]}}' * 100 / 100],
            ['6', '{{$lineChartData[5]}}' * 100 / 100],
            ['7', '{{$lineChartData[6]}}' * 100 / 100],
            ['8', '{{$lineChartData[7]}}' * 100 / 100],
            ['9', '{{$lineChartData[8]}}' * 100 / 100],
            ['10', '{{$lineChartData[9]}}' * 100 / 100],
            ['11', '{{$lineChartData[10]}}' * 100 / 100],
            ['12', '{{$lineChartData[11]}}' * 100 / 100],
        ]);

        var options = {
            title: 'Biểu đồ biến đổi dân cư',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>