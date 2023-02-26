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

        var campoEmail = $("form#formularioCadastro #emailCad").val();
        var campoSenha = $("form#formularioCadastro #senhaCad").val();
        var campoNome = $("form#formularioCadastro #nomeCad").val();
        var campoConfirma = $("form#formularioCadastro #confirmaCad").val();

        if(campoEmail.trim() == "" || campoSenha.trim() == "" || campoNome.trim() == "" || campoConfirma.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acao/acesso.php",
                type: "POST",
                data: {
                    type: "cadastro",
                    email: campoEmail,
                    senha: campoSenha,
                    nome: campoNome,
                    confirma: campoConfirma
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else if(retorno["warning"]){
                        $("div#mensagem").show().removeClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "acao/logout.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });

    /*$("button#btnAlterar").on("click", function(e){
        e.preventDefault();
        alert("ok");
        var campoNome = $("form#formularioAlterar #nomeAlt").val();
        var campoEmail = $("form#formularioAlterar #emailAlt").val();
        var campoSenha = $("form#formularioAlterar #senhaAlt").val();
        var campoConfirma = $("form#formularioAlterar #confirmaAlt").val();

        if(campoEmail.trim() == "" || campoSenha.trim() == "" || campoNome.trim() == "" || campoConfirma.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acao/alterar.php",
                type: "POST",
                data: {
                    type: "alterar",
                    email: campoEmail,
                    senha: campoSenha,
                    nome: campoNome,
                    confirma: campoConfirma
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else if(retorno["warning"]){
                        $("div#mensagem").show().removeClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "dashboard.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });*/
    
});