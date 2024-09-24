<?php

namespace App\Controllers;

class Actividades extends BaseController
{
   
    #ACTIVIDADES
    public function reformer(){
        return view('actividades/reformer');
    }

    public function hiit(){
        return view('actividades/hiit');
    }

    public function terapeutico(){
        return view('actividades/terapeutico');
    }
}
