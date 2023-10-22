<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    // public function index()
    // {
    //     $answer = Answer::orderBy("updated_at")->paginate(10);
    //     return view("answers.index", compact("answer"));
    // }

    // public function create()
    // {
    //     $answer = new Answer();
    //     return view("answers.store", compact("answer"));
    // }

    public function store(Request $request)
    {
        $this->validateanswer($request);

        $answer = new Answer();
        $answer->fill($request->all());

        $user = new UserController();
        $user_id = $user->store($request->input('name'), $request->input('email'));

        $answer->user_id = $user_id;
        $answer->save();
        session()->flash('success', 'answer created');
        return redirect()->route('questions.show', $answer->question->id);
    }

    // public function show(string $id)
    // {
    //     $answer = Answer::findOrFail($id);
    //     return view('answers.show', compact('answer'));
    // }

    public function edit(string $id)
    {
        $answer = Answer::findOrFail($id);
        return view('answers.edit', compact('answer'));
    }

    public function update(Request $request, string $id)
    {
        $this->validateanswer($request);
        $answer = Answer::findOrFail($id);
        $answer->text = $request->input('text');

        $user_id = $answer->user_id;
        $user = User::findOrFail($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $answer->save();
        session()->flash('success', 'answer edited');
        return redirect()->route('questions.show', $answer->question->id);
    }

    public function destroy(string $id)
    {
        $answer = Answer::findOrFail($id);
        $question_id = $answer->question_id;
        $answer->delete();
        session()->flash('success', 'answer deleted');
        return redirect()->route('questions.show', $question_id);
    }

    public function destroyAll(string $id): void
    {
        $answers = Answer::query()->where('question_id', $id)->get();
        foreach ($answers as $answer) {
            $answer->delete();
        }
    }

    private function validateAnswer(Request $request)
    {
        $this->validate($request, [
            "text" => "required",
            "name" => "required",
            "email" => "required|email",
        ]);
    }
}
