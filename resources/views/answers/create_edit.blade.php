@php
$style = "margin: 2em; text-align: center;";
@endphp

@include('components.messages')

@if ($answer->id)
<form action="{{ route('answers.update', $answer->id) }}" method="post" style="{{ $style }}">
    @method('PUT')
    @else
    <form action="{{ route('answers.store') }}" method="post" style="{{ $style }}">
        @endif

        @csrf
        <textarea name="text" id="text" cols="80" rows="2"
            placeholder="enter your answer here">{{ old('text', $answer->text) }}</textarea>
        <br>
        <br>
        <input type="text" name="name" id="name" placeholder="your username"
            value="{{ old('name', $answer->user->name) }}">
        <br>
        <br>
        <input type="email" name="email" id="email" placeholder="your email address"
            value="{{ old('email', $answer->user->email) }}">
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>