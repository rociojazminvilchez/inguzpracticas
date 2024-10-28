<?php

namespace App\Controllers;
use App\Models\IngresoModel;
use App\Models\ActividadesModel;
use App\Models\InformacionModel;

class Reserva extends BaseController
{
    public function cargarCalendario($actividad) {
        $this->load->model('HorarioModel');
        
        // Obtener horarios según la actividad seleccionada
        $data['horarios'] = $this->HorarioModel->getHorariosPorActividad($actividad);
        
        // Cargar solo la vista del calendario y pasar los datos
        $this->load->view('calendario_semanal', $data);
    }
}