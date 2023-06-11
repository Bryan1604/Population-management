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
            <div class="left_col_info">
                <img class="avt_img" src="/images/avt.jpg" alt="">
                <div class="people-info">
                    <div class="info">
                        <label>Họ và tên:</label>
                        <span>{{$people_detail->fullname}}</span>
                    </div>
                    <div class="info">
                        <label>Mã định danh: </label>
                        <span>{{$people_detail->identify_number}}</span>
                    </div>
                    <div class="info">
                        <label>Ngày sinh: </label>
                        <span>{{$people_detail->birthday}}</span>
                    </div>
                    <div class="info choose_info">
                        <label>Thông tin cư trú: </label>
                        <div class="radio_input">
                            <input type="radio" id="none" name="people_type" value="Không">
                            <span>Không</span>
                            
                        </div>
                        <div class="radio_input">
                            <input type="radio" id="tamVang" name="people_type" value="Tạm vắng">
                            <span>Tạm vắng</span>
                        </div>
                        <div class="radio_input">
                            <input type="radio" id="tamTru" name="people_type" value="Tạm trú">
                            <span>Tạm trú</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right_col_info">
                <div class="info">
                    <label>Nơi sinh: </label>
                    <span>{{$people_detail->place_of_birth}}</span>
                </div>
                <div class="info">
                    <label>Nơi cấp CCCD: </label>
                    <span>{{$people_detail->received_IDCard_place}}</span>
                </div>
                <div class="info">
                    <label>Ngày cấp: </label>
                    <span>{{$people_detail->recieved_IDCard_time}}</span>
                </div>
                <div class="info">
                    <label>Nguyên Quán: </label>
                    <span>{{$people_detail->domicile}}</span>
                </div>
                <div class="info">
                    <label>Nơi ở trước đó (trường hợp tạm trú): </label>
                    @if ($people_detail->state == 2)
                        <span>{{$people_detail->address_before}}</span>
                    @else
                        <span>Không</span>
                    @endif
                </div>
                <div class="info">
                    <label>Dân tộc: </label>
                    <span>{{$people_detail->ethnic}}</span>
                </div>
                <div class="info">
                    <label>Tôn giáo: </label>
                    <span>Không</span>
                </div>
                <div class="info">
                    <label>Trình độ học vấn: </label>
                    <span>Cấp 3</span>
                </div>
                <div class="info">
                    <label>Số điện thoại: </label>
                    <span>{{$people_detail->phone_number}}</span>
                </div>
                <div class="info">
                    <label>Ghi chú thêm: </label>
                    <span>{{$people_detail->note}}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
