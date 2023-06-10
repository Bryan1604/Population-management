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

        <div class="form_container">
            <form action="" method="post">
                {{--avt choose file--}}
                <div class="form_group">
                    <label for="myFile">Ảnh đại diện:  </label>
                    <input type="file" id="myFile" name="filename">
                </div>
                <div class="form_group">
                    <label for="humanName">Họ và tên: </label>
                    <input type="text" name="humanName" placeholder="example">
                </div>
                <div class="choose_info">
                    <label>Giới tính: </label>
                    <div class="radio_input">
                        <input type="radio" id="male" name="sex" value="male">
                        <span>Nam</span>
                    </div>
                    <div class="radio_input">
                        <input type="radio" id="female" name="sex" value="female">
                        <span>Nữ</span>
                    </div>
                </div>
                <div class="form_group">
                    <label for="dateOfBirth">Ngày sinh: </label>
                    <input type="date" name="dateOfBirth">
                </div>
                <div class="form_group">
                    <label for="identifier">Số CCCD: </label>
                    <input type="text" name="identifier" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="placeOfBirth">Nơi sinh: </label>
                    <input type="text" name="placeOfBirth" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="citizen_identity_publish_date">Ngày cấp: </label>
                    <input type="date" name="citizen_identity_publish_date">
                </div>
                <div class="form_group">
                    <label for="citizen_identity_publish_place">Nơi cấp CMND: </label>
                    <input type="text" name="citizen_identity_publish_place" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="permanent_residence">Hộ khẩu thường trú: </label>
                    <input type="text" name="permanent_residence" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="temporary_address">Địa chỉ tạm trú: </label>
                    <input type="text" name="temporary_address" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="phone_number">Số điện thoại: </label>
                    <input type="text" name="phone_number" placeholder="example">
                </div><div class="form_group">
                    <label for="temporary_reason">Lý do tạm trú: </label>
                    <input type="text" name="temporary_reason" placeholder="example">
                </div><div class="form_group">
                    <label for="notice">Ghi chú thêm: </label>
                    <input type="text" name="notice" placeholder="example">
                </div>

                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>

@endsection
