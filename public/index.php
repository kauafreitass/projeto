<?php
session_start();
require_once __DIR__ . '/../core/Helpers.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\ProfileController;
use App\Controllers\PersonalityController;

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function ($class) {
    echo "Trying to load: " . $class . "\n";
});


Router::get('/', [HomeController::class, 'index']);
Router::get('/home', [HomeController::class, 'index']);
// Auth

Router::get('/login', [AuthController::class, 'showLogin']);

Router::get('/register', [AuthController::class, 'showRegister']);

Router::get('/forgot-password', [AuthController::class, 'showForgotPassword']);

Router::get('/redirect', [AuthController::class, 'showGoogleRedirect']);

Router::get('/logout', [AuthController::class, 'showLogout']);

// Dashboard

Router::get('/dashboard', [DashboardController::class, 'index']);

Router::get('/profile/edit', [ProfileController::class, 'edit']);;

// Personality

Router::get('/personality', [PersonalityController::class, 'index']);;

