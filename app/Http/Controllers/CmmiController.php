<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;


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
}   