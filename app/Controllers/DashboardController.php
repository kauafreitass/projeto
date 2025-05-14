<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\DashboardModel;

class DashboardController
{
    public DashboardModel $model;

    public function __construct()
    {
        if (!isset($_SESSION['auth'])) {
            $_SESSION['auth'] = "notAuthenticated";
        }
        $this->model = new DashboardModel();
    }

    public function index()
    {
//        AuthMiddleware::handle(); // protege a rota
        view('dashboard/index', [
            'title' =>  'Dashboard'
        ]);
    }

    public function getUserInfo($id) {
        return $this->model->getUserInfo($id);
    }
}