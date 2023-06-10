@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="chart_container_up">
            <div class="population_change_chart">
                <div id="curve_chart" style="width: 445px; height: 300px"></div>
            </div>
            <div class="population_classification">
                <div id="piechart" style="width: 445px; height: 300px;"></div>
            </div>
        </div>
        <div class="chart_container_down">
            <div class="gender_chart">
                <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
    </div>
@endsection
