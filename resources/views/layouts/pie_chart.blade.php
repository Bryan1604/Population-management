<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Type', 'number of population'],
            ['Dân cư có hộ khẩu',    "{{$data[0]}}"*100/100],
            ['Dân cư tạm trú',      "{{$data[2]}}"*100/100],
            ['Dân cư tạm vắng',  "{{$data[1]}}"*100/100]
        ]);

        var options = {
            title: 'Phân loại dân cư'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
