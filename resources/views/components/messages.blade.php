@if (count($errors) > 0)
<div class="alert alert-danger" style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success" style="color: green;">
    {{ Session::get('success') }}
</div>
@endif