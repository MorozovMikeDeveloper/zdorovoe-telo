<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show()
    {
        $courses = DB::table('orders')->join('courses',
            'orders.course_id', '=', 'courses.id');
        return view('user', [
            'user' => User::all(),
            'courses' => $courses
        ]);
    }
}
