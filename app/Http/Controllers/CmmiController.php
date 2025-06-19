<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Framework;
use App\Models\Answer;
use App\Models\Evaluation;
use App\Models\Option;

class CmmiController extends Controller
{
    /**
     * Display a listing of the CMMI framework.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Cmmi/Index', []);
    }

    public function asses()
    {
        $framework = Framework::with([
            'processes.questions.options'
        ])->where('name', 'CMMI')->first();

        return Inertia::render('Cmmi/Evaluar', [
            'framework' => $framework
        ]);
    }

    public function save(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'framework' => 'required|in:CMMI,COBIT',
            'domain' => 'nullable|string',
            'respuestas' => 'required|array',
            'respuestas.*.question_id' => 'required|exists:questions,id',
            'respuestas.*.option_id' => 'required|exists:options,id',
        ]);

        $total = 0;

        foreach ($data['respuestas'] as $respuesta) {
            $score = Option::find($respuesta['option_id'])->score ?? 0;
            $total += $score;
        }

        $promedio = $total / count($data['respuestas']);
        $nivel = match (true) {
            $promedio < 1 => 1,
            $promedio < 2 => 2,
            $promedio < 3 => 3,
            $promedio < 4 => 4,
            default => 5,
        };

        $evaluation = Evaluation::create([
            'user_id' => $user->id,
            'framework' => $data['framework'],
            'domain' => $data['domain'],
            'score_total' => $total,
            'nivel' => $nivel,
        ]);

        foreach ($data['respuestas'] as $respuesta) {
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
        return Inertia::location(route('dashboard'));
    }
}
