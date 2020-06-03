<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PerfisController extends Controller
{
    public function show(){
        $user = auth()->user();

        return view('perfil/index')->with('user', $user);
    }
    public function users(){
        $users = User::all();
        return view('perfil/config')->with('users', $users);
    }
}
