<?php

namespace App\Controllers;
use App\Models\ActividadesModel;
use App\Models\PilatesModel;
class Actividades extends BaseController
{
   
    #ACTIVIDADES
    public function reformer(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Reformer']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Reformer'])
        ];
        
        return view('actividades/reformer', $data); 
    }    

    public function hiit(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Hiit']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Hiit'])
        ];
        
        return view('actividades/hiit',$data);
    }

    public function terapeutico(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Terapeutico']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Terapeutico'])
        ];
        return view('actividades/terapeutico', $data);
    }
}
