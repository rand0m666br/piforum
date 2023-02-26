<?php
require("conexao.php");

Class Acesso{
    private $con = null;

    public function __construct($conexao){
        $this->con = $conexao;
    }

    public function send(){
        if(empty($_POST) || $this->con == null){
            echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno no servidor."));
            return;
        }

        switch(true){
            case (isset($_POST["type"]) && $_POST["type"] == "login" && isset($_POST["email"]) && isset($_POST["senha"])):
                echo $this->login($_POST["email"], $_POST["senha"]);
                break;
            case (isset($_POST["type"]) && $_POST["type"] == "cadastro" && isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["confirma"])):
                echo $this->cadastro($_POST["email"], $_POST["senha"], $_POST["nome"], $_POST["confirma"]);
                break;
            // case (isset($_POST["type"]) && $_POST["type"] == "publicar" && isset($_POST["titulo"]) && isset($_POST["topico"])):
            //     echo $this->publicar($_POST["titulo"], $_POST["senha"]);
            //     break;
        }
    }

    public function login($email, $senha){
        $conexao = $this->con;

        $query = $conexao->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
        $query->execute(array($email, $senha));

        if($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($user["nome"], $user["nivel"], $user["id_user"]);

            return json_encode(array("erro" => 0));
        }else{
            return json_encode(array("erro" => 1, "mensagem" => "Email e/ou senha incorretos."));
        }
    }

    public function cadastro($email, $senha, $nome, $confirma){
        $conexao = $this->con;

        $query = $conexao->prepare("INSERT INTO `usuario`(`nivel`, `nome`, `email`, `senha`) VALUES (?, ?, ?, ?)");
        if($senha == $confirma){
            if($query->execute(array(0, $nome, $email, $senha))){

                session_start();
                $_SESSION["usuario"] = array($nome, 0);

                return json_encode(array("erro" => 0));
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro ao realizar o cadastro."));
            }
        }else{
            return json_encode(array("warning" => 1, "mensagem" => "As senhas não são iguais."));
        }
    }

    public function publicar(){

    }
};

$conexao = new Conexao();
$classe  = new Acesso($conexao->conectar());
$classe->send();
?>