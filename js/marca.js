$(document).ready(function(){
    $("#cadastrar_marca").click(function(){
      let descricao_marca = $("#descricao").val();

      $.ajax({
        type:"POST",
        url: "../controller/marcaController.php",
        data:{
            marca: descricao_marca
        },
        success: function(result){
            alert(result);
            location.reload();
      }});
    });
  });