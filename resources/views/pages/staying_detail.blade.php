@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <?php
            $deleteBtnMessage = "Xóa";
            $deleteBtnType = "dangerous_button";
            $editBtnMessage = "Chỉnh Sửa";
            $editBtnType = "secondary_button";
            ?>
            <button onclick="goback()" class="primary_button">Quay Lại</button>
            <div class="control_btn">
                <x-button :message="$editBtnMessage" :type="$editBtnType"/>
                <x-button :message="$deleteBtnMessage" :type="$deleteBtnType"/>
            </div>
        </div>
        <script>
            function goback(){
                window.history.back();
            }
        </script>

        <div class="detail_info">
            <div class="head_of_house_hold">
                <div class="head-of-house-hold-info">
                    <div class="info">
                        <label>Họ và tên:</label>
                        <span>Nguyễn Văn A</span>
                    </div>
                    <div class="info">
                        <label>Giới tính: </label>
                        <span>Nam</span>
                    </div>
                    <div class="info">
                        <label>Ngày sinh: </label>
                        <span>01/01/1990</span>
                    </div>
                    <div class="info">
                        <label>Số CCCD: </label>
                        <span>123456789</span>
                    </div>
                    <div class="info">
                        <label>Ngày cấp: </label>
                        <span>01/01/1990</span>
                    </div>
                    <div class="info">
                        <label>Nơi cấp: </label>
                        <span>TP.HCM</span>
                    </div>
                    <div class="info">
                        <label>Hộ khẩu thường trú: </label>
                        <span>TP.HCM</span>
                    </div>
                    <div class="info">
                        <label>Địa chỉ tạm trú: </label>
                        <span>Hai Bà Trưng, Hà Nội</span>
                    </div>
                    <div class="info">
                        <label>Thời gian tạm trú: </label>
                        <span>01/01/1990 - 01/12/1991</span>
                    </div>
                    <div class="info">
                        <label>Lý do: </label>
                        <span>Học đại học.</span>
                    </div>
                </div>
            </div>
            <div class="house_hold_members">
                <img class="staying_avt_img" src="/images/avt.jpg" alt="">
            </div>
        </div>
    </div>
@endsection
