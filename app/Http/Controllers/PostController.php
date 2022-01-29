<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        //$posts = Post::paginate(15);
        $posts = Post::all();
        return response()->json([
            "posts"      =>  $posts
        ]);
    }

    public function store(Request $request){

        $post = new Post();
        $post->titulo       = $request->input('titulo');
        $post->descricao    = $request->input('descricao');

        $imagem = $request->file('imagem');
        if($imagem){
            $app_url = env('APP_URL');
            $diretorio_imagens = "uploadsImgs";
            $post->imagem       = $app_url.$diretorio_imagens."/".$imagem->getClientOriginalName();
            $imagem_temporario = $imagem->getPath()."\\".$imagem->getFilename();
            $uploaddir = "..\\public\\".$diretorio_imagens."\\";
            $uploadfile = $uploaddir . basename($imagem->getClientOriginalName());
            move_uploaded_file($imagem_temporario, $uploadfile);
        }

        try {
            if($post->save()){
                return response()->json([
                    "success"   =>  true,
                    "message"   =>  "Inserido com sucesso",
                    "post"      =>  $post
                ], 201);
            }
        } catch (QueryException $e){
            return response()->json([
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
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }

        $post->titulo = $request->input('titulo');
        $post->descricao = $request->input('descricao');

        try {
            if($post->save()){
                return response()->json([
                    "success"    =>  true,
                    "message"   =>  "Atualizado com sucesso",
                    "post"      =>  $post
                ]);
            }
        } catch (QueryException $e){
            return response()->json([
                "success"    =>  false,
                "message"   =>  $e->getMessage()
            ]);
        }
    }

    public function show($id){

        $posts = Post::find($id);
        if(!$posts) {
            return response()->json([
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }
        return response()->json([
            "success"  =>  true,
            "post"     => $posts,
        ]);
    }

    public function destroy($id){

        $posts = Post::find($id);
        if(!$posts) {
            return response()->json([
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }
        if($posts->delete()){
            return response()->json([
                "success"    =>  true,
                "message" => "Post $id removido com sucesso"
            ]);
        }
    }
}
