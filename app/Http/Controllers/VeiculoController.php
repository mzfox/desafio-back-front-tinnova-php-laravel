<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Veiculo::query();
    
        if ($request->filled('marca')) {
            $query->where('marca', $request->marca);
        }
    
        if ($request->filled('ano')) {
            $query->where('ano', $request->ano);
        }
    
        if ($request->filled('cor')) {
            $query->where('descricao', 'LIKE', '%' . $request->cor . '%');
        }
    
        return response()->json($query->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'veiculo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'ano' => 'required|integer',
            'descricao' => 'nullable|string',
            'vendido' => 'boolean'
        ]);
    
        $veiculo = Veiculo::create($dados);
    
        return response()->json($veiculo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $veiculo = Veiculo::find($id);
    
        if (!$veiculo) {
            return response()->json(['erro' => 'Veículo não encontrado'], 404);
        }
    
        return response()->json($veiculo);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veiculo $veiculo)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::find($id);
    
        if (!$veiculo) {
            return response()->json(['erro' => 'Veículo não encontrado'], 404);
        }
    
        $dados = $request->validate([
            'veiculo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'ano' => 'required|integer',
            'descricao' => 'nullable|string',
            'vendido' => 'boolean'
        ]);
    
        $veiculo->update($dados);
    
        return response()->json($veiculo);
    }


    public function updateParcial(Request $request, $id)
    {
        $veiculo = Veiculo::find($id);

        if (!$veiculo) {
            return response()->json(['erro' => 'Veículo não encontrado'], 404);
        }

        $dados = $request->only([
            'veiculo',
            'marca',
            'ano',
            'descricao',
            'vendido'
        ]);

        $veiculo->update($dados);

        return response()->json($veiculo);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
     {
         $veiculo = Veiculo::find($id);
     
         if (!$veiculo) {
             return response()->json(['erro' => 'Veículo não encontrado'], 404);
         }
     
         $veiculo->delete();
     
         return response()->json(null, 204);
     }
}
