@extends('layouts.main')
@section('content')
    <div class="content_container">
        <div class="chart_container_up">
            <div class="population_change_chart">
                <div id="curve_chart" style="width: 445px; height: 300px"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Month', 'People'],
                            ['1',  '{{$lineChartData[0]}}'*100/100],
                            ['2',  '{{$lineChartData[1]}}'*100/100],
                            ['3',  '{{$lineChartData[2]}}'*100/100],
                            ['4',  '{{$lineChartData[3]}}'*100/100],
                            ['5',  '{{$lineChartData[4]}}'*100/100],
                            ['6',  '{{$lineChartData[5]}}'*100/100],
                            ['7',  '{{$lineChartData[6]}}'*100/100],
                            ['8', '{{$lineChartData[7]}}'*100/100],
                            ['9',  '{{$lineChartData[8]}}'*100/100],
                            ['10',  '{{$lineChartData[9]}}'*100/100],
                            ['11',  '{{$lineChartData[10]}}'*100/100],
                            ['12',  '{{$lineChartData[11]}}'*100/100],
                        ]);

                        var options = {
                            title: 'Biểu đồ biến đổi dân cư',
                            curveType: 'function',
                            legend: { position: 'bottom' }
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                        chart.draw(data, options);
                    }
                </script>

            </div>
            <div class="population_classification">
                <div id="piechart" style="width: 445px; height: 300px;"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Type', 'number of population'],
                        ['Dân cư có hộ khẩu',    "{{$data[0]}}"*100/100],
                        ['Dân cư tạm trú',      "{{$data[2]}}"*100/100],
                        ['Dân cư tạm vắng',   "{{$data[1]}}"*100/100]
                    ]);

                    var options = {
                        title: 'Phân loại dân cư'
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
                </script>

            </div>
        </div>
        <div class="chart_container_down">
            <div class="gender_chart">
                <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Month', 'Male', 'Female'],
                            ['1', "{{$genderData[0]['men']}}", "{{$genderData[0]['women']}}"],
                            ['2',  "{{$genderData[1]['men']}}", "{{$genderData[1]['women']}}"],
                            ['3',  "{{$genderData[2]['men']}}", "{{$genderData[2]['women']}}"],
                            ['4',  "{{$genderData[3]['men']}}", "{{$genderData[3]['women']}}"],
                            ['5',  "{{$genderData[4]['men']}}", "{{$genderData[4]['women']}}"],
                            ['6',  "{{$genderData[5]['men']}}", "{{$genderData[5]['women']}}"],
                            ['7',  "{{$genderData[6]['men']}}", "{{$genderData[6]['women']}}"],
                            ['8',  "{{$genderData[7]['men']}}", "{{$genderData[7]['women']}}"],
                            ['9',  "{{$genderData[8]['men']}}", "{{$genderData[8]['women']}}"],
                            ['10',  "{{$genderData[9]['men']}}", "{{$genderData[9]['women']}}"],
                            ['11',  "{{$genderData[10]['men']}}", "{{$genderData[10]['women']}}"],
                            ['12',  "{{$genderData[11]['men']}}", "{{$genderData[11]['women']}}"]
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
            </div>
        </div>
    </div>
@endsection
