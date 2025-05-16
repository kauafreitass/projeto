<?php
if(isset($_SESSION['user'])) {
    $controller = new \App\Controllers\DashboardController();
    $user = $controller->getUserInfo($_SESSION['user']['id']);
}
if (empty($user['picture'])) {
    $picture = "images/logo.jpg";
} else {
    $picture = $user['picture'];
}

if (!is_link($picture)) {
    $picture = asset($picture);
}
$dashboard = asset("dashboard");
$logout = asset("logout");
$login = asset("login");
?>

<style>
    header {
        background-color: #2E1065;
        padding: 36px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 130px;
    }

    .header-title {
        font-size: x-large;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: #C4B5FD;
    }

    .header-title p:first-child {
        color: white;
    }

    .navegation-links {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .navegation-links a {
        text-decoration: none;
        color: white;
        transition: color 0.2s;
    }

    .navegation-links a:hover {
        color: #c1c1c1;
    }

    .profile-photo {
        background-color: #ffffff;
        border: 2px solid #bdaaff;
        height: 40px;
        aspect-ratio: 1/1;
        border-radius: 50%;
    }

    .logo-link {
        text-decoration: none;
    }
</style>

<header>
    <a href="<?= asset("home");?>" class="logo-link">
        <div class="header-title">
            <p>Projeto</p>
            <p>de vida</p>
        </div>
    </a>
    <nav class="navegation-links">
        <div>

            <a href="#"><i class="fa-solid fa-suitcase" style="color: #ffffff;"></i> Profissão</a>
        </div>
        <div>

            <a href="personality"><i class="fa-solid fa-share-nodes" style="color: #ffffff;"></i> Teste de personalidade</a>
        </div>
        <div>

            <a href="#"><i class="fa-solid fa-clipboard-list" style="color: #ffffff;"></i> Planejamento</a>
        </div>
        <?php
        if ($_SESSION['auth'] == 'authenticated') {
            echo "
        <a href='$dashboard'><img src='$picture' alt='Foto de perfil' class='profile-photo'></a>
        <a href='$logout'><i class='fa-solid fa-door-closed' style='color: #ffffff;'></i> Sair</a>
        ";
        } else {
            echo "
            <a href='$login'><i class='fa-solid fa-door-open' style='color: #ffffff;'></i> Entrar</a>
            ";
        }
        ?>

    </nav>
</header>
<script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>