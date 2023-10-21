<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('questions.index') }}">Forum App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="/">Logout</a>
            <a class="nav-item nav-link" href="{{ route('questions.index') }}">Questions</a>
            <a class="nav-item nav-link" href="{{ route('questions.create') }}">Ask a question</a>
        </div>
    </div>
</nav>