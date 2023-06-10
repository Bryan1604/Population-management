@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <x-search-bar/>
            <?php
            $deleteMessage = "Thêm Cuộc Họp";
            $confirmMessage = "Ghi nhận";
            $type = "primary_button";
            ?>
            <x-button :message="$deleteMessage" :type="$type"/>
            <x-button :message="$confirmMessage" :type="$type"/>
        </div>

        <form class="meeting" action="" method="">
            <button type="submit">Thêm nhân khẩu vào cuộc họp:</button>
            <input type="text" name="add_house_hold" placeholder="Mã nhân khẩu">
        </form>

        <div class="table_of_contents">
            <table>
                <thead>
                <tr>
                    <th>Số Thứ tự</th>
                    <th>Số hộ khẩu</th>
                    <th>Họ tên chủ hộ</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
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
