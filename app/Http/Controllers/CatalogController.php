<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('catalog', [
            'courses' => Course::all(),
            'user' => $user ?? null
        ]);
    }

    public function show($slug)
    {
        $content = false;
        $course = Course::where('slug', $slug)->get()->first();
        $user = Auth::user();



        if($user){
            if($this->checkSuccessOrder($course, $user)){
                $content = true;
            }
        }

        if(!$course){
            return abort(404);
        }
        return view('course-detailed',
            ['course' => $course, 'content' => $content]
        );
    }

    private function checkSuccessOrder($course, $user){
        $successOrder = Order::where('user_id', $user->getAttribute('id'))
            ->where('course_id', $course->getAttribute('id'))->where('status', 1)->get()->first();
        return $successOrder;
    }
}
