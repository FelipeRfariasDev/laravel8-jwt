<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(15);
        return response()->json([
            "posts"      =>  $posts
        ]);
    }

    public function store(Request $request){
        $post = new Post();
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

        $post = Post::find($id);

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

        $posts = Post::find($id);
        if(!$posts) {
            return response()->json([
                "error"    =>  true,
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }
        return response()->json([
            "error"    =>  false,
            "success"  =>  true,
            "post"     => $posts,
        ]);
    }

    public function destroy($id){

        $posts = Post::find($id);
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
