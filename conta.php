<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acao/conexao.php");

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();

    $id   = $_SESSION["usuario"][2];
    $nome = $_SESSION["usuario"][0];
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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/conta.css">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/47e9777af5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

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

    <?php
        $query = $conexao->prepare("SELECT * FROM `usuario` WHERE `id_user`=?");
        $query->execute(array($id));

        $user = $query->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < sizeof($user); $i++) :
            $usuarioAtual = $user[$i];
    ?>
    <div class="tabela">   
        <table>
            <tr>
                <th>Nome:</th>
                <td><?php echo $nome; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $usuarioAtual["email"]; ?></td>
            </tr>
            <tr>
                <th>Senha:</th>
                <td>******</td>
            </tr>
        </table>
        <?php endfor; ?>
        <a href="contaalterar.php?id_user=" class="alterar"><button>Alterar dados</button></a>
    </div>
</body>

</html>