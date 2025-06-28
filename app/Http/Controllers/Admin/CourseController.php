<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\DifficultyLevel;
use Illuminate\Http\Request;
use App\Models\CourseImage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['category', 'difficultyLevel', 'quizzes'])->latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        $difficultyLevels = DifficultyLevel::all();
        return view('admin.courses.create', compact('categories', 'difficultyLevels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'difficulty_level_id' => 'required|exists:difficulty_levels,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $course = Course::create($request->only('title', 'description', 'category_id', 'difficulty_level_id'));
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('course_images', 'public');
    
            $course->images()->create([
                'image_path' => $path
            ]);
        }
    
        return redirect()->route('admin.courses.index')->with('success', 'Kursus berhasil ditambahkan!');
    }
    

    public function show(Course $course)
    {
        $course->load(['modules', 'quizzes']);
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        $difficultyLevels = DifficultyLevel::all();
        return view('admin.courses.edit', compact('course', 'categories', 'difficultyLevels'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title'               => 'required|string|max:255',
            'description'         => 'required|string',
            'category_id'         => 'required|exists:categories,id',
            'difficulty_level_id' => 'required|exists:difficulty_levels,id',
        ]);

        $course->update([
            'title'               => $request->title,
            'description'         => $request->description,
            'category_id'         => $request->category_id,
            'difficulty_level_id' => $request->difficulty_level_id,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Kursus berhasil dihapus.');
    }

    public function uploadImage(Request $request, Course $course)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('course_images', 'public');

        $course->images()->create([
            'image_path' => $path,
        ]);

        return back()->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function deleteImage(CourseImage $image)
    {
        \Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
