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
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'El campo formacion es obligatorio.',
                    'min_length[3]' => 'Debe tener al menos 3 caracteres'
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
                'nombre' => ucfirst(trim($post['nombre'])),
                'apellido' => ucfirst(trim($post['apellido'])),
                'edad' => $post['edad'],
                'telefono' => $post['telefono'],
                'formacion'=> ucfirst(trim($post['formacion'])),
                'tipo' => $tiposClaseString,
                'contraseña' => $post['contra'],
                'contraseña2' => $post['contra2'],
                'tipo_usuario' => $post['tipo_usuario'],
                
            ]);
           
            return redirect()->to('formularios/ingresoinstructor')->with('mensaje', 'Instructor registrado exitosamente.');
   }

   public function perfil(){
    if (session()->has('usuario')) {
      $instructor= $_SESSION['usuario'];
    }
     $registroInstructorModel = new RegistroInstructorModel();
     $data = [
        'instructor' => $registroInstructorModel->mostrarTodoPerfil(['tipo_usuario' => 'instructor', 'correo'=>$instructor]),
    ];
    return view ('instructor/perfil', $data);
   }

   public function update(){
    
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
                'min_length' => 'Debe tener al menos 10 caracteres.'
            ]
        ],
        'formacion' => [ 
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'El campo formacion es obligatorio.',
                'min_length[3]' => 'Debe tener al menos 5 caracteres'
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
    
    $post = $this->request->getPost(['nombre', 'apellido', 'edad', 'telefono','formacion','contra','contra2','tipo_usuario','correo']);
    $id =  $this->request->getPost(['correo']);
   
    $registroInstructorModel = new RegistroInstructorModel();


    $registroInstructorModel->update($id,[
            'nombre' =>  ucfirst(trim($post['nombre'])),
            'apellido' =>  ucfirst(trim($post['apellido'])),
            'edad' => $post['edad'],
            'telefono' => trim($post['telefono']),
            'formacion'=>  ucfirst(trim($post['formacion'])),
            'contraseña' => $post['contra'],
            'contraseña2' => $post['contra2'],
            'tipo_usuario' => $post['tipo_usuario'],
            
        ]);
       
        return redirect()->to('inguz/index')->with('mensaje', 'Instructor actualizado exitosamente.');
   }
   #PANEL - RESERVAS | MEMBRESIAS
   public function panel(){
    return view('instructor/panel');
   }
   
}