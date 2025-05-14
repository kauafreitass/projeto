<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $controller = new \App\Controllers\AuthController();
    $controller->storeAccount($_POST['name'], $_POST['email'], $_POST['password'], $_POST['gender'], $_POST['birthdate']);
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= asset('css/auth.css') ?>">
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
                <p class="card-title">Cadastrar</p>
                <span class="card-subtitle">Complete os campos para criar uma conta</span>
            </div>

            <div class="card-form">
                <form action="register" method="post" class="card-form-group">
                    <div class="input-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" placeholder="Digite seu nome aqui">
                    </div>
                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail aqui">
                    </div>
                    <div class="input-group">
                        <label for="gender">Gênero</label>
                        <div class="radio-group">
                            <div class="radio-labels">
                                <input type="radio" name="gender" id="gender" value="male">
                                <span>Masculino</span>
                            </div>

                            <div class="radio-labels">
                                <input type="radio" name="gender" id="gender" value="female">
                                <span>Feminino</span>
                            </div>
                            <div class="radio-labels">
                                <input type="radio" name="gender" id="gender" value="not-say">
                                <span>Prefiro não dizer</span>
                            </div>

                        </div>
                    </div>
                    <div class="input-group">
                        <label for="birthdate">Data de nascimento</label>
                        <input type="date" name="birthdate" id="birthdate">
                    </div>
                    <div class="input-group">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="email" placeholder="Digite sua senha aqui">
                    </div>
                    <button type="submit" class="btn-login">Cadastrar</button>
                    <a href="login" class="sign-up-href">Já tem uma conta? <span>Entre aqui</span></a>
                </form>
            </div>
        </div>
    </section>
</main>

</body>
</html>
