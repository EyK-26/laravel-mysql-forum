<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    // public function index()
    // {
    //     $answer = Answer::orderBy("updated_at")->paginate(10);
    //     return view("answers.index", compact("answer"));
    // }

    public function create()
    {
        $answer = new Answer();
        return view("answers.create_edit", compact("answer"));
    }

    public function store(Request $request)
    {
        $this->validateanswer($request);
        $answer = new Answer();
        $answer->fill($request->all());
        $answer->save();
        session()->flash('success', 'answer created');
        return redirect()->route('answers.show', $answer->id);
    }

    public function show(string $id)
    {
        $answer = Answer::findOrFail($id);
        return view('answers.show', compact('answer'));
    }

    public function edit(string $id)
    {
        $answer = Answer::findOrFail($id);
        return view('answers.create_edit', compact('answer'));
    }

    public function update(Request $request, string $id)
    {
        $this->validateanswer($request);
        $answer = Answer::findOrFail($id);
        $answer->fill($request->all());
        $answer->save();
        session()->flash('success', 'answer edited');
        return redirect()->route('answers.show', $answer->id);
    }

    public function destroy(string $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();
        session()->flash('success', 'answer deleted');
        return redirect()->route('answer.index');
    }

    private function validateAnswer(Request $request)
    {
        $this->validate($request, [
            "text" => "required",
        ]);
    }
}
