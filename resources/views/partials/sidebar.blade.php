<div class="nav_menu">
    <div class="navigator">
        <h2 class="nav_menu__heading">QUẢN LÝ CÔNG DÂN</h2>
        <ul class="nav_menu_items">

            <?php
            $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
            ?>

            <li
                @if($currentRoute == 'pages.dashboard')
                    class="item_actived"
                @else
                    class="item_unactive"
                @endif
            >
                <a href="{{ url('dashboard') }}">Thống kê</a>
            </li>

            <li
                @if(
                    $currentRoute == 'pages.house_hold_list'
                    || $currentRoute == 'pages.house_hold_detail'
                    || $currentRoute == 'pages.house_hold_add'
                )
                    class="item_actived"
                @else
                    class="item_unactive"
                @endif
            >
                <a href="{{ url('household/list') }}">Thông tin hộ khẩu</a>
            </li>

            <li
                @if(
                    $currentRoute == 'pages.people_list'
                    || $currentRoute == 'pages.people_detail'
                    || $currentRoute == 'pages.people_add'
                )
                    class="item_actived"
                @else
                    class="item_unactive"
                @endif
            >
                <a href="{{url('people/list')}}">Thông tin nhân khẩu</a>
            </li>

            <li
                @if(
                    $currentRoute == 'pages.staying_absent_direction'
                    || $currentRoute == 'pages.staying_list'
                    || $currentRoute == 'pages.staying_detail'
                    || $currentRoute == 'pages.staying_add'
                    || $currentRoute == 'pages.absent_list'
                    || $currentRoute == 'pages.absent_detail'
                    || $currentRoute == 'pages.absent_add'
                )
                    class="item_actived"
                @else
                    class="item_unactive"
                @endif
            >
                <a href="{{url('direction')}}">Tạm trú tạm vắng</a>
            </li>

            <li
                @if(
                    $currentRoute == 'pages.meeting_list'
                    || $currentRoute == 'pages.meeting_manage'
                )
                    class="item_actived"
                @else
                    class="item_unactive"
                @endif
            >
                <a href="{{url('meeting/list')}}">Quản ý lịch họp</a>
            </li>
        </ul>
    </div>

    <div class="user_type">
        <p>Admin</p>
    </div>
</div>
