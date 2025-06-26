<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function download($quiz_id)
    {
        $user = Auth::user();
        $result = QuizResult::where('quiz_id', $quiz_id)->where('user_id', $user->id)->first();

        if (!$result || $result->score < 80) {
            return redirect()->back()->with('error', 'Kamu belum memenuhi syarat untuk mendapatkan sertifikat.');
        }

        $pdf = Pdf::loadView('sertifikat.certificate', [
            'user' => $user,
            'score' => $result->score,
            'date' => now()->format('d M Y'),
        ]);

        return $pdf->download('sertifikat_' . $user->name . '.pdf');
    }
}

