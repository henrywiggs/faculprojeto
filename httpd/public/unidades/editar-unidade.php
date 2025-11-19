<?php
include_once("controller.php");
echo "<h5 class=\"card-title fw-semibold mb-4\">Alterar unidade<h5>";
$dados = $tarefa->buscaCodigo($_GET['id']);
?>

<form id="formUnidade" method="GET" enctype="multipart/form-data">
  <input type="hidden" name="cod_unidade" id="cod_unidade" value="<?=$dados->cod_unidade?>">
  <div class="mb-3">
    <label for="nom_unidade" class="form-label">Nome</label>
    <input type="input" class="form-control" value="<?=$dados->nom_unidade?>" id="nom_unidade" name="nom_unidade" aria-describedby="nomeAjuda">
    <div id="nomeAjuda" class="form-text">Informe o nome completo do unidade.</div>
</div>

  <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<script>
  $("form#formUnidade").submit(function(e) {
    
    e.preventDefault();
    
    var dados_serializados = $(this).serialize();
    
    $.ajax({
        url: "./unidades/controller.php",
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