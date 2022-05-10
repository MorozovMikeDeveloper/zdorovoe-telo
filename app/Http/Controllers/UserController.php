<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show()
    {
        $courses = Order::where('status', 1)->join(
            'courses',
            'orders.course_id',
            '=',
            'courses.id')->get();

        foreach ($courses as $course){
            $course->course_model = Course::find($course->id);
        }

        return view('user', [
            'user' => Auth::user(),
            'courses' => $courses
        ]);
    }
}
