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
        $attributes = request();

        $validateFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // auth()->login(User::create($attributes));
        // return redirect(route('user.account'));

        return response()->json(['success' => 1]);
    }
}
