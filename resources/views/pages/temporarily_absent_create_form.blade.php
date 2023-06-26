@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <?php
            $backBtnMessage = "Quay Lại";
            $backBtnType = "primary_button";
            ?>
            <x-button :message="$backBtnMessage" :type="$backBtnType"/>
        </div>

        <x-search-bar/>

        <div style="height: 400px; overflow-y: auto;" class="table_of_contents">
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
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>123 Nguyễn Văn A</td>
                    <td>01/01/2021</td>
                    <td>01/01/2021</td>
                    <td>
                        <a href="#" class="primary_button">add</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

        <div class="left_col_info">
            <img class="avt_img" src="/images/avt.jpg" alt="">
            <div class="people-info">
                <div class="info">
                    <label>Họ và tên:</label>
                    <span>abc</span>
                </div>
                <div class="info">
                    <label>Mã định danh: </label>
                    <span>abc</span>
                </div>
                <div class="info">
                    <label>Ngày sinh: </label>
                    <span>{abc</span>
                </div>
                {{--                <div class="info choose_info">--}}
                {{--                    <label>Thông tin cư trú: </label>--}}
                {{--                    <div class="radio_input">--}}
                {{--                        <input type="radio" id="none" name="people_type" value="Không">--}}
                {{--                        <span>Không</span>--}}

                {{--                    </div>--}}
                {{--                    <div class="radio_input">--}}
                {{--                        <input type="radio" id="tamVang" name="people_type" value="Tạm vắng">--}}
                {{--                        <span>Tạm vắng</span>--}}
                {{--                    </div>--}}
                {{--                    <div class="radio_input">--}}
                {{--                        <input type="radio" id="tamTru" name="people_type" value="Tạm trú">--}}
                {{--                        <span>Tạm trú</span>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>

        <div class="form_container">
            <form action="" method="post">
                {{--avt choose file--}}
{{--                <div class="form_group">--}}
{{--                    <label for="myFile">Ảnh đại diện: </label>--}}
{{--                    <input type="file" id="myFile" name="filename">--}}
{{--                </div>--}}
{{--                --}}
{{--                --}}
{{--                <div class="form_group">--}}
{{--                    <label for="humanName">Họ và tên: </label>--}}
{{--                    <input type="text" name="humanName" placeholder="example">--}}
{{--                </div>--}}
{{--                --}}
{{--                <div class="choose_info">--}}
{{--                    <label>Giới tính: </label>--}}
{{--                    <div class="radio_input">--}}
{{--                        <input type="radio" id="male" name="sex" value="male">--}}
{{--                        <span>Nam</span>--}}
{{--                    </div>--}}
{{--                    <div class="radio_input">--}}
{{--                        <input type="radio" id="female" name="sex" value="female">--}}
{{--                        <span>Nữ</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}
{{--                <div class="form_group">--}}
{{--                    <label for="dateOfBirth">Ngày sinh: </label>--}}
{{--                    <input type="date" name="dateOfBirth">--}}
{{--                </div>--}}
{{--                --}}
{{--                <div class="form_group">--}}
{{--                    <label for="identifier">Số CCCD: </label>--}}
{{--                    <input type="text" name="identifier" placeholder="example">--}}
{{--                </div>--}}
{{--                --}}
{{--                <div class="form_group">--}}
{{--                    <label for="placeOfBirth">Nơi sinh: </label>--}}
{{--                    <input type="text" name="placeOfBirth" placeholder="example">--}}
{{--                </div>--}}
{{--                --}}
{{--                <div class="form_group">--}}
{{--                    <label for="citizen_identity_publish_date">Ngày cấp: </label>--}}
{{--                    <input type="date" name="citizen_identity_publish_date">--}}
{{--                </div>--}}
{{--                --}}
{{--                <div class="form_group">--}}
{{--                    <label for="citizen_identity_publish_place">Nơi cấp CMND: </label>--}}
{{--                    <input type="text" name="citizen_identity_publish_place" placeholder="example">--}}
{{--                </div>--}}
{{--                --}}
{{--                <div class="form_group">--}}
{{--                    <label for="permanent_residence">Hộ khẩu thường trú: </label>--}}
{{--                    <input type="text" name="permanent_residence" placeholder="example">--}}
{{--                </div>--}}
{{--                --}}
{{--                <div class="form_group">--}}
{{--                    <label for="current_residence">Nơi ở hiện tại: </label>--}}
{{--                    <input type="text" name="current_residence" placeholder="example">--}}
{{--                </div>--}}

                <div class="form_group">
                    <label for="absent_time">Thời gian tạm vắng: </label>
                    <input type="text" name="absent_time" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="destination">Địa chỉ nơi đến: </label>
                    <input type="text" name="destination" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="absent_reason">Lý do tạm vắng: </label>
                    <input type="text" name="absent_reason" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="notice">Ghi chú thêm: </label>
                    <input type="text" name="notice" placeholder="example">
                </div>

                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>

@endsection
