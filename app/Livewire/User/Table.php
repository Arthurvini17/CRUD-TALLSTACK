<?php

namespace App\Livewire\User;

use App\Models\Funcionarios;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Table extends Component
{

    public $userId;

    public $search = '';
    public $name;

    public $email;
   

    public $date;

    public $isOpen = false;

    public function abrirView()
    {
        $this->isOpen = true;
    }

    public function fecharView()
    {
        $this->isOpen = false;
    }


    

    public function edit($funcionarioId) {
        $funcionario = Funcionarios::find($funcionarioId);
        $this->name = $funcionario->name;
        $this->email = $funcionario->email;
        $this->date = $funcionario->date;
    }
 
    public function save()
    {
        $validateDate = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'date' => 'required|date',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email.min' => 'O e-mail deve ter pelo menos 3 caracteres.',
            'date.required' => 'O campo de data é obrigatório.',
            'date.date' => 'Você deve selecionar uma data válida.',
        ]);

        Funcionarios::create($validateDate);
    }

    public function delete($id) {
        $funcionario = Funcionarios::find($id)->delete();
        session()->flash('message', 'User Excluído com sucesso!');
    }
    
 


    public function render()
    {
        $funcionarios = Funcionarios::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->get();
        return view('livewire.user.table', ['funcionarios' => $funcionarios ]);
    }
}
