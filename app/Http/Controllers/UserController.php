<?php

namespace App\Http\Controllers;

use App\Models\Funcionarios;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(Funcionarios $funcionario, $id)
    {
        $funcionario = Funcionarios::find($id);
        return view('edit', ['funcionario' => $funcionario]);
    }

    public function update(Request $request, $id){

        $funcionario = Funcionarios::find($id);
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $funcionario->email = $request->email;
        }
        $funcionario->name = $request->name;
        $funcionario->date = $request->date;

        $funcionario->save();
        return redirect()->route('welcome');

    }
}
