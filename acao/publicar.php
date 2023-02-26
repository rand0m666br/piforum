<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("conexao.php");

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();

    $id   = $_SESSION["usuario"][2];
    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];


    $titulo = $_POST["titulo"];
    $topico = $_POST["topico"];

    $query = $conexao->prepare("INSERT INTO `topico`(`id_user`, `titulo`, `topico`) VALUES (?, ?, ?)");
    $query->execute(array($id, $titulo, $topico));

    header("location: ../forum.php");
} else {
    header("location: login.php");
}
?>