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

    public function store(Request $request)
    {
        $validateFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'required'
        ]);

        if(User::where('email', $validateFields['email'])->exists()){
            return response()->json(['message' => 'Пользователь с таким email уже существует']);
        }

        $user = User::create($validateFields);

        if($user){
            auth()->login($user);

            return response()->json(['success' => 1]);
        }


        return response()->json(['message' => 'Ошибка регистрации. Попробуйте позже']);
        // return redirect(route('user.account'));

    }
}
