<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginRequest;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(LoginRequest $request)
    {

        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)){
            if (Auth::user()->getAttribute('role') === 'admin') {
                return redirect('admin');
            }

            return redirect()->intended(route('user'));
        }
        return redirect(route('login_form'))->withErrors(['message' => 'Email или пароль неверны']);
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Пока!');
    }
}
