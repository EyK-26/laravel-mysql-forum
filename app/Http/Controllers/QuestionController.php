<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy("updated_at")->paginate(10);
        return view("questions.index", compact("questions"));
    }

    public function create()
    {
        $user = Auth::user()->name;
        $question = new Question();
        return view("questions.create_edit", compact("question", "user"));
    }

    public function store(Request $request)
    {
        $this->validateQuestion($request);

        $question = new Question();
        $question->fill($request->all());

        $user_id = Auth::user()->id;
        $question->user_id = $user_id;
        $question->save();

        return redirect()->route('questions.show', $question->id)->with('success', 'Question created');
    }

    public function show(string $id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show', compact('question'));
    }

    public function edit(string $id)
    {
        $user = Auth::user()->name;
        $question = Question::findOrFail($id);
        return view('questions.create_edit', compact('question', "user"));
    }

    public function update(Request $request, string $id)
    {
        $this->validateQuestion($request);

        $question = Question::findOrFail($id);

        $question->fill($request->all());
        $question->save();

        session()->flash('success', 'Question edited');;
        return redirect()->route('questions.show', $question->id)->with('success', 'Question edited');
    }

    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        if ($question->answers->count() > 0) {
            $answer = new AnswerController();
            $answer->destroyAll($id);
        }

        return redirect()->route('questions.index')->with('success', 'Question deleted');;
    }

    private function validateQuestion(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "text" => "required",
        ]);
    }
}
