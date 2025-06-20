<?php
namespace App\Http\Controllers;

use App\Models\Evaluation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PdfReportController extends Controller
{
    public function cmmi($id)
    {
        $user = Auth::user();

        $evaluacion = Evaluation::where('id', $id)
            ->where('user_id', $user->id)
            ->where('framework', 'CMMI')
            ->firstOrFail();

        return Pdf::loadView('pdf.cmmi', [
            'user' => $user,
            'evaluacion' => $evaluacion,
            'fecha' => now()->format('d/m/Y'),
        ])->download('reporte-cmmi.pdf');
    }

   public function cobit($id)
    {
        $user = Auth::user();

        $baseEval = Evaluation::where('id', $id)
            ->where('user_id', $user->id)
            ->where('framework', 'COBIT')
            ->firstOrFail();

        $fechaRef = $baseEval->created_at->toDateString();

        $evaluaciones = Evaluation::where('user_id', $user->id)
            ->where('framework', 'COBIT')
            ->whereDate('created_at', $fechaRef)
            ->get()
            ->sortByDesc('created_at')
            ->groupBy('domain')
            ->map(fn($items) => $items->first())
            ->filter(fn($e) => in_array(strtoupper($e->domain), ['EDM', 'APO', 'BAI', 'DSS', 'MEA']))
            ->sortBy(fn($e) => array_search(strtoupper($e->domain), ['EDM', 'APO', 'BAI', 'DSS', 'MEA']))
            ->values();

        return Pdf::loadView('pdf.cobit', [
            'user' => $user,
            'evaluaciones' => $evaluaciones,
            'fecha' => now()->format('d/m/Y'),
        ])->download('reporte-cobit.pdf');
    }
}
