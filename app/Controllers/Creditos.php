<?php

namespace App\Controllers;

use App\Models\MembresiaModel;


class Creditos extends BaseController{

    public function create(){
        
        $post = $this->request->getPost(['email','nombre', 'apellido', 'edad', 'telefono','formacion','contra','contra2','tipo_usuario']);
        
        $membresiaModel = new MembresiaModel();

    
        $membresiaModel->insert([
                'correo' => $post['email'],
               
                
            ]);
           
            return redirect()->to('formularios/ingresoinstructor')->with('mensaje', 'Registro de cr&edito exitoso.');
   }


}