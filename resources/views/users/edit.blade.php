@php
$style = "margin: 2em; text-align: center;";
@endphp

@include('components.messages')
@if ($user->id)
<form action="{{ route('users.update', $user->id) }}" method="post" style="{{ $style }}">
    @method('PUT')
    @csrf
    <input type="text" name="name" value="{{ old('name', $user->name) }}">
    <br>
    <br>
    <input type="email" name="email" value="{{ old('email', $user->email) }}">
    <br>
    <br>
    <button type="submit">Edit</button>
</form>
@endif