<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// Exportamos estas librerias para su uso
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    // Listar Usuarios
    public function index()
    {
        $users = User::all();

        return view('/home')->with(compact('users'));
    }

    
    // Generar archivos Excel
    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
