<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acao/conexao.php");

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();

    $id   = $_SESSION["usuario"][2];
    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];

    // $superadm = $_SESSION["usuario"][2];
} else {
    header("location: login.php");
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
    <link rel="stylesheet" href="css/topico.css">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/47e9777af5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

    <!-- Javascript -->
    <script type="text/javascript" src="script/jquery.js"></script>
    <!-- <script type="text/javascript" src="script/publicar.js"></script> -->

    <title>Novo Tópico</title>
</head>

<body>
    <div class="navbar">
        <nav>
            <ul>
                <li class="logo"><a href="index.php">Fórum Teste</a></li>
                <li id="ativo"><a href="forum.php">Fórum</a></li>
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

<div class="newtopico">
    <h1>Novo Tópico</h1>
    
<form id="formularioTopico" action="acao/publicar.php" method="post">
    <!-- <h2>Novo Tópico</h2> -->
    <div class="linha">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo">
    </div>
    <div class="linha">
        <label for="">Topico:</label>
        <textarea name="topico" id="topico" cols="30" rows="10"></textarea>
    </div>
    <div class="publicar">
        <button id="btnPublicar">Publicar</button><br>
    </div>
</form>
</div>

</body>

</html>