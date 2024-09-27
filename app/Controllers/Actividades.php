<?php

namespace App\Controllers;
use App\Models\ReformerModel;
class Actividades extends BaseController
{
   
    #ACTIVIDADES
    public function reformer(){
        $reformerModel = new ReformerModel();

        $data = $reformerModel->mostrarTodo(['Tipo' => 'reformer']);
        return view('actividades/reformer' , $data);
    }

    public function hiit(){
        return view('actividades/hiit');
    }

    public function terapeutico(){
        return view('actividades/terapeutico');
    }
}
