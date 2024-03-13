<?php

namespace App\Http\Controllers;

use App\Models\Funcionarios;
use App\Models\User;
use App\Rules\MaiorDeIdade;
use Barryvdh\DomPDF\PDF;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

   public $search = '';
    public function  index()
    {
        return view('register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:funcionarios',
            'date' => ['required', 'date', new MaiorDeIdade],
            'password' => 'required|min:5',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O email deve ser válido.',
            'email.unique' => 'Este email já está sendo usado por outro usuário.',
            'date.required' => 'O campo data de nascimento é obrigatório.',
            'date.date' => 'A data de nascimento deve ser uma data válida.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/');
    }


    public function gerarPdf()
    {
        $funcionarios = Funcionarios::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->get();


        $funcionarios = Funcionarios::orderByDesc('created_at')->get();
       $pdf =  \Barryvdh\DomPDF\Facade\Pdf::loadView('gerar-pdf', ['funcionarios' => $funcionarios])->setPaper('a4', 'landscape');

       return $pdf->download('listar_funcionarios.pdf');
        // return view('gerar-pdf');
    }
}
