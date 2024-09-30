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
        $idDescripcion = $this->request->getPost('id_descripcion');
    
        //descripcion
        if (!empty($descripcion) && !empty($idDescripcion)) {
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
               $pilatesModel->update($id, ['Clases' => $clase, 'Precio' => $precio]);
           }
       }
   
       return redirect()->to('inguz/index')->with('success', 'Datos actualizados correctamente');
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

    public function updateTerapeutico(){

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
            $id='3';
            $actividadesModel->updateDescripcion($id ,['Descripcion' => $descripcion]);
        }
    
    
        //dias|horarios
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
                            'Tipo' => 'Terapeutico'
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
}
