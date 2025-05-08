<?php

namespace App\Http\Controllers;

class OrdenacaoController extends Controller
{
    public function index()
    {
        $numeros = [5, 3, 2, 4, 7, 1, 0, 6];

        $n = count($numeros);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($numeros[$j] > $numeros[$j + 1]) {
                    $temp = $numeros[$j];
                    $numeros[$j] = $numeros[$j + 1];
                    $numeros[$j + 1] = $temp;
                }
            }
        }

        return response()->json([
            'ordenado' => $numeros
        ]);
    }
}
