<?php

namespace App\Controllers;
use App\Models\ActividadesModel;
use App\Models\InformacionModel;
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
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Reformer']),
            'horas' => $actividadesModel->obtenerHorariosREFORMER2()
        ];
        
        return view('actividades/reformer', $data); 
    }    

    public function hiit(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'HIIT']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'HIIT']),
            'horas' => $actividadesModel->obtenerHorariosHIIT2()
        ];
        
        return view('actividades/hiit',$data);
    }

    public function terapeutico(){
        $actividadesModel = new ActividadesModel();
        $pilatesModel = new PilatesModel();
    
        $data = [
            'actividades' => $actividadesModel->mostrarTodo(['Tipo' => 'Terapeutico']),
            'pilates' => $pilatesModel->mostrarTodo(['Tipo' => 'Terapeutico']),
            'horas' => $actividadesModel->obtenerHorariosTERAPEUTICO2()
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
        $horarios = $this->request->getPost('horarios'); // Suponiendo que es un array de horarios
        $clases = $this->request->getPost('clases') ?? [];
        $precios = $this->request->getPost('precios') ?? [];
        $instructor = $this->request->getPost('id_instructor_original');
        $id_precios =  $this->request->getPost('id_precios');
        
        // Descripción
        if (!empty($descripcion)) {
            $pilatesModel->updateDescripcion(1, ['Descripcion' => $descripcion]);
        }
    
        // Días y Horarios
        foreach ($horarios as $hora => $dias) {
            // Separar la hora en inicio y fin
            $horas = explode('-', str_replace('hs', '', $hora));
            $hora_inicio = trim($horas[0]);
            $hora_fin = trim($horas[1]);
    
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
                            'Instructor' => $instructor,
                            'Cupo' => '7',
                            'hora_inicio' => $hora_inicio,
                            'hora_fin' => $hora_fin
                        ]);
                    }
                } elseif ($tipo === '-') { // Verificar que está vacío
                    $horarioId = $actividadesModel->getHorarioId($hora, $dia);
                    if ($horarioId) {
                        $actividadesModel->clearHorario($horarioId); // Eliminar el horario
                    }
                }
            }
        }
        
        // Clases y Precios
        if (is_array($precios) && is_array($id_precios) && count($precios) === count($id_precios)) {
            foreach ($id_precios as $index => $id) {
                $precio = $precios[$index];  // Obtiene el precio correspondiente al ID
                $pilatesModel->updatePrecio($id, ['Precio' => $precio]);
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
        $id_precios =  $this->request -> getPost('id_precios');

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
                            'Instructor' => $instructor,
                            'Cupo' => '7'
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
     // Verifica que los arrays sean del mismo tamaño
     if (is_array($precios) && is_array($id_precios) && count($precios) === count($id_precios)) {
        // Recorre ambos arrays para actualizar cada precio según su ID
        foreach ($id_precios as $index => $id) {
            $precio = $precios[$index];  // Obtiene el precio correspondiente al ID
            // Llama al modelo para actualizar el precio en la base de datos
            $pilatesModel->updatePrecio($id, ['Precio' => $precio]);
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
                            'Instructor' => $instructor,
                            'Cupo' => '7'
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
  
    // Verifica que los arrays sean del mismo tamaño
    if (is_array($precios) && is_array($id_precios) && count($precios) === count($id_precios)) {
    // Recorre ambos arrays para actualizar cada precio según su ID
    foreach ($id_precios as $index => $id) {
        $precio = $precios[$index];  // Obtiene el precio correspondiente al ID
        // Llama al modelo para actualizar el precio en la base de datos
        $pilatesModel->updatePrecio($id, ['Precio' => $precio]);
    }
   }
        return redirect()->to('inguz/index')->with('mensaje', 'Datos actualizados correctamente');
    }    

    #ACTUALIZAR INFORMACION
    public function informacion(){
        $informacionModel = new InformacionModel();

        $data = [
            'info' => $informacionModel->mostrarTodo(),
        ];
       
        return view('actualizar/informacion', $data);
    }

    public function updateInformacion(){
        $informacionModel = new InformacionModel();
        $reglas = [
            'quienes' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                'required' => 'El campo "¿Quienes somos?" es obligatorio.',
                    'min_length' => 'El campo "¿Quienes somos?" debe tener al menos 3 caracteres.'
               ]
            ],
            'lugar' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'El campo "¿Donde estamos?" es obligatorio.',
                    'min_length' => 'El campo "¿Donde estamos?" debe tener al menos 3 caracteres.'
               ]
            ],
            'horarios' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'El campo "horarios" es obligatorio.',
                    'min_length' => 'El campo "horarios" debe tener al menos 3 caracteres.'
               ]
            ],
            'actividades' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'El campo "actividades" es obligatorio.',
                    'min_length' => 'El campo "actividades" debe tener al menos 3 caracteres.'
               ]
            ],
        ];
        $id = $this->request->getPost('id');
        $quienes = $this->request->getPost('quienes');
        $lugar = $this->request->getPost('lugar');
        $horarios = $this->request->getPost('horarios');
        $actividades = $this->request->getPost('actividades');
       
        $informacionModel -> update($id,[
            'quienes' => ucfirst(trim($quienes)),
            'lugar' => ucfirst(trim($lugar)),
            'horarios' => ucfirst(trim($horarios)),
            'actividades' => ucfirst(trim($actividades)),
        ]);

        return redirect()->to('inguz/index')->with('mensaje', 'Datos actualizados correctamente');
    }
}
