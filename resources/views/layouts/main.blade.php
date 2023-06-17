    @include('layouts/heading')


{{--Code here--}}
<div class="container">
    @include('partials.header')

    <div class="main">
        @include('partials.sidebar')
        @yield('content')
    </div>
</div>
{{--Code here--}}


@include('layouts/footer')
