<?php

namespace App\Http\Controllers;

use App\Http\Services\TurnService;

class TurnController extends Controller
{
    private TurnService $turnService;

    public function __construct(TurnService $turnService)
    {
        $this->turnService = $turnService;
    }

    public function index()
    {
        return view('turns.index');
    }
}
