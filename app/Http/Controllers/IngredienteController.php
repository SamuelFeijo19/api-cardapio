<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    public function index()
    {
        $ingredientes = Ingrediente::all();
        return response()->json(['ingredientes' => $ingredientes], 200);
    }

    public function show($id)
    {
        $ingrediente = Ingrediente::find($id);
        if ($ingrediente) {
            return response()->json(['ingrediente' => $ingrediente], 200);
        } else {
            return response()->json(['message' => 'Ingrediente não encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $ingrediente = Ingrediente::create($request->all());

        return response()->json(['ingrediente' => $ingrediente], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $ingrediente = Ingrediente::find($id);

        if ($ingrediente) {
            $ingrediente->update($request->all());
            return response()->json(['ingrediente' => $ingrediente], 200);
        } else {
            return response()->json(['message' => 'Ingrediente não encontrado'], 404);
        }
    }

    public function destroy($id)
    {
        $ingrediente = Ingrediente::find($id);

        if ($ingrediente) {
            $ingrediente->delete();
            return response()->json(['message' => 'Ingrediente removido com sucesso'], 200);
        } else {
            return response()->json(['message' => 'Ingrediente não encontrado'], 404);
        }
    }
}
