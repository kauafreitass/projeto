<?php
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth'] = 'notAuthenticated';
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= asset('css/home.css'); ?>">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Página inicial</title>
</head>
<body>

<?php view('components/header'); ?>

<main>
    <section class="container">
        <div class="container-title">
            <p>E-commerce</p>
        </div>
        <div class="container-content">
            <div class="container-image">
                <img src="<?= asset('images/ecommerce.png'); ?>" alt="Foto e-commerce" class="container-photo">
            </div>
            <div class="container-description">
                <span>
                    A profissão em e-commerce consiste na gestão de vendas online, integrando marketing digital,
                    controle de estoque, logística, atendimento ao cliente e análise de dados. É uma área dinâmica e em
                    constante expansão, ideal para quem deseja empreender ou trabalhar em empresas digitais, oferecendo
                    uma experiência de compra prática, eficiente e moderna aos consumidores.
                </span>
            </div>
        </div>
    </section>
    <div class="separator-main">
        <hr class="separator-line">
    </div>

    <section class="container">
        <div class="container-title">
            <p>Teste de personalidade</p>
        </div>
        <div class="container-content">
            <div class="personality-box">
                <div class="personality-title">
                    <p>Teste sua personalidade</p>
                </div>
                <div class="personality-description">
                    <span>
                        O teste de personalidade para e-commerce identifica se a pessoa tem perfil empreendedor, criativo e organizado, além de afinidade com tecnologia e comunicação, essenciais para atuar com sucesso no comércio eletrônico.
                    </span>
                </div>
                <div class="personality-link">
                    <a href="personality">
                        <button class="personality-button">Iniciar teste</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php view('components/footer'); ?>

</body>
</html>
