<?php
session_start();
require_once __DIR__ . '/../core/Helpers.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
    echo "Trying to load: " . $class . "\n";
});


Router::get('/', [HomeController::class, 'index']);

// Auth

Router::get('/login', [App\Controllers\AuthController::class, 'showLogin']);

Router::get('/register', [App\Controllers\AuthController::class, 'showRegister']);

Router::get('/forgot-password', [App\Controllers\AuthController::class, 'showForgotPassword']);

Router::get('/redirect', [App\Controllers\AuthController::class, 'showGoogleRedirect']);

Router::get('/logout', [App\Controllers\AuthController::class, 'logout']);

// Dashboard

Router::get('/dashboard', ['App\Controllers\DashboardController', 'index']);

