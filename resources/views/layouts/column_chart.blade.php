<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {
    'packages': ['bar']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Male', 'Female'],
        ['1', "{{$genderData[0]['men']}}", "{{$genderData[0]['women']}}"],
        ['2', "{{$genderData[1]['men']}}", "{{$genderData[1]['women']}}"],
        ['3', "{{$genderData[2]['men']}}", "{{$genderData[2]['women']}}"],
        ['4', "{{$genderData[3]['men']}}", "{{$genderData[3]['women']}}"],
        ['5', "{{$genderData[4]['men']}}", "{{$genderData[4]['women']}}"],
        ['6', "{{$genderData[5]['men']}}", "{{$genderData[5]['women']}}"],
        ['7', "{{$genderData[6]['men']}}", "{{$genderData[6]['women']}}"],
        ['8', "{{$genderData[7]['men']}}", "{{$genderData[7]['women']}}"],
        ['9', "{{$genderData[8]['men']}}", "{{$genderData[8]['women']}}"],
        ['10', "{{$genderData[9]['men']}}", "{{$genderData[9]['women']}}"],
        ['11', "{{$genderData[10]['men']}}", "{{$genderData[10]['women']}}"],
        ['12', "{{$genderData[11]['men']}}", "{{$genderData[11]['women']}}"]
    ]);

    var options = {
        chart: {
            title: 'Biểu đồ bến đổi giới tính',
        }
    };

    var chart = new google.charts.Bar(document.getElementById('Columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
}
</script>