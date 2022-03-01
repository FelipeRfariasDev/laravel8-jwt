<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){

        $buscar = $request->get('buscar');

        $where = [
            ['titulo', 'like',"%{$buscar}%"]
        ];

        $orWhere = [
            ['descricao', 'like',"%{$buscar}%"]
        ];

        $posts = Post::with(['Comentarios'])->where($where)->orWhere($orWhere)->orderBy('id','desc')->paginate(3);
        
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
            $imagem_nome_original = $imagem->getClientOriginalName();
            $app_url = env('APP_URL');
            $diretorio_imagens = "uploadsImgs";

            $destino_arquivo = $diretorio_imagens."/". $imagem_nome_original;
            if(move_uploaded_file($imagem->getPathname(), $destino_arquivo)){
                $post->imagem       = $app_url.$diretorio_imagens."/".$imagem_nome_original;
            }
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

        $posts = Post::with(['Comentarios'])->find($id);

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
