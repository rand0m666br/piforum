$(function(){
    $("button#btnEntrar").on("click", function(e){
        e.preventDefault();

        var campoEmail = $("form#formularioLogin #email").val();
        var campoSenha = $("form#formularioLogin #senha").val();

        if(campoEmail.trim() == "" || campoSenha.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acao/acesso.php",
                type: "POST",
                data: {
                    type: "login",
                    email: campoEmail,
                    senha: campoSenha
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "dashboard.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });

    $("button#btnCadastro").on("click", function(e){
        e.preventDefault();

        var campoNome  = $("form#formularioCadastro #nomeCad").val();
        var campoEmail = $("form#formularioCadastro #emailCad").val();
        var campoSenha = $("form#formularioCadastro #senhaCad").val();
        var campoData = $("form#formularioCadastro #dataCad").val();

        if(campoNome.trim() == "" || campoEmail.trim() == "" || campoSenha.trim() == "" || campoData.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acao/acesso.php",
                type: "POST",
                data: {
                    type: "cadastro",
                    nome: campoNome,
                    email: campoEmail,
                    senha: campoSenha,
                    data: campoData
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "dashboard.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });

});