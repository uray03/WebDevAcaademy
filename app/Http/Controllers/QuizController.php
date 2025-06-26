<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show(Quiz $quiz)
    {
        $quiz->load('questions');
        return view('kuis.show', compact('quiz'));
    }

    public function __construct()
    {
        $this->middleware('auth'); // pastikan hanya user login yang bisa submit kuis
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $quiz->load('questions');

        if ($quiz->questions->isEmpty()) {
            return redirect()->back()->with('error', 'Kuis belum memiliki soal.');
        }

        $validated = $request->validate([
            'answers' => 'required|array',
        ]);

        $correctCount = 0;
        $total = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            $userAnswer = $validated['answers'][$question->id] ?? null;
            if ($userAnswer && strtoupper($userAnswer) === strtoupper($question->answer)) {
                $correctCount++;
            }
        }

        $finalScore = round(($correctCount / $total) * 100);

        // Simpan atau update hasil kuis
        QuizResult::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
            ],
            [
                'score' => $finalScore,
            ]
        );

        return view('kuis.result', [
            'quiz' => $quiz,
            'score' => $finalScore,
            'total' => $total,
        ]);
    }
}
