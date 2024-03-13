<?php

namespace App\Http\Controllers;

use App\Models\Funcionarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
  
     public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $remember = $request->filled('remember'); 
    
        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
    
            return redirect('/');
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'As credenciais fornecidas não correspondem aos nossos registros.']);
        }
    }
}
