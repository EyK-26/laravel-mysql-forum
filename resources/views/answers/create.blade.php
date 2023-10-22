@php
$style = "margin: 2em; text-align: center;";
@endphp
<hr>
@include('components.messages')
<form action="{{ route('answers.store') }}" method="post" style="{{ $style }}">
    @csrf
    <input type="hidden" name="question_id" value="{{ $question->id }}">
    <textarea name="text" id="text" cols="80" rows="2" placeholder="enter your answer here">{{ old('text') }}</textarea>
    <br>
    <br>
    <input type="text" name="name" id="name" placeholder="your username" value="{{ old('name') }}">
    <br>
    <br>
    <input type="email" name="email" id="email" placeholder="your email address" value="{{ old('email') }}">
    <br>
    <br>
    <button type="submit">Add</button>
</form>
<hr>