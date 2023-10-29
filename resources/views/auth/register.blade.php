@extends('layouts.layout')
@section('content')
@include('components.messages')
<h1>Register</h1>
<form action="{{ route('register') }}" method="post"
    style="display: flex; flex-direction: column; align-items:center; justify-content: center;">
    @csrf
    <label for="name">name</label>
    <input type="text" name="name" value="{{ old('name') }}">
    <label for="email">email</label>
    <input type="email" name="email" value="{{ old('email') }}">
    <label for="password">password</label>
    <input type="password" name="password" value="">
    <label for="password_confirmation">password confirmation</label>
    <input type="password" name="password_confirmation" value="">
    <button>Register</button>
</form>
@endsection