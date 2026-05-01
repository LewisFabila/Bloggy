<?php

namespace App\Controllers;

class Blog extends BaseController
{
    public function index(): string // Funcion index, retorna la vista del blog.
    {
        if (!session()->get('email')) { // En caso de cerrar sesion e intentar volver a la vista, te pide volver a iniciar sesion.
            return redirect()->to(base_url('/'))
            ->with('message','La sesion ha concluido. Por favor vuelve a iniciar sesion.')
            ->with('type','warning');
        }

        $message = session('message'); // Obtiene mensaje para mostrarlo (En caso de que haya recibido alguno).
        return view('blog_view',[
            'message'=>$message,
            'title'=>'Inicio - Bloggy',
        ]);
    }

    public function logout() // Destruye la session y regresa la vista del login.
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}