@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <?php
            $submitBtnMessage = "Gửi";
            $submitBtnType = "secondary_button";
            $backBtnMessage = "Quay Lại";
            $backBtnType = "primary_button";
            ?>
            <!--
            <x-button :message="$backBtnMessage" :type="$backBtnType"/>
            -->
            <button onclick="goback()" class="primary_button">Quay Lại</button>
            <div class="control_btn">
                <x-button :message="$submitBtnMessage" :type="$submitBtnType"/>
            </div>

            <script>
                function goback(){
                    window.history.back();
                }
            </script>
        </div>

        <div class="detail_info">
            <div class="left_col_info">
                <h1>THÔNG TIN CHỦ HỘ</h1>
                <div class="people_info">
                    <div class="info">
                        <label>Họ và tên:</label>
                        <span>null</span>
                    </div>
                    <div class="info">
                        <label>Ngày sinh: </label>
                        <span>null</span>
                    </div>
                    <div class="info">
                        <label>Địa chỉ: </label>
                        <span>null</span>
                    </div>
                </div>

                <button>
                    <a href="#">Thêm chủ hộ</a>
                </button>
            </div>

            <div class="right_col_info">
                <h1>THÀNH VIÊN HỘ GIA ĐÌNH</h1>
                <ul>
                    <li><a href="#">Nguyễn Văn A</a></li>
                    <li><a href="#">Nguyễn Văn A</a></li>
                    <li><a href="#">Nguyễn Văn A</a></li>
                    <li><a href="#">Nguyễn Văn A</a></li>
                </ul>
                <button>
                    <a href="#">Thêm thành viên</a>
                </button>
            </div>
        </div>
    </div>
@endsection
