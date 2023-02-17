<?php 
$host = "127.0.0.1";
$user = "root";
$senha = "";
$bd = "piforum";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$bd", $user, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    // echo "Erro na conexão: {$erro->getMessage()}";
    $conexao = null;
}
?>