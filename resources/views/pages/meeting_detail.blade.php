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
            <button onclick="goback()" class="primary_button">Quay Lại</button>
            <!--back action --->
            <script>
                function goback(){
                    window.history.back();
                }
            </script>
            <!-- -->
            <div class="control_btn">
                {{-- <x-button :message="$editBtnMessage" :type="$editBtnType"/> --}}
                <a href="{{ route('meetings.edit',$meeting_detail->id) }}" class="secondary_button">
                    Chỉnh Sửa
                </a>
                

                {{-- <x-button :message="$deleteBtnMessage" :type="$deleteBtnType"/> --}}
                <form action="{{ route('meetings.destroy',$meeting_detail->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=dangerous_button >Xóa</button>
                    
                </form>
            </div>
        </div>


        <div class="detail_info">
            <div class="left_col_info">
                {{-- <img class="avt_img" src="/images/avt.jpg" alt=""> --}}
                <div class="people-info">
                    <div class="info">
                        <label>Title:</label>
                        <span>{{$meeting_detail->title}}</span>
                    </div>
                    <div class="info">
                        <label>Place: </label>
                        <span>{{$meeting_detail->place}}</span>
                    </div>
                    <div class="info">
                        <label>Time: </label>
                        <span>{{$meeting_detail->time}}</span>
                    </div>
                    <div class="info">
                        <label>Numbers Participant: </label>
                        <span>{{$meeting_detail->number_of_paticipants}}</span>
                    </div>
                    <div class="info">
                        <label>Status: </label>
                        <span>{{$meeting_detail->status}}</span>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
