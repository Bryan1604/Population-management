@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <form action="">
                    <div class="search_bar">
                        <input type="search" name="search" class="search" placeholder="Search" value="{{$search}}">
                        <button type="submit" class="search_button"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                
                <!-- <?php
                // $message = "Thêm hộ khẩu";
                // $type = "primary_button";
                // $url = url('household/add');
                ?>
                <x-button :message="$message" :type="$type" :href = "$url" /> -->
                <!--<a href="{{ url('absent/add') }}" class="primary_button">Thêm nhân khẩu tạm vắng</a> -->
        </div>

        <div style="height: 400px; overflow-y: auto;" class="table_of_contents">
            <table>
                <thead>
                <tr>
                    <th>Mã nhân khẩu</th>
                    <th>Họ và tên</th>
                    <th>CCCD/CMT</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @if(!empty($people))
                    @foreach($people as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->fullname}}</td>
                            <td>{{$item->identify_number}}</td>
                            <td>{{$item->phone_number}}</td>
                            <td>{{$item->household->address}}</td>
                            <td>
                                <a href="#" class="primary_button addButton">add</a>
                            </td>
                        </tr>
                    @endforeach
                    @endif

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('.addButton').click(function(event) {
                                event.preventDefault();                                
                                    // Lấy id từ hàng dữ liệu tương ứng
                                var itemId = $(this).closest('tr').find('td:first-child').text();                                    
                                // Gửi Ajax request để lấy dữ liệu của mục đích cụ thể
                                $.ajax({
                                    url: '/getOnePerson/' + itemId,
                                    method: 'GET',
                                    success: function(response) {
                                        // Xử lý phản hồi từ máy chủ                                                // Render dữ liệu vào dataContainer
                                        $('#fullname').text(response.person.fullname);
                                        $('#identify_number').text(response.person.identify_number);
                                        $('#birthday').text(response.person.birthday);                                            
                                    },
                                    error: function(error) {
                                        console.log('Error:', error);
                                    }
                                });
                            });
                        });
                    </script>
                </tbody>
            </table>
        </div>

        <div class="left_col_info">
            <img class="avt_img" src="/images/avt.jpg" alt="">
            <div class="people-info">
                <div class="info">
                    <label>Họ và tên:</label>
                    <span id="fullname"></span>
                </div>
                <div class="info">
                    <label>CCCD/CMT: </label>
                    <span id="identify_number" ></span>
                </div>
                <div class="info">
                    <label>Ngày sinh: </label>
                    <span id="birthday"></span>
                </div>

            
                {{--                <div class="info choose_info">--}}
                {{--                    <label>Thông tin cư trú: </label>--}}
                {{--                    <div class="radio_input">--}}
                {{--                        <input type="radio" id="none" name="people_type" value="Không">--}}
                {{--                        <span>Không</span>--}}

                {{--                    </div>--}}
                {{--                    <div class="radio_input">--}}
                {{--                        <input type="radio" id="tamVang" name="people_type" value="Tạm vắng">--}}
                {{--                        <span>Tạm vắng</span>--}}
                {{--                    </div>--}}
                {{--                    <div class="radio_input">--}}
                {{--                        <input type="radio" id="tamTru" name="people_type" value="Tạm trú">--}}
                {{--                        <span>Tạm trú</span>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>

        <div class="form_container">
            <form action="{{url('absent/add')}}" method="POST">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                <div class="form_group">
                    <label for="absent_time">Thời gian tạm vắng từ: </label>
                    <input type="date" name="move_time" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="destination">Địa chỉ nơi đến: </label>
                    <input type="text" name="move_place" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="absent_reason">Lý do tạm vắng: </label>
                    <input type="text" name="reason" placeholder="example">
                </div>
                <div class="form_group">
                    <label for="notice">Ghi chú thêm: </label>
                    <input type="text" name="note" placeholder="example">
                </div>

                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>

@endsection
