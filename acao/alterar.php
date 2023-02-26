<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("conexao.php");

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();

    $id   = $_SESSION["usuario"][2];
    // $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];


    $nome = $_POST["nomeAlt"];
    $email = $_POST["emailAlt"];
    $senha = $_POST["senhaAlt"];

    $query = $conexao->prepare("UPDATE `usuario` SET `nome`=?,`email`=?,`senha`=? WHERE `id_user`='$id'");
    $query->execute(array($nome, $email, $senha));

    header("location: ../conta.php");
} else {
    header("location: login.php");
}
?>