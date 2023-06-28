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
            <!-- <x-button :message="$backBtnMessage" :type="$backBtnType"/> -->
            <button onclick="goback()" class="primary_button">Quay Lại</button>
            <div class="control_btn">
                <x-button :message="$editBtnMessage" :type="$editBtnType"/>
                <x-button :message="$deleteBtnMessage" :type="$deleteBtnType"/>
            </div>

            <script>
                function goback(){
                    window.history.back();
                }
            </script>
        </div>

        <div class="detail_info">
            <div class="head_of_house_hold">
                <img src="/images/avt.jpg" alt="">
                <div class="head-of-house-hold-info">
                    <div class="info">
                        <label>Họ và tên:</label>
                        <span>{{$household_detail->owner->fullname}}</span>
                    </div>
                    <div class="info">
                        <label>Địa chỉ:</label>
                        <span>{{$household_detail->address}}</span>
                    </div>
                </div>
            </div>
            <div class="house_hold_members">
                <h1>THÀNH VIÊN HỘ GIA ĐÌNH</h1>
                <ul>
                    @foreach($member_list as $member)
                    <li><a href="{{url('people/detail/'.$member->id)}}">{{$member->fullname}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
