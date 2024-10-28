<?php

namespace App\Controllers;

use App\Models\MembresiaModel;


class Creditos extends BaseController{

    public function create(){
        
        $post = $this->request->getPost(['correo','actividad', 'cantidad', 'pago']);
        
        $membresiaModel = new MembresiaModel();
     
        $fecha = date('Y-m-d');
    
        $membresiaModel->insert([
                'correo' => $post['correo'],
                'actividad' => $post['actividad'],
                'cantidad' => $post['cantidad'],
                'pago' => $post['pago'],
                'estado' => 'En espera',    
                'fecha_creada' => $fecha,
            ]);
           
            return redirect()->to('inguz/index')->with('mensaje', 'Registro de cr&eacutedito exitoso.');
   }


}