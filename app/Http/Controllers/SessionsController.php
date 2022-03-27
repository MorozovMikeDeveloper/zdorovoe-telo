<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        session()->regenerate();

        $formFields = $request->only(['email', 'password']);

        if(Auth::attempt($formFields)){
            // return redirect(route('user.account'));
            return response()->json(['success' => 1]);
        }
        // return response()->json(['message' => 'Email или пароль не верны']);
        return redirect('/')->with('success', 'Добро пожаловать!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Пока!');
    }
}
