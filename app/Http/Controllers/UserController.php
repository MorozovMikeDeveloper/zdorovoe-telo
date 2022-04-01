<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show()
    {
        $courses = DB::table('orders')->join(
            'courses',
            'orders.course_id',
            '=',
            'courses.id')->get();

        return view('user', [
            'user' => Auth::user(),
            'courses' => $courses
        ]);
    }
}
