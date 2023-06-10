@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <?php
            $deleteBtnMessage = "Xóa";
            $deleteBtnType = "dangerous_button";
            $editBtnMessage = "Chỉnh Sửa";
            $editBtnType = "secondary_button";
            $backBtnMessage = "Quay Lại";
            $backBtnType = "primary_button";
            ?>
            <x-button :message="$backBtnMessage" :type="$backBtnType"/>
            <div class="control_btn">
                <x-button :message="$editBtnMessage" :type="$editBtnType"/>
                <x-button :message="$deleteBtnMessage" :type="$deleteBtnType"/>
            </div>
        </div>

        <div class="detail_info">
            <div class="head_of_house_hold">
                <img src="/images/avt.jpg" alt="">
                <div class="head-of-house-hold-info">
                    <div class="info">
                        <label>Họ và tên:</label>
                        <span>Nguyễn Văn A</span>
                    </div>
                    <div class="info">
                        <label>Địa chỉ:</label>
                        <span>Thôn 1, xã 1, huyện 1, tỉnh 1</span>
                    </div>
                </div>
            </div>
            <div class="house_hold_members">
                <h1>THÀNH VIÊN HỘ GIA ĐÌNH</h1>
                <ul>
                    <li><a href="#">Nguyễn Văn A</a></li>
                    <li><a href="#">Nguyễn Văn A</a></li>
                    <li><a href="#">Nguyễn Văn A</a></li>
                    <li><a href="#">Nguyễn Văn A</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
