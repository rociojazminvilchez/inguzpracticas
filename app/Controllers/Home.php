<?php

namespace App\Controllers;
use App\Models\IngresoModel;
use App\Models\ActividadesModel;
use App\Models\InformacionModel;
use App\Models\MembresiaModel;
use App\Models\PilatesModel;

class Home extends BaseController
{
    public function index(){
        if ($this->request->getGet('confirmar')) {
            session()->setFlashdata('mensaje', '¡Compra realizada con éxito!');
        }
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
                'tipo' => 'Usuario',
           ];
            $session = session();
            $session -> set($data);
            
            return redirect()->to('inguz/index')->with('mensaje', '¡Bienvenido nuevamente!');
        }else{
            ?>
            
            <?php
           return redirect()->to('formularios/ingreso')->with('mensajeError', 'Datos incorrectos. Ingrese nuevamente'); 
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
                'tipo' => 'Instructor'
           ];
            $session = session();
            $session -> set($data);
            
            return redirect()->to('inguz/index')->with('mensaje', '¡Bienvenido nuevamente!');;

        }else{
            ?>
            <div class="alert alert-warning" role="alert" >
                <strong>Atención:</strong> Datos incorrectos. Ingrese nuevamente
            </div>
            <?php
            return redirect()->to('formularios/ingresoinstructor')->with('mensajeError', 'Datos incorrectos. Ingrese nuevamente'); ; 
        }
    }

    public function registroadmin(){
        return view('formularios/registroinstructor');
    }

    #BARRA
    public function informacion(){
        $actividadesModel = new ActividadesModel();
        $informacionModel = new InformacionModel();

        $data = [
            'actividades' => $actividadesModel->mostrarTodoActualizar(),
            'informacion' => $informacionModel->mostrarTodo()
        ];
        
        return view('inguz/informacion',$data);
    }

    public function actividades(){
        return view('inguz/actividades');
    }

  public function reserva() {
    // Instancias de los modelos
    $membresiaModel = new MembresiaModel();
    $actividadesModel = new ActividadesModel();
    $pilatesModel = new PilatesModel();

    // Verificar si el usuario tiene una sesión activa
    if (!session()->has('usuario')) {
        return redirect()->to('/formularios/ingreso')->with('error', 'Por favor, inicie sesión para realizar una reserva.');
    }

    // Obtener el correo del usuario en sesión
    $correo = session('usuario');

    // Recopilación de datos
    $data = [
        //'membresia' => $membresiaModel->mostrar_membresia_activa($correo),
        'membresia' => $membresiaModel->membresia_activa_segunID($correo),
        'actividades' => $actividadesModel->mostrarTodaBD(),
       // 'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'HIIT']),
        //'horas' => $actividadesModel->obtenerHorariosHIIT()
    ];

    // Configuración de idioma a español
    setlocale(LC_TIME, 'es_ES.UTF-8');

    // Obtener la fecha de hoy
    $hoy = strtotime(date('Y-m-d'));

    // Obtener la fecha del lunes de la próxima semana
    $inicioSemana = strtotime('next monday');
    $data['fechasSemana'] = [];
    
    // Calcular las fechas de lunes a viernes de la próxima semana
    for ($i = 0; $i < 5; $i++) {
        $fecha = strtotime("+$i day", $inicioSemana);
        $data['fechasSemana'][] = [
            'fecha' => date('Y-m-d', $fecha),           // Fecha en formato Y-m-d
            'dia' => ucfirst(strftime('%A', $fecha))     // Día de la semana en español
        ];
    }

    // Devolver la vista con los datos recopilados
    return view('inguz/reserva', $data);
}


#COMPRAR CREDITOS
    public function creditos(){
        return view('formularios/creditos');
    }
}
