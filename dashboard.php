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
    <link rel="stylesheet" href="css/dashboard.css">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/47e9777af5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/47e9777af5.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/deletar.js"></script>

    <title>Dashboard - <?php echo $nome; ?></title>
</head>

<body>
    <div class="navbar">
        <nav>
            <ul>
                <li class="dashboard"><a href="dashboard.php">Dashboard</a></li>
                <li><span><?php echo $nome . " (ADM)" ?></span></li>
                <li class="voltar"><a href="index.php"><button><i class="fa-solid fa-house"></i> Home</button></a></li>
            </ul>
        </nav>
    </div>
    <form action="dashboard.php" method="post">
        <a href="dashboard.php"><i class="fa-solid fa-arrow-left"></i></a>
        <input type="text" name="pesquisa" id="pesquisa" placeholder="Pesquisar por nome">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <?php if ($adm == 2) : ?>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nivel</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th class="senha">Senha</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <?php
            if (isset($_POST["pesquisa"])) {
                $nome = $_POST["pesquisa"];
                $query = $conexao->prepare("SELECT * FROM usuario WHERE nome='$nome'");
                $query->execute();
            }else {
                $query = $conexao->prepare("SELECT * FROM usuario WHERE id_user!=?");
                $query->execute(array($id));
            }

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
                        <td class="senha">*******</td>
                        <td><button class="deletar" idUsuario="<?php echo $usuarioAtual["id_user"]; ?>">Excluir</button></td>
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