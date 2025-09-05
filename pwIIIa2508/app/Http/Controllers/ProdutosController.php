<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Produtos::all();

        $contador = $registros->count();

        if ($contador >0){
            return response ()->json([
                'sucess'=> true,
                'message'=> 'produtos encontrados com sucesso!',
                'data'=> $registros,
                'total'=> $contador], 200);
            } else{
                return response()->json([
                    'sucess'=> false,
                    'message'=> 'nenhum produto encontrada.',
                ], 404);
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'nome'=> 'required',
            'loja'=> 'required',
            'preco'=> 'required',
            'quantidade'=> 'required',
         ]);

         if ($validator->fails()) {
            return response()->json([
                'sucess'=> false,
                'message'=> 'registros inválidos',
                'errors'=> $validator->errors()
            ], 400);
         }

         $registros = Produtos::create($request->all());

         if ($registros) {
            return response()->json([
                'sucess'=> true,
                'message'=> 'produtos cadastrados com sucesso!',
                'data'=> $registros
            ], 500);

         }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $registros = Produtos::find($id);

        if ($registros) {
            return response()->json([
                'sucess'=> true,
                'message'=> 'produto localizada com sucesso!',
                'data'=> $registros
            ], 200);

        } else {
            return response()->json([
                'sucess'=> false,
                'message' => 'produto não localizado.',

            ], 404);
        }
    }
public function updateParcial(Request $request, $id)
{
    $produto = Produtos::findOrFail($id);
    $produto->update($request->all()); // só atualiza os campos enviados
    return response()->json($produto, 200);
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nome'=> 'required',
            'loja'=> 'required',
            'preco'=> 'required',
            'quantidade'=> 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'sucess'=> false,
                'message'=> 'registros inválidos',
                'erros'=> $validator->errors()
            ], 400);
        }
    
    
    $registrosBanco = Produtos::find($id);

    if (!$registrosBanco) {
        return response()->json ([
            'sucess'=> false,
            'message'=> 'Produto não encontrado'
        ],404);
    }
    

    $registrosBanco->nome = $request->nome;
    $registrosBanco->loja = $request->loja;
    $registrosBanco->preco = $request->preco;
     $registrosBanco->quantidade = $request->quantidade;

    if ($registrosBanco->save()) {
        return response()->json([
            'sucess'=> true,
            'message'=>'produto atualizado com sucesso!',
            'data'=> $registrosBanco
        ], 200);
    } else{
        return response()->json([
            'sucess'=> false,
            'message'=> 'erro ao atualizar o produto'
        ], 500);
    }

}
    
 
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
        $registros = Produtos::find($id);

        if (!$registros) {
            return response()->json([
                'sucess'=> false,
                'message'=> 'PRoduto não encontrado'
            ], 404);
        }
    

    if ($registros->delete()) {
        return response()->json([
            'sucess'=> true,
            'message'=> 'produto deletado com sucesso'
        ], 200);
    }

    return response()->json([
        'sucess'=> false,
        'message'=> 'erro ao deletar um produto'
    ], 500);
}
}

