<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests\SignUpRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(SignUpRequest $request)
    {
        $validateFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'required'
        ]);

        if(User::where('email', $validateFields['email'])->exists()){
            return redirect(route('signup_form'))->withErrors(['message' => 'Пользователь с такой почтой уже существует']);
        }

        $user = User::create($validateFields);

        if($user){
            auth()->login($user);

            return redirect(route('user'));
        }


        return redirect(route('signup_form'))->withErrors(['message' => 'Ошибка регистрации']);

    }
}
