<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{

    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }
    public function render()
    {
        return view('livewire.user.logout');
    }
}
