<?php

namespace App\Controllers;

use App\Models\ProfileModel;

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

    public function edit() {
        view('profile/index', [
            'title' =>  'Editar perfil'
        ]);
    }

}