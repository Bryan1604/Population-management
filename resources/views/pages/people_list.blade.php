@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <x-search-bar/>
            <?php
            $message = "Thêm nhân khẩu";
            $type = "primary_button";
            ?>
            <x-button :message="$message" :type="$type"/>
        </div>

        <div class="table_of_contents">
            <table>
                <thead>
                <tr>
                    <th>Mã nhân khẩu</th>
                    <th>Họ và tên</th>
                    <th>CCCD/CMT</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
