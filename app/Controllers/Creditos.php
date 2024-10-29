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
      
       
       return redirect()->to('/creditos/confirmacion')->with('id', $id);
      
   }

   public function confirmacion(){
    $formData = session()->get('form_data');

    // Si no hay datos, redirigir de vuelta al formulario
    if (empty($formData)) {
        return redirect()->to('formularios/creditos');
    }
    return view('creditos/confirmacion',['valor' => [$formData]]);
   }


   public function creditosupdate($id) {
    $membresiaModel = new MembresiaModel();

         // Recuperar la membresía específica usando el ID
    $membresia = $membresiaModel->find($id);

    // Si no se encuentra la membresía, redirigir o mostrar un mensaje de error
    if (!$membresia) {
        return redirect()->to('/creditos')->with('error', 'Membresía no encontrada.');
    }

    // Pasar los datos de la membresía a la vista
    return view('formularios/creditosupdate', [
        'correo' => $membresia['correo'],
        'actividad' => $membresia['actividad'],
        'cantidad' => $membresia['cantidad'],
        'pago' => $membresia['pago'],
        'id' => $id // Asegúrate de pasar el ID a la vista si lo necesitas
    ]);
   }

   public function update($id) {
    // Obtiene los datos del formulario
    $formData = $this->request->getPost();

    // Validar los datos (opcional)
    if (!$this->validate([
        'correo' => 'required|valid_email',
        'actividad' => 'required',
        'cantidad' => 'required|is_natural_no_zero',
        'pago' => 'required',
    ])) {
        return redirect()->to('/creditos/create')->with('errors', $this->validator->getErrors())->withInput();
    }

    // Crea una instancia del modelo y actualiza la base de datos
    $membresiaModel = new MembresiaModel();
    $membresiaModel->update($id, [
        'correo' => $formData['correo'],
        'actividad' => $formData['actividad'],
        'cantidad' => $formData['cantidad'],
        'pago' => $formData['pago'],
    ]);

    // Redirigir a la página de confirmación o donde desees
    return redirect()->to('/creditos/confirmacion')->with('id', $id);
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