<header class="page_header">
    <div class="logo">
        <img
            src="https://play-lh.googleusercontent.com/ahJtMe0vfOlAu1XJVQ6rcaGrQBgtrEZQefHy7SXB7jpijKhu1Kkox90XDuH8RmcBOXNn"
            class="logo_img"
        >
    </div>
    <div class="page_title">
        <?php
        $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
        ?>

        @if($currentRoute == 'pages.house_hold_list')
            <h1>Danh sách hộ khẩu</h1>
        @elseif($currentRoute == 'pages.house_hold_detail')
            <h1>Thông tin hộ khẩu</h1>
        @elseif($currentRoute == 'pages.house_hold_add')
            <h1>Thêm hộ khẩu</h1>
        @elseif($currentRoute == 'pages.people_list')
            <h1>Danh sách nhân khẩu</h1>
        @elseif($currentRoute == 'pages.people_detail')
            <h1>Thông tin nhân khẩu</h1>
        @elseif($currentRoute == 'pages.people_add')
            <h1>Thêm nhân khẩu</h1>
        @elseif($currentRoute == 'pages.staying_absent_direction')
            <h1>Direction</h1>
        @elseif($currentRoute == 'pages.staying_list')
            <h1>Danh sách tạm trú</h1>
        @elseif($currentRoute == 'pages.staying_detail')
            <h1>Thông tin tạm trú</h1>
        @elseif($currentRoute == 'pages.staying_add')
            <h1>Staying Create</h1>
        @elseif($currentRoute == 'pages.absent_list')
            <h1>Danh sách tạm vắng</h1>
        @elseif($currentRoute == 'pages.absent_detail')
            <h1>Thông tin tạm vắng</h1>
        @elseif($currentRoute == 'pages.absent_add')
            <h1>Đăng kí tạm vắng</h1>
        @elseif($currentRoute == 'pages.meeting_list')
            <h1>Danh sách cuộc họp</h1>
        @elseif($currentRoute == 'pages.meeting_manage')
            <h1>Quản lý cuộc họp</h1>
        @elseif($currentRoute == 'pages.dashboard')
            <h1>Thống kê</h1>
        @elseif($currentRoute == 'pages.create_owner')
            <h1>Thông tin chủ hộ</h1>
        @endif
    </div>
</header>

