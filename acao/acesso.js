$(function(){
    $("button#btnEntrar").on("click", function(e){
        e.preventDefault();

        var campoEmail = $("form#formlogin #email").val();
        var campoSenha = $("form#formlogin #senha").val();

        if (campoEmail.trim() == "" || campoSenha.trim() == "") {
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "login.php",
                type: "POST",
                data: {
                    email: campoEmail,
                    senha: campoSenha
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]) {
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        // print("funcionou");
                        window.location = "index.html";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação.");
                }
            });
        }
    });
});