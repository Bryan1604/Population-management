@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <x-search-bar/>
            <?php
            $message = "Thêm hộ khẩu";
            $type = "primary_button";
            ?>
            <x-button :message="$message" :type="$type"/>
        </div>

        <div class="table_of_contents">
            <table>
                <thead>
                <tr>
                    <th>Mã hộ khẩu</th>
                    <th>Tên chủ hộ</th>
                    <th>Số thành viên</th>
                    <th>Địa chỉ</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($household as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->owner->fullname}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <a href="#" class="primary_button">Xem</a>
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
