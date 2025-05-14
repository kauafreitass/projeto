<?php

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= asset('css/auth.css'); ?>">
    <title>Entre com sua conta</title>
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
                <p class="card-title">Redefinir senha</p>
                <span class="card-subtitle">Complete os campos para redefinir sua senha</span>
            </div>

            <div class="card-form">
                <form action="#" class="card-form-group">
                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail aqui">
                    </div>
                    <div class="input-group">
                        <label for="password">Nova senha</label>
                        <input type="password" name="password" id="email" placeholder="Digite sua nova senha aqui">
                    </div>
                    <button type="submit" class="btn-login">Redefinir</button>
                    <a href="login" class="sign-up-href">Voltar ao login</a>
                </form>
            </div>
        </div>
    </section>
</main>

</body>
</html>
