<?php

use App\Controllers\AuthController;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $controller = new AuthController();
    $controller->login($_POST['email'], $_POST['password']);;
}


$client = new Google\Client();

$client->setClientId("975261131313-3oq9148p7hs3pvvnjqc63tmpu1nn3f5r.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri('http://localhost/projeto/public/redirect');

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= asset('css/auth.css'); ?>">
    <title><?= $title ?></title>
</head>
<body>

<header class="header">
    <p class="header-title">
        Projeto <span class="header-alt-title">de vida</span>
    </p>
</header>

<main>
    <section class="card-container">
        <div class="card-box">
            <div class="card-header">
                <p class="card-title">Entrar</p>
                <span class="card-subtitle">Digite seu e-mail abaixo para acessar sua conta</span>
            </div>

            <div class="card-form">
                <form action="login" method="post" class="card-form-group">
                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail aqui">
                    </div>
                    <div class="input-group">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" placeholder="Digite sua senha aqui">
                    </div>
                    <a href="forgot-password" class="forgot-password">Esqueceu a senha?</a>
                    <button type="submit" class="btn-login">Entrar</button>
                    <a href="<?= $url ?>" class="w-100">
                        <button type="button" class="btn-google">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
                                 viewBox="0 0 48 48">
                                <path fill="#fbc02d"
                                      d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                <path fill="#e53935"
                                      d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                <path fill="#4caf50"
                                      d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                <path fill="#1565c0"
                                      d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            </svg>
                            Entrar com o Google
                        </button>
                    </a>
                    <a href="register" class="sign-up-href">Não tem uma conta? <span>Cadastre-se</span></a>
                </form>
            </div>
        </div>
    </section>
</main>

</body>
</html>
