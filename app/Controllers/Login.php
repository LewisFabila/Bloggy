<?php

namespace App\Controllers;

use App\Models\Users;// Tomamos el modelo "Users".

class Login extends BaseController
{
    public function index(): string // Funcion index, retorna la vista del formulario de inicio de sesion.
    {
        $message = session('message');
        return view('login_view',[
            'message'=>$message,
            'title'=>'Inicio de Sesión - Bloggy',
        ]);
    }

    public function login() // Funcion para iniciar sesion.
    {
        if (!$this->validate([ // Validacion de los datos del registro para que cumplan las condiciones.
            'email' => [
                'label' => 'correo electrónico', // Campos label para que los mensajes de error digan "correo electronico" y no "email".
                'rules' => 'required|valid_email',
            ],
            'password' => [
                'label' => 'contraseña',
                'rules' => 'required',
            ],
        ])) {
            return redirect()->back()->withInput() // Nos redirige al formulario de login y muestra los mensajes de error.
                ->with('validation', $this->validator)
                ->with('message', $this->validator->getErrors()) // Obtenemos los errores.
                ->with('type', 'danger');
        }

        $email = $this->request->getPost('email'); // Guarda el email en una variable.
        $password = $this->request->getPost('password'); // Guarda la contraseña en una variable.

        $userModel = new Users(); // Instancia con el modelo "Users".
        $user = $userModel->where('email', $email)->first(); // Almacena al primer usuario que coincida con el email (que es unico).

        if ($user && password_verify($password, $user['password'])) { // Crea una sesion si "$user" no es "null" y la contraseña coincide con el "hash" de la DB.

            $sessionData = [ // Arreglo temporal con Los datos de la sesion.
                "user"       => $user['user'],
                "email"      => $user['email'],
                "type"       => $user['type'] ?? 'user',
                "isLoggedIn" => true,
            ];

            session()->set($sessionData); // Almacena los datos de la sesion en un "archivo" para usarlos mientras exista la sesion.

            return redirect()->to(base_url('/blog')) // Nos redirige a la pagina de inicio del blog y muestra el mensaje de exito.
                ->with('message', 'Inicio de sesión exitoso.')
                ->with('type', 'success');
        }

        return redirect()->back()->withInput() // Nos redirige al formulario de login y muestra el mensaje de error.
            ->with('message', 'Correo o contraseña incorrectos.')
            ->with('type', 'danger');
    }
}
