@extends('layouts.layout')

@include('components.messages')
@section('content')

@if($users->count() > 0)

<ul>
    @foreach ($users as $user)
    <li>
        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <label for="delete">delete user and all related questions and
                their answers</label>
            <button type="submit">delete</button>
        </form>
    </li>
    @endforeach
</ul>

@endif

@endsection