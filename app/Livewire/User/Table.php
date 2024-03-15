<?php

namespace App\Livewire\User;

use App\Models\Funcionarios;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;


class Table extends Component
{   

    use WithPagination;

    #[Validate('required', message: 'Digite seu nome.')] 
    #[Validate('max:100', message: 'Nome muito grande')]
    #[Validate('min:2', message: 'Nome muito curto')]
      public $name = '';

    #[Validate('required', message: 'Preencha o campo')]
    #[Validate('email', message: 'Digite um email')]
    #[Validate('min:5', message: 'Email muito curto')]
    #[Validate('max:100', message: 'Email muito grande')]
    #[Validate('unique:funcionarios', message: 'Email ja em uso')]

    public $email = '';

    #[Validate('required', message: 'Selecione a data')]
    public $date = '';
    

    #[Validate('required', message: 'Digite seu CPF')]
    public $cpf = '';

    #[Validate('required', message: 'Digite seu endereço')]
    public $endereco = '';
    public $search = '';
  

    public $isOpen = false;

    public function abrirView()
    {
        $this->isOpen = true;
    }

    public function fecharView()
    {
        $this->isOpen = false;
    }

    public function edit($id) {
        $funcionario = Funcionarios::find($id);
        $this->name = $funcionario->name;
        $this->email = $funcionario->email;
        $this->date = $funcionario->date;
        $this->cpf = $funcionario->cpf;
        $this->endereco = $funcionario->endereco;
    }


    public function save(){
        $validated = $this->validate();

        Funcionarios::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'date' => $validated['date'],
            'cpf' => $validated['cpf'],
            'endereco' => $validated['endereco'],

        ]);
    }

    public function delete($id) {
        Funcionarios::findOrFail($id)->delete();
        session()->flash('message', 'User Excluído com sucesso!');
    }



 
    // public function save()
    // {
    //     $validateDate = $this->validate([
    //         'name' => 'required|min:3',
    //         'email' => 'required|email|min:3',
    //         'date' => 'required|date',
    //     ], [
    //         'name.required' => 'O campo nome é obrigatório.',
    //         'name.min' => 'O nome deve ter pelo menos 3 caracteres.',
    //         'email.required' => 'O campo de e-mail é obrigatório.',
    //         'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
    //         'email.min' => 'O e-mail deve ter pelo menos 3 caracteres.',
    //         'date.required' => 'O campo de data é obrigatório.',
    //         'date.date' => 'Você deve selecionar uma data válida.',
    //     ]);

    //     Funcionarios::create($validateDate);
    // }

   

    
    
 
    public function gerarPdf($id)
    {
        $funcionarios = Funcionarios::where('id', $id)->get();
    
        $pdf = Pdf::loadView('gerar-pdf', ['funcionarios' => $funcionarios])->setPaper('a4', 'landscape');
    
        return $pdf->download('funcionario_' . $id . '.pdf');
    }

   
   

    public function render()
    {
        $funcionarios = Funcionarios::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')->paginate(10);
        
    return view('livewire.user.table', ['funcionarios' => $funcionarios]);
   
    }
}
