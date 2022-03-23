<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request();
        session()->regenerate();

        return redirect('/')->with('success', 'Добро пожаловать!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Пока!');
    }
}
