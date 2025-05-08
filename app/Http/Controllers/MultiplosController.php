<?php

namespace App\Http\Controllers;

class MultiplosController extends Controller
{
    public function somar($limite)
    {
        if (!is_numeric($limite) || $limite <= 0) {
            return response()->json(['erro' => 'Informe um número inteiro positivo.'], 400);
        }

        $soma = 0;

        for ($i = 1; $i < $limite; $i++) {
            if ($i % 3 === 0 || $i % 5 === 0) {
                $soma += $i;
            }
        }

        return response()->json([
            'limite' => (int) $limite,
            'soma' => $soma
        ]);
    }
}
