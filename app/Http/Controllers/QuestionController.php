<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy("updated_at")->paginate(10);
        return view("questions.index", compact("questions"));
    }

    public function create()
    {
        $question = new Question();
        return view("questions.create_edit", compact("question"));
    }

    public function store(Request $request)
    {
        $this->validateQuestion($request);

        $question = new Question();
        $question->fill($request->all());

        $user = new UserController();
        $user_id = $user->store($request->input('name'), $request->input('email'));

        $question->user_id = $user_id;
        $question->save();

        session()->flash('success', 'Question created');;
        return redirect()->route('questions.show', $question->id)->with('success', 'Question created');
    }

    public function show(string $id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show', compact('question'));
    }

    public function edit(string $id)
    {
        $question = Question::findOrFail($id);
        return view('questions.create_edit', compact('question'));
    }

    public function update(Request $request, string $id)
    {
        $this->validateQuestion($request);

        $question = Question::findOrFail($id);

        $user_id = $question->user_id;
        $user = User::findOrFail($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $question->fill($request->all());
        $question->save();

        session()->flash('success', 'Question edited');;
        return redirect()->route('questions.show', $question->id)->with('success', 'Question edited');
    }

    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        session()->flash('success', 'Question deleted');
        return redirect()->route('questions.index');
    }

    private function validateQuestion(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "text" => "required",
            "name" => "required",
            "email" => "required|email"
        ]);
    }
}