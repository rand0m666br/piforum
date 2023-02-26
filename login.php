<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acao/conexao.php");
    header("location: index.php");
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
    <link rel="stylesheet" href="css/login.css">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

    <!-- Javascript -->
    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/acesso.js"></script>

    <title>Login</title>
</head>

<body>
    <div class="navbar">
        <nav>
            <ul>
                <li class="logo"><a href="index.php"><img src="css/imagens/frontline.png" class="img" alt=""></a></li>
                <li><a href="forum.php" class="a">Fórum</a></li>
                <li><a href="sobre.php" class="a">Sobre</a></li>
                <div class="login">

                    <?php
                    if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
                        $adm = $_SESSION["usuario"][1];
                    ?>
                        <li><a href="conta.php" class="a"><i class="fa-solid fa-user"></i> Minha conta</a></li>
                        <li><a href="acao/logout.php" class="a"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
                        <?php if($adm == 2): ?>
                            <li><a href="dashboard.php" class="a">Dashboard</a></li>
                        <?php endif; ?>
                    <?php } else { ?>
                        <li><a href="login.php" class="a" id="ativo">Login</a></li>
                        <li><a href="cadastro.php" class="a">Cadastro</a></li>
                    <?php  } ?>
                </div>
            </ul>
        </nav>
    </div>

    <div id="mensagem"></div>

    <h1>Login</h1>

    <form id="formularioLogin">
        <h2>Efetuar login</h2>
        <div class="linha">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="linha">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha"><br>
        </div>
        <div class="cadastro">
            <button id="btnEntrar">Entrar</button><br>
            <span>Não tem um login? <a href="cadastro.php">Cadastre-se</a></span>
        </div>
    </form>
</body>

</html>