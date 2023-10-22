<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact("user"));
    }
    public function store($name, $email)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->save();
        return $user->id;
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact("user"));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "name" => "required",
            "email" => "required|email",
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('users.show', $id)->with('success', 'profile has been updated');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $questions = Question::query()->where('user_id', $id)->get();
        foreach ($questions as $question) {
            $questionController = new QuestionController;
            $questionController->destroy($question->id);
        }

        session()->flash('success', 'User deleted');
        return redirect()->route('questions.index');
    }
}
