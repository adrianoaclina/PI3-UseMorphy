<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\EditUserRequest;
class UsersController extends Controller
{
    public function changeAdmin($id){
        $user = User::find($id);
        if($user->isAdmin())
            $user->role = 'user';
        else
            $user->role = 'admin';
        $user->save();
        session()->flash('success', 'Usuário alterado com sucesso!');
        return redirect()->back();
    }
    public function update(EditUserRequest $request, $id){
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
        ]);
        if($user->email != $request->email){
            $user->email = $request->email();
            $user->email_verified_at = null;
        }
        if($request->password)
            $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('success', 'Usuário alterado com sucesso!');
        return redirect()->back();
    }
}
