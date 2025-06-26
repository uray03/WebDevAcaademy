<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::latest()->get();
        return view('kursus.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load(['modules', 'quizzes']);
        return view('kursus.show', compact('course'));
    }
}
