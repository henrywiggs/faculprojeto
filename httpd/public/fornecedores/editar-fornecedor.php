<?php
include_once("controller.php");
echo "<h5 class=\"card-title fw-semibold mb-4\">Alterar Fornecedor<h5>";
$dados = $tarefa->buscaCodigo($_GET['id']);
?>

<form id="formFornecedor" method="POST" enctype="multipart/form-data">
  
  <input type="hidden" name="cod_fornecedor" id="cod_fornecedor" value="<?=$dados->cod_fornecedor?>">
  <div class="mb-3">
    <label for="nom_fornecedor" class="form-label">Nome</label>
    <input type="input" class="form-control" value="<?=$dados->nom_fornecedor?>" id="nom_fornecedor" name="nom_fornecedor" aria-describedby="nomeAjuda" required>
    <div id="nomeAjuda" class="form-text">Informe o nome do fornecedor .</div>
  </div>

  <div class="mb-3">
    <label for="num_cnpj" class="form-label">CNPJ</label>
    <input type="input" class="form-control" value="<?=$dados->num_cnpj?>" id="num_cnpj" name="num_cnpj" aria-describedby="CPFAjuda">
    <div id="CPFAjuda" class="form-text">Informe o CNPJ com apenas números.</div>
  </div>
  
  <div class="mb-3">
    <label for="num_fax" class="form-label">Fax</label>
    <input type="input" class="form-control" value="<?=$dados->num_fax?>" id="num_fax" name="num_fax" aria-describedby="telefoneFixoAjuda">
    <div id="faxAjuda" class="form-text">Informe o Fax</div>
  </div>

  <div class="mb-3">
    <label for="num_telefonefixo" class="form-label">Telefone Fixo</label>
    <input type="input" class="form-control" value="<?=$dados->num_telefonefixo?>" id="num_telefonefixo" name="num_telefonefixo" aria-describedby="telefoneFixoAjuda">
    <div id="telefoneFixoAjuda" class="form-text">Informe o telefone fixo, se não houve ignore.</div>
  </div>

  <div class="mb-3">
    <label for="num_telefonecelular" class="form-label">Celular</label>
    <input type="input" class="form-control" value="<?=$dados->num_telefonecelular?>" id="num_telefonecelular" name="num_telefonecelular" aria-describedby="telefoneCelulaAjuda">
    <div id="telefoneCelulaAjuda" class="form-text">Informe o telefone celular.</div>
  </div>

  <div class="mb-3">
    <label for="nom_site" class="form-label">Site</label>
    <input type="input" class="form-control" value="<?=$dados->nom_site?>" id="nom_site" name="nom_site" aria-describedby="logradouroAjuda">
    <div id="siteAjuda" class="form-text">Informe o site.</div>
  </div>
  
  <div class="mb-3">
    <label for="nom_logradouro" class="form-label">Logradouro</label>
    <input type="text" class="form-control" value="<?=$dados->nom_logradouro?>" id="nom_logradouro" name="nom_logradouro" aria-describedby="logradouroAjuda">
    <div id="logradouroAjuda" class="form-text">Informe o logradouro.</div>
  </div>
  
  <div class="mb-3">
    <label for="num_endereco" class="form-label">Numero</label>
    <input type="input" class="form-control" value="<?=$dados->num_endereco?>" id="num_endereco" name="num_endereco" aria-describedby="numeroAjuda">
    <div id="numeroAjuda" class="form-text">Informe o Endereço.</div>
  </div>
  <div class="mb-3">
    <label for="nom_complemento" class="form-label">Numero</label>
    <input type="input" class="form-control" value="<?=$dados->nom_complemento?>" id="nom_complemento" name="nom_complemento" aria-describedby="complemento">
    <div id="complementoAjuda" class="form-text">Informe o Endereço.</div>
  </div>

  <div class="mb-3">
    <label for="nom_bairro" class="form-label">Bairro</label>
    <input type="input" class="form-control"  value="<?=$dados->nom_bairro?>" id="nom_bairro" name="nom_bairro" aria-describedby="bairroAjuda">
    <div id="bairroAjuda" class="form-text">Informe o bairro.</div>
  </div>
  
  <div class="mb-3">
    <label for="nom_cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" value="<?=$dados->nom_cidade?>" id="nom_cidade" name="nom_cidade" aria-describedby="cidadeAjuda">
    <div id="cidadeAjuda" class="form-text">Informe o bairro.</div>
  </div>

  <div class="mb-3">
    <label for="uf_estado" class="form-label">Estado</label>
    <input type="text" class="form-control" value="<?=$dados->uf_estado?>" id="uf_estado" name="uf_estado" aria-describedby="estadoAjuda" required>
    <div id="estadoAjuda" class="form-text">Informe o estado.</div>
  </div>

  <div class="mb-3">
    <label for="num_cep" class="form-label">CEP</label>
    <input type="number" class="form-control" value="<?=$dados->num_cep?>" id="num_cep" name="num_cep" aria-describedby="CEPAjuda">
    <div id="CEPAjuda" class="form-text">Informe o CEP.</div>
  </div>

  <button type="submit" class="btn btn-primary">Alterar</button>
</form>

<script>
  $("form#formFornecedor").submit(function(e) {
    
    e.preventDefault();
    
    var dados_serializados = $(this).serialize();
    
    $.ajax({
        url: "./fornecedores/controller.php",
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