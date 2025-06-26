<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('admin.quizzes.create', compact('course'));
    }

    public function store(Request $request, $courseId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'answer' => 'required|in:A,B,C,D',
        ]);

        // Simpan Kuis
        $quiz = Quiz::create([
            'course_id' => $courseId,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Simpan Pertanyaan Pertama
        Question::create([
            'quiz_id' => $quiz->id,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.questions.index', $quiz->id)
            ->with('success', 'Kuis dan pertanyaan pertama berhasil ditambahkan. Silakan tambahkan pertanyaan lainnya.');
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('admin.quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->only('title', 'description'));

        return redirect()->route('admin.courses.show', $quiz->course_id)
            ->with('success', 'Kuis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $courseId = $quiz->course_id;
        $quiz->delete();

        return redirect()->route('admin.courses.show', $courseId)
            ->with('success', 'Kuis berhasil dihapus.');
    }
}
