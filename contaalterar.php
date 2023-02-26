<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acao/conexao.php");

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();

    $id   = $_SESSION["usuario"][2];
    // $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
}else {
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

    <!-- Javascript -->
    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/acesso.js"></script>

    <title><?php echo $nome; ?></title>
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
                        <li><a href="conta.php" class="a" id="ativo"><i class="fa-solid fa-user"></i> Minha conta</a></li>
                        <li><a href="acao/logout.php" class="a"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
                        <?php if($adm == 2): ?>
                            <li><a href="dashboard.php" class="a">Dashboard</a></li>
                        <?php endif; ?>
                    <?php } else { ?>
                        <li><a href="login.php" class="a">Login</a></li>
                        <li><a href="cadastro.php" class="a">Cadastro</a></li>
                    <?php  } ?>
                </div>
            </ul>
        </nav>
    </div>

    <!-- <h1>Cadastro</h1> -->
    <div id="mensagem"></div>

    <?php
        $query = $conexao->prepare("SELECT * FROM `usuario` WHERE `id_user`=?");
        $query->execute(array($id));

        $user = $query->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < sizeof($user); $i++) :
            $usuarioAtual = $user[$i];
    ?>
    <form id="formularioAlterar" action="acao/alterar.php" method="post">
        <h2>Alterar dados</h2>
        <div class="linha">
            <label for="nomeAlt">Nome de usuário</label>
            <input type="text" name="nomeAlt" id="nomeAlt" value="<?php echo $usuarioAtual["nome"]; ?>">
        </div>
        <div class="linha">
            <label for="emailAlt">Email</label>
            <input type="email" name="emailAlt" id="emailAlt" value="<?php echo $usuarioAtual["email"]; ?>">
        </div>
        <div class="linha">
            <label for="senhaAlt">Senha</label>
            <input type="password" name="senhaAlt" id="senhaAlt">
        </div>
        <div class="linha">
            <label for="confirmaAlt">Confirmar senha</label>
            <input type="password" name="confirmaAlt" id="confirmaAlt">
        </div>
        <?php endfor; ?>
        <div class="cadastro">
            <button id="btnAlterar">Alterar dados</button><br>
        </div>
    </form>
</body>

</html>