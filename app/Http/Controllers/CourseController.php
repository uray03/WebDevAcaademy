<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\DifficultyLevel;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with(['category', 'difficultyLevel', 'images']);

        // Filter berdasarkan kategori jika dipilih
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter berdasarkan tingkat kesulitan jika dipilih
        if ($request->filled('difficulty')) {
            $query->where('difficulty_level_id', $request->difficulty);
        }

        $courses = $query->paginate(9);
        $categories = Category::all();
        $difficultyLevels = DifficultyLevel::all();

        return view('kursus.index', compact('courses', 'categories', 'difficultyLevels'));
    }

    public function show(Course $course)
    {
        $course->load(['modules', 'quizzes', 'category', 'difficultyLevel', 'images']);
    
        $enrollment = null;
        
        if (auth()->check()) {
            $enrollment = $course->enrollments()
                ->where('user_id', auth()->id())
                ->first();
        }
    
        return view('kursus.show', compact('course', 'enrollment'));
    }

    public function homeExplore()
    {
        $categories = [
            'pemrograman-web' => 'Pemrograman Web',
            'desain-grafis' => 'Desain Grafis',
            'digital-marketing' => 'Digital Marketing',
        ];

        $categoryCourses = [];
        foreach ($categories as $slug => $name) {
            $categoryCourses[] = [
                'slug' => $slug,
                'name' => $name,
                'courses' => Course::where('category_slug', $slug)->latest()->take(4)->get(),
            ];
        }

        return view('home.explore', compact('categoryCourses'));
    }

    
}
