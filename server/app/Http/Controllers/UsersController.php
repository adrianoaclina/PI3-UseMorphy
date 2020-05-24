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
        return response()->json([
            'mensagem' => 'Usuário atualizado!'
        ], 200);
    }
    public function update(EditUserRequest $request, $id){
        $user = User::find($id);
        $user->update([
            'nome' => $request->nome,
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
        return response()->json([
            'mensagem' => 'Usuário editado com sucesso!'
        ], 200);
    }
}
