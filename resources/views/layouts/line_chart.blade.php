<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'People'],
        ['1', 1000],
        ['2', 1170],
        ['3', 997],
        ['4', 1200],
        ['5', 1190],
        ['6', 1050],
        ['7', 800],
        ['8', 700],
        ['9', 1000],
        ['10', 1150],
        ['11', 1200],
        ['12', 1280],
    ]);

    var options = {
        title: 'Biểu đồ biến đổi dân cư',
        curveType: 'function',
        legend: {
            position: 'bottom'
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('Curve_chart'));

    chart.draw(data, options);
}
</script>