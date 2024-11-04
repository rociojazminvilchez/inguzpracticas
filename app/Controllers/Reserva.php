<?php

namespace App\Controllers;
use App\Models\ReservaModel;

class Reserva extends BaseController
{
    public function Reserva() {
        $reservaModel = new ReservaModel();

        $data = [
            'reservas' => $reservaModel->mostrarTodo(),
            
        ];
        return view('reservas/reservas', $data);
    }

#GUARDAR RESERVA

public function create() {
    $reservaModel = new ReservaModel();
    
    // Recuperar datos del formulario
    $seleccionados = $this->request->getPost('seleccionar'); 
    $instructor = $this->request->getPost('instructor'); 
    $horainicio = $this->request->getPost('hora_inicio'); 
    
    // Validar que se han seleccionado reservas
    if (empty($seleccionados)) {
        return redirect()->to('inguz/index')->with('mensaje', 'No se seleccionaron reservas.');
    }

    // Validar que el instructor y la hora de inicio no estén vacíos
    if (empty($instructor) || empty($horainicio)) {
        return redirect()->to('inguz/index')->with('mensaje', 'El instructor y la hora de inicio son requeridos.');
    }

    // Validar sesión de usuario
    if (!session()->has('usuario')) {
        return redirect()->to('formulario/ingreso')->with('mensaje', 'Debes iniciar sesión para realizar una reserva.');
    }
    
    $correo = $_SESSION['usuario']; // Recuperar el correo del usuario

    foreach ($seleccionados as $fechaHora => $tipoActividad) {
        // Separar fecha y hora
        [$fecha, $hora] = explode('_', $fechaHora);

        // Preparar datos para la reserva
        $datosReserva = [
            'fecha' => $fecha,
            'horario' => $hora,
            'actividad' => htmlspecialchars($tipoActividad), // Sanitizar entrada
            'alumno' => htmlspecialchars($correo), // Sanitizar entrada
            'estado' => 'Reservado',
            'instructor' => htmlspecialchars($instructor), // Sanitizar entrada
            'hora_inicio' => htmlspecialchars($horainicio) // Sanitizar entrada
        ];

   

        // Intentar insertar la reserva en la base de datos
        if (!$reservaModel->insert($datosReserva)) {
            // Manejar error de inserción, puedes registrar el error en un log
            log_message('error', 'Error al realizar la reserva: ' . json_encode($datosReserva)); // Registrar el error
            return redirect()->to('inguz/index')->with('mensaje', 'Error al realizar la reserva.'); // Mensaje de error
        }
    }

    // Redirigir a la página de confirmación
    return redirect()->to('inguz/index')->with('mensaje', 'Reserva realizada correctamente');
}

#MODIFICAR RESERVA
   public function update(){
 
   }
}