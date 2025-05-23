<?php
include 'data.php';
$controller = new \App\Controllers\DashboardController();
$user = $controller->getUserInfo($_SESSION['user']['id']);

switch ($user['gender']) {
    case 'male':
        $user['gender'] = 'Masculino';
        break;
    case 'female':
        $user['gender'] = 'Feminino';
        break;
    case 'not-say':
        $user['gender'] = "Não informado";
}
if (empty($user['picture'])) {
    $picture = asset("images/logo.jpg");
} else {
    $picture = $user['picture'];
}

$user['birthdate'] = date("d/m/Y", strtotime($user['birthdate']));
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
            <img src="<?= $picture ?>" alt="Foto de Perfil" height="100px" width="100px">
            <h2><?= ucwords($user['name']) ?></h2>
            <p><strong>Data de nascimento:</strong> <?= $user['birthdate'] ?? "00/00/0000" ?></p>
            <p><strong>Gênero:</strong> <?= $user['gender'] ?? "Não informado" ?></p>
            <div class="edit-btn-container"><a href="profile/edit">
                    <button class="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                </a></div>
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
