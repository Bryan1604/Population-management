@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <?php
            $backBtnMessage = "Quay Lại";
            $backBtnType = "primary_button";
            ?>
            <button onclick="goback()" class="primary_button">Quay Lại</button>
            <!--back action --->
            <script>
                function goback(){
                    window.history.back();
                }
            </script>
            <!-- -->
        </div>

        <div class="form_container">
            <?php
            $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
            if ($currentRoute == 'pages.create_owner'){
                // thêm chủ hộ 
                $action = "household/create_owner";
            }else{
                // them nguoi vao ho khau 
                $action = "household/add_people";
            }
            ?>
            <form action="{{url($action)}}" method="POST">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                {{--avt choose file--}}
                <div class="form_group">
                    <input type="file" id="myFile" name="filename">
                </div>
                <div class="form_group">
                    <label for="fullname">Họ và tên: </label>
                    <input type="text" name="fullname" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="identify_number">Mã định danh: </label>
                    <input type="text" name="identify_number" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="birthday">Ngày sinh: </label>
                    <input type="date" name="birthday">
                </div>
                <div class="form_group">
                    <label for="place_of_birth">Nơi sinh: </label>
                    <input type="text" name="place_of_birth" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="religion">Tôn giáo: </label>
                    <input type="text" name="religion" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="ethnic">Dân tộc: </label>
                    <input type="text" name="ethnic" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="received_IDCard_place">Nơi cấp CMND: </label>
                    <input type="text" name="received_IDCard_place" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="received_IDCard_time">Ngày cấp: </label>
                    <input type="date" name="received_IDCard_time">
                </div>
                <div class="form_group">
                    <label for="phone_number">Số điện thoại: </label>
                    <input type="text" name="phone_number" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="domicile">Nguyên Quán: </label>
                    <input type="text" name="domicile" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="address_before">Nơi ở trước đó: </label>
                    <input type="text" name="address_before" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="note">Ghi chú thêm: </label>
                    <input type="text" name="note" placeholder="example">
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
                <div class="choose_info">
                    <label>Quan hệ với chủ hộ: </label>
                    @if($currentRoute == 'pages.create_owner' )
                    <div class="radio_input">
                        <input type="radio" id="head" name="household_owner_relationship" value="head">
                        <span>Chủ hộ</span>
                    </div>
                    @endif
                    <div class="radio_input">
                        <input type="radio" id="wife" name="household_owner_relationship" value="wife">
                        <span>Vợ</span>
                    </div>
                    <div class="radio_input">
                        <input type="radio" id="husband" name="household_owner_relationship" value="husband">
                        <span>Chồng</span>
                    </div>
                    <div class="radio_input">
                        <input type="radio" id="child" name="household_owner_relationship" value="child">
                        <span>Con</span>
                    </div>
                    <div class="radio_input">
                        <input type="radio" id="father" name="household_owner_relationship" value="father">
                        <span>Bố</span>
                    </div>
                    <div class="radio_input">
                        <input type="radio" id="mother" name="household_owner_relationship" value="mother">
                        <span>Mẹ</span>
                    </div>
                </div>
                @if($currentRoute == 'pages.create_owner' )
                    <div class="form_group">
                        <label for="address">Địa chỉ hộ khẩu đăng kí: </label>
                        <input type="text" name="address" placeholder="example">
                    </div>
                @endif
                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>

@endsection
