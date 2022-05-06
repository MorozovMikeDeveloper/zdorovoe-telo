<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Exceptions\PostTooLargeException;
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
            'name'          => 'required',
            'category'      => 'required',
            'preview_image' => 'required',
            'course_video'  => 'required',
            'description'   => 'required',
            'cost'          => 'required'
        ]);

            $course = Course::create($validateFields);
            $course->addMediaFromRequest('preview_image')->toMediaCollection('preview_images');
            $course->addMediaFromRequest('course_video')->toMediaCollection('courses_videos');

        return redirect('admin/courses');
    }
}
