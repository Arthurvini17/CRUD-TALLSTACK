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

    #[Validate('required|date')]
    public $date = '';
    
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

    public function edit($funcionarioId) {
        $funcionario = Funcionarios::find($funcionarioId);
        $this->name = $funcionario->name;
        $this->email = $funcionario->email;
        $this->date = $funcionario->date;
    }


    public function save(){
        $validated = $this->validate();

        Funcionarios::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'date' => $validated['date'],
        ]);
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

   

    public function delete($id) {
        $funcionario = Funcionarios::find($id)->delete();
        session()->flash('message', 'User Excluído com sucesso!');
    }
    
 
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
