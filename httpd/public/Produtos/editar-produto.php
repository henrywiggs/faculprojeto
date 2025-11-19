<?php
include_once("controller.php");
  include_once("../../Config/conexao.php");
  include_once("../../Controller/Fornecedores-Controller.php");
  include_once("../../Controller/Unidades-Controller.php");
  include_once("../../Controller/Categorias-Controller.php");


echo "<h5 class=\"card-title fw-semibold mb-4\">Alterar Produto<h5>";


 $tarefa = new ProdutosController();
  $uc = new UnidadesController();
  $cat = new CategoriasController();
  $fc = new FornecedoresController();

  $objs = $tarefa->buscaTodos();
  $unidades = $uc->buscaTodos();
  $categorias = $cat->buscaTodos();
  $forns = $fc->buscaTodos();

$dados = $tarefa->buscaCodigo($_GET['id']);
?>

<form id="formProduto" method="GET" enctype="multipart/form-data">
  <input type="hidden" name="cod_produto" id="cod_produto" value="<?=$dados->cod_produto?>">
  <div class="mb-3">
    <label for="nom_produto" class="form-label">Nome</label>
    <input type="input" class="form-control" value="<?=$dados->nom_produto?>" id="nom_produto" name="nom_produto" aria-describedby="nomeAjuda">
    <div id="nomeAjuda" class="form-text">Informe o nome completo do produto.</div>
</div>

  <label for="cod_fornecedor">Fornecedor</label></br>

<select id="cod_fornecedor" name="cod_fornecedor">
  <option value=<?= $dados->cod_fornecedor ?> selected><?= $dados->nom_fornecedor ?></option>
  <?php
  foreach($forns as $forn ){   
  ?>
  <option value=<?= $forn->cod_fornecedor ?>><?= $forn->nom_fornecedor ?></option>
    <?php
  }  
  ?>
 </select>
</br>
</br>
  <div class="mb-3">
    <label for="end_foto" class="form-label">Foto</label></br>
    <input type="input" class="form-control" id="end_foto" name="end_foto" value="<?= $dados->end_foto ?>" required>
    <div id="fotoAjuda" class="form-text">selecione um foto.</div>
  </div>
  
 <label for="cod_unidade">Unidade</label></br>
 <select id="cod_unidade" name="cod_unidade">
  <option value=<?= $dados->cod_unidade ?> selected ><?= $dados->nom_unidade ?></option>
  <?php
  foreach($unidades as $unidade ){   
  ?>
  <option value=<?= $unidade->cod_unidade ?>><?= $unidade->nom_unidade ?></option>
  <?php
  }  
  ?>

</select>

</br>
</br>
<div class="mb-3">
    <label for="vlr_unitario" class="form-label">Preço de venda</label>
    <input type="input" class="form-control" id="vlr_unitario" name="vlr_unitario" value="<?=$dados->vlr_unitario?>" aria-describedby="vlrAjuda" required>
    <div id="vlrAjuda" class="form-text">Digite o preço final de venda</div>
</div>
  <label for="cod_categoria">Categoria</label></br>
  <select id="cod_categoria" name="cod_categoria">
  <option value=<?= $dados->cod_categoria ?> selected ><?= $dados->nom_categoria ?></option>
  <?php
  foreach($categorias as $categ ){   
  ?>
  <option value=<?= $categ->cod_categoria ?>><?= $categ->nom_categoria ?></option>
  <?php
  }  
  ?>

</select>
</br>
</br>
</br>

  <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<script>
  $("form#formProduto").submit(function(e) {
    
    e.preventDefault();
    
    var dados_serializados = $(this).serialize();
    
    $.ajax({
        url: "./produtos/controller.php",
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