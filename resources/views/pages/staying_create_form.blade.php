@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <button onclick="goback()" class="primary_button">Quay Lại</button>
        </div>
        <script>
            function goback(){
                window.history.back();
            }
        </script>

        <div class="form_container">
            <form action="{{ url('staying/add') }}" method="POST">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                {{--avt choose file--}}
                <div class="form_group">
                    <label for="myFile">Ảnh đại diện:  </label>
                    <input type="file" id="myFile" name="filename">
                </div>
                <div class="form_group">
                    <label for="fullname">Họ và tên: </label>
                    <input type="text" name="fullname" >
                </div>
                <div class="choose_info">
                    <label for="sex">Giới tính: </label>
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
                    <label for="birthday">Ngày sinh: </label>
                    <input type="date" name="birthday">
                </div>
                <div class="form_group">
                    <label for="identify_number">Số CCCD: </label>
                    <input type="text" name="identify_number" >
                </div>
                <div class="form_group">
                    <label for="place_of_birth">Nơi sinh: </label>
                    <input type="text" name="place_of_birth" >
                </div>
                <div class="form_group">
                    <label for="received_IDCard_time">Ngày cấp: </label>
                    <input type="date" name="received_IDCard_time">
                </div>
                <div class="form_group">
                    <label for="received_IDCard_place">Nơi cấp CMND: </label>
                    <input type="text" name="received_IDCard_place" >
                </div>
                <div class="form_group">
                    <label for="address_before">Nơi ở trước đó: </label>
                    <input type="text" name="address_before" >
                </div>
                <div class="form_group">
                    <label for="temporary_address">Địa chỉ tạm trú: </label>
                    <input type="text" name="temporary_address" >
                </div>
                <div class="form_group">
                    <label for="phone_number">Số điện thoại: </label>
                    <input type="text" name="phone_number" >
                </div><div class="form_group">
                    <label for="temporary_reason">Lý do tạm trú: </label>
                    <input type="text" name="temporary_reason">
                </div><div class="form_group">
                    <label for="note">Ghi chú thêm: </label>
                    <input type="text" name="note" >
                </div>

                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>

@endsection
