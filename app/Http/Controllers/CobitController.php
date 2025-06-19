<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;


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
}   