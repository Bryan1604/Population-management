@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="direction absent_list_direction">
            <a href="{{url('absent/list')}}">Danh sách tạm vắng</a>
        </div>
        <div class="direction staying_list_direction">
            <a href="{{url('staying/list')}}">Danh sách tạm trú</a>
        </div>
    </div>
@endsection
