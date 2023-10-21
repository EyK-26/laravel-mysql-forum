<?php

namespace App\Http\Controllers;

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
}
