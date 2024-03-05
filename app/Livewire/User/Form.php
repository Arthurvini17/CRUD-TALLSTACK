<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Form extends Component
{


    public $isOpen = false;

  

    public function render()
    {
        return view('livewire.user.form');
    }
}
