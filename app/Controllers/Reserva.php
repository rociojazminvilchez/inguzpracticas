<?php

namespace App\Controllers;
use App\Models\ReservaModel;
use App\Models\MembresiaModel;
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

        // Contar cuántas reservas existen para la misma fecha, actividad y horario
        $cantidadReservas = $reservaModel->where('fecha', $fecha)
                                          ->where('horario', $hora)
                                          ->where('actividad', htmlspecialchars($tipoActividad))
                                          ->countAllResults(); // Contar el número de resultados

        // Verificar si ya hay 7 reservas
        if ($cantidadReservas >= 7) {
            return redirect()->to('inguz/index')->with('mensaje', 'Ya se alcanzó el límite de reservas (7) para esta fecha, actividad y horario.');
        }

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
            // Manejar error de inserción
            log_message('error', 'Error al realizar la reserva: ' . json_encode($datosReserva));
            return redirect()->to('inguz/index')->with('mensaje', 'Error al realizar la reserva.');
        }
    }

    // Redirigir a la página de confirmación
    return redirect()->to('inguz/index')->with('mensaje', 'Reserva realizada correctamente');
}



#MODIFICAR RESERVA
   public function update(){
 
   }
}