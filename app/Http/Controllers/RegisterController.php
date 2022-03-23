<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request();

        auth()->login(User::create($attributes));

        return redirect('/')->with('success', 'Аккаунт успешно зарегистрирован!');
    }
}
