<?php
session_start();

require("acao/conexao.php");
$conexaoClass = new Conexao();
$conexao = $conexaoClass->conectar();
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {

    // $id   = $_SESSION["usuario"][2];
    $adm  = $_SESSION["usuario"][1];
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
    <link rel="stylesheet" href="css/forum.css">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/47e9777af5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

    <!-- Javascript -->
    <script type="text/javascript" src="script/jquery.js"></script>
    <script type="text/javascript" src="script/publicar.js"></script>
    <script type="text/javascript" src="script/deletar.js"></script>

    <title>Fórum</title>
</head>

<body>
    <div class="navbar">
        <nav>
            <ul>
                <li class="logo"><a href="index.php"><img src="css/imagens/frontline.png" class="img" alt=""></a></li>
                <li><a href="forum.php" class="a" id="ativo">Fórum</a></li>
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
                        <li><a href="login.php" class="a">Login</a></li>
                        <li><a href="cadastro.php" class="a">Cadastro</a></li>
                    <?php  } ?>
                </div>
            </ul>
        </nav>
    </div>

    <?php if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])): ?>
    <button id="topico"><i class="fa-solid fa-pen-to-square"></i> Novo Tópico</button>
    <?php endif; ?>

    <div class="postagens">
        <table>
            <thead>
                <tr>
                    <th class="usuario">Usuário</th>
                    <th>Título</th>
                    <th>Data</th>
                    <?php if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && $adm): ?>
                    <th class="btnDeletar">Deletar</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <?php
                $query = $conexao->prepare("SELECT * FROM topico");
                $query->execute();
                $topico = $query->fetchAll(PDO::FETCH_ASSOC);

                for ($i = 0; $i < sizeof($topico); $i++) :
                    $postagem = $topico[$i];
            ?>
            <tbody>
                <tr>
                    <td class="usuario"><?php echo $postagem["id_user"]; ?></td>
                    <td class="titulopost"><a href="#"><?php echo $postagem["titulo"]; ?></a></td>
                    <td class="datapost"><?php echo $postagem["data"] ?></td>
                    <?php if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && $adm): ?>
                    <td class="btnDeletar"><button class="delete" idPostagem="<?php echo $postagem["id_topico"]; ?>">Deletar</button></td>
                    <?php endif; ?>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

</body>

</html>