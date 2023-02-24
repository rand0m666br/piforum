<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
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
    <link rel="stylesheet" href="css/cadastro.css">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

    <title>Cadastro</title>
</head>

<body>
    <div class="navbar">
        <nav>
            <ul>
                <li class="logo"><a href="index.php">Fórum Teste</a></li>
                <li><a href="forum.php">Fórum</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="parceiros.php">Parceiros</a></li>
                <div class="login">

                    <?php
                    if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
                    ?>
                        <li><a href="conta.php">Minha conta</a></li>
                        <li><a href="acao/logout.php">Sair</a></li>
                    <?php } else { ?>
                        <li><a href="login.php">Login</a></li>
                        <li id="ativo"><a href="cadastro.php">Cadastro</a></li>
                    <?php  } ?>
                </div>
            </ul>
        </nav>
    </div>

    <h1>Cadastro</h1>

    <form id="formularioCadastro">
        <h2>Cadastro de membro</h2>
        <div class="linha">
            <label for="nomeCad">Nome de usuário</label>
            <input type="text" name="nomeCad" id="nomeCad">
        </div>
        <div class="linha">
            <label for="emailCad">Email</label>
            <input type="email" name="emailCad" id="emailCad">
        </div>
        <div class="linha">
            <label for="senhaCad">Senha</label>
            <input type="password" name="senhaCad" id="senhaCad">
        </div>
        <div class="linha">
            <label for="confirmaCad">Confirmar senha</label>
            <input type="password" name="confirmaCad" id="confirmaCad">
        </div>
        <div class="linha">
            <label for="dataCad">Data de nascimento</label>
            <input type="date" name="dataCad" id="dataCad">
        </div>
        <div class="cadastro">
            <button id="btnCadastro">Cadastrar</button><br>
            <span>Já possui uma conta? Faça seu login <a href="login.php">aqui</a></span>
        </div>
    </form>
</body>

</html>