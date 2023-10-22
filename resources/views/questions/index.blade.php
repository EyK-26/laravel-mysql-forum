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
        <h1>Questions</h1>
    </div>
</section>

<section id="questions">
    <div class="container">

        @if (count($questions) > 0)
        @foreach ($questions as $question)
        <div class="question">
            <div class="question-left">
                <div class="question-name">
                    <a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a>
                </div>
                <div class="question-info">
                    asked at {{ $question->created_at }} by <a href="{{ $question->user->id}}">{{ $question->user->name
                        }}</a>
                </div>
            </div>
            <div class="question-right">
                <div class="question-stat">
                    <span>{{ $question->answers->count() }}</span>
                    <label>{{ $question->answers->count() > 1 ? "responses" : "response"}} </label>
                </div>
            </div>
        </div>
        @endforeach
        {{ $questions->links() }}
        {{-- {{ $owners->appends(request()->input())->links() }} --}}
        @else
        <p style="text-align: center;">No Questions Yet</p>
        @endif
    </div>
</section>
@endsection