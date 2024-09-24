<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(){
        return view('inguz/index');
    }

    #INGRESAR SESION
    public function login(){
            return view('formularios/ingreso');
    }
    
    public function loginadmin(){
        return view('formularios/ingresoadmi');
    }
    #RECUCONTRA
    public function recuperarcontra(){
        return view('formularios/recuperar_contra');
    }

    #REGISTRO
    public function registro(){
        return view('formularios/registro');
    }

    #BARRA
    public function informacion(){
        return view('inguz/informacion');
    }
}
