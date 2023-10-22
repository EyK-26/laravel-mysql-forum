@extends('layouts.layout')

@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif

@section('content')
<section id="banner">
    <div class="container">
        <h1>Question</h1>
    </div>
</section>

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
                <form action="{{ route('questions.destroy', $question->id ) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete your question</button>
                </form>
            </div>
        </div>
    </div>
</section>
@include('answers.create')
@if ($question->answers->count() > 0)
@include('answers.answers')
@else
<div>
    <p>No Answer Yet</p>
</div>
@endif
@endif

@endsection