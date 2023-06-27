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
            
            $message = Session::get('message');
            $message1 = Session::get('message1');
            $message2 = Session::get('message2');

            if ($message){
                echo '<span>'.$message.'</span>';
                Session::put('message',null);
            }

            if ($message1){
                echo '<span style="color:green">'.$message1.'</span>';
                Session::put('message1',null);
            }

            if ($message2){
                echo '<span style="color:red">'.$message2.'</span>';
                Session::put('message2',null);
            }

        ?>
        <div class="table_of_contents">
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
                        {{-- <a href="#" class="primary_button">Xóa</a> --}}

                        <form action="{{ route('meetings.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" >Xóa</button>
                            
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $meetings->withQueryString()->links('pagination::simple-bootstrap-5') }}
        </div>
    </div>
@endsection
