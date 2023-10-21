<section id="answers">
    <div class="container">
        <h2>{{ $question->answers->count() }} {{ $question->answers->count() > 1 ? "Answers" : "Answer" }}</h2>
        @foreach ($question->answers as $answer)
        <div class="answer">
            <div class="answer-right">
                <p>{{ $answer->text }}</p>
            </div>
            <div class="answer-left">
                <div class="user-avatar">
                    <img class="img-fluid"
                        src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png" />
                </div>
                <div class="user-name">by <a href="{{ route('users.show', $answer->user->id)}}">{{ $answer->user->name
                        }}</a></div>
                <hr>
                <div style="display: flex; align-items: center; justify-content: center; flex-direction:column">
                    <a href="{{ route('answers.edit', $answer->id ) }}">Edit Your Question</a>
                    <a href="{{ route('answers.destroy', $answer->id ) }}">Delete Your Question</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @include('answers.create_edit')
</section>