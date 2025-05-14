<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        view('home', [
            'title' => 'Bem-vindo ao Projeto de Vida'
        ]);
    }

}
