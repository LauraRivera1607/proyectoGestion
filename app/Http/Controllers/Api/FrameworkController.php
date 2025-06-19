<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Framework;

class FrameworkController extends Controller
{
    public function index()
    {
        return Framework::with('processes')->get();
    }
}