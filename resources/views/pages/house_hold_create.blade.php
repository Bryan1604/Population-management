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
                <x-button :message="$submitBtnMessage" :type="$submitBtnType" onclick="submit()" />
            </div> 
            <script>
                function submit(){
                    window.location.href = "/household/list";
                }
            </script>

        </div>

        <div class="detail_info">
            <?php
                $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
            ?>
            
            <div class="left_col_info">
                <h1>THÔNG TIN CHỦ HỘ</h1>
                <div class="people_info">
                    <div class="info">
                        <label>Họ và tên:</label>
                        @if(session('owner'))
                        <span>{{session('owner')->fullname}}</span>
                        @else
                        <span>Null</span>
                        @endif
                    </div>
                    <div class="info">
                        <label>CCCD/CMT: </label>
                        @if(session('owner'))
                        <span>{{session('owner')->identify_number}}</span>
                        @else
                        <span>Null</span>
                        @endif
                    </div>
                    <div class="info">
                        <label>Địa chỉ: </label>
                        @if(session('household'))
                        <span>{{session('household')->address}}</span>
                        @else
                        <span>Null</span>
                        @endif
                    </div>
                </div>
                
                <button>
                    @if(!session('owner'))
                    <a href="{{url('household/create_owner')}}">Thêm chủ hộ</a>
                    @else
                    <a href="{{url('household/create_owner')}}">Chỉnh sửa thông tin chủ hộ</a>
                    @endif
                </button>
               
            </div>

            <div class="right_col_info">
                <h1>THÀNH VIÊN HỘ GIA ĐÌNH</h1>
                <ul>
                    @if(session('people'))
                        @foreach(session('people') as $person)
                        <li><a href="#">{{$person->fullname}}</a></li>
                        @endforeach
                    @endif
                </ul>
                @if(session('owner'))
                <button>
                    <a href="{{url('household/add_people')}}">Thêm thành viên</a>
                </button>
                @endif
            </div>
            
        </div>
    </div>
@endsection
