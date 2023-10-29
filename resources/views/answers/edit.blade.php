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
    <button type="submit">Edit</button>
</form>
@endif