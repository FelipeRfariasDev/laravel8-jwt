<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $posts = Posts::paginate(15);
        return response()->json([
            "posts"      =>  $posts
        ]);
    }

    public function store(Request $request){
        $post = new Posts();
        $post->titulo = $request->input('titulo');
        $post->descricao = $request->input('descricao');

        try {
            if($post->save()){
                return response()->json([
                    "error"    =>  false,
                    "success"    =>  true,
                    "message"   =>  "Inserido com sucesso",
                    "post"      =>  $post
                ], 201);
            }
        } catch (QueryException $e){
            return response()->json([
                "error"    =>  true,
                "success"    =>  false,
                "message"   =>  $e->getMessage()
            ]);
        }
    }

    public function update(Request $request){

        $id = $request->input('id');

        $post = Posts::find($id);

        if(!$post) {
            return response()->json([
                "error"    =>  true,
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }

        $post->titulo = $request->input('titulo');
        $post->descricao = $request->input('descricao');

        try {
            if($post->save()){
                return response()->json([
                    "error"    =>  false,
                    "success"    =>  true,
                    "message"   =>  "Atualizado com sucesso",
                    "post"      =>  $post
                ]);
            }
        } catch (QueryException $e){
            return response()->json([
                "error"    =>  true,
                "success"    =>  false,
                "message"   =>  $e->getMessage()
            ]);
        }
    }

    public function show($id){

        $posts = Posts::find($id);
        if(!$posts) {
            return response()->json([
                "error"    =>  true,
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }
    }

    public function destroy($id){

        $posts = Posts::find($id);
        if(!$posts) {
            return response()->json([
                "error"    =>  true,
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }
        if($posts->delete()){
            return response()->json([
                "error"    =>  false,
                "success"    =>  true,
                "message" => "Post $id removido com sucesso"
            ]);
        }
    }
}
