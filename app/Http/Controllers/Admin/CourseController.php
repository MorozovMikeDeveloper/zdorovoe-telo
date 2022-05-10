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

    public function show(int $courseId)
    {
        return view('admin.course-detail', [
            'course' => Course::find($courseId),
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
        ]);

        $course = Course::create($validateFields);
        $course->addMediaFromRequest('preview_image')->toMediaCollection('preview_images');
        $course->addMediaFromRequest('course_video')->toMediaCollection('courses_videos');

        return redirect('admin/courses');
    }

    public function update(Request $request, int $course_id)
    {
        $validateFields = $request->validate([
            'name'          => 'required',
            'category'      => 'required',
            'preview_image' => 'required',
            'course_video'  => 'required',
            'description'   => 'required',
            'cost'          => 'required'
        ]);

        $course = Course::where('id', $course_id)->update($validateFields);
        $course->addMediaFromRequest('preview_image')->toMediaCollection('preview_images');
        $course->addMediaFromRequest('course_video')->toMediaCollection('courses_videos');

        return redirect('admin/courses');
    }

    public function destroy(int $courseId)
    {
        Course::find($courseId)->delete();
        return redirect('admin/courses');
    }
}
