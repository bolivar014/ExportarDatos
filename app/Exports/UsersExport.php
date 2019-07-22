<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection; // Esta función nos permite extraer la data necesaria desde la db
use Maatwebsite\Excel\Concerns\WithHeadings;   // Asigna las cabeceras o headers que necesitamos en el archivo
use App\User;
use DB;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        // Retorna los headers del archivo
        return [
            'Id',
            'Nombre',
            'Email',
            'Contraseña'
        ];
    }
    
    public function collection()
    {
        // Exporta Cada Registro Encontrado en la DB.
         $users = DB::table('Users')->select('id','name','email','password')->get();
         return $users;
        
    }
}