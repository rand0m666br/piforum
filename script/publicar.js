$(function(){
    $("button#topico").on("click", function(e){
        e.preventDefault();

        window.location = "novotopico.php";
    });

    $("button#btnPublicar").on("click", function(e){
        e.preventDefault();

        var campoTitulo = $("form#formularioTopico #titulo").val();
        var campoTopico = $("form#formularioTopico #topico").val();
        var getId       = $("$id   = $_SESSION['usuario'][2]"); 

        if(campoTitulo.trim() == "" || campoTopico.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acao/acesso.php",
                type: "POST",
                data: {
                    type: "publicar",
                    titulo: campoTitulo,
                    topico: campoTopico,
                    iduser: getId
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else if(retorno["warning"]){
                        $("div#mensagem").show().removeClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "forum.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });
});