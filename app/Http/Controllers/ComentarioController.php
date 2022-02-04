<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index(){

        $comentatios = Comentario::all();
        return response()->json([
            "comentatios"      =>  $comentatios
        ]);
    }

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
}
