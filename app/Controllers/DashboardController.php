<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;

class DashboardController
{
    public function index()
    {
//        AuthMiddleware::handle(); // protege a rota
        view('dashboard/index', [
            'title' =>  'Dashboard'
        ]);
    }
}