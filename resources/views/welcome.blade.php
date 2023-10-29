<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ForumApp-Laravel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.scss">
</head>

<body>
    @include('components.messages')
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            @if (Route::has('login') && !auth()->check())
            <a href="{{ route('login') }}">Login</a>
            @endif
            @if (Route::has('register') && !auth()->check())
            <a href="{{ route('register') }}">Register</a>
            @endif
        </div>

        <div class="content">
            @auth
            @isset($user)
            <h3>{{ "Welcome {$user->name}" }}</h3>
            @endisset
            @endauth
            <div class="title m-b-md">
                Forum App
            </div>

            <div class="links">
                @auth
                <a href="{{ route('questions.index') }}">Click Here To Check All The Questions</a>
                @endauth
                @guest
                <h2>Login to access questions</h2>
                <form action="{{ route('login') }}" method="post" style="display: flex; flex-direction: column;">

                    @csrf

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}">

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" value="">

                    <button>Login</button>

                </form>
                <h3>Don't have an account? <a href="{{ route('register') }}">Register</a></h3>
                @endguest
            </div>


        </div>
    </div>
</body>

</html>