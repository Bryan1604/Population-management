@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <x-search-bar/>
            <a href="{{ url('staying/add') }}" class="primary_button">Thêm nhân khẩu tạm trú</a>
        </div>

        <div style="height: 400px; overflow-y: auto;" class="table_of_contents">
            <table>
                <thead>
                <tr>
                    <th>Thời gian</th>
                    <th>Họ và tên </th>
                    <th>CCCD/CMT</th>
                    <th>Địa chỉ trước đó</th>
                    <th>Địa chỉ hiện tại</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{$item->created_at->format('Y-m-d')}}</td>
                    <td>{{$item->people->fullname}}</td>
                    <td>{{$item->people->identify_number}}</td>
                    <td>{{$item->people->address_before}}</td>
                    <td>Viet nam</td>
                    <td>
                        <a href="{{url('staying/detail/'.$item->id)}}" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
