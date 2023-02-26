$(function(){
    $("button.deletar").on("click", function(){
        var idUsuario = $(this).attr("idUsuario");

        $.ajax({
            url: "acao/deletar.php",
            type: "POST",
            data: {
                id: idUsuario
            },

            success: function(retorno){
                retorno = JSON.parse(retorno);
                
                if(retorno["erro"]){
                    alert("Erro");
                }else{
                    window.location = window.location.href;
                }
            },

            error: function(){
                alert("Erro");
            }
        });
    });

    $("button.delete").on("click", function(){
        var idPostagem = $(this).attr("idPostagem");

        $.ajax({
            url: "acao/deletarpost.php",
            type: "POST",
            data: {
                id: idPostagem
            },

            success: function(retorno){
                retorno = JSON.parse(retorno);
                
                if(retorno["erro"]){
                    alert("Erro");
                }else{
                    window.location = window.location.href;
                }
            },

            error: function(){
                alert("Erro");
            }
        });
    });
});