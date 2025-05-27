<?php
$controller = new \App\Controllers\DashboardController();
$user = $controller->getUserInfo($_SESSION['user']['id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'about_me' => $_POST['about_me'] ?? null,
        'memories' => $_POST['memories'] ?? null,
        'strengths' => $_POST['strengths'] ?? null,
        'weaknesses' => $_POST['weaknesses'] ?? null,
        'values' => isset($_POST['values']) ? implode(',', $_POST['values']) : null,
        'skills' => isset($_POST['skills']) ? implode(',', $_POST['skills']) : null,
        'relationships_family' => $_POST['relationships_family'] ?? null,
        'relationships_friends' => $_POST['relationships_friends'] ?? null,
        'relationships_school' => $_POST['relationships_school'] ?? null,
        'relationships_society' => $_POST['relationships_society'] ?? null,
        'daily_likes' => $_POST['daily_likes'] ?? null,
        'daily_dislikes' => $_POST['daily_dislikes'] ?? null,
        'daily_routine' => $_POST['daily_routine'] ?? null,
        'daily_leisure' => $_POST['daily_leisure'] ?? null,
        'daily_study' => $_POST['daily_study'] ?? null,
        'school_life' => $_POST['school_life'] ?? null,
        'self_view_physical' => $_POST['self_view_physical'] ?? null,
        'self_view_intellectual' => $_POST['self_view_intellectual'] ?? null,
        'self_view_emotional' => $_POST['self_view_emotional'] ?? null,
        'others_view_friends' => $_POST['others_view_friends'] ?? null,
        'others_view_family' => $_POST['others_view_family'] ?? null,
        'others_view_teachers' => $_POST['others_view_teachers'] ?? null,
        'self_esteem' => $_POST['self_esteem'] ?? null,
    ];
    $controller = new \App\Controllers\ProfileController();
    $controller->updateWhoIam($_SESSION['user']['id'], $data);

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Quem Sou Eu?</title>
    <link rel="stylesheet" href="<?= asset('css/edit-profile.css') ?>">
</head>
<body>
<?php view('components/header') ?>

<div class="edit-profile-container">
    <div class="edit-profile-card">
        <h2>Quem Sou Eu?</h2>

        <form method="POST" action="who-iam">
            <label for="about_me">Fale sobre você</label>
            <textarea id="about_me" name="about_me"><?= htmlspecialchars($user['about_me'] ?? '') ?></textarea>

            <label for="memories">Minhas Lembranças</label>
            <textarea id="memories" name="memories"><?= htmlspecialchars($user['memories'] ?? '') ?></textarea>

            <label for="strengths">Pontos Fortes</label>
            <textarea id="strengths" name="strengths"><?= htmlspecialchars($user['strengths'] ?? '') ?></textarea>

            <label for="weaknesses">Pontos Fracos</label>
            <textarea id="weaknesses" name="weaknesses"><?= htmlspecialchars($user['weaknesses'] ?? '') ?></textarea>

            <label>Meus Valores</label>
            <?php
            $values = ['Honestidade', 'Respeito', 'Responsabilidade', 'Empatia', 'Perseverança'];
            $userValues = explode(',', $user['values'] ?? '');
            foreach ($values as $value) {
                $checked = in_array($value, $userValues) ? 'checked' : '';
                echo "<div><input type='checkbox' name='values[]' value='$value' $checked> $value</div>";
            }
            ?>

            <label>Minhas Principais Aptidões</label>
            <?php
            $skills = ['Comunicação', 'Trabalho em equipe', 'Liderança', 'Criatividade', 'Organização'];
            $userSkills = explode(',', $user['skills'] ?? '');
            foreach ($skills as $skill) {
                $checked = in_array($skill, $userSkills) ? 'checked' : '';
                echo "<div><input type='checkbox' name='skills[]' value='$skill' $checked> $skill</div>";
            }
            ?>

            <label for="relationships_family">Relacionamentos - Família</label>
            <textarea id="relationships_family"
                      name="relationships_family"><?= htmlspecialchars($user['relationships_family'] ?? '') ?></textarea>

            <label for="relationships_friends">Relacionamentos - Amigos</label>
            <textarea id="relationships_friends"
                      name="relationships_friends"><?= htmlspecialchars($user['relationships_friends'] ?? '') ?></textarea>

            <label for="relationships_school">Relacionamentos - Escola</label>
            <textarea id="relationships_school"
                      name="relationships_school"><?= htmlspecialchars($user['relationships_school'] ?? '') ?></textarea>

            <label for="relationships_society">Relacionamentos - Sociedade</label>
            <textarea id="relationships_society"
                      name="relationships_society"><?= htmlspecialchars($user['relationships_society'] ?? '') ?></textarea>

            <label for="daily_likes">O que gosto de fazer</label>
            <textarea id="daily_likes" name="daily_likes"><?= htmlspecialchars($user['daily_likes'] ?? '') ?></textarea>

            <label for="daily_dislikes">O que não gosto de fazer</label>
            <textarea id="daily_dislikes"
                      name="daily_dislikes"><?= htmlspecialchars($user['daily_dislikes'] ?? '') ?></textarea>

            <label for="daily_routine">Rotina</label>
            <textarea id="daily_routine"
                      name="daily_routine"><?= htmlspecialchars($user['daily_routine'] ?? '') ?></textarea>

            <label for="daily_leisure">Lazer</label>
            <textarea id="daily_leisure"
                      name="daily_leisure"><?= htmlspecialchars($user['daily_leisure'] ?? '') ?></textarea>

            <label for="daily_study">Estudos</label>
            <textarea id="daily_study" name="daily_study"><?= htmlspecialchars($user['daily_study'] ?? '') ?></textarea>

            <label for="school_life">Minha Vida Escolar</label>
            <textarea id="school_life" name="school_life"><?= htmlspecialchars($user['school_life'] ?? '') ?></textarea>

            <label for="self_view_physical">Minha Visão Sobre Mim - Física</label>
            <textarea id="self_view_physical"
                      name="self_view_physical"><?= htmlspecialchars($user['self_view_physical'] ?? '') ?></textarea>

            <label for="self_view_intellectual">Minha Visão Sobre Mim - Intelectual</label>
            <textarea id="self_view_intellectual"
                      name="self_view_intellectual"><?= htmlspecialchars($user['self_view_intellectual'] ?? '') ?></textarea>

            <label for="self_view_emotional">Minha Visão Sobre Mim - Emocional</label>
            <textarea id="self_view_emotional"
                      name="self_view_emotional"><?= htmlspecialchars($user['self_view_emotional'] ?? '') ?></textarea>

            <label for="others_view_friends">A Visão das Pessoas Sobre Mim - Amigos</label>
            <textarea id="others_view_friends"
                      name="others_view_friends"><?= htmlspecialchars($user['others_view_friends'] ?? '') ?></textarea>

            <label for="others_view_family">A Visão das Pessoas Sobre Mim - Familiares</label>
            <textarea id="others_view_family"
                      name="others_view_family"><?= htmlspecialchars($user['others_view_family'] ?? '') ?></textarea>

            <label for="self_esteem">Autovalorização</label>
            <textarea id="self_esteem" name="self_esteem"><?= htmlspecialchars($user['self_esteem'] ?? '') ?></textarea>

            <div class="edit-btn-container">
                <button type="submit" class="btn-edit">Salvar</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

