<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.courses', [
            'courses' => Course::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validateFields = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $course = Course::create($validateFields);

        return redirect('admin/courses');
    }
}
