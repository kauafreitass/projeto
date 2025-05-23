<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\ProfileModel;
use GuzzleHttp\Middleware;

class ProfileController
{
    private ProfileModel $model;

    public function __construct()
    {
        if (!isset($_SESSION['auth'])) {
            $_SESSION['auth'] = "notAuthenticated";
        }
        $this->model = new ProfileModel();
    }

    public function edit(): void
    {
        AuthMiddleware::handle();
        view('profile/index', [
            'title' => 'Editar perfil'
        ]);
    }

    public function update($avatar, $name, $email, $password, $gender, $birthdate): array
    {
        return $this->model->update($avatar, $name, $email, $password, $gender, $birthdate);
    }

    public function getById($id) {
        return $this->model->getById($id);
    }



}