<?php

namespace App\Http\Controllers;

class FatorialController extends Controller
{
    public function calcular($numero)
    {
        if (!is_numeric($numero) || $numero < 0) {
            return response()->json(['erro' => 'Número inválido. Informe um inteiro positivo.'], 400);
        }

        $resultado = 1;
        for ($i = $numero; $i > 1; $i--) {
            $resultado *= $i;
        }

        return response()->json([
            'numero' => (int) $numero,
            'fatorial' => $resultado
        ]);
    }
}
