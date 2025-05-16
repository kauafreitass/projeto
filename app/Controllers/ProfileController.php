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

    public function edit(): void
    {
        view('profile/index', [
            'title' =>  'Editar perfil'
        ]);
    }
    public function update($avatar, $name, $email, $password, $gender, $birthdate): array
    {
        return $this->model->update($avatar, $name, $email, $password, $gender, $birthdate);
}

}