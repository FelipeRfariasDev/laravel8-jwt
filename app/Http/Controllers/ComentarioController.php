<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //adicionar um comentário
    public function store(Request $request){

        $comentario = new Comentario();
        $comentario->descricao = $request->input('descricao');
        $comentario->post_id = $request->input('post_id');

        try {
            if($comentario->save()){
                return response()->json([
                    "success"   =>  true,
                    "message"   =>  "Inserido com sucesso",
                    "comentario"      =>  $comentario
                ], 201);
            }
        } catch (QueryException $e){
            return response()->json([
                "success"    =>  false,
                "message"   =>  $e->getMessage()
            ]);
        }
    }

    //listar comentários de um post_id
    public function show($post_id){

        $comentario = Comentario::where(["post_id"=>$post_id])->get();

        if(!$comentario) {
            return response()->json([
                "success"    =>  false,
                "message"   => "post_id $post_id não foi encontrado",
            ], 404);
        }
        return response()->json([
            "success"    =>  true,
            "comentario" => $comentario,
        ]);
    }

    //excluir um comentário
    public function destroy($id){

        $comentario = Comentario::find($id);
        if(!$comentario) {
            return response()->json([
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }
        if($comentario->delete()){
            return response()->json([
                "success"    =>  true,
                "message" => "Comentario $id removido com sucesso"
            ]);
        }
    }
}
