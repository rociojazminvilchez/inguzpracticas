<?php

namespace App\Controllers;

use App\Models\MembresiaModel;


class Creditos extends BaseController{

    public function create(){
        $post = $this->request->getPost(['correo','actividad', 'cantidad', 'pago']);
        // Verificar que los campos obligatorios no estén vacíos
       if (empty($post['actividad']) || empty($post['cantidad']) || empty($post['pago'])) {
        // Redirigir con mensaje de error si algún campo está vacío
        return redirect()->back()->with('error', 'Todos los campos son obligatorios.');
       }
       // Almacena los datos en la sesión para usarlos más tarde
    session()->set('form_data', $post);

        $membresiaModel = new MembresiaModel();
     
        $fecha = date('Y-m-d');
       
        $membresiaModel->insert([
              
                'correo' => $post['correo'],
                'actividad' => $post['actividad'],
                'cantidad' => $post['cantidad'],
                'pago' => $post['pago'],
                'estado' => 'En espera',    
                'fecha_creada' => $fecha,
            ]);
             
            $id = $membresiaModel->insertID();
            // Guardar los datos en la sesión para mostrarlos en la confirmación
    session()->set('form_data', [
        'id' => $id,
        'correo' => $post['correo'],
        'actividad' => $post['actividad'],
        'cantidad' => $post['cantidad'],
        'pago' => $post['pago'],
    ]);

        // Obtener el ID autogenerado
      
       
       return redirect()->to('/creditos/confirmacion');
      
   }

   public function confirmacion(){
    $formData = session()->get('form_data');

    // Si no hay datos, redirigir de vuelta al formulario
    if (empty($formData)) {
        return redirect()->to('formularios/creditos');
    }
    return view('creditos/confirmacion',['valor' => [$formData]]);
   }


   public function update($id) {
   
   }

    public function guardar() {
        $formData = session()->get('form_data');
    
        if (empty($formData)) {
            return redirect()->to('/creditos');
        }
    
        $membresiaModel = new MembresiaModel();
    
        // Actualiza o inserta en la base de datos según sea necesario
        $membresiaModel->update($formData['id'], [
            'estado' => 'Confirmado', // O cualquier otro campo que necesites
        ]);
    
        // Limpiar la sesión después de confirmar
        session()->remove('form_data');
    
        return redirect()->to('/inguz/index')->with('success', 'Compra confirmada con éxito.');
    }
    

   
}