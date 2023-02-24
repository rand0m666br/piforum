<?php 
Class Conexao{
    private $host = "127.0.0.1";
    private $user = "root";
    private $senha = "";
    private $bd = "piforum";

    public function conectar(){
        try {
            $conexao = new PDO("mysql:host=$this->host;dbname=$this->bd", $this->user, $this->senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            $conexao = null;
        }

        return $conexao;
    }
}
?>