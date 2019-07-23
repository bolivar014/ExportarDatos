<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    public function excelUser()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    // Generar PDF
    public function pdfUser()
    {
//        $nombre = 'Camilo';
        $users = User::all();
        // dd($users);
        $pdf = \PDF::loadView('pdf.pdf', compact('users'));

        return $pdf->download('archivoPDF.pdf');    

        // return view('pdf.pdf')->with(compact('users'));
    }

}
