<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request){

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        try {
            if($user->save()){
                return response()->json([
                    "success"    =>  true,
                    "message"   =>  "Inserido com sucesso",
                    "user"      =>  $user
                ], 201);
            }
        } catch (QueryException $e){

            return response()->json([
                "success"   =>  false,
                "message"   =>  $e->getMessage()
            ]);
        }

    }
}
