@extends('layouts.main')

@section('content')
    <div class="content_container">
        <div class="content_control">
            <!-- <x-search-bar/> -->
            <form action="">
                <div class="search_bar">
                    <input type="search" name="search" class="search" placeholder="Search" value="{{$search}}">
                    <button type="submit" class="search_button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            
            <a href="{{ url('staying/add') }}" class="primary_button">Thêm nhân khẩu tạm trú</a>
        </div>

        <div class="table_of_contents">
            <table>
                <thead>
                <tr>
                    <th>Thời gian</th>
                    <th>Họ và tên </th>
                    <th>CCCD/CMT</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ trước đó</th>
                    <th>Địa chỉ hiện tại</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                <tr>
                    @if($item->people)
                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                    <td>{{$item->people->fullname}}</td>
                    <td>{{$item->people->identify_number}}</td>
                    <td>{{$item->people->phone_number}}
                    <td>{{$item->people->address_before}}</td>
                    <td>{{$item->address}}</td>
                    <td>
                        <a href="{{url('staying/detail/'.$item->id)}}" class="primary_button">Xem</a>
                        <a href="#" class="primary_button">Sửa</a>
                        <a href="{{url('staying/delete/'.$item->id)}}" class="primary_button">Xóa</a>
                        
                    </td>
                    @endif
                </tr>
                @endforeach
                <script>
                       function deleteItem(itemId) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Delete this item!',
                            showCancelButton: true,
                            cancelButtonText: 'Cancel',
                            confirmButtonText: 'Ok',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // User clicked the confirm button
                                // Perform the delete action
                                axios
                                    .get('delete/${itemId}')
                                    .then((response) => {
                                        // Handle the success response
                                        Swal.fire('Deleted!', 'The item has been deleted.', 'success');
                                        // Perform any additional actions, such as updating the UI
                                    })
                                    .catch((error) => {
                                        // Handle the error response
                                        Swal.fire('Error!', 'An error occurred while deleting the item.', 'error');
                                        // Perform any error handling or display an error message
                                        alert(error.response.data.message);
                                    });
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                // User clicked the cancel button
                                // Handle the cancellation
                                Swal.fire('Cancelled', 'The delete operation was cancelled.', 'info');
                            }
                        });
                    }
                </script>
                </tbody>
            </table>
        </div>
    </div>
@endsection
