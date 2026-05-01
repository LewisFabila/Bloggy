<?php

namespace App\Controllers;
use App\Models\Users;

class Login extends BaseController
{
    public function index(): string // Funcion index, retorna la vista del formulario de inicio de sesion.
    {
        $message = session('message');
        return view('login_view',[
            'message'=>$message,
            'title'=>'Inicio de Sesion - Bloggy',
        ]);
    }

    public function login() // Funcion login, obtiene el usuario y la contraseña del formulario.
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $new_user = new Users();

        $userData = $new_user->getUser(['email'=>$email]);

        if(count($userData) > 0 && password_verify($password, $userData[0]['password'])){
            $data = [
                "user" => $userData[0]['user'],
                "email" => $userData[0]['email'],
                "type" => $userData[0]['type'],
                "isLoggedIn" => true,
            ];    
            $session = session();
            $session->set($data);

            return redirect()->to(base_url('/blog'))
            ->with('message','Inicio de sesion exitoso.')
            ->with('type','success');

        }else{
            return redirect()->to(base_url('/'))
            ->with('message','Uno o mas datos son incorrectos.')
            ->with('type','danger');
        }
    }
}
