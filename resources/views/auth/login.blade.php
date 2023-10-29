@extends('layouts.layout')
@section('content')
@include('components.messages')
<form action="{{ route('login') }}" method="post"
    style="display: flex; flex-direction: column; align-items:center; justify-content: center;">

    @csrf

    <label for=" email">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}">

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="">

    <button>Login</button>

</form>
@endsection