<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(Request $request){

        $user = new Users();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        try {
            if($user->save()){
                return response()->json([
                    "status"    =>  true,
                    "message"   =>  "Inserido com sucesso",
                    "user"      =>  $user
                ], 201);
            }
        } catch (QueryException $e){
            return response()->json($e->getMessage());
        }

    }
}
