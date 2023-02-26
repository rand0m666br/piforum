<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    $adm = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/index.css">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/47e9777af5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

    <title>Home</title>
</head>

<body>
    <div class="navbar">
        <nav>
            <ul>
                <li class="logo" id="ativo"><a href="index.php">Frontline</a></li>
                <li><a href="forum.php">Fórum</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <div class="login">

                    <?php
                    if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
                        $adm = $_SESSION["usuario"][1];
                    ?>
                        <li><a href="conta.php"><i class="fa-solid fa-user"></i> Minha conta</a></li>
                        <li><a href="acao/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
                        <?php if($adm == 2): ?>
                            <li><a href="dashboard.php">Dashboard</a></li>
                        <?php endif; ?>
                    <?php } else { ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="cadastro.php">Cadastro</a></li>
                    <?php  } ?>
                </div>
            </ul>
        </nav>
    </div>

    <div class="main">
        <h1>Bem vindo ao fórum Frontline</h1>
    </div>
    <img src="css/imagens/feb.png" alt="">
</body>

</html>