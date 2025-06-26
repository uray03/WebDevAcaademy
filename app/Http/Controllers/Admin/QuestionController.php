<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $questions = $quiz->questions;
        return view('admin.questions.index', compact('quiz', 'questions'));
    }

    public function create($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        return view('admin.questions.create', compact('quiz'));
    }

    public function store(Request $request, $quizId)
    {
        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'answer' => 'required|in:A,B,C,D',
        ]);

        Question::create([
            'quiz_id' => $quizId,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.questions.index', $quizId)->with('success', 'Pertanyaan berhasil ditambahkan.');
    }
}
