<?php
session_start();
require("conexao.php");

$conexaoClass = new Conexao();
$conexao = $conexaoClass->conectar();

if(isset($_POST["id"]) && isset($_SESSION["usuario"]) && $_SESSION["usuario"][1] == 2){
    $query = $conexao->prepare("DELETE FROM usuario WHERE id_user=?");

    if ($query->execute(array($_POST["id"]))) {
        echo json_encode(array("erro" => 0));
    }else {
        echo json_encode(array("erro" => 1));
    }
}else {
    echo json_encode(array("erro" => 1));
}
?>