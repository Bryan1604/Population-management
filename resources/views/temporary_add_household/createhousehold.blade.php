
<!-- Trang createhousehold.blade.php -->

<!-- Button 1 -->
<a class="nav-link" href="/add_person_form/1">Add owner</a>
<a class="nav-link" href="/add_person_form/0">Add user</a>
<!-- Button 2 -->
{{-- <button onclick="location.href='{{ route("add_person_form", ["isOwner" => 0]) }}'">Button 2</button> --}}

{{-- <h2>{{ json_encode(session('owner')) }}</h2> --}}

{{-- {{session('owner')['full_name']}} --}}
@if (session()->has('save_data'))
    <ul>
        @foreach (session('save_data') as $value)
            <li>{{ $value['full_name'] }}</li>
        @endforeach
    </ul>
@endif



<form action="/save_data" method="POST">
  @csrf
  <button type="submit">Save</button>
</form>