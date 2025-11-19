<?php
  
  include_once("../../Config/conexao.php");
  include_once("../../Controller/Fornecedores-Controller.php");
  include_once("../../Controller/Unidades-Controller.php");
  include_once("../../Controller/Categorias-Controller.php");

  $tarefa = new FornecedoresController();
  $uc = new UnidadesController();
  $cat = new CategoriasController();

  $objs = $tarefa->buscaTodos();
  $unidades = $uc->buscaTodos();
  $categorias = $cat->buscaTodos();
?>

<h5 class="card-title fw-semibold mb-4">Cadastro de Produtos<h5>

<form id="formProduto" method="POST" enctype="multipart/form-data">
  
  <div class="mb-3">
    <label for="nom_produto" class="form-label">Nome</label>
    <input type="input" class="form-control" id="nom_produto" maxlength= "25" name="nom_produto" aria-describedby="nomeAjuda" required>
    <div id="nomeAjuda" class="form-text">Informe o nome do produto.</div>
  </div>
  <label for="cod_fornecedor">Fornecedor</label></br>

<select id="cod_fornecedor" name="cod_fornecedor" required>
  <option value="" disabled selected>Selecione uma opção</option>
  <?php
  foreach($objs as $obj ){   
  ?>
  <option value=<?= $obj->cod_fornecedor ?>><?= $obj->nom_fornecedor ?></option>
    <?php
  }  
  ?>
 </select>
</br>
</br>
  <div class="mb-3">
    <label for="end_foto" class="form-label">Foto</label></br>
    <input type="input" class="form-control" id="end_foto" name="end_foto" aria-describedby="fotoAjuda" required>
    <div id="fotoAjuda" class="form-text">selecione um foto.</div>
  </div>

 <label for="cod_unidade">Unidade</label></br>
  <select id="cod_unidade" name="cod_unidade" required>
  <option value="" disabled selected>Selecione uma opção</option>
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
    <input type="input" class="form-control" id="vlr_unitario" pattern="^[0-9]+(\.[0-9]{1,2})?$" name="vlr_unitario" aria-describedby="vlrAjuda" required>
    <div id="vlrAjuda" class="form-text">Digite o preço final de venda</div>
</div>
  <label for="cod_categoria">Categoria</label></br>
  <select id="cod_categoria" name="cod_categoria" required>
  <option value="" disabled selected>Selecione uma opção</option>
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

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
  $("form#formProduto").submit(function(e) {
    
    e.preventDefault();
    
    var data = new FormData(this);
    
    $.ajax({
        url: "./produtos/controller.php",
        type: "POST",
        data: data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
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