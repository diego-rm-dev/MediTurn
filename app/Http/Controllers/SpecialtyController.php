<?php

namespace App\Http\Controllers;

use App\Http\Services\SpecialtyService;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    private SpecialtyService $specialtyService;

    public function __construct(SpecialtyService $specialtyService)
    {
        $this->specialtyService = $specialtyService;
    }

    public function index()
    {
        return view('specialties.index');
    }
}
