@extends('layouts.layout')

@include('components.messages')

@section('content')
@if ($user->id)
<section id="question">
    <div class="container">
        <div class="question-left">
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
        </div>
        <div class="question-right">
            <div class="user-avatar">
                <img class="img-fluid"
                    src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png" />
            </div>
        </div>
        <a href="{{ route('users.edit', $user->id) }}">Edit user details</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete user">
        </form>
    </div>
</section>
@endif
@endsection