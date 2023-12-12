<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('tipoProduto')->get();
        return response()->json($produtos);
    }

    public function show($id)
    {
        $produto = Produto::with('tipoProduto')->find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return response()->json($produto);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'qtdEstoque' => 'required|integer',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'tipo_produto_id' => 'required|exists:tipo_produto,id',
        ]);

        $produto = Produto::create($request->all());

        return response()->json($produto, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'string',
            'qtdEstoque' => 'integer',
            'descricao' => 'string',
            'preco' => 'numeric',
            'tipo_produto_id' => 'exists:tipo_produto,id',
        ]);

        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $produto->update($request->all());

        return response()->json($produto);
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $produto->delete();

        return response()->json(['message' => 'Produto removido com sucesso']);
    }
}

