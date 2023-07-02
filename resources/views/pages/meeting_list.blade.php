@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <form action="{{ route('meetings.index') }}" method="GET" role="search">
                <div class="search_bar">
                    <input type="text" class="search" name="term" id="term"  placeholder="Search">
                    {{-- <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                        <a href="{{ route('projects.index') }}" class=" mt-1"> --}}
                    <button class="fas fa-search" type="submit" title="Search projects">
                        
                    </button>
                </div>
            </form>
            <?php
            $message = "Thêm Cuộc Họp";
            $type = "primary_button";
            ?>
            {{-- <x-button :message="$message" :type="$type"/> --}}
            <a href="{{ url('meeting/add') }}" class="primary_button">Thêm Cuộc Họp</a>
        </div>
        <br>
        <?php
            
            $message = session()->get('message');
            $message1 = session()->get('message1');
            $message2 = session()->get('message2');

        
            if ($message){
                echo '<span id = "message">'.$message.'</span>';
                session()->put('message',null);
            }

            if ($message1){
                echo '<span id = "message" style="color:green">'.$message1.'</span>';
                session()->put('message1',null);
            }

            if ($message2){
                echo '<span id = "message" style="color:red">'.$message2.'</span>';
                session()->put('message2',null);
            }

        ?>

        <script>
            setTimeout(function() {
                var messageElements = document.getElementsById('message');
                for (var i = 0; i < messageElements.length; i++) {
                    messageElements[i].style.display = 'none';
                }
            }, 3000); // 3 seconds
        </script>

        
            
        <div style="height: 400px; overflow-y: auto;" class="table_of_contents">
            <table>
                <thead>
                <tr>
                    <th>Số Thứ tự</th>
                    <th>Chủ đề sinh hoạt</th>
                    <th>Thời gian</th>
                    <th>Địa điểm</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($meetings as $item)
                <tr class="row-link" data-url="{{ route('meetings.edit',$item->id) }}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->time}}</td>
                    <td>{{$item->place}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a href="{{url('meeting/detail/'.$item->id)}}" class="primary_button">Xem</a>
                        <a href="{{ route('meetings.edit',$item->id) }}" class="primary_button">Sửa</a>
                        <a href="{{ url('/delete-meeting/'.$item->id) }}" class="primary_button" onclick="confirmDelete(event)" >Xóa</a>
                        
                        <script>
                            function confirmDelete(event) {
                                event.preventDefault(); // Prevent the default link behavior

                                // Show the confirmation alert
                                if (confirm('Xóa cuộc họp')) {
                                    // If confirmed, redirect to the delete URL
                                    window.location.href = event.target.href;
                                }
                            }
                        </script>
                        <!-- <form action="{{ route('meetings.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" >Xóa</button>
                            
                        </form> -->
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
