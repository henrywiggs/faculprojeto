<?php
include_once("controller.php");
echo "<h5 class=\"card-title fw-semibold mb-4\">Alterar Categoria<h5>";
$dados = $tarefa->buscaCodigo($_GET['id']);
?>

<form id="formCategoria" method="GET" enctype="multipart/form-data">
  <input type="hidden" name="cod_categoria" id="cod_categoria" value="<?=$dados->cod_categoria?>">
  <div class="mb-3">
    <label for="nom_categoria" class="form-label">Nome</label>
    <input type="input" class="form-control" value="<?=$dados->nom_categoria?>" id="nom_categoria" name="nom_categoria" aria-describedby="nomeAjuda">
    <div id="nomeAjuda" class="form-text">Informe o nome completo do categoria.</div>
</div>

  <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<script>
  $("form#formCategoria").submit(function(e) {
    
    e.preventDefault();
    
    var dados_serializados = $(this).serialize();
    
    $.ajax({
        url: "./categorias/controller.php",
        type: "PUT",
        data: dados_serializados,
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function () {
                //Aqui adicionas o loader
                $('#corpo').html("<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\"></div><div class=\"spinner-grow text-danger\" role=\"status\"></div></div>");
        },
        success: function(result){        
            $('#corpo').html(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#corpo').html(textStatus + errorThrown);
        }
    });
});
</script>