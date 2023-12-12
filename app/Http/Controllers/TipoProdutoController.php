<?php

namespace App\Http\Controllers;

use App\Models\TipoProduto;
use Illuminate\Http\Request;

class TipoProdutoController extends Controller
{
    public function index()
    {
        $tiposProduto = TipoProduto::all();
        return response()->json($tiposProduto);
    }

    public function show($id)
    {
        $tiposProduto = TipoProduto::find($id);

        if (!$tiposProduto) {
            return response()->json(['message' => 'Tipo de Produto não encontrado'], 404);
        }

        return response()->json($tiposProduto);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
        ]);

        $tiposProduto = TipoProduto::create($request->all());

        return response()->json($tiposProduto, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
        ]);

        $tiposProduto = TipoProduto::find($id);

        if (!$tiposProduto) {
            return response()->json(['message' => 'Tipo de Produto não encontrado'], 404);
        }

        $tiposProduto->update($request->all());

        return response()->json($tiposProduto);
    }

    public function destroy($id)
    {
        $tiposProduto = TipoProduto::find($id);

        if (!$tiposProduto) {
            return response()->json(['message' => 'Tipo de Produto não encontrado'], 404);
        }

        $tiposProduto->delete();

        return response()->json(['message' => 'Tipo de Produto removido com sucesso']);
    }
}
