@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <x-search-bar/>
            <?php
            $message = "Thêm nhân khẩu tạm vắng";
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
                <tr>
                    <td>2</td>
                    <td>Nguyễn Văn B</td>
                    <td>123 Nguyễn Văn B</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Nguyễn Văn C</td>
                    <td>123 Nguyễn Văn C</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Nguyễn Văn C</td>
                    <td>123 Nguyễn Văn C</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Nguyễn Văn C</td>
                    <td>123 Nguyễn Văn C</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Nguyễn Văn C</td>
                    <td>123 Nguyễn Văn C</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Nguyễn Văn C</td>
                    <td>123 Nguyễn Văn C</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Nguyễn Văn C</td>
                    <td>123 Nguyễn Văn C</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Nguyễn Văn C</td>
                    <td>123 Nguyễn Văn C</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="#" class="primary_button">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Nguyễn Văn C</td>
                    <td>123 Nguyễn Văn C</td>
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
