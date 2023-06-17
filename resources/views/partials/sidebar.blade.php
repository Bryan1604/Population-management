<div class="nav_menu">
    <div class="navigator">
        <h2 class="nav_menu__heading">QUẢN LÝ CÔNG DÂN</h2>
        <ul class="nav_menu_items">
           
            <li><a href="{{ route('pages/dashboard') }}">Thống kê</a></li>
            <li class="item_actived"><a href="{{ route('pages/house_hold_list') }}">Thông tin hộ khẩu</a></li>
            <li><a href="{{url('people/list')}}">Thông tin nhân khẩu</a></li>
            <li><a href="{{url('direction')}}">Tạm trú tạm vắng</a></li>
            <li><a href="{{url('meeting/list')}}">Quản ý lịch họp</a></li>
        </ul>
    </div>

    <div class="user_type">
        <p>Admin</p>
    </div>
</div>
