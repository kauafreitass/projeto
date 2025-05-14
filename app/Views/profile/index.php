<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Projeto de Vida</title>
    <link rel="stylesheet" href="<?= asset('css/edit-profile.css') ?>">
</head>
<body>
<?php include_once 'components/header.php'; ?>

<div class="container">
    <div class="left-column">
        <div class="card profile">
            <form method="POST" action="/salvar-perfil" enctype="multipart/form-data">
                <h2>Editar Perfil</h2>

                <div style="text-align: center;">
                    <img src="/assets/img/avatar.png" alt="Foto de perfil" class="avatar-preview">
                    <br><br>
                    <input type="file" name="avatar" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" id="nome" value="João da Silva" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="joao@email.com" required>
                </div>

                <div class="form-group">
                    <label for="senha">Nova senha</label>
                    <input type="password" name="senha" id="senha">
                    <small>Deixe em branco para manter a senha atual</small>
                </div>

                <div class="edit-btn-container">
                    <button type="submit" class="btn-edit">Salvar alterações</button>
                </div>
            </form>
        </div>
    </div>
    <div class="right-column">
        <div class="card">
            <h3>Dica:</h3>
            <p>Manter seu perfil atualizado ajuda a personalizar melhor seu Plano de Vida.</p>
        </div>
    </div>
</div>

<?php include_once 'components/footer.php'; ?>
</body>
</html>