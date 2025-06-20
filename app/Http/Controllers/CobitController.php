<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Framework;
use App\Models\Option;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Evaluation;

class CobitController extends Controller
{
    /**
     * Display a listing of the COBIT framework.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Cobit/Index', []);
    }

    /**
     * Display all questions grouped by process for the COBIT framework.
     *
     * @return Response
     */
    public function allQuestions(): \Inertia\Response
    {
        $framework = Framework::with([
            'processes.questions.options'
        ])->where('name', 'COBIT')->first();

        $grupos = $framework->processes->groupBy(function ($process) {
            return substr($process->name, 0, 3);
        })->map(function ($procesos, $dominio) {
            return [
                'dominio' => $dominio,
                'procesos' => $procesos->values(),
            ];
        })->values();

        return Inertia::render('Cobit/allQuestions', [
            'framework' => [
                'name' => $framework->name,
                'processGroups' => $grupos,
            ],
        ]);
    }

    public function saveCobit(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'framework' => 'required|in:COBIT',
            'respuestas' => 'required|array',
            'respuestas.*.question_id' => 'required|exists:questions,id',
            'respuestas.*.option_id' => 'required|exists:options,id',
        ]);

        $respuestasPorDominio = collect($data['respuestas'])->groupBy(function ($respuesta) {
            $question = Question::with('process')->find($respuesta['question_id']);
            return substr($question->process->name, 0, 3);
        });

        foreach ($respuestasPorDominio as $dominio => $respuestas) {
            $totalScore = 0;
            $maxScore = 0;

            foreach ($respuestas as $respuesta) {
                $option = Option::find($respuesta['option_id']);
                $totalScore += $option->score;
                $maxScore += 5;
            }

            $porcentaje = round(($totalScore / $maxScore) * 100, 2);

            $evaluation = Evaluation::create([
                'user_id' => $user->id,
                'framework' => 'COBIT',
                'domain' => $dominio,
                'score_total' => $totalScore,
                'nivel' => $porcentaje,
            ]);

            foreach ($respuestas as $respuesta) {
                Answer::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'question_id' => $respuesta['question_id'],
                        'evaluation_id' => $evaluation->id,
                    ],
                    [
                        'option_id' => $respuesta['option_id'],
                    ]
                );
            }
        }

        return Inertia::location(route('dashboard'));
    }
}
