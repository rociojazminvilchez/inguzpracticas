<?php

namespace App\Controllers;
use App\Models\ActividadesModel;
use App\Models\PilatesModel;
class Actividades extends BaseController
{
   
    #ACTIVIDADES
    public function reformer(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Reformer']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Reformer'])
        ];
        
        return view('actividades/reformer', $data); 
    }    

    public function hiit(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Hiit']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Hiit'])
        ];
        
        return view('actividades/hiit',$data);
    }

    public function terapeutico(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Terapeutico']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Terapeutico'])
        ];
        return view('actividades/terapeutico', $data);
    }

    #ACTUALIZAR INFORMACION
    public function actualizar_reformer(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Reformer']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Reformer'])
        ];
        return view('actualizar/actualizar_reformer', $data);
    }

    public function updateReformer()
{
     // Cargar los modelos
     $actividadesModel = new ActividadesModel();
     $pilatesModel = new PilatesModel();
 
     // Obtener los datos enviados por el formulario
     $descripcion = $this->request->getPost('descripcion');
     $horarios = $this->request->getPost('horarios');
     $clases = $this->request->getPost('clases');
     $precios = $this->request->getPost('precios');
     $idDescripcion = $this->request->getPost('id_descripcion');
 
     // Actualizar la descripción de la actividad
     if (!empty($descripcion) && !empty($idDescripcion)) {
         $actividadesModel->updateDescripcion($idDescripcion, $descripcion);
     }
 
     // Actualizar los horarios
     foreach ($horarios as $hora => $dias) {
         foreach ($dias as $dia => $tipo) {
             // Solo actualizamos si el tipo es 'Reformer'
             if ($tipo === 'Reformer') {
                 // Buscamos el ID del horario existente
                 $horarioId = $actividadesModel->getHorarioId($hora, $dia);
                 if ($horarioId) {
                     // Si existe, lo actualizamos
                     $actividadesModel->updateHorario($horarioId, $hora, $dia, 'Reformer');
                 } else {
                     // Si no existe, creamos un nuevo registro
                     $actividadesModel->insert([
                         'Horario' => $hora,
                         'Dia' => $dia,
                         'Tipo' => 'Reformer'
                     ]);
                 }
             } else {
                 // Si el tipo no es 'Reformer', aseguramos que no se elimine otra información
                 // Podemos ignorar esto si no hay acción que tomar
             }
         }
     }

    // Actualizar los precios de las clases
    foreach ($clases as $id => $clase) {
        $precio = $precios[$id];
        if (!empty($clase) && is_numeric($precio)) {
            // Actualizar la información en la base de datos
            $pilatesModel->update($id, ['Clases' => $clase, 'Precio' => $precio]);
        }
    }

    // Redirigir con un mensaje de éxito
    return redirect()->to('inguz/index')->with('success', 'Datos actualizados correctamente');
}

    public function actualizar_hiit(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Hiit']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Hiit'])
        ];
        return view('actualizar/hiit', $data);
    }

    public function actualizar_terapeutico(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Terapeutico']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Terapeutico'])
        ];
        return view('actualizar/terapeutico', $data);
    }
}
