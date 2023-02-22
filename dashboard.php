<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acao/conexao.php");
    $adm = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];

    $superadm = $_SESSION["usuario"][2];
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

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

    <title>Dashboard - <?php echo $nome; ?></title>
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
                        <li><a href="cadastro.php">Cadastro</a></li>
                    <?php  } ?>
                </div>
            </ul>
        </nav>
    </div>

    <?php if ($adm == 2) : ?>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nivel</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                </tr>
            </thead>
            <?php
            $query = $conexao->prepare("SELECT * FROM usuario");
            $query->execute();

            $user = $query->fetchAll(PDO::FETCH_ASSOC);

            for ($i = 0; $i < sizeof($user); $i++) :
                $usuarioAtual = $user[$i];
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $usuarioAtual["id_user"]; ?></td>
                        <td><?php echo $usuarioAtual["nivel"]; ?></td>
                        <td><?php echo $usuarioAtual["nome"]; ?></td>
                        <td><?php echo $usuarioAtual["email"]; ?></td>
                        <td><?php echo $usuarioAtual["senha"]; ?></td>
                    </tr>
                <?php endfor; ?>
                </tbody>
        </table>
    <?php else :
        header("location: index.php");
    endif;
    ?>
</body>

</html>