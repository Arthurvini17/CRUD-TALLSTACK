<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('edit', ['user' => $user]);
    }

    public function update(Request $request, $id){

        $user = User::find($id);
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $user->email = $request->email;
        }
        $user->name = $request->name;
        $user->date = $request->date;

        $user->save();
        return redirect()->route('welcome');

    }
}
