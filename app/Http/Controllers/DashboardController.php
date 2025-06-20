<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Evaluation;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $evaluacionCMMI = Evaluation::where('user_id', $user->id)
            ->where('framework', 'CMMI')
            ->latest()
            ->first();

        $recomendaciones = [
            1 => 'Nivel 1: Inicial',
            2 => 'Nivel 2: Gestionado',
            3 => 'Nivel 3: Definido.',
            4 => 'Nivel 4: Gestionado cuantitativamente.',
            5 => 'Nivel 5: Optimizado.',
        ];

        $evaluacionesCobit = Evaluation::where('user_id', $user->id)
            ->where('framework', 'COBIT')
            ->orderByDesc('created_at')
            ->get()
            ->groupBy('domain')
            ->map(fn(Collection $group) => [
                'domain' => $group->first()->domain,
                'percentage' => $group->first()->nivel, 
            ])
            ->values();

        return Inertia::render('dashboard', [
            'cmmi' => $evaluacionCMMI
                ? [
                    'nivel' => $evaluacionCMMI->nivel,
                    'score_total' => $evaluacionCMMI->score_total,
                    'created_at' => $evaluacionCMMI->created_at->toDateString(),
                    'recomendacion' => $recomendaciones[$evaluacionCMMI->nivel] ?? 'Sin descripción',
                ]
                : null,
            'cobit' => $evaluacionesCobit,
        ]);
    }
}
