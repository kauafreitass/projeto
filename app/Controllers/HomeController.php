<?php

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        view('home', [
            'title' => 'Bem-vindo ao Projeto de Vida'
        ]);
    }

    public function career(): void
    {
        view('career/index', [
            'title' => 'Carreira'
        ]);
    }

}
