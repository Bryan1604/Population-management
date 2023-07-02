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
            <form action="{{ route('meetings.store') }}"method="POST">
                @csrf

                {{--avt choose file--}}
                <div class="form_group">
                    <label for="title">Title: </label>
                    <input type="text" name="title">
                </div>
                <div class="form_group">
                    <label for="place">Place: </label>
                    <input type="text" name="place" >
                </div>
                <div class="form_group">
                    <label for="time">Time: </label>
                    <input type="datetime-local" name="time" >
                </div>
                <!-- <div class="form_group">
                    <label for="number_of_paticipants">Number_of_paticipants: </label>
                    <input type="text" name="number_of_paticipants" >
                </div> -->
                <div class="form_group">
                    <label for="status">Status: </label>
                    <input type="text" name="status">
                </div>
                
                <button type="submit">Gửi</button>
            
            </form>
        </div>
    </div>

@endsection
