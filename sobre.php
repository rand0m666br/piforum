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
    <link rel="stylesheet" href="css/sobre.css">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/47e9777af5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

    <title>Sobre</title>
</head>

<body>
    <div class="navbar">
        <nav>
            <ul>
                <li class="logo"><a href="index.php">Fórum Teste</a></li>
                <li><a href="forum.php">Fórum</a></li>
                <li><a href="sobre.php" id="ativo">Sobre</a></li>
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

    <section class="sobre">
        <h3>Sobre</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam optio, eum quis ipsum provident iste earum mollitia dolorem voluptatum voluptatibus atque non amet perspiciatis odit! Architecto atque obcaecati est doloribus.
            Deserunt fuga possimus ea totam, voluptates amet molestiae beatae doloribus eveniet vero id iste consequatur molestias nam illum placeat labore et deleniti sint. Enim accusantium sunt maiores error dolores repellendus?
            Voluptatem consectetur mollitia porro necessitatibus aliquam, quibusdam cupiditate quos ex omnis totam tempore eaque maiores culpa! A magnam excepturi explicabo modi, rerum eaque quia dolorum perferendis eius illum! Reprehenderit, aspernatur.
            Sapiente eveniet delectus dicta quod laborum exercitationem? Nam, odit cumque accusamus molestias unde, sapiente, excepturi magnam quod numquam consectetur magni corporis iure rem quisquam ipsa sit ipsam perferendis? Accusamus, doloribus.
            Similique debitis quam, iure eos, repudiandae rerum hic delectus ea quo ex quaerat? Doloremque, nemo at. Ipsum officia earum quis deserunt minus ipsa, veritatis commodi, dignissimos quas dicta odio nobis.</p>
        </section>
    <section class="regras">
        <h3>Regras</h3>    
        <ol>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, expedita odio animi dolores, incidunt vero dicta suscipit commodi illo eveniet eius cum hic tempore sit quae officia nemo. Velit, deserunt.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, expedita odio animi dolores, incidunt vero dicta suscipit commodi illo eveniet eius cum hic tempore sit quae officia nemo. Velit, deserunt.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, expedita odio animi dolores, incidunt vero dicta suscipit commodi illo eveniet eius cum hic tempore sit quae officia nemo. Velit, deserunt.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, expedita odio animi dolores, incidunt vero dicta suscipit commodi illo eveniet eius cum hic tempore sit quae officia nemo. Velit, deserunt.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, expedita odio animi dolores, incidunt vero dicta suscipit commodi illo eveniet eius cum hic tempore sit quae officia nemo. Velit, deserunt.</li>
            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, expedita odio animi dolores, incidunt vero dicta suscipit commodi illo eveniet eius cum hic tempore sit quae officia nemo. Velit, deserunt.</li> 
        </ol>
</section>
</body>

</html>