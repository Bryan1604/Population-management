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
                        <span>{{$data->people->fullname}}</span>
                    </div>
                    <div class="info">
                        <label>Giới tính: </label>
                        @if($data->people->sex == 0)
                        <span>Nam</span>
                        @else
                        <span>Nữ</span>
                        @endif
                    </div>
                    <div class="info">
                        <label>Ngày sinh: </label>
                        <span>{{ \Carbon\Carbon::parse($data->people->birthday)->format('d-m-Y') }}</span>
                    </div>
                    <div class="info">
                        <label>Số CCCD: </label>
                        <span>{{$data->people->identify_number}}</span>
                    </div>
                    <div class="info">
                        <label>Ngày cấp: </label>
                        <span>{{ \Carbon\Carbon::parse($data->people->received_IDCard_time)->format('d-m-Y') }}</span>
                    </div>
                    <div class="info">
                        <label>Nơi cấp: </label>
                        <span>{{$data->people->received_IDCard_place}}</span>
                    </div>
                    <div class="info">
                        <label>Hộ khẩu thường trú: </label>
                        <span>{{$data->people->domicile}}</span>
                    </div>
                    <div class="info">
                        <label>Địa chỉ tạm trú: </label>
                        <span>{{$data->address}}</span>
                    </div>
                    <div class="info">
                        <label>Thời gian tạm trú: </label>
                        <span>Từ {{$data->created_at->format('d-m-Y') }}</span>
                    </div>
                    <div class="info">
                        <label>Lý do: </label>
                        <span>{{$data->reason}}</span>
                    </div>
                </div>
            </div>
            <div class="house_hold_members">
                <img class="staying_avt_img" src="/images/avt.jpg" alt="">
            </div>
        </div>
    </div>
@endsection
