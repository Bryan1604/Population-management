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
            <h1>House Hold List</h1>
        @elseif($currentRoute == 'pages.house_hold_detail')
            <h1>House Hold Detail</h1>
        @elseif($currentRoute == 'pages.house_hold_add')
            <h1>House Hold Create</h1>
        @elseif($currentRoute == 'pages.people_list')
            <h1>People List</h1>
        @elseif($currentRoute == 'pages.people_detail')
            <h1>People Detail</h1>
        @elseif($currentRoute == 'pages.people_add')
            <h1>People Create</h1>
        @elseif($currentRoute == 'pages.staying_absent_direction')
            <h1>Direction</h1>
        @elseif($currentRoute == 'pages.staying_list')
            <h1>Staying List</h1>
        @elseif($currentRoute == 'pages.staying_detail')
            <h1>Staying Detail</h1>
        @elseif($currentRoute == 'pages.staying_add')
            <h1>Staying Create</h1>
        @elseif($currentRoute == 'pages.absent_list')
            <h1>Absent List</h1>
        @elseif($currentRoute == 'pages.absent_detail')
            <h1>Absent Detail</h1>
        @elseif($currentRoute == 'pages.absent_add')
            <h1>Absent Create</h1>
        @elseif($currentRoute == 'pages.meeting_list')
            <h1>Meeting List</h1>
        @elseif($currentRoute == 'pages.meeting_manage')
            <h1>Meeting Manage</h1>
        @endif
    </div>
</header>

