<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $posts = Posts::paginate(15);
        return $posts;
    }

    public function store(Request $request){
        $posts = new Posts();
        $posts->titulo = $request->input('titulo');
        $posts->descricao = $request->input('descricao');
        $posts->save();
        return $posts;
    }

    public function update(Request $request){
        $posts = Posts::find($request->input('id'));
        $posts->titulo = $request->input('titulo');
        $posts->descricao = $request->input('descricao');
        $posts->save();
        return $posts;
    }

    public function show($id){
        return Posts::find($id);
    }

    public function destroy($id){
        $posts = Posts::find($id);
        return $posts->delete();
    }
}
