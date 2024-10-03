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

#PILATES -> REFORMER
    public function actualizar_reformer(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
        $instructor = new RegistroInstructorModel(); 
        
        $data = [
            'actividades' => $actividadesModel->mostrarTodoActualizar(),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Reformer']),
            'instructor' => $instructor->mostrarTodo()
        ];

        return view('actualizar/actualizar_reformer', $data);
    }

    public function updateReformer(){

     $actividadesModel = new ActividadesModel();
     $pilatesModel = new PilatesModel();
 
     $descripcion = $this->request->getPost('descripcion');
     $horarios = $this->request->getPost('horarios');
     $clases = $this->request->getPost('clases') ?? [];
     $precios = $this->request->getPost('precios') ?? [];
     $instructor = $this->request -> getPost('id_instructor_original');

   
     //Descripcion
     if (!empty($descripcion)) {
         $id_descripcion='1';
        $pilatesModel->updateDescripcion(1 ,['Descripcion' => $descripcion]);
    }

     //Dias | Horarios
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
                        'Tipo' => 'Reformer',
                        'Instructor' => $instructor
                    ]);
                 }
                } elseif ($tipo === '-') { // Verificamos que este vacio
                    $horarioId = $actividadesModel->getHorarioId($hora, $dia);
                        if ($horarioId) {
                            $actividadesModel->clearHorario($horarioId); // Eliminar el horario
                        }
               }
        }
    }
    
    //Clases | Precios
    if (is_array($clases) && !empty($clases)) {
        foreach ($clases as $id => $clase) {
            $precio = $precios[$id] ?? null; // Si no existe queda en null
            // Verificamos si el id de clase es válido y si el precio es numérico
            if (!empty($clase) && is_numeric($precio)) {
                $pilatesModel->update($id, ['Clases' => $clase, 'Precio' => $precio]);
            } 
        }
    }
    
    return redirect()->to('inguz/index')->with('mensaje', 'Datos actualizados correctamente');
}

   #PILATES -> HIIT
    public function actualizar_hiit(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
        $instructor = new RegistroInstructorModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodoActualizar(),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'HIIT']),
            'instructor' => $instructor->mostrarTodo()
        ];
        return view('actualizar/hiit', $data);
    }

    public function updateHiit(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();

        $descripcion = $this->request->getPost('descripcion');
        $horarios = $this->request->getPost('horarios');
        $clases = $this->request->getPost('clases') ?? [];
        $precios = $this->request->getPost('precios')?? [];
        $instructor = $this->request -> getPost('id_instructor_original');
        
        $id_descripcion='4';
        //Descripcion
        if (!empty($descripcion)) {
            
            $pilatesModel->updateDescripcion($id_descripcion ,['Descripcion' => $descripcion]);
        }
    
    
        //Dias | Horarios
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
                            'Tipo' => 'HIIT',
                            'Instructor' => $instructor
                       ]);
                    }
                } elseif ($tipo === '-') { // Verificamos que este vacio
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
            $precio = $precios[$id] ?? null; // Si no existe queda en null
            // Verificamos si el id de clase es válido y si el precio es numérico
            if (!empty($clase) && is_numeric($precio)) {
                $pilatesModel->update($id, ['Clases' => $clase, 'Precio' => $precio]);
            } 
        }
    }
    return redirect()->to('inguz/index')->with('mensaje', 'Datos actualizados correctamente');
}

   #PILATES -> TERAPEUTICO
    public function actualizar_terapeutico(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
        $instructor = new RegistroInstructorModel();

        $data = [
            'actividades' => $actividadesModel->mostrarTodoActualizar(),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Terapeutico']),
            'instructor' => $instructor->mostrarTodo()
        ];
       
        return view('actualizar/terapeutico', $data);
    }

    public function updateTerapeutico() {
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();

        $descripcion = $this->request->getPost('descripcion');
        $horarios = $this->request->getPost('horarios');
        $clases = $this->request->getPost('clases'); 
        $precios = $this->request->getPost('precios') ; 
        $instructor = $this->request -> getPost('id_instructor_original');
        $id_precios =  $this->request -> getPost('id_precios');

        //Descripcion
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
                } elseif ($tipo === '-') { // Verificamos que este vacio
                    $horarioId = $actividadesModel->getHorarioId($hora, $dia);
                        if ($horarioId) {
                            $actividadesModel->clearHorario($horarioId); // Eliminar el horario
                        }
               }
        }
    }
    

            // Verificamos si el id de clase es válido y si el precio es numérico
        
                $pilatesModel->update($id_precios, ['Precio' => $precios]);
             
        
    
        return redirect()->to('inguz/index')->with('mensaje', 'Datos actualizados correctamente');
    }    
    
}
