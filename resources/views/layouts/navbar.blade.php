<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Forum App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            @auth
            <a class="nav-item nav-link" href="{{ route('questions.index') }}">Questions</a>
            <a class="nav-item nav-link" href="{{ route('questions.create') }}">Ask a question</a>
            @include('auth.logout')
            @endauth
        </div>
    </div>
</nav>