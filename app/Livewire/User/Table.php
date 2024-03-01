<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
   
   
    public $isOpen = false;

    public function abrirView(){
        $this->isOpen = true;
    }

    public function fecharView(){
        $this->isOpen = false;
    }

    public $name;

    public $email;

    public $date;


  
    public function save()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'date' => $this->date,
        ]);
    }

    public function render()
    {
        return view('livewire.user.table');
    }
}
