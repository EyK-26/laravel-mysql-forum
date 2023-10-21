@extends('layouts.layout')
@section('content')
@php
$style ="margin: 2em; text-align: center;";
@endphp
<section id="banner">
    <div class="container">
        @if ($question->id)
        <h1>Edit your question</h1>
        @else
        <h1>Ask your question</h1>
        @endif
    </div>
</section>
@include('components.messages');
<hr>
@if ($question->id)
<form action="{{ route('questions.update', $question->id) }}" method="post" style="{{ $style }}">
    @method('PUT')
    @else
    <form action="{{ route('questions.store') }}" method="post" style="{{ $style }}">
        @endif
        @csrf
        <textarea name="title" id="title" cols="100" rows="1"
            placeholder="enter your question here">{{ old('title', $question->title) }}</textarea>
        <br>
        <br>
        <textarea name="text" id="text" cols="100" rows="15"
            placeholder="enter your question here">{{ old('text', $question->text) }}</textarea>
        <br>
        <br>
        <input type="text" name="name" id="name" placeholder="your user name"
            value="{{ old('name', $question->user->name ?? null) }}">
        <br>
        <br>
        <input type="email" name="email" id="email" placeholder="your email address"
            value="{{ old('email', $question->user->email ?? null) }}">
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>
    @endsection