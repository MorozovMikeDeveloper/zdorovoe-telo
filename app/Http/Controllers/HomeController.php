<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    function index(){
        return view('home', [
            'courses' => Course::all(),
            'user' => $user ?? null
        ]);
    }
}
