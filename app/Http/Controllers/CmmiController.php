<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Framework;
use App\Models\Answer;


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
        try {
            $user = $request->user();

            $data = $request->validate([
                'respuestas' => 'required|array',
                'respuestas.*.question_id' => 'required|exists:questions,id',
                'respuestas.*.option_id' => 'required|exists:options,id',
            ]);

            foreach ($data['respuestas'] as $respuesta) {
                Answer::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'question_id' => $respuesta['question_id'],
                    ],
                    [
                        'option_id' => $respuesta['option_id'],
                    ]
                );
            }

            return redirect()->route('cmmi.index')->with('success', 'Respuestas guardadas correctamente.');
        } catch (\Throwable $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
