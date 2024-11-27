$(document).ready(function(){
    $("#cadastrar_ativo").click(function(){
      let descricao_ativo = $("#descricao").val();
      let tipo = $("#tipo").val();
      let marca = $("#marca").val();
      let quantidade = $("#quantidade").val();
      let observacao = $("#obs").val();

      $.ajax({
        type:"POST",
        url: "../controller/ativoController.php",
        data:{
            ativo: descricao_ativo,
            marca: marca,
            tipo: tipo,
            quantidade: quantidade,
            observacao: observacao
        },
        success: function(result){
            alert(result);
            location.reload();
      }});
    });
  });