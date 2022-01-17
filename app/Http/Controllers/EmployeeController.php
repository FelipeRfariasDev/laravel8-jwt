<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request){

        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->password = bcrypt($request->input('password'));
        $employee->job_title = bcrypt($request->input('Gerente administrativo'));

        try {
            if($employee->save()){
                return response()->json([
                    "status"    =>  true,
                    "message"   =>  "Inserido com sucesso",
                    "user"      =>  $employee
                ], 201);
            }
        } catch (QueryException $e){
            return response()->json($e->getMessage());
        }

    }
}
