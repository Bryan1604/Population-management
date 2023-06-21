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
                <x-button :message="$editBtnMessage" :type="$editBtnType"/>
                <x-button :message="$deleteBtnMessage" :type="$deleteBtnType"/>
            </div>
        </div>


        <div class="form_container">
            <form action="{{ route('meetings.update',$meeting->id) }}" method="POST" >
                @csrf
                @method('PUT')
                {{--avt choose file--}}
                <div class="form_group">
                    <label for="title">Title: </label>
                    <input type="text" name="title" value="{{  $meeting->title}}" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="place">Place: </label>
                    <input type="text" name="place" value="{{ $meeting->place}}" placeholder="example">
                </div>
                {{-- <div class="form_group">
                    <label for="time">Time: </label>
                    <input type="date" name="time" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="number_of_paticipants">Number_of_paticipants: </label>
                    <input type="text" name="number_of_paticipants" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="status">Status: </label>
                    <input type="text" name="status" placeholder="example">
                </div> --}}
                
                <button type="submit">Gửi</button>
            
            </form>
        </div>
                    
            
    </div>
@endsection
