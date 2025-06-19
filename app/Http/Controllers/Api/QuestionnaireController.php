<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    public function questionsByProcess($processId)
    {
        return Question::with('options')->where('process_id', $processId)->get();
    }

    public function storeAnswers(Request $request)
    {
        $user = Auth::user();

        foreach ($request->answers as $answer) {
            Answer::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'question_id' => $answer['question_id'],
                ],
                [
                    'option_id' => $answer['option_id'],
                ]
            );
        }

        return response()->json(['message' => 'Respuestas guardadas correctamente']);
    }
}