<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // Listar Usuarios
    public function index()
    {
        $users = User::all();

        return view('/home')->with(compact('users'));
    }

}
