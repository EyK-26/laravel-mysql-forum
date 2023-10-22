@php
$style = "margin: 2em; text-align: center;";
@endphp

@include('components.messages')
@if ($answer->id)
<form action="{{ route('answers.update', $answer->id) }}" method="post" style="{{ $style }}">
    @method('PUT')
    @csrf
    <textarea name="text" id="text" cols="80" rows="2"
        placeholder="enter your answer here">{{ old('text', $answer->text) }}</textarea>
    <br>
    <br>
    <input type="text" name="name" value="{{ old('name', $answer->user->name) }}">
    <br>
    <br>
    <input type="email" name="email" value="{{ old('email', $answer->user->email) }}">
    <br>
    <br>
    <button type="submit">Edit</button>
</form>
@endif