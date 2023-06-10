<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Male', 'Female'],
            ['1', 1000, 400],
            ['2', 1170, 800],
            ['3', 1009, 1120],
            ['4', 1030, 1100],
            ['5', 980, 1000],
            ['6', 800, 950],
            ['7', 1030, 890],
            ['8', 1000, 1000],
            ['9', 1030, 960],
            ['10', 1160, 1200],
            ['11', 1280, 1370],
            ['12', 1400, 1506]
        ]);

        var options = {
            chart: {
                title: 'Biểu đồ bến đổi giới tính',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
