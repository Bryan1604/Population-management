@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <x-search-bar/>
            <?php
            $message = "Thêm Cuộc Họp";
            $type = "primary_button";
            ?>
            {{-- <x-button :message="$message" :type="$type"/> --}}
            <a href="{{ url('meeting/add') }}" class="primary_button">Thêm Cuộc Họp</a>
        </div>

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
                <tr>
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
