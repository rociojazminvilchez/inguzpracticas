<?php

namespace App\Controllers;

use App\Models\RegistroUsuarioModel;


class Usuario extends BaseController{

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
                'rules' => 'required|greater_than_equal_to[15]',
                'errors' => [
                    'required' => 'El campo edad es obligatorio.',
                    'greater_than_equal_to[15]' => 'Debe ser mayor a 14 años'
                ]
            ],
            'telefono'  => [ 
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'El campo teléfono es obligatorio.',
                    'min_length[10]' => 'Debe tener al menos 10 caracteres'
                ]
            ],
            'dire' => [ 
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo direcci&oacuten es obligatorio.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[registrousuario.correo]',
                'errors' => [
                    'required' => 'El campo email es obligatorio.',
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
        
        // Si la validación falla, redirigir de vuelta con los datos ingresados
       
        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $post = $this->request->getPost(['nombre', 'apellido', 'edad', 'telefono','dire','email','contra','contra2','tipo_usuario']);
    
        $registroUsuarioModel = new RegistroUsuarioModel();

    
        // Inicializamos el nombre del archivo como null
    $newName = 'default_certificado.pdf';

    // Manejar la carga del archivo si se sube
    if ($this->request->getFile('image')->isValid() && !$this->request->getFile('image')->hasMoved()) {
        $file = $this->request->getFile('image');
        
        // Definir un nombre único para el archivo
        $newName = $file->getRandomName();
        
        // Mover el archivo a la carpeta deseada
        $file->move(WRITEPATH . 'uploads', $newName); // Guarda en la carpeta `writable/uploads`
    }

    
        $registroUsuarioModel->insert([
                'nombre' => ucfirst(trim($post['nombre'])),
                'apellido' => ucfirst(trim($post['apellido'])),
                'edad' => $post['edad'],
                'telefono' => $post['telefono'],
                'direccion'=> ucfirst($post['dire']),
                'correo' => $post['email'],
                'contraseña' => $post['contra'],
                'contraseña2' => $post['contra2'],
                'tipo' => $post['tipo_usuario'],
                'certificado' => $newName,
            ]);
           
            return redirect()->to('inguz/index')->with('mensaje', 'Usuario registrado exitosamente.');
   }

   public function perfil(){
    if (session()->has('usuario')) {
      $usuario= $_SESSION['usuario'];
    }
     $registrousuarioModel = new RegistroUsuarioModel();
     $data = [
        'usuario' => $registrousuarioModel->mostrarTodoPerfil(['tipo' => 'usuario', 'correo'=>$usuario]),
    ];
    return view ('usuario/perfil', $data);
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
            'rules' => 'required|greater_than_equal_to[15]',
            'errors' => [
                'required' => 'El campo edad es obligatorio.',
                'greater_than_equal_to[15]' => 'Debe ser mayor a 14 años'
            ]
        ],
        'telefono'  => [ 
            'rules' => 'required|min_length[10]',
            'errors' => [
                'required' => 'El campo teléfono es obligatorio.',
                'min_length[10]' => 'Debe tener al menos 10 caracteres'
            ]
        ],
        'dire' => [ 
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo direcci&oacuten es obligatorio.'
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
    
    // Si la validación falla, redirigir de vuelta con los datos ingresados
   
    if (!$this->validate($reglas)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    $post = $this->request->getPost(['nombre', 'apellido', 'edad', 'telefono','dire','email','contra','contra2','tipo_usuario']);
    
    $registroUsuarioModel = new RegistroUsuarioModel();

    $id =  $this->request->getPost(['correo']);
    // Inicializamos el nombre del archivo como null
$newName = 'default_certificado.pdf';

// Manejar la carga del archivo si se sube
if ($this->request->getFile('image')->isValid() && !$this->request->getFile('image')->hasMoved()) {
    $file = $this->request->getFile('image');
    
    // Definir un nombre único para el archivo
    $newName = $file->getRandomName();
    
    // Mover el archivo a la carpeta deseada
    $file->move(WRITEPATH . 'uploads', $newName); // Guarda en la carpeta `writable/uploads`
}


    $registroUsuarioModel->update($id,[
            'nombre' => ucfirst(trim($post['nombre'])),
            'apellido' => ucfirst(trim($post['apellido'])),
            'edad' => $post['edad'],
            'telefono' => $post['telefono'],
            'direccion'=> ucfirst($post['dire']),
            'contraseña' => $post['contra'],
            'contraseña2' => $post['contra2'],
            'tipo' => $post['tipo_usuario'],
            'certificado' => $newName,
        ]);
       
        return redirect()->to('inguz/index')->with('mensaje', 'Usuario actualizado exitosamente.');
}
}