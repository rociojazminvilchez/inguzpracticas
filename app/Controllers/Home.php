<?php

namespace App\Controllers;
use App\Models\IngresoModel;
class Home extends BaseController
{
    public function index(){
        return view('inguz/index');
    }

    #USUARIO
    public function ingreso(){
        return view('formularios/ingreso');
    }

    public function login(){
        $usuario = $this->request->getPost('usuario');    
        $contra = $this->request->getPost('contra');
       
        $ingresoModel = new IngresoModel();

        $data = $ingresoModel->obtenerUsuario(['correo' => $usuario,'contraseña' => $contra]);
    
        if(count($data) > 0){
           // MANEJO DE SESION
           $data = [
                'usuario' => $usuario,
                'tipo' => 'usuario',
           ];
            $session = session();
            $session -> set($data);
            
            return redirect()->to('inguz/index');
        }else{
            ?>
            <div class="alert alert-warning" role="alert" >
                <strong>Atención:</strong> Datos incorrectos. Ingrese nuevamente
            </div>
            <?php
           return view('formularios/ingreso'); 
        }
    }

    public function registro(){
        return view('formularios/registro');
    }


   #USUARIO - INTRUCTOR 
    public function salir() {
		$session = session();
        $session->destroy();
        return redirect()->to(base_url('inguz/index'));
	}    

    public function recuperarcontra(){
        return view('formularios/recuperar_contra');
    }

    #INSTRUCTOR
    public function instructor(){
        return view('formularios/opc_instructor');
    }
    public function ingreso_instructor(){
        return view('formularios/ingresoinstructor');
    }
    public function logininstructor(){
        
        $usuario = $this->request->getPost('usuario');    
        $contra = $this->request->getPost('contra');
       
        $ingresoModel = new IngresoModel();

        $data = $ingresoModel->obtenerInstructor(['correo' => $usuario,'contraseña' => $contra]);
    
        if(count($data) > 0){
           $data = [
                'usuario' => $usuario,
           ];
            $session = session();
            $session -> set($data);
            
            return redirect()->to('inguz/index');

        }else{
            ?>
            <div class="alert alert-warning" role="alert" >
                <strong>Atención:</strong> Datos incorrectos. Ingrese nuevamente
            </div>
            <?php
           return view('formularios/ingresoinstructor'); 
        }
    }

    public function registroadmin(){
        return view('formularios/registroinstructor');
    }

    #BARRA
    public function informacion(){
        return view('inguz/informacion');
    }

    public function actividades(){
        return view('inguz/actividades');
    }

    public function reserva(){
        return view('inguz/reserva');
    }
}
