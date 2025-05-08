<?php

namespace App\Http\Controllers;

class VotacaoController extends Controller
{
    public function index()
    {
        $total = 1000;
        $validos = 800;
        $brancos = 150;
        $nulos = 50;

        $percentValidos = ($validos / $total) * 100;
        $percentBrancos = ($brancos / $total) * 100;
        $percentNulos = ($nulos / $total) * 100;

        return response()->json([
            'percentual_validos' => number_format($percentValidos, 2) . '%',
            'percentual_brancos' => number_format($percentBrancos, 2) . '%',
            'percentual_nulos' => number_format($percentNulos, 2) . '%',
        ]);
    }
}
