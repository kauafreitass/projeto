<?php
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
if ($user['birthdate'] == null) {
    $user['birthdate'] = "Não informado";
} else {
    $user['birthdate'] = date("d/m/Y", strtotime($user['birthdate']));
}
if (!empty($user['intelligences'])) {
    $inteligencias = json_decode($user['intelligences']);
}

$mbtiFeito = !empty($user['mbti_type']);
$inteligenciasFeito = !empty($user['intelligences']);

if ($mbtiFeito && $inteligenciasFeito) {
    $progresso = 100;
} elseif ($mbtiFeito || $inteligenciasFeito) {
    $progresso = 50;
} else {
    $progresso = 0;
}

$fields = [
    'about_me' => 'Sobre Mim',
    'memories' => 'Minhas Lembranças',
    'strengths' => 'Pontos Fortes',
    'weaknesses' => 'Pontos Fracos',
    'values' => 'Meus Valores',
    'aptitudes' => 'Minhas Aptidões',
    'relationships' => 'Relacionamentos',
    'daily_life' => 'Meu Dia a Dia',
    'school_life' => 'Vida Escolar',
    'self_view' => 'Minha Visão Sobre Mim',
    'others_view' => 'Visão dos Outros Sobre Mim',
    'self_esteem' => 'Autovalorização',
];
$filledFields = array_filter($fields, function ($key) use ($user) {
    return !empty(trim($user[$key] ?? ''));
}, ARRAY_FILTER_USE_KEY);
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

        <?php if ($filledFields): ?>
            <div class="card">

                <h2>Quem Sou Eu?</h2>
                <?php foreach ($filledFields as $key => $label): ?>
                    <p><strong><?= $label ?>:</strong> <?= htmlspecialchars($user[$key]) ?></p>
                <?php endforeach; ?>
                <div class="edit-btn-container"><a href="profile/who-iam">
                        <button class="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                    </a></div>
            </div>
        <?php endif; ?>

        <div class="card">
            <h3>Progresso do Plano de Ação</h3>
            <div class="progress-bar">
                <div style="width: <?= $progresso ?>%;"><?= $progresso ?>%</div>
            </div>
        </div>

        <div class="card">
            <h3>Próximas Tarefas</h3>
            <ul>
                <?php if (!$mbtiFeito): ?>
                    <li><strong><?= date('d/m/Y') ?>:</strong> Realizar o teste de personalidade MBTI</li>
                <?php endif; ?>
                <?php if (!$inteligenciasFeito): ?>
                    <li><strong><?= date('d/m/Y') ?>:</strong> Realizar o teste de Inteligências Múltiplas</li>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <section class="right-column">
        <div class="card">
            <h1>Resumo dos Testes</h1>
            <h3>Teste de personalidade</h3>
            <p><strong>Personalidade:</strong> <?= $user['mbti_type'] ?? 'Não concluído' ?></p>
            <p><strong>Descrição:</strong> <?= $user['mbti_description'] ?? 'Não concluído' ?></p>
            <br>
            <p><strong>Inteligências Múltiplas:</strong>
                <?php
                if (!empty($user['intelligences'])) {
                    $intelligences = json_decode($user['intelligences'], true);
                    echo implode(', ', array_keys(array_filter($intelligences, function ($score) {
                        return $score > 0;
                    })));
                } else {
                    echo 'Não concluído';
                }
                ?>
            </p>
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
