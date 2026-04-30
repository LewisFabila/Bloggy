<?php

namespace App\Controllers;

class Blog extends BaseController
{
    public function index(): string // Funcion index, retorna la vista del blog.
    {
        return view('blog_view');
    }
}