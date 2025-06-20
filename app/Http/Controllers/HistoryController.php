<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Evaluation;
use Illuminate\Support\Collection;

class HistoryController extends Controller
{
    /**
     * Display a listing of the history.
     *
     * @return Response
     */
    public function index(): Response
    {
        $userId = auth()->id();

        $lastCMMI = Evaluation::where('user_id', $userId)
            ->where('framework', 'CMMI')
            ->orderByDesc('created_at')
            ->first();

        $evaluations = Evaluation::where('user_id', $userId)
            ->where('framework', 'COBIT')
            ->orderByDesc('created_at')
            ->get();


        $lastCobitEvaluations = $evaluations
            ->groupBy('domain')
            ->map(fn(Collection $group) => $group->sortByDesc('created_at')->first())
            ->values();

        return Inertia::render('history/Index', [
            'lastCMMI' => $lastCMMI,
            'lastCobitEvaluations' => $lastCobitEvaluations,
        ]);
    }
}
