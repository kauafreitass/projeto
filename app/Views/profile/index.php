<?php
$controller = new \App\Controllers\DashboardController();
$user = $controller->getUserInfo($_SESSION['user']['id']);
if (empty($user['picture'])) {
    $picture = "images/logo.jpg";
} else {
    $picture = $user['picture'];
}
if (!is_link($picture)) {
    $picture = asset($picture);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $controller = new \App\Controllers\ProfileController();
    $update = $controller->update($_FILES['avatar'], $_POST['name'], $_POST['email'], $_POST['password'], $_POST['gender'], $_POST['birthdate']);
    if ($update["success"]) {
        header( "Location: " . asset( "dashboard" ) );;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Projeto de Vida</title>
    <link rel="stylesheet" href="<?= asset('css/edit-profile.css') ?>">
</head>
<body>
<?php view('components/header') ?>

<div class="edit-profile-container">
    <div class="edit-profile-card">
        <h2>Editar Perfil</h2>

        <form method="POST" action="edit" enctype="multipart/form-data">
            <div class="profile-image-preview">
                <img src="<?=$picture?>" alt="Avatar">
                <input type="file" name="avatar" accept="image/*">
            </div>

            <label for="name">Nome completo</label>
            <input type="text" id="name" name="name" value="<?= ucwords($user['name']) ?>" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required>

            <label for="password">Nova senha</label>
            <input type="password" id="password" name="password">
            <small>Deixe em branco para manter a senha atual</small>

            <label for="gender">Gênero</label>
            <select id="gender" name="gender">
                <option <?php if ($user['gender'] == "male") {echo "selected";} ?>>Masculino</option>
                <option <?php if ($user['gender'] == "female") {echo "selected";} ?>>Feminino</option>
                <option <?php if ($user['gender'] == "not-say") {echo "selected";} ?>>Prefiro não dizer</option>
            </select>

            <label for="birthdate">Data de nascimento</label>
            <input type="date" id="birthdate" name="birthdate" value="<?= $user['birthdate'] ?>">

            <div class="edit-btn-container">
                <button type="submit" class="btn-edit">Salvar</button>
            </div>
        </form>
    </div>
</div>

<?php view('components/footer'); ?>
</body>
</html>