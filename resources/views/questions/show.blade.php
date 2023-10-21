@extends('layouts.layout')

@section('content')
<section id="banner">
    <div class="container">
        <h1>Question</h1>
    </div>
</section>
@include('components.messages')
@if (session('success'))
<h3 style="color: green;">{{ session('status') }}</h3>
@endif
<hr>
@if($question->id)
<section id="question">
    <div class="container">
        <div class="question-left">
            <h2>{{ $question->title }}</h2>
            <p>{{ $question->text }}</p>
        </div>
        <div class="question-right">
            <div class="user-avatar">
                <img class="img-fluid"
                    src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png" />
            </div>
            <div class="user-name">by <a href="{{ route('users.show', $question->user->id)}}">{{ $question->user->name
                    }}</a></div>
            <hr>
            <div style="display: flex; align-items: center; justify-content: center; flex-direction:column">
                <a href="{{ route('questions.edit', $question->id ) }}">Edit Your Question</a>
                <a href="{{ route('questions.destroy', $question->id ) }}">Delete Your Question</a>
            </div>
        </div>
    </div>
</section>

@if ($question->answers->count() > 0)
@include('questions.answers')
@else
<div>
    <p>No Answer Yet</p>
</div>
@endif
@endif

@endsection