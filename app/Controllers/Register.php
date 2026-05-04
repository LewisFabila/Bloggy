<?php

namespace App\Controllers;

use App\Models\Users; // Tomamos el modelo "Users".

class Register extends BaseController
{
    public function index(): string // Funcion index, retorna la vista del formulario para registro de usuarios.
    {
        return view('register_view',[
            'title'=>'Crear Usuario - Bloggy',
        ]);
    }

    public function create() // Funcion para crear usuario.
    {
        $userModel = new Users(); // Instancia con el modelo "Users".
    
        if (!$this->validate([ // Validacion de los datos del registro para que cumplan las condiciones.
            'user' => [
                'label' => 'usuario', // Campos label para que los mensajes de error digan "usuario" y no "user".
                'rules' => 'required|min_length[5]',
            ],
            'email' => [
                'label' => 'correo electrónico',
                'rules' => 'required|valid_email|is_unique[users.email]',
            ],
            'password' => [
                'label' => 'contraseña',
                'rules' => 'required|min_length[5]',
            ],
        ])) {
            return redirect()->back()->withInput() // Nos redirige al formulario de login y muestra los mensajes de error.
                ->with('validation', $this->validator)
                ->with('message', $this->validator->getErrors()) // Obtenemos los errores.
                ->with('type', 'danger');
        }
    
        $data = [ // Variable que almacena los datos obtenidos del formulario. Incluye el "hashing" para almacenar la contraseña de forma segura.
            'user' => $this->request->getPost('user'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
    
        $userModel->insert($data); // Inserta los datos en la tabla "users" de la DB.
    
        return redirect()->to(base_url('/')) // Nos redirige a la vista de login con el mensaje de exito.
            ->with('message', 'Usuario creado con éxito.')
            ->with('type', 'success');
    }
}