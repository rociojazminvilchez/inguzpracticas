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
        // Obtener el ID autogenerado
       $id = $membresiaModel->insertID();
       return redirect()->to('/creditos/confirmacion')->with('id', $id);
      
   }

   public function confirmacion(){
    $membresiaModel = new MembresiaModel();
    $data = [
        'valor' => $membresiaModel->mostrarTodo()
    ];
    return view('creditos/confirmacion', $data);
   }

   public function update(){
     $post = $this->request->getPost(['id', 'correo', 'actividad', 'cantidad', 'pago']);

    // Verificar que los campos obligatorios no estén vacíos
    if (empty($post['actividad']) || empty($post['cantidad']) || empty($post['pago'])) {
        // Redirigir con mensaje de error si algún campo está vacío
        return redirect()->back()->with('error', 'Todos los campos son obligatorios.')
            ->withInput();
    }

    $membresiaModel = new MembresiaModel();

    // Actualiza el registro en la base de datos
    $membresiaModel->update($post['id'], [
        'correo' => $post['correo'],
        'actividad' => $post['actividad'],
        'cantidad' => $post['cantidad'],
        'pago' => $post['pago'],
        'estado' => 'En espera',
        // Otros campos si es necesario
    ]);

    return redirect()->to('/creditos/confirmacion')->with('success', 'Registro actualizado con éxito.');
   }
}