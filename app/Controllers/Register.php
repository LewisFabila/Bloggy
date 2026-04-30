<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index(): string // Funcion index, retorna la vista del formulario para registro de usuarios.
    {
        return view('register_view');
    }
}
