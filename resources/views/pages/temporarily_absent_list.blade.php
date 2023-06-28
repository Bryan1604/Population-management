@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <form action="">
                <div class="search_bar">
                    <input type="search" name="search" class="search" placeholder="Search" value="{{$search}}">
                    <button type="submit" class="search_button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            
            <!-- <?php
            // $message = "Thêm hộ khẩu";
            // $type = "primary_button";
            // $url = url('household/add');
            ?>
            <x-button :message="$message" :type="$type" :href = "$url" /> -->
            <a href="{{ url('absent/add') }}" class="primary_button">Thêm nhân khẩu tạm vắng</a>
        </div>

        <div style="height: 400px; overflow-y: auto;" class="table_of_contents">
            <table>
                <thead>
                <tr>
                    <th>Mã nhân khẩu</th>
                    <th>Họ và tên </th>
                    <th>CCCD/CMT</th>
                    <th>Lý do tạm vắng </th>
                    <th>Nơi chuyển đến</th>
                    <th>Thời gian đăng kí tạm vắng</th>         
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->people->id}}</td>
                        <td>{{$item->people->fullname}}</td>
                        <td>{{$item->people->identify_number}}</td>
                        <td>{{$item->reason}}</td>
                        <td>{{$item->move_place}}</td>
                        <td>{{$item->move_time}}</td>
                        <td>
                            <a href="{{url('absent/detail/'.$item->id)}}" class="primary_button">Xem</a>
                            <a href="#" class="primary_button">Sửa</a>
                            <a href="{{url('absent/delete/'.$item->id)}}" class="primary_button">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
