@extends('layouts.layout')

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
    </div>
</section>
@endif
@endsection