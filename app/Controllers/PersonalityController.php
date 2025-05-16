<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\PersonalityModel;

class PersonalityController
{
    public PersonalityModel $model;

    public function __construct()
    {
        if (!isset($_SESSION['auth'])) {
            $_SESSION['auth'] = "notAuthenticated";
        }
        $this->model = new PersonalityModel();
    }

    public function index()
    {
        AuthMiddleware::handle();
        view('personality/index', [
            'title' => 'Teste de personalidade'
        ]);
    }

}