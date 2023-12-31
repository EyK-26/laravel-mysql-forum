<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $this->validateanswer($request);

        $answer = new Answer();
        $answer->fill($request->all());


        $user_id = Auth::user()->id;
        $answer->user_id = $user_id;
        $answer->save();
        return redirect()->route('questions.show', $answer->question->id)->with('success', 'answer has been added');;
    }

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

        $answer->save();

        session()->flash('success', 'answer edited');
        return redirect()->route('questions.show', $answer->question->id)->with('success', 'answer has been updated');;
    }

    public function destroy(string $id)
    {
        $answer = Answer::findOrFail($id);
        $question_id = $answer->question_id;
        $answer->delete();
        return redirect()->route('questions.show', $question_id)->with('success', 'answer has been deleted');
    }

    public function destroyAll(string $id): void
    {
        $answers = Answer::query()->where('question_id', $id)->get();
        foreach ($answers as $answer) {
            $answer->delete();
        }
        session()->flash('success', 'question and all related answers are deleted');
    }

    private function validateAnswer(Request $request)
    {
        $this->validate($request, [
            "text" => "required",
        ]);
    }
}
