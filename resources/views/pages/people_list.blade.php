@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <x-search-bar/>
            <?php
            $message = "Thêm nhân khẩu";
            $type = "primary_button";
            ?>
             <a href="{{ url('people/add') }}" class="primary_button">Thêm nhân khẩu</a>
        </div>

        <div style="height: 400px; overflow-y: auto;" class="table_of_contents">
            <table>
                <thead>
                <tr>
                    <th>Mã nhân khẩu</th>
                    <th>Họ và tên</th>
                    <th>CCCD/CMT</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Quan hệ với chủ hộ</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->fullname}}</td>
                    <td>{{$item->identify_number}}</td>
                    <td>{{$item->phone_number}}</td>
                    <td>{{$item->household ? $item->household->address : ($item->temporaryResidenceForm ? $item->temporaryResidenceForm->address: "N/A")}}</td>
                    <td>{{$item->household_owner_relationship ? $item->household_owner_relationship : 'owner'}}</td>
                    <td>
                        <a href="{{url('people/detail/'.$item->id)}}" class="primary_button">Xem</a>
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
