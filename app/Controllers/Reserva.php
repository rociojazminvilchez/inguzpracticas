<?php

namespace App\Controllers;
use App\Models\ReservaModel;

class Reserva extends BaseController
{
    public function Reserva() {
        $reservaModel = new ReservaModel();

        $data = [
            'reservas' => $reservaModel->mostrarTodo()
        ];
        return view('reservas/reservas', $data);
    }
}