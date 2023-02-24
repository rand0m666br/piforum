<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acao/conexao.php");

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();

    // $adm = $_SESSION["usuario"][1];
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

    <title><?php echo $nome; ?></title>
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
                        $adm = $_SESSION["usuario"][1];
                    ?>
                        <li id="ativo"><a href="conta.php">Minha conta</a></li>
                        <li><a href="acao/logout.php">Sair</a></li>
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

    <?php
        $query = $conexao->prepare("SELECT * FROM `usuario` WHERE `nome`='$nome'");
        $query->execute();

        $user = $query->fetchAll(PDO::FETCH_ASSOC);

        for ($i = 0; $i < sizeof($user); $i++) :
            $usuarioAtual = $user[$i];
    ?>
    <!-- <ul>
        <li>Nome: </li>
        <li>Email: </li>
        <li>Senha: </li>
        <li>Data de nascimento: </li>
    </ul> -->
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
                <td><?php echo $usuarioAtual["senha"]; ?></td>
            </tr>
            <tr>
                <th>Data de nascimento:</th>
                <td><?php echo $usuarioAtual["data_nasci"]; ?></td>
            </tr>
        </table>
        <?php endfor; ?>
        <a href="contaalterar.php" class="alterar"><button>Alterar dados</button></a>
    </div>
</body>

</html>