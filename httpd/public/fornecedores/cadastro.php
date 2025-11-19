<h5 class="card-title fw-semibold mb-4">Cadastro do Fornecedor<h5>

<form id="formFornecedor" method="POST" enctype="multipart/form-data">
  

  <div class="mb-3">
    <label for="nom_fornecedor" class="form-label">Nome</label>
    <input type="input" class="form-control" id="nom_fornecedor" maxlength="50" name="nom_fornecedor" aria-describedby="nomeAjuda" required>
    <div id="nomeAjuda" class="form-text">Informe o nome do fornecedor .</div>
  </div>

  <div class="mb-3">
    <label for="num_cnpj" class="form-label">CNPJ</label>
    <input type="input" class="form-control" pattern="[0-9]+" maxlength="14" id="num_cnpj" name="num_cnpj" aria-describedby="CPFAjuda" required>
    <div id="CPFAjuda" class="form-text">Informe o CNPJ com apenas números.</div>
  </div>

  <div class="mb-3">
    <label for="num_fax" class="form-label">Fax</label>
    <input type="input" class="form-control" pattern="[0-9]+" maxlength="11" id="num_fax" name="num_fax" aria-describedby="FaxAjuda">
    <div id="FaxAjuda" class="form-text">Informe o fax com apenas números.</div>
  </div>
  
  <div class="mb-3">
    <label for="num_telefonefixo" class="form-label">Telefone Fixo</label>
    <input type="input" class="form-control" pattern="[0-9]+" maxlength="11" required id="num_telefonefixo" name="num_telefonefixo" aria-describedby="telefoneFixoAjuda">
    <div id="telefoneFixoAjuda" class="form-text">Informe o telefone fixo.</div>
  </div>
  <div class="mb-3">
    <label for="num_telefonecelular" class="form-label">Celular</label>
    <input type="input" class="form-control" pattern="[0-9]+" maxlength="11" id="num_telefonecelular" name="num_telefonecelular" aria-describedby="telefoneCelulaAjuda">
    <div id="telefoneCelulaAjuda" class="form-text">Informe o telefone celular.</div>
  </div>

  <div class="mb-3">
    <label for="nom_site" class="form-label">Site</label>
    <input type="input" class="form-control" id="nom_site" maxlength="50" name="nom_site" aria-describedby="logradouroAjuda">
    <div id="siteAjuda" class="form-text">Informe o site.</div>
  </div>
  
  <div class="mb-3">
    <label for="nom_logradouro" class="form-label">Logradouro</label>
    <input type="text" class="form-control" maxlength="25" id="nom_logradouro" name="nom_logradouro" aria-describedby="logradouroAjuda" required>
    <div id="logradouroAjuda" class="form-text">Informe o logradouro.</div>
  </div>
  <div class="mb-3">
    <label for="nom_complemento" class="form-label">Complemento</label>
    <input type="text" class="form-control" id="nom_complemento" name="nom_complemento" aria-describedby="complementoAjuda">
    <div id="complementoAjuda" class="form-text">Informe o complemento.</div>
  </div>
  
  <div class="mb-3">
    <label for="num_endereco" class="form-label">Numero</label>
    <input type="input" class="form-control" maxlength="4" pattern="[0-9]+" id="num_endereco" name="num_endereco" aria-describedby="numeroAjuda">
    <div id="numeroAjuda" class="form-text">Informe o Endereço.</div>
  </div>

  <div class="mb-3">
    <label for="nom_bairro" class="form-label">Bairro</label>
    <input type="input" class="form-control" maxlength="25" id="nom_bairro" name="nom_bairro" aria-describedby="bairroAjuda" required>
    <div id="bairroAjuda" class="form-text">Informe o bairro.</div>
  </div>
  
  <div class="mb-3">
    <label for="nom_cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="nom_cidade" maxlength="25" name="nom_cidade" aria-describedby="cidadeAjuda" required>
    <div id="cidadeAjuda" class="form-text">Informe o bairro.</div>
  </div>

  <div class="mb-3">
    <label for="uf_estado" class="form-label">Estado</label>
    <input type="text" class="form-control" id="uf_estado" name="uf_estado" aria-describedby="estadoAjuda" required>
    <div id="estadoAjuda" class="form-text">Informe o estado.</div>
  </div>

  <div class="mb-3">
    <label for="num_cep" class="form-label">CEP</label>
    <input type="number" class="form-control" id="num_cep" pattern="[0-9]+" maxlength="11" name="num_cep" aria-describedby="CEPAjuda" required>
    <div id="CEPAjuda" class="form-text">Informe o CEP.</div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
  $("form#formFornecedor").submit(function(e) {
    
    e.preventDefault();
    
    var data = new FormData(this);
    
    $.ajax({
        url: "./fornecedores/controller.php",
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