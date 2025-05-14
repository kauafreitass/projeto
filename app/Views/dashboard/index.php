<?php
include 'data.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Projeto de Vida</title>
    <link rel="stylesheet" href="<?= asset('css/dashboard.css') ?>">
</head>
<body>
<?php view('components/header') ?>

<main class="container">
    <section class="left-column">
        <div class="card profile">
            <img src="<?= $usuario['foto-perfil'] ?? ''; ?>" alt="Foto de Perfil" height="100px" width="100px">
            <h2><?= $usuario['nome'] ?></h2>
            <p>Idade: <?= $usuario['idade'] ?> anos</p>
            <p>Escolaridade: <?= $usuario['escolaridade'] ?></p>
            <p>Cidade: <?= $usuario['cidade'] ?></p>
        </div>

        <div class="card">
            <h3>Progresso do Plano de Ação</h3>
            <div class="progress-bar">
                <div style="width: <?= $progresso ?>%;"><?= $progresso ?>%</div>
            </div>
        </div>

        <div class="card">
            <h3>Próximas Tarefas</h3>
            <ul>
                <?php foreach ($tarefas as $tarefa): ?>
                    <li><strong><?= $tarefa['data'] ?>:</strong> <?= $tarefa['descricao'] ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="right-column">
        <div class="card">
            <h3>Resumo dos Testes</h3>
            <?php foreach ($testes as $teste): ?>
                <p><strong><?= $teste['nome'] ?>:</strong> <?= $teste['resultado'] ?></p>
            <?php endforeach; ?>
        </div>

        <div class="card">
            <h3>Frases e Pensamentos</h3>
            <?php include 'frase.php'; ?>
        </div>
    </section>
</main>

<?php view('components/footer') ?>

</body>
</html>
