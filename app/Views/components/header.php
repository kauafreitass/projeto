<style>
    header {
        background-color: #2E1065;
        padding: 36px;
        display: flex;
        align-items: center;
        justify-content: space-between;
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
        height: 40px;
        border-radius: 50%;
    }

    .logo-link {
        text-decoration: none;
    }
</style>

<header>
    <a href="<?= asset('index.php'); ?>" class="logo-link">
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

            <a href="#"><i class="fa-solid fa-share-nodes" style="color: #ffffff;"></i> Teste de personalidade</a>
        </div>
        <div>

            <a href="#"><i class="fa-solid fa-clipboard-list" style="color: #ffffff;"></i> Planejamento</a>
        </div>
        <?php
        if ($_SESSION['auth'] == 'authenticated') {
            echo '
        <a href="#"><img src="images/logo.jpg" alt="Foto de perfil" class="profile-photo"></a>
        <a href="#"><i class="fa-solid fa-door-closed" style="color: #ffffff;"></i> Sair</a>
        ';
        } else {
            echo "
            <a href='login'><i class='fa-solid fa-door-open' style='color: #ffffff;'></i> Entrar</a>
            ";
        }
        ?>

    </nav>
</header>
<script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>