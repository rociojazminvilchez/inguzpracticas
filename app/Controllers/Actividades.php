<?php

namespace App\Controllers;
use App\Models\ActividadesModel;
use App\Models\PilatesModel;
use App\Models\RegistroInstructorModel;
use App\Models\RegistroUsuarioModel;

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
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'HIIT']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'HIIT'])
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

    public function updateReformer(){

     $actividadesModel = new ActividadesModel();
     $pilatesModel = new PilatesModel();
 
     // Informacion del formulario
     $descripcion = $this->request->getPost('descripcion');
     $horarios = $this->request->getPost('horarios');
     $clases = $this->request->getPost('clases');
     $precios = $this->request->getPost('precios');
     $idDescripcion = $this->request->getPost('id_descripcion');
    
     //descripcion
     if (!empty($descripcion) && !empty($idDescripcion)) {
        $id='6';
        $actividadesModel->updateDescripcion($id ,['Descripcion' => $descripcion]);
    }

     //dias|horarios
     foreach ($horarios as $hora => $dias) {
         foreach ($dias as $dia => $tipo) {
            if ($tipo === 'Reformer') {
                 
                $horarioId = $actividadesModel->getHorarioId($hora, $dia);
                 if ($horarioId) {
                     
                    $actividadesModel->updateHorario($horarioId, $hora, $dia, 'Reformer');
                 } else {
                    $actividadesModel->insert([
                         'Horario' => $hora,
                         'Dia' => $dia,
                         'Tipo' => 'Reformer'
                    ]);
                 }
             } 
        }
     }

    //Clases | Precios
    foreach ($clases as $id => $clase) {
        $precio = $precios[$id];
        if (!empty($clase) && is_numeric($precio)) {
            $pilatesModel->update($id, ['Clases' => $clase, 'Precio' => $precio]);
        }
    }

    return redirect()->to('inguz/index')->with('success', 'Datos actualizados correctamente');
}

    public function actualizar_hiit(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'HIIT']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'HIIT'])
        ];
        return view('actualizar/hiit', $data);
    }

    public function updateHiit(){

        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        // Informacion del formulario
        $descripcion = $this->request->getPost('descripcion');
        $horarios = $this->request->getPost('horarios');
        $clases = $this->request->getPost('clases');
        $precios = $this->request->getPost('precios');
    
        //descripcion
        if (!empty($descripcion)) {
            $id='11';
            $actividadesModel->updateDescripcion($id ,['Descripcion' => $descripcion]);
        }
    
    
        //dias|horarios
        foreach ($horarios as $hora => $dias) {
            foreach ($dias as $dia => $tipo) {
               if ($tipo === 'HIIT') {
                    
                   $horarioId = $actividadesModel->getHorarioId($hora, $dia);
                    if ($horarioId) {
                        
                       $actividadesModel->updateHorario($horarioId, $hora, $dia, 'HIIT');
                    } else {
                       $actividadesModel->insert([
                            'Horario' => $hora,
                            'Dia' => $dia,
                            'Tipo' => 'HIIT'
                       ]);
                    }
                } 
           }
        }
   
       //Clases | Precios
       foreach ($clases as $id => $clase) {
           $precio = $precios[$id];
           if (!empty($clase) && is_numeric($precio)) {
               $pilatesModel->update($id, ['Clases' => $clase, 'Precio' => $precio, 'Descripcion' => $descripcion]);
           }
       }
   
       return redirect()->to('inguz/index')->with('success', 'Datos actualizados correctamente');
   }

    public function actualizar_terapeutico(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
        $registroInstructor = new RegistroInstructorModel();

        $data = [
            'actividades' => $actividadesModel->mostrarTodoActualizar(),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Terapeutico']),
            'instructor' => $registroInstructor->mostrarTodo2()
        ];
        return view('actualizar/terapeutico', $data);
    }

    public function updateTerapeutico() {
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
        

        // Información del formulario
        $descripcion = $this->request->getPost('descripcion');
        $horarios = $this->request->getPost('horarios');
        $clases = $this->request->getPost('clases') ?? []; // Asegúrate de que sea un array
        $precios = $this->request->getPost('precios') ?? []; // Asegúrate de que sea un array
        $instructor = $this->request -> getPost('id_instructor');

        
        if (!empty($descripcion)) {
            $id_descripcion='7';
            $pilatesModel->updateDescripcion($id_descripcion,['Descripcion' => $descripcion]);
            
        }
        // Días | Horarios
        foreach ($horarios as $hora => $dias) {
            foreach ($dias as $dia => $tipo) {
                if ($tipo === 'Terapeutico') {
                    $horarioId = $actividadesModel->getHorarioId($hora, $dia);
                    if ($horarioId) {
                        $actividadesModel->updateHorario($horarioId, $hora, $dia, 'Terapeutico');
                    } else {
                        $actividadesModel->insert([
                            'Horario' => $hora,
                            'Dia' => $dia,
                            'Tipo' => 'Terapeutico',
                            'Instructor' => $instructor
                        ]);
                    }
                } elseif ($tipo === '-') { // Verificamos si el tipo es vacío
                    $horarioId = $actividadesModel->getHorarioId($hora, $dia);
                    if ($horarioId) {
                        $actividadesModel->clearHorario($horarioId); // Eliminar el horario
                    }
                }
            }
        }
    
       // Clases | Precios
if (is_array($clases) && !empty($clases)) {
    foreach ($clases as $id => $clase) {
        // Usamos el operador de fusión null para evitar el error
        $precio = $precios[$id] ?? null; // Si no existe, será null

        // Verificamos si el id de clase es válido y si el precio es numérico
        if (!empty($clase) && is_numeric($precio)) {
            $pilatesModel->update($id, ['Clases' => $clase, 'Precio' => $precio]);
        } elseif (empty($clase)) {
            // Si la clase está vacía, puedes eliminarla de la base de datos o manejarlo como desees
            $pilatesModel->delete($id); // Asegúrate de que $id sea el correcto para eliminar
        }
    }
}

    
        return redirect()->to('inguz/index')->with('success', 'Datos actualizados correctamente');
    }
    
    
}
