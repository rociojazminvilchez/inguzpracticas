<?php

namespace App\Controllers;

use App\Models\RegistroInstructorModel;


class Instructor extends BaseController{

    public function create(){
        $reglas = [
            'nombre' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'El campo nombre es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.'
               ]
            ],
            'apellido' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'El campo apellido es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.'
               ]
            ],
            'edad' => [ 
                'rules' => 'required|greater_than_equal_to[18]',
                'errors' => [
                    'required' => 'El campo edad es obligatorio.',
                    'greater_than_equal_to[18]' => 'Debe ser mayor a 17 años'
                ]
            ],
            'telefono'  => [ 
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'El campo teléfono es obligatorio.',
                    'min_length[10]' => 'Debe tener al menos 10 caracteres'
                ]
            ],
            'formacion' => [ 
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'El campo formacion es obligatorio.',
                    'min_length[5]' => 'Debe tener al menos 5 caracteres'
                ]
            ],
            'tipo_clase' => [
                'rules' => 'required',
                'errors' => [
                'required' => 'Debes seleccionar un tipo de pilates.'
            ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[registroinstructor.correo]',
                'errors' => [
                    'required' => 'El campo direcci&oacuten es obligatorio.',
                    'valid_email' => 'Debes proporcionar un correo electrónico válido.',
                    'is_unique' => 'Este correo electrónico ya está registrado.'
                ]
            ],
            'contra'     => [
                'rules' => 'required|min_length[7]',
                'errors' => [
                    'required' => 'La contraseña es obligatoria.',
                    'min_length' => 'La contraseña debe tener al menos 7 caracteres.'
                ]
            ],
            'contra2' => [ 
                'rules' => 'required|matches[contra]',
                'errors' => [
                    'required' => 'Debes confirmar la contraseña.',
                    'matches' => 'Las contraseñas no coinciden.'
               ]
           ],
        ];
        
       
        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $post = $this->request->getPost(['email','nombre', 'apellido', 'edad', 'telefono','formacion','contra','contra2','tipo_usuario']);
        
        $tiposClaseSeleccionados = $this->request->getPost('tipo_clase'); 
        if ($tiposClaseSeleccionados) {
            $tiposClaseString = implode(", ", $tiposClaseSeleccionados); 
        } else {
            $tiposClaseString = ''; 
        }
        
        $registroInstructorModel = new RegistroInstructorModel();

    
        $registroInstructorModel->insert([
                'correo' => $post['email'],
                'nombre' => trim($post['nombre']),
                'apellido' => trim($post['apellido']),
                'edad' => $post['edad'],
                'telefono' => $post['telefono'],
                'formacion'=> trim($post['formacion']),
                'tipo' => $tiposClaseString,
                'contraseña' => $post['contra'],
                'contraseña2' => $post['contra2'],
                'tipo_usuario' => $post['tipo_usuario'],
                
            ]);
           
            return redirect()->to('inguz/index')->with('mensaje', 'Instructor registrado exitosamente.');
   }
}