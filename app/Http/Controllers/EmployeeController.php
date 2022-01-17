<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request){
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->password = bcrypt($request->input('password'));
        $employee->job_title = $request->input('Gerente administrativo');
        $employee->save();
        return $employee;
    }
}
