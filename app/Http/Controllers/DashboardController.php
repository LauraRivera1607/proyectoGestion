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
            1 => "Los procesos son impredecibles y reactivos. Se recomienda identificar los procesos críticos, comenzar a documentarlos, definir roles y responsabilidades, y establecer liderazgo básico para fomentar la disciplina operativa.",
            2 => "Gestionado. Se gestionan proyectos, pero con variabilidad. Es clave formalizar el seguimiento de cronogramas, presupuestos y riesgos. También se recomienda implementar métricas básicas y capacitar al personal en gestión de proyectos.",
            3 => "Definido. Los procesos están estandarizados a nivel organizacional. Debes integrar estos procesos en toda la empresa, implementar modelos de mejora continua (como PDCA), crear una oficina de procesos (PMO), y garantizar la adaptación a distintos proyectos.",
            4 => "Gestionado Cuantitativamente. Se utilizan métricas avanzadas para predecir el rendimiento. Se recomienda establecer líneas base, utilizar herramientas estadísticas, comparar unidades para identificar mejores prácticas y automatizar el seguimiento con dashboards.",
            5 => "Optimizado. La mejora continua está institucionalizada. Es momento de innovar mediante análisis de causa raíz, automatización con tecnología avanzada (IA, RPA), benchmarking con líderes del sector, y establecer ciclos constantes de mejora y auditoría.",
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
