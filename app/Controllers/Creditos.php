<?php

namespace App\Controllers;

use App\Models\MembresiaModel;


class Creditos extends BaseController{

    public function create() {
        // Obtener los datos del formulario
        $post = $this->request->getPost(['correo', 'actividad', 'cantidad', 'pago']);
    
        // Validar los datos
        if (!$this->validate([
            'correo' => 'required|valid_email',
            'actividad' => 'required',
            'cantidad' => 'required|is_natural_no_zero',
            'pago' => 'required',
        ])) {
            // Redirigir con mensajes de error si algún campo no es válido
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }
    
        // Almacena los datos en la sesión para usarlos más tarde
        session()->set('form_data', $post);
    
        // Instanciar el modelo
        $membresiaModel = new MembresiaModel();
        
        // Obtener la fecha actual
        $fecha = date('Y-m-d');
    
        // Intentar insertar los datos en la base de datos
        try {
            $membresiaModel->insert([
                'correo' => $post['correo'],
                'actividad' => $post['actividad'],
                'cantidad' => $post['cantidad'],
                'pago' => $post['pago'],
                'estado_pago' => 'En espera',
                'fecha_creada' => $fecha,
                'pases' => $post['cantidad'],
            ]);
            
            // Obtener el ID de la última inserción
            $id = $membresiaModel->insertID();
            
            // Guardar los datos en la sesión para mostrarlos en la confirmación
            session()->set('form_data', [
                'id' => $id,
                'correo' => $post['correo'],
                'actividad' => $post['actividad'],
                'cantidad' => $post['cantidad'],
                'pago' => $post['pago'],
                'pases' => $post['cantidad'],
            ]);
    
            // Redirigir a la página de confirmación
            return redirect()->to('/creditos/confirmacion')->with('id', $id);
            
        } catch (\Exception $e) {
            // Manejo de errores al intentar insertar en la base de datos
            log_message('error', 'Error al insertar en la base de datos: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al procesar la solicitud.')->withInput();
        }
    }
    

    public function confirmacion() {
        // Verificar si hay datos en la sesión
        $formData = session()->get('form_data');
        
        // Verificar que hay datos de formulario y que el ID está definido
        if (empty($formData) || !isset($formData['id'])) {
            return redirect()->to('/creditos')->with('error', 'No se encontró información de compra.');
        }
    
        $id = $formData['id'];
        $membresiaModel = new MembresiaModel();
    
        // Obtener los datos de la base de datos por ID
        $valor = $membresiaModel->mostrarSoloID($id);
        
        // Verificar si hay resultados
        if (empty($valor)) {
            return redirect()->to('/creditos')->with('error', 'Membresía no encontrada.');
        }
    
        // Eliminar el índice adicional que puede estar en el resultado
        // Si `mostrarSoloID` devuelve un array de resultados, deberías obtener el primer elemento
        $valor = $valor[0]; // Asumiendo que `mostrarSoloID` devuelve un array de resultados
    
        // Pasar los datos a la vista
        return view('creditos/confirmacion', ['valor' => $valor]);
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
            'correo' => esc($membresia['correo']), // Escapar el correo
            'actividad' => esc($membresia['actividad']), // Escapar la actividad
            'cantidad' => esc($membresia['cantidad']), // Escapar la cantidad
            'pago' => esc($membresia['pago']), // Escapar el medio de pago
            'id' => esc($id), // Asegúrate de escapar el ID si lo vas a mostrar
            'pases' => esc($membresia['cantidad']),
        ]);
    }
    
    public function update($id) {
        // Obtiene los datos del formulario
        $formData = $this->request->getPost();
    
        // Validar los datos
        if (!$this->validate([
            'correo' => 'required|valid_email',
            'actividad' => 'required',
            'cantidad' => 'required|is_natural_no_zero',
            'pago' => 'required',
        ])) {
            return redirect()->to('/creditos/create')
                             ->with('errors', $this->validator->getErrors())
                             ->withInput();
        }

        $membresiaModel = new MembresiaModel();
        $membresiaModel->update($id, [
            'correo' => (string)$formData['correo'],
            'actividad' => (string)$formData['actividad'],
            'cantidad' => (int)$formData['cantidad'], 
            'pago' => (string)$formData['pago'],
            'pases' => (int)$formData['cantidad'], 
        ]);
        return redirect()->to('/creditos/confirmacion')->with('id', $id)->with('mensaje', 'Membresía actualizada con éxito.');
    }
    


    public function guardar() {
        $formData = session()->get('form_data');

        if (empty($formData)) {
            return redirect()->to('/creditos')->with('error', 'No se encontraron datos de compra.');
        }
    
        $membresiaModel = new MembresiaModel();
         
        try {     
            // Eliminar datos de la sesión
            session()->remove('form_data');
    
            return redirect()->to('/inguz/index')->with('mensaje', 'Compra confirmada con éxito.');
        } catch (\Exception $e) {
            return redirect()->to('/creditos')->with('error', 'Error al confirmar la compra: ' . esc($e->getMessage()));
        }
    }
    
   //MEMBRESIAS - ACTUALIZAR ESTADOS
   public function pago_espera(){
    $membresiaModel = new MembresiaModel();
    $data = [
        'espera' => $membresiaModel->membresia_espera(),
    ]; 
    return view('/creditos/membresia_espera' , $data);
   }

   #MODIFICAR ESTADO PAGO
   public function aprobar_pago($id){
    $estado_pago='Aprobado';
    $estado = 'Activa'; 
    $fecha = date('Y-m-d');

    $fecha_vencimiento = date('Y-m-d', strtotime($fecha . ' + 30 days'));

    $membresiaModel = new MembresiaModel();

    try{
    $membresiaModel->update($id, [
        'estado_pago' => $estado_pago,
        'estado' => $estado,
        'fecha_inicio' => $fecha,
        'fecha_fin' => $fecha_vencimiento,
        'fecha_actualizacion' => $fecha,
    ]);
    return redirect()->to('/creditos/membresia_espera')->with('mensaje', 'Pago actualizado con exito.');
   }catch (\Exception $e) {
    return redirect()->to('/creditos')->with('error', 'Error al actualizar el pago: ' . esc($e->getMessage())); 
   }
 }

 public function rechazar_pago($id){
    $estado_pago='Rechazado';
    $estado = 'Rechazada'; 
    $membresiaModel = new MembresiaModel();
    $fecha = date('Y-m-d');
    try{
    $membresiaModel->update($id, [
        'estado_pago' => $estado_pago,
        'estado' => $estado,
        'pases' => '0',
        'fecha_actualizacion' => $fecha,
    ]);
    return redirect()->to('/creditos/membresia_espera')->with('mensaje', 'Pago rechazado con exito.');
   }catch (\Exception $e) {
    return redirect()->to('/creditos')->with('error', 'Error al actualizar el pago: ' . esc($e->getMessage())); 
   }
   }

   public function membresia_activa(){
    $membresiaModel = new MembresiaModel();
    $data = [
        'activa' => $membresiaModel ->membresia_activa() ,
    ]; 
    return view('/creditos/membresia_activa' , $data);
    }

   public function membresia_rechazada(){
    $membresiaModel = new MembresiaModel();
    $data = [
        'rechazada' => $membresiaModel ->membresia_rechazada() ,
    ]; 
    return view('/creditos/membresia_rechazada' , $data);
   }

   public function membresia_vencida(){
    $membresiaModel = new MembresiaModel();
    $data = [
        'vencida' => $membresiaModel ->membresia_vencida() ,
    ]; 
    return view('/creditos/membresia_vencida' , $data);
   }
}